<?php

function existFileIncluded(string $path) : bool{
    $path = strtoupper(str_replace('\\', '/', $path));
    if(strlen($path) > 3 && substr($path, 0, 3) === '../')
    {
        $path = substr($path, 3);
    }
    $all_file_included = get_included_files();
    for($i = count($all_file_included) - 1; $i >= 0; $i--) 
    { 
        $all_file_included[$i] = strtoupper(str_replace('\\', '/', $all_file_included[$i]));
        if(strlen($all_file_included[$i]) >= strlen($path) && substr($all_file_included[$i], strlen($all_file_included[$i]) - strlen($path)) === $path)
        {
            return true;
        }
    }
    return false;
}

function requireFile(string $path) : bool{
    if(file_exists($path))
    {
        if(!existFileIncluded($path))
        {
            $awdawdjioawdjilfeawukghdhuksrfhbksdfhbmvcxawdfawgudawykdcvbcefshu = $path;
            call_user_func(function () use($awdawdjioawdjilfeawukghdhuksrfhbksdfhbmvcxawdfawgudawykdcvbcefshu){
                require($awdawdjioawdjilfeawukghdhuksrfhbksdfhbmvcxawdfawgudawykdcvbcefshu);
            });
        }
        return true;
    }
    else
    {
        return false;
    }
}

function getFileExtension(string $file_name) : ?string{
    $extension_index = strrpos($file_name, '.');

    if($extension_index !== false)
    {
        $extension_index++;
        return substr($file_name, $extension_index, strlen($file_name) - $extension_index);
    }   
    else
    {
        return null;
    }
}

function getDirectory(string $file_path) : string{
    $file_path_fake = str_replace('\\', '/', $file_path);
    $index = strrpos($file_path_fake, '/') + 1;
    return substr($file_path, 0, $index);
}