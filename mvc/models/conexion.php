<?php

	class Conexion{
		public function conectar(){
	
			$link = new PDO("mysql:host=localhost;dbname=mvc_productos","root","root72");
			return $link;
		}
	}

?>
