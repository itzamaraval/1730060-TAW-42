<?php
    // INCLUIR EL MODELO PARA REUITILIZAR SUS METODOS EN ESTE MODELO
    //require_once('universidad_model.php');
    //$universidadObj = new universidad_model();
    
    class carrera_model{
        private $DB;
        private $carreras;

        function __construct(){
           
            $this->DB=Database::connect();
        }
        
        function get(){
            $sql= 'SELECT c.*,u.nombre AS universidad FROM carrera AS c
            INNER JOIN universidad AS u ON u.id = c.universidad_id
            ORDER BY id ASC';
            $fila=$this->DB->query($sql);
            $this->carreras=$fila;
            return  $this->carreras;
        }

        function getSelectUniversidades(){

            //return $universidadObj -> get();
            $sql= 'SELECT * FROM universidad ORDER BY id ASC';
            $filas=$this->DB->query($sql);
            
            return $filas;
        }

        
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carrera(nombre,contenidos,universidad_id)VALUES (?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'],$data['contenidos'],$data['universidad_id']));
            Database::disconnect();

        }
       
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM carrera where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carrera  set nombre =?, contenidos=?, universidad_id=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre'],$data['contenidos'],$data['universidad_id'],$date));
            Database::disconnect();

        }
      
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carrera where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

