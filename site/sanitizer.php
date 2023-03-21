<?php

    require "database.php";

    function validateEmail(){
        
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            return true;
        }
        
        return false;
    }

    function validateIpAddress(){
        
        if(filter_var($_POST["ip_address"],FILTER_VALIDATE_IP)){
            return true;
        }

        return false;
    }

    function validateName($string){

        if(strlen($string) > 2 && is_numeric($string) == false){
            return true;
        }

        return false;
    }

    function mainValidation(){

        $validationMethods = [
            validateEmail(),
            validateIpAddress(),
            validateName($_POST["first_name"]),
            validateName($_POST["last_name"]),
        ];

        foreach($validationMethods as $method){

            if($method == false){
                return false;
            }
        }
        
        $_POST["first_name"] = filter_var($_POST["first_name"],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST["last_name"] = filter_var($_POST["last_name"],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST["password"] = filter_var($_POST["password"],FILTER_SANITIZE_SPECIAL_CHARS);

        return true;
    }
?>