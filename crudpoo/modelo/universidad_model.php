<?php
    
    class universidad_model{
        private $DB;
        private $universidades;

        function __construct(){
           
            $this->DB=Database::connect();
        }
        
        function get(){
            $sql= 'SELECT * FROM universidad ORDER BY id ASC';
            $fila=$this->DB->query($sql);
            $this->universidades=$fila;
            return  $this->universidades;
        }

        
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO universidad(nombre,direccion,telefono)VALUES (?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'],$data['direccion'],$data['telefono']));
            Database::disconnect();

        }
       
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM universidad where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE universidad  set nombre =?, direccion=?,telefono=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre'],$data['direccion'],$data['telefono'],$date));
            Database::disconnect();

        }
      
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM universidad where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

