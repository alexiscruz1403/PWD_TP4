<?php

class ABM{
    //Atributos
    private $mensajeError;

    //Constructor
    public function __construct(){
        $this->mensajeError = "";
    }

    //Observadores
    public function getMensajeError(){
        return $this->mensajeError;
    }

    //Modificadores
    public function setMensajeError($mensajeError){
        $this->mensajeError = $mensajeError;
    }

    //Propios
    private function isSetAutoId($datos){
        $resp = false;
        if (isset($datos['patente'])){
            $resp = true;
        }
        return $resp;
    }

    private function isSetPersonaId($datos){
        $resp = false;
        if (isset($datos['nroDni'])){
            $resp = true;
        }
        return $resp;
    }
    public function listarAutos($datos=""){
        $objAuto = new Auto();
        $autos = $objAuto->listar($datos);
        return $autos;
    }

    public function listarPersonas($datos=""){
        $objPersona = new Persona();
        $personas = $objPersona->listar($datos);
        return $personas;
    }

    public function buscarAuto($datos){
        $objAuto = null;
        if ($this->isSetAutoId($datos)){
            $objAuto = new Auto();
            $encontrado=$objAuto->buscar($datos['patente']);
            if(!$encontrado){
                $objAuto = null;
            }
        }
        return $objAuto;
    }

    public function buscarPersona($datos){
        $objPersona = null;
     if ($this->isSetPersonaId($datos)){
            $objPersona = new Persona();
            $encontrado=$objPersona->buscar($datos['nroDni']);
            if(!$encontrado){
                $objPersona = null;
            }
        }
        return $objPersona;
    }

    public function insertarPersona($datos){
        $insertado = false;
    
        if(is_array($datos)) {
            $objPersona = new Persona();
            $objPersona->inicializar($datos);
            $insertado = $objPersona->insertar();
            
            if(!$insertado){
                $this->setMensajeError($objPersona->getMensaje());
            }
        }
    
        return $insertado;
    }
    

    public function insertarAuto($datos){
        $objAuto = new Auto();
        $objPersona = new Persona();
        $objPersona->buscar($datos['nroDni']);
        $datos=['patente'=>$datos['patente'],'marca'=>$datos['marca'],'modelo'=>$datos['modelo'],'duenio'=>$objPersona];
        $objAuto->inicializar($datos);
        $insertado=$objAuto->insertar();
        if(!$insertado){
            $this->setMensajeError($objAuto->getMensaje());
        }
        return $insertado;
    }

    public function modificarPersona($datos){
        $modificado=false;
        $objPersona = new Persona();
        $encontrado=$objPersona->buscar($datos['nroDni']);
        if($encontrado){
            if($objPersona->modificar()){
                $modificado=true;
            }else{
                $this->setMensajeError($objPersona->getMensaje());
            }
        }else{
            $this->setMensajeError($objPersona->getMensaje());
        }
        return $modificado;
    }
    
    public function modificarAuto($datos){
        $modificado=false;
        $objAuto = new Auto();
        $encontrado=$objAuto->buscar($datos['patente']);
        $objPersona = new Persona();
        $encontrado=$encontrado && $objPersona->buscar($datos['nroDni']);
        if($encontrado){
            if($objAuto->modificar()){
                $modificado=true;
            }else{
                $this->setMensajeError($objAuto->getMensaje());
            }
        }else{
            $this->setMensajeError($objAuto->getMensaje());
        }
        return $modificado;
    }
}
