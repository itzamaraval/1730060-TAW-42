<?php

	class Conexion{
		public function conectar(){
	
			$link = new PDO("mysql:host=localhost;dbname=basedatos","admin","d47eea063ea0eec953ce23ad25117d0422aa6a523e8e1595");
			return $link;
		}
	}

?>
