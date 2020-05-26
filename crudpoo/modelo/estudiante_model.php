<?php
    
    class estudiante_model{
        private $DB;
        private $estudiantes;

        function __construct(){
           
            $this->DB=Database::connect();
        }
        
        function get(){
            $sql= "SELECT e.id,e.cedula AS cedula,CONCAT(e.nombre,' ',e.apellidos) AS alumno,e.edad AS edad,e.promedio AS promedio,u.nombre AS universidad, c.nombre AS carrera, e.universidad_id FROM estudiante AS e
            INNER JOIN universidad AS u ON u.id = e.universidad_id
            INNER JOIN carrera AS c ON c.id = e.carrera_id
            ORDER BY e.apellidos ASC";
            $fila=$this->DB->query($sql);
            $this->estudiantes=$fila;
            return  $this->estudiantes;
        }

        /**
         * OBTENER TODAS LAS CARRERAS DE UNA UNIVERSIDAD
         */
        function getCarrerasUniversidad($universidad_id){
            $sql= 'SELECT * FROM carrera WHERE universidad_id ='.$universidad_id.' ORDER BY nombre ASC';
            $carreras = $this->DB->query($sql);
            
            return $carreras;
        }

        
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(cedula,nombre,apellidos,promedio,edad,universidad_id,carrera_id)VALUES (?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['universidad_id'],$data['carrera_id']));
            
            Database::disconnect();
        }
       
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM estudiante where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, carrera_id=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['carrera_id'], $date));
            Database::disconnect();

        }
      
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM estudiante where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

