<?php

class TableMappingModel{
    private $data = [];
    private $table_name;
    private $keys_condition;
    private $primary_keys;
    protected $use_primary_key_to_insert = false;

    public function __construct(string $table_name, array $primary_keys)
    {
        $this->table_name = $table_name;
        $this->primary_keys = $primary_keys;
        $this->keys_condition = $this->getPrimaryKeysConditionStatement($primary_keys);
        foreach ($primary_keys as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    private function getPrimaryKeysConditionStatement(array $primary_key_list) : array{
        $condition_keys = '';
        $condition_values = [];
        foreach ($primary_key_list as $key => $value) {
            $condition_keys .= "`{$this->table_name}`.`{$key}` = :{$key} AND ";
            $condition_values[":{$key}"] = $value;
        }
        $condition_keys = substr($condition_keys, 0, strlen($condition_keys) - 4);
        return ['condition_keys' => $condition_keys, 'condition_values' => $condition_values];
    }

    public function fetch(array $column_names = []) : bool{
        $column_names_string = '*';
        if(!empty($column_names))
        {
            $column_names_string = '';
            foreach ($column_names as $value) 
            {
                $column_names_string .= '`' . $value . '`, ';
            }
            //remove the last comma
            $column_names_string = substr($column_names_string, 0, strlen($column_names_string) - 2);
        }
        $result = DB::query("
                                SELECT {$column_names_string} 
                                FROM `{$this->table_name}` 
                                WHERE {$this->keys_condition['condition_keys']}
                            ",
                            $this->keys_condition['condition_values']
        );
        if($result == null)
        {
            return false;
        }
        else
        {
            $result = $result[0];
            foreach ($result as $key => $value) 
            {
                $this->data[$key] = $value;
            }
            return true;
        }
    }

    public function getAll(array $column_names = []) : array{
        if($column_names == null)
        {
            return DB::query("SELECT * FROM {$this->table_name}");
        }
        else
        {
            $column_string = '';
            foreach ($column_names as $value) {
                $column_string .= '`' . $value . '`, ';
            }
            //remove the last comma
            $column_string = substr($column_string, 0, strlen($column_string) - 2);
            
            return DB::query("SELECT {$column_string} FROM {$this->table_name}");
        }
    }

    public function toArray() : array{
        return $this->data;
    }

    public function update(array $column_names = []) : bool{
        if(empty($this->data))
        {
            return false;
        }
        else
        {
            $string_value = '';
            $array_value = [];

            if(empty($column_names))
            {
                foreach ($this->data as $key => $value) 
                {
                    if($this->primary_keys != null && !isset($this->primary_keys[$key]))
                    {
                        // `column_name` = :column_name,
                        $string_value .= '`' . strtolower($key) . '` = :' . strtolower($key) . ', ';
                        // :column_name => value
                        $array_value[':' . strtolower($key)] = $value;
                    }
                }
            }
            else
            {
                foreach ($column_names as $key) 
                {
                    if(isset($this->data[$key]))
                    {
                        if($this->primary_keys != null && !isset($this->primary_keys[$key]))
                        {
                            // `column_name` = :column_name,
                            $string_value .= '`' . strtolower($key) . '` = :' . strtolower($key) . ', ';
                            // :column_name => value
                            $array_value[':' . strtolower($key)] = $this->data[$key];
                        }
                    }
                    else
                    {
                        ErrorHandler::echo("Not found property: {$key}");
                    }
                }
            }

            foreach ($this->keys_condition['condition_values'] as $key => $value) {
                $array_value[$key] = $value;
            }
            //remove the last comma
            $string_value = substr($string_value, 0, strlen($string_value) - 2);
            
            return DB::nonQuery("
                                    UPDATE `{$this->table_name}`
                                    SET {$string_value}
                                    WHERE {$this->keys_condition['condition_keys']}
                                ", 
                                $array_value
            );
        }
    }

    public function insert(array $column_names = []) : bool{
        if(empty($this->data))
        {
            return false;
        }
        else
        {
            $string_column_name = '';
            $string_value = '';
            $array_value = [];

            if(empty($column_names))
            {
                foreach ($this->data as $key => $value) 
                {
                    if($this->use_primary_key_to_insert || !isset($this->primary_keys[$key]))
                    {
                        // `column_name`,
                        $string_column_name .= '`' . strtolower($key) . '`, ';
                        // :column_name,
                        $string_value .= ':' . strtolower($key) . ', ';
                        // :column_name => value
                        $array_value[':' . strtolower($key)] = $value;
                    }
                }
            }
            else
            {
                foreach ($column_names as $key) 
                {
                    if(isset($this->data[$key]))
                    {
                        if($this->use_primary_key_to_insert || !isset($this->primary_keys[$key]))
                        {
                            // `column_name`,
                            $string_column_name .= '`' . strtolower($key) . '`, ';
                            // :column_name,
                            $string_value .= ':' . strtolower($key) . ', ';
                            // :column_name => value
                            $array_value[':' . strtolower($key)] = $this->data[$key];
                        }
                    }
                    else
                    {
                        ErrorHandler::echo("Not found property: {$key}");
                    }
                }
            }

            //remove the last comma
            $string_value = substr($string_value, 0, strlen($string_value) - 2);
            $string_column_name = substr($string_column_name, 0, strlen($string_column_name) - 2);
            //
            return DB::nonQuery("
                                    INSERT INTO `{$this->table_name}`({$string_column_name})
                                    VALUES({$string_value})
                                ", 
                                $array_value
            );
        }
    }

    public function delete() : bool{
        return DB::nonQuery("
                                DELETE 
                                FROM `{$this->table_name}` 
                                WHERE {$this->keys_condition['condition_keys']}
                            ",
                            $this->keys_condition['condition_values']
        );
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if(empty($this->data) || !array_key_exists($name, $this->data))
        {
            return null;
        }
        else
        {
            return $this->data[$name];
        }
    }
}