<?php

class Auto{
    //Atributos
    private $patente;
    private $marca;
    private $modelo;
    private $duenio;
    private $mensaje;

    //Constructor
    public function __construct(){
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->mensaje="";
    }

    //Observadores
    public function getPatente(){
        return $this->patente;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }   

    public function getDuenio(){
        return $this->duenio;
    } 
    
    public function getMensaje(){
        return $this->mensaje;
    }

    //MOdificadores
    public function setPatente($patente){
        $this->patente = $patente;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function setDuenio($duenio){
        $this->duenio = $duenio;
    }   

    public function setMensaje($mensaje){
        $this->mensaje = $mensaje;
    }

    //Propios

    /**
     * Inicializa una instancia con los datos pasados por parametro
     * @param mixed $datos
     * @return void
     */
    public function inicializar($datos){
        $this->setPatente($datos['patente']);
        $this->setMarca($datos['marca']);
        $this->setModelo($datos['modelo']);
        $this->setDuenio($datos['duenio']);
    }

    public function insertar(){
        $completado=false;
        $db=new DataBase();
        $dniDuenio=$this->getDuenio()->getNroDni();
        $query="INSERT INTO auto(patente,marca,modelo,dniDuenio) VALUES ('".$this->getPatente()."','".$this->getMarca()."',".$this->getModelo().",'".$dniDuenio."')";
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
        $db=new DataBase();
        $dniDuenio=$this->getDuenio()->getNroDni();
        $query="UPDATE auto SET marca='".$this->getMarca()."',modelo=".$this->getModelo().",dniDuenio='".$dniDuenio."' WHERE patente='".$this->getPatente()."'";
        if($db->iniciar()){
            if($db->ejecutar($query)>0){
                $completado=true;
            }elseif($db->ejecutar($query)==0){
                $this->setMensaje("0:registros no modificados");
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
        $db=new DataBase();
        $query="DELETE FROM auto WHERE patente='".$this->getPatente()."'";
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

    public function buscar($patente){
        $encontrado=false;
        $db=new DataBase();
        $query="SELECT * FROM auto WHERE patente='".$patente."'";
        if($db->iniciar()){
            $res=$db->ejecutar($query);
            if($res>-1){
                if($res>0){
                    $row=$db->registro();
                    $duenio=new Persona();
                    $duenio->buscar($row['dniDuenio']);
                    $datos=['patente'=>$row['patente'],'marca'=>$row['marca'],'modelo'=>$row['modelo'],'duenio'=>$duenio];
                    $this->inicializar($datos);
                    $encontrado=true;
                }else{
                    $this->setMensaje("No hay autos");
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
        $db=new DataBase();
        $autos=[];
        $query="SELECT * FROM auto";
        if($condicion!=""){
            $query.=" WHERE ".$condicion;
        }
        if($db->iniciar()){
            $res=$db->ejecutar($query);
            if($res>-1){
                if($res>0){
                    while($row=$db->registro()){
                        $auto=new Auto();
                        $duenio=new Persona();
                        $duenio->buscar($row['dniDuenio']);
                        $datos=['patente'=>$row['patente'],'marca'=>$row['marca'],'modelo'=>$row['modelo'],'duenio'=>$duenio];
                        $auto->inicializar($datos);
                        array_push($autos,$auto);
                    }
                }else{
                    $this->setMensaje("No hay autos");
                }
            }else{
                $this->setMensaje($db->getError());
            }
        }else{
            $this->setMensaje($db->getError());
        }
        return $autos;
    }
}