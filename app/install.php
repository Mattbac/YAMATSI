<?php

class PDODbImporter{
    private static $keywords = array(
        'ALTER', 'CREATE', 'DELETE', 'DROP', 'INSERT',
        'REPLACE', 'SELECT', 'SET', 'TRUNCATE', 'UPDATE', 'USE',
        'DELIMITER', 'END'
    );
    /**
     * Loads an SQL stream into the database one command at a time.
     *
     * @params $sqlfile The file containing the mysql-dump data.
     * @params $connection Instance of a PDO Connection Object.
     * @return boolean Returns true, if SQL was imported successfully.
     * @throws Exception
     */
    public static function importSQL($sqlfile, $connection)
    {    
        # read file into array
        $file = file($sqlfile);
        # import file line by line
        # and filter (remove) those lines, beginning with an sql comment token
        $file = array_filter($file,
                        create_function('$line',
                                'return strpos(ltrim($line), "--") !== 0;'));
        # and filter (remove) those lines, beginning with an sql notes token
        $file = array_filter($file,
                        create_function('$line',
                                'return strpos(ltrim($line), "/*") !== 0;'));
        $sql = "";
        $del_num = false;
        foreach($file as $line){
            $query = trim($line);
            try
            {
                $delimiter = is_int(strpos($query, "DELIMITER"));
                if($delimiter || $del_num){
                    if($delimiter && !$del_num ){
                        $sql = "";
                        $sql = $query."; ";
                        $del_num = true;
                    }else if($delimiter && $del_num){
                        $sql .= $query." ";
                        $del_num = false;
                        $connection->exec($sql);
                        $sql = "";
                    }else{                            
                        $sql .= $query."; ";
                    }
                }else{
                    $delimiter = is_int(strpos($query, ";"));
                    if($delimiter){
                        $connection->exec("$sql $query");
                        $sql = "";
                    }else{
                        $sql .= " $query";
                    }
                }
            }
            catch (\Exception $e)
            {
                
            }
            
        }
    }
}

$option = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];

mysql_connect($w_config['db_host'], $w_config['db_user'], $w_config['db_pass']);

if (!mysql_select_db($w_config['db_name'])) {

    $db = new PDO('mysql:host='.$w_config['db_host'].';dbname=', $w_config['db_user'], $w_config['db_pass'], $option);

    $db->query("CREATE DATABASE IF NOT EXISTS ".$w_config['db_name']);

    $db = new PDO('mysql:host='.$w_config['db_host'].';dbname='.$w_config['db_name'], $w_config['db_user'], $w_config['db_pass'], $option);

    $pdodbimport = new PDODbImporter();

    $pdodbimport->importSQL("../app/sql/db.sql", $db);
    $pdodbimport->importSQL("../app/sql/villes_france.sql", $db);
    $pdodbimport->importSQL("../app/sql/data.sql", $db);
}
?>
