<?php
    
    class usuario_model{
        private $DB;
        private $usuarios;

        function __construct(){
           
            $this->DB=Database::connect();
        }
        
        function get(){
            $sql= 'SELECT * FROM usuario ORDER BY id ASC';
            $fila=$this->DB->query($sql);
            $this->usuarios=$fila;
            return  $this->usuarios;
        }

        
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO usuario(usuario,password,email) VALUES (?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['usuario'],$data['password'],$data['email']));
            Database::disconnect();

        }
       
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuario where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        /**
         * FUNCION QUE BUSCA USUARIO PARA VALIDAR EL LOGIN
         */
        function validar_login($data){
            
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuario WHERE usuario = ? AND `password` = ? LIMIT 1";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data["usuario"],$data["password"]));

            $fila = $q->fetch(PDO::FETCH_ASSOC);

            //Database::disconnect();
            if ($q->rowCount() > 0) {
                // CREAR UN ARREGLO PARA MANEJAR EL EXITO Y EL USUARIO QUE INGRESA
                $respuesta["exito"] = 1;
                $respuesta["usuario"] = $fila['usuario'];
                
                return $respuesta;
            } else {
                // EM CASO DE NO COINCIDIR LLENAR EL ARREGLO VACIO
                $respuesta["exito"] = 0;
                $respuesta["usuario"] = "";

                return $respuesta;
            }
            
        }
        
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuario  set usuario =?, password=?,email=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['usuario'],$data['password'],$data['email'],$date));
            Database::disconnect();

        }
      
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM usuario where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

