<?php
include 'model\patient.php';

class Controller{
    public function postPatient($params){
        $model = new Patient;
        $model->insertPatient($params);
    }
}
?>