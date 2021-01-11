<?php
class Env{
    public static function get($param){
        if(file_exists("../.env"))
            $env_file = file_get_contents("../.env");
        else
            $env_file = file_get_contents(".env");
        
        $env_file_array = explode("\n",$env_file);
        foreach($env_file_array as $row){
            if(strpos($row,"=")){
                $keyvalue = explode("=",$row);
                if($param == $keyvalue[0]){
                    return trim($keyvalue[1]);
                }
            }
        }
        return null;
    }
}