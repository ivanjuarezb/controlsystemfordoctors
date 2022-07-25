<?php
include 'connection\connect.php';

class Patient{
    private $connection;

    public function __construct(){
        $this->connection = Connect::connection();
    }

    public function insertPatient($params){
        $sql= "INSERT INTO tblpatient (name, age, telephone, address) VALUES ('$params->name', '$params->age', '$params->telephone', '$params->address')";
        $sentence = $this->connection->prepare($sql);
        $sentence->execute();
        $data = [
            'code' => 200,
            'status' => 'success',
            'patient' => $params->name.' registered correctly'
        ];

        return $data;
    }
}
?>