<?php 
    require_once('modelo/universidad_model.php');
    //controller universidades
    class universidad_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new universidad_model();
        }
        //navegación de las acciones
        function index(){
            $query =$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/index.php');
            include_once('vistas/footer.php');
        }

        function universidad(){
            
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/universidad.php');
            include_once('vistas/footer.php');
        }

        function get_datosE(){
            //obtención de los tatos de los campos de texto para la inserción de ellos en la tabla
            
            $data['id']=$_REQUEST['txt_id'];
            $data['nombre']=$_REQUEST['txt_nombre'];

            if ($_REQUEST['id']=="") {
                $this->model_e->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php");

        }
        //función para confirmar la eliminación de un estudiante
        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
            


        }


    }
?>