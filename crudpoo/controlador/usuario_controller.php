<?php 
    require_once('modelo/usuario_model.php');
    //controller usuarios
    class usuario_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new usuario_model();
        }
       
        function index(){
            $query =$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/usuario/index.php');
            include_once('vistas/footer.php');
        }

        function usuario(){
            
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/usuario/usuario.php');
            include_once('vistas/footer.php');
        }

        /**
         * FUNCIÓN PARA RECIBIR LOS DATOS DESDE EL FORMULARIO
         */
        function get_datos(){
           
            $data['usuario']=$_REQUEST['txt_usuario'];
            $data['password']=$_REQUEST['txt_password'];
            $data['email']=$_REQUEST['txt_email'];

            if ($_REQUEST['id']=="") {
                $this->model_e->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php?usuario=index");

        }

        /**
         * FUNCION PARA CARGAR LA VISTA DEL LOGIN
         */
        function login(){
            include_once('vistas/header.php');
            include_once('vistas/usuario/ingresar.php');
            include_once('vistas/footer.php');
        }

        /**
         * FUNCION PARA PROCESAR Y VALIDAR EL INCIO DE SESION
         */
        function get_login(){
            
            $data['usuario']=$_REQUEST['txt_usuario'];
            $data['password']=$_REQUEST['txt_password'];

            $respuesta = $this->model_e->validar_login($data);

            //Validar la respuesta del modelo para ver si es  un usuario correcto
            if($respuesta["exito"] == 1){
                session_start();
                $_SESSION["validar"] = true;
                $_SESSION["usuario"] = $respuesta["usuario"];

                header("location:index.php?usuario=index");
                die();
            }else{
                header("location:index.php?usuario=login&exito=0");
                die();
            }
        }

        /**
         * FUNCION PARA TERMINAR LA SESION DEL USUARIO
         */
        function logout(){
            // Inicializar la sesión.!
            session_start();
            
            // LIMPIAR LOS DATOS DE LA SESION
            $_SESSION["validar"] = false;
            $_SESSION["usuario"] = "";

            // Destruir todas las variables de sesión.
            
            $_SESSION = array();
            
            // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
            
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finalmente, destruir la sesión.
            session_destroy();

            header("location:index.php?usuario=login");

        }
        
        function confirmarDelete(){

            $_REQUEST['modulo'] = "usuario";

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php?usuario=index");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
            


        }


    }
?>