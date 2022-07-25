<?php

//Connect Database with PDO
class Connect{
    public static function connection(){
        $servername= "localhost";
        $username="root";
        $password=null;
        $connection = new PDO("mysql:host=$servername;dbname=dbcontrolsystemfordoctors",$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}
?>
