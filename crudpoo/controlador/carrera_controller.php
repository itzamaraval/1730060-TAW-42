<?php 
    require_once('modelo/carrera_model.php');
    //controller carreras
    class carrera_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new carrera_model();
        }
       
        function index(){
            $query =$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/carrera/index.php');
            include_once('vistas/footer.php');
        }

        function carrera(){
            
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            
            /**
             * OBTENER LA CONSULTA CON TODAS LAS UNIS DE LA BD DESDE EL MODELO
             */
            $queryUniversidades = $this->model_e-> getSelectUniversidades();

            include_once('vistas/header.php');
            include_once('vistas/carrera/carrera.php');
            include_once('vistas/footer.php');
        }

        /**
         * FUNCIÓN PARA RECIBIR LOS DATOS DESDE EL FORMULARIO
         */
        function get_datos(){
           
            
            $data['id']=$_REQUEST['txt_id'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['contenidos']=$_REQUEST['txt_contenidos'];
            $data['universidad_id']=$_REQUEST['universidad_id'];

            if ($_REQUEST['id']=="") {
                $this->model_e->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php?carrera=index");

        }
        
        function confirmarDelete(){

            $_REQUEST['modulo'] = "carrera";
            
            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php?carrera=index");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
            


        }


    }
?>