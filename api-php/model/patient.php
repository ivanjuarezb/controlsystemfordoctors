<?php
class Patient{
    private $connection;

    //Create database connection.
    public function __construct(){
        
        //Exception if connection to database failed
        try{
            $this->connection = Connect::connection();
        }catch(PDOException $e){
            $this->errorLog($e->getMessage());
            $this->connection = 'error-connection-exception';
        }
    }

    //Method that print the error in error-log.log
    public function errorLog($error):void{
        error_log(' //// '.date("Y-m-d h:i:sa").' '.$error.' ', 3, 'error-log/error-log-patient.log');
    }

    //Method create patient -----------------------------------------------------------------
    public function createPatient($params):array{
        $sql= "INSERT INTO tblpatient (name, age, telephone, address) VALUES ('$params->name', '$params->age', '$params->telephone', '$params->address')";

        //If the connection to the database failed, return code 500.
        if(!is_object($this->connection) && $this->connection == 'error-connection-exception'){
            $data = [
                'code' => 500,
                'status' => 'error',
                'message' => 'Database connection error, please try it later.'
            ];
        }else{

            //Exception if database failed.
            try{
                $sentence = $this->connection->prepare($sql);
                $sentence->execute();
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => $params->name.' registered correctly'
                ];
            }catch(PDOException $e){
                $this->errorLog($e->getMessage());
                $data = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Database failed.'
                ];
            }
        }
        return $data;
    }

    //Method get all patients -----------------------------------------------------------------
    public function getPatients($search = ''):array{

        //
        if(!empty($search)){
            $sql = "SELECT * FROM tblpatient WHERE name LIKE '%".$search."%' ORDER BY id DESC";
        }else{
            $sql = "SELECT * FROM tblpatient ORDER BY id DESC";
        }
        
        
        //If the connection to the database failed, return code 500.
        if(!is_object($this->connection) && $this->connection == 'error-connection-exception'){
            $data = [
                'code' => 500,
                'status' => 'error',
                'message' => 'Database connection error, please try it later.'
            ];
        }else{

            //Exception if database failed.
            try{
                $sentence = $this->connection->prepare($sql);
                $sentence->execute();
                $result = $sentence->fetchAll();
                $data=[
                    'code' => 200,
                    'status' => 'success',
                    'patients' => $result
                ];
            }catch(PDOException $e){
                $this->errorLog($e->getMessage());
                $data = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Database failed.'
                ];
            }
        }
        return $data;
    }

    //Method update patient -----------------------------------------------------------------
    public function updatePatient($params):array{
        $sql = "UPDATE tblpatient SET name = '".$params->name."', age = '".$params->age."', telephone = '".$params->telephone."', address = '".$params->address."' WHERE id = ".$params->id."";
       
        //If the connection to the database failed, return code 500.
        if(!is_object($this->connection) && $this->connection == 'error-connection-exception'){
            $data = [
                'code' => 500,
                'status' => 'error',
                'message' => 'Database connection error, please try it later.'
            ];
        }else{

            //Exception if database failed.
            try{
                $sentence = $this->connection->prepare($sql);
                $sentence->execute();
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Patient '.$params->name.' updated'
                ];
            }catch(PDOException $e){
                $this->errorLog($e->getMessage());
                $data = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Database failed.'
                ];
            }
        }
        return $data;
    }

    //Method delete patient with its id ------------------------------------------------------------ 
    public function deletePatient($id):array{
        $sql = "DELETE FROM tblpatient WHERE id = '".$id."'";

        //If the connection to the database failed, return code 500.
        if(!is_object($this->connection) && $this->connection == 'error-connection-exception'){
            $data = [
                'code' => 500,
                'status' => 'error',
                'message' => 'Database connection error, please try it later.'
            ];
        }else{

            //Exception if database failed.
            try{
                $sentence = $this->connection->prepare($sql);
                $sentence->execute();
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'The patient has been deleted'
                ];
            }catch(PDOException $e){
                $this->errorLog($e->getMessage());
                $data = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Database failed.'
                ];
            }
        }
        return $data;
    }
}
?>


