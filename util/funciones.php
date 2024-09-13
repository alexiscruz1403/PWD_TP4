<?php

function dataSubmmited(){
    $datos=[];
    foreach($_GET as $key=>$value){
        $datos[$key]=htmlspecialchars($value);
    }
    foreach($_POST as $key=>$value){
        $datos[$key]=htmlspecialchars($value);
    }
    return $datos;
}

function autoloader($class_name){
    $directories = array(
        $_SESSION['ROOT'].'model/data/',
        $_SESSION['ROOT'].'model/database/',
        $_SESSION['ROOT'].'controller/',
    );
    foreach($directories as $directory){
        if(file_exists($directory.$class_name . '.php')){
            include_once($directory.$class_name . '.php');
            return;
        }
    }
}

spl_autoload_register('autoloader');