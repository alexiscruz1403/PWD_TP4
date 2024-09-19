<?php

class Persona{
    //Atributos
    private $nroDni;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $telefono;
    private $domicilio;
    private $mensaje;

    //Constructor
    public function __construct(){
        $this->nroDni = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNacimiento = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->mensaje="";
    }

    //Observadores

    public function getNroDni() {
        return $this->nroDni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    // Modificadores
    public function setNroDni($nroDni) {
        $this->nroDni = $nroDni;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    //Propios
    public function inicializar($datos){
        $this->setNroDni($datos['nroDni']);
        $this->setNombre($datos['nombre']);
        $this->setApellido($datos['apellido']);
        $this->setFechaNacimiento($datos['fechaNacimiento']);
        $this->setTelefono($datos['telefono']);
        $this->setDomicilio($datos['domicilio']);
    }

    public function insertar(){
        $completado=false;
        $db = new DataBase();
        $query = "INSERT INTO persona (nroDni, nombre, apellido, fechaNacimiento, telefono, domicilio) VALUES (".$this->getNroDni().",'".$this->getNombre()."','".$this->getApellido()."','".$this->getFechaNacimiento()."','".$this->getTelefono()."','".$this->getDomicilio()."')";
        if($db->iniciar()){
            if($db->ejecutar($query)){
                $completado=true;
            }else{
                $this->setMensaje($db->getError());
            }
        }else{
            $this->setMensaje($db->getError());
        }
        return $completado;
    }

    public function modificar(){
        $completado=false;
        $db = new DataBase();
        $query = "UPDATE persona SET nombre='".$this->getNombre()."', apellido='".$this->getApellido()."', fechaNacimiento='".$this->getFechaNacimiento()."', telefono='".$this->getTelefono()."', domicilio='".$this->getDomicilio()."' WHERE =".$this->getNroDni()."";
        if($db->iniciar()){
            if($db->ejecutar($query)>0){
                $completado=true;
            }elseif($db->ejecutar($query)==0){
                $this->setMensaje("No se realizo ninguna modificacion");
            }else{
                $this->setMensaje($db->getError());
            }
        }else{
            $this->setMensaje($db->getError());
        }
        return $completado;
    }

    public function eliminar(){
        $completado=false;
        $db = new DataBase();
        $query = "DELETE FROM persona WHERE nroDni=".$this->getNroDni();
        if($db->iniciar()){
            if($db->ejecutar($query)){
                $completado=true;
            }else{
                $this->setMensaje($db->getError());
            }
        }else{
            $this->setMensaje($db->getError());
        }
        return $completado;
    }

    public function buscar($nroDni){
        $encontrado=false;
        $db = new DataBase();
        $query = 'SELECT * FROM persona WHERE nroDni='.$nroDni;
        if($db->iniciar()){
            $res = $db->ejecutar($query);
            if($res>-1){
                if($res>0){
                    $row = $db->registro();
                    $this->inicializar($row);
                    $encontrado=true;
                }else{
                    $this->setMensaje("No se encontro ningun registro");
                }
            }else{
                $this->setMensaje($db->getError());
            }
        }else{
            $this->setMensaje($db->getError());
        }
        return $encontrado;
    }

    public function listar($condicion=""){
        $personas = [];
        $db = new DataBase();
        $query = "SELECT * FROM persona";
        if($condicion!=""){
            $query.=" WHERE ".$condicion;
        }
        if($db->iniciar()){
            $res = $db->ejecutar($query);
            if($res>-1){
                if($res>0){
                    while($row = $db->registro()){
                        $persona = new Persona();
                        $persona->inicializar($row);
                        array_push($personas,$persona);
                    }
                }
            }else{
                $this->setMensaje($db->getError());
            }
        }else{
            $this->setMensaje($db->getError());
        }
        return $personas;
    }

}