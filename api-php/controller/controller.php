<?php
class Controller{

    // Method to validate params of the controller methods
    private function validateParams($params, $flag):bool{
        $requestStatus = true; 

        //We validate the first type of parameters, according to the flag
        if($flag == 0){
            if(isset($params->id) && !empty($params->id)){
                for($i = 0; $i < strlen($params->id); $i++){
                    if($params->id[$i] == '*' || $params->id[$i] == '+' || $params->id[$i] == '!' || $params->id[$i] == '=' || $params->id[$i] == '(' || $i == 100){
                        $requestStatus = false;
                    }
                }
                if(isset($params->name) && !empty($params->name)){
                    for($i = 0; $i < strlen($params->name); $i++){
                        if($params->name[$i] == '*' || $params->name[$i] == '+' || $params->name[$i] == '!' || $params->name[$i] == '=' || $params->name[$i] == '(' || $i == 100){
                            $requestStatus = false;
                        }
                    }
                    if(isset($params->age) && !empty($params->age)){
                        for($i = 0; $i < strlen($params->age); $i++){
                            if($params->age[$i] == '*' || $params->age[$i] == '+' || $params->age[$i] == '!' || $params->age[$i] == '=' || $params->age[$i] == '(' || $i == 100){
                                $requestStatus = false;
                            }
                        }
                        if(isset($params->telephone) && !empty($params->telephone)){
                            for($i = 0; $i < strlen($params->telephone); $i++){
                                if($params->telephone[$i] == '*' || $params->telephone[$i] == '+' || $params->telephone[$i] == '!' || $params->telephone[$i] == '=' || $params->telephone[$i] == '(' || $i == 100){
                                    $requestStatus = false;
                                }
                            }
                            if(isset($params->address) && !empty($params->address)){
                                for($i = 0; $i < strlen($params->address); $i++){
                                    if($params->address[$i] == '*' || $params->address[$i] == '+' || $params->address[$i] == '!' || $params->address[$i] == '=' || $params->address[$i] == '(' || $i == 100){
                                        $requestStatus = false;
                                    }
                                }
                            }else{
                                $requestStatus = false;
                            }
                        }else{
                            $requestStatus = false;
                        }
                    }else{
                        $requestStatus = false;
                    }
                }else{
                    $requestStatus = false;
                }
            }else{
                $requestStatus = false;
            }

        //We validate the second type of parameters, according to the flag
        }elseif($flag == 1){
            if(isset($params->name) && !empty($params->name)){
                for($i = 0; $i < strlen($params->name); $i++){
                    if($params->name[$i] == '*' || $params->name[$i] == '+' || $params->name[$i] == '!' || $params->name[$i] == '=' || $params->name[$i] == '(' || $i == 100){
                        $requestStatus = false;
                    }
                }
                if(isset($params->age) && !empty($params->age)){
                    for($i = 0; $i < strlen($params->age); $i++){
                        if($params->age[$i] == '*' || $params->age[$i] == '+' || $params->age[$i] == '!' || $params->age[$i] == '=' || $params->age[$i] == '(' || $i == 100){
                            $requestStatus = false;
                        }
                    }
                    if(isset($params->telephone) && !empty($params->telephone)){
                        for($i = 0; $i < strlen($params->telephone); $i++){
                            if($params->telephone[$i] == '*' || $params->telephone[$i] == '+' || $params->telephone[$i] == '!' || $params->telephone[$i] == '=' || $params->telephone[$i] == '(' || $i == 100){
                                $requestStatus = false;
                            }
                        }
                        if(isset($params->address) && !empty($params->address)){
                            for($i = 0; $i < strlen($params->address); $i++){
                                if($params->address[$i] == '*' || $params->address[$i] == '+' || $params->address[$i] == '!' || $params->address[$i] == '=' || $params->address[$i] == '(' || $i == 100){
                                    $requestStatus = false;
                                }
                            }
                        }else{
                            $requestStatus = false;
                        }
                    }else{
                        $requestStatus = false;
                    }
                }else{
                    $requestStatus = false;
                }
            }else{
                $requestStatus = false;
            }

        //We validate the third type of parameters, according to the flag.
        }elseif($flag == 2){
            for($i = 0; $i < strlen($params); $i++){
                if(!is_numeric($params[$i])){
                    $requestStatus = false;
                }
            }
        }elseif($flag == 3){
            for($i = 0; $i < strlen($params); $i++){
                if($params[$i] == '*' || $params[$i] == '+' || $params[$i] == '!' || $params[$i] == '=' || $params[$i] == '(' || $i == 100){
                    $requestStatus = false;
                }
            }
        }
        return $requestStatus;
    }

    //Controller method to check parameters and create patient.
    public function createPatient($params):array{

        //Use our validateParams method
        if($this->validateParams($params,1) == true ){
            $model = new Patient;
            $data = $model->createPatient($params);
        }else{

            //Return bad request
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Bad request'
            ];
        }
        return $data;
    }

    //Controller method to check parameters and create patient history.
    public function createPatientHistory($params):array{

        //Use our validateParams method
        if($this->validateParams($params,1) == true ){
            $model = new Patient;
            $data = $model->createPatient($params);
        }else{

            //Return bad request
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Bad request'
            ];
        }
        return $data;
    }

    //Controller method to get all patient.
    public function getPatients($search = ''):array{
        
        //
        if(!empty($search)){

             //Use our validateParams method
            if($this->validateParams($search,3)){
                $model = new Patient;
                $data = $model->getPatients($search);
            }else{

                //Return bad request
                $data = [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'Bad request'
                ];
            }
        }else{
            $model = new Patient;
            $data = $model->getPatients();
        } 
        return $data;
    }

    //Controller method to check parameters and update patient.
    public function updatePatient($params):array{

        //Use our validateParams method
        if($this->validateParams($params, 0) == true ){
            $model = new Patient;
            $data = $model->updatePatient($params);
        }else{

            //Return bad request
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Bad request'
            ];
        }
        return $data;
    }

    //Controller method to check id and delete patient.
    public function deletePatient($id):array{

        //Use our validateParams method
        if($this->validateParams($id, 1) ==  true){
            $model = new Patient;
            $data = $model->deletePatient($id);
        }else{

            //return bad request
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Bad request'
            ];
        }
        return $data;
    }
}
?>


