<?php
    
    class universidad_model{
        private $DB;
        private $universidades;

        function __construct(){
            //conexión a BD
            $this->DB=Database::connect();
        }
        //función para obtener todos los registros de la tabla universidades de manera ascendente
        function get(){
            $sql= 'SELECT * FROM universidades ORDER BY id ASC';
            $fila=$this->DB->query($sql);
            $this->universidades=$fila;
            return  $this->universidades;
        }

        //función para registrar una nueva universidad
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO universidades(nombre)VALUES (?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre']));
            Database::disconnect();       

        }
        //función para obtener la información de una universidad según su id
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM universidades where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        //función para actualizar la información de una universidad
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE universidades  set  nombre=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre']));
            Database::disconnect();

        }
        //función para eliminar una universidad
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM universidades where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

