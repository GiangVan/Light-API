<?php

class DB{
    private static $conn = null;

    private static function checkCon(){
        if(self::$conn === null)
        {
            $db_type = SystemConfig::get('DB_TYPE');
            $db_name = SystemConfig::get('DB_NAME');
            $host_name = SystemConfig::get('DB_HOST_NAME');
            $user_name = SystemConfig::get('DB_USER_NAME');
            $password = SystemConfig::get('DB_PASSWORD');
            try
            {
                self::$conn = new PDO("{$db_type}:host={$host_name};dbname={$db_name}", $user_name, $password);

                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            }
            catch(PDOException $ex)
            {
                if(ErrorDisplay::isDisplayError() && SystemConfig::get('DB_DISPLAY_ERROR'))
                {
                    jsAlert($ex->getMessage());
                }
            }
        }
    }

    public static function nonQuery(string $sql, array $params = null) : bool{
        self::checkCon();
        $result = false;

        try 
        {
            $obj = self::$conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $result = $obj->execute($params);
        } 
        catch (PDOException $ex) 
        {
            if(ErrorDisplay::isDisplayError() && SystemConfig::get('DB_DISPLAY_ERROR'))
            {
                jsAlert($ex->getMessage(), false);
                dd(debug_backtrace());
            }
        }
    
        return $result;
    }
    public static function query(string $sql, array $params = null) : array{
        self::checkCon();
        $result = [];

        try 
        {
            $obj = self::$conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            if($obj->execute($params))
            {
                $result = $obj->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $ex) 
        {
            if(ErrorDisplay::isDisplayError() && SystemConfig::get('DB_DISPLAY_ERROR'))
            {
                jsAlert($ex->getMessage(), false);
                dd(debug_backtrace());
            }
        }

        return $result;
    }
}