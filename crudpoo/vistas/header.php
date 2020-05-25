<?php

  session_start(); 
  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRUD</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php?m=index">Alumnos</a></li>
              <li><a href="index.php?universidad=index">Universidades</a></li>
              <li><a href="index.php?carrera=index">Carreras</a></li>
              <li><a href="index.php?usuario=index">Usuarios</a></li>
            </ul>
            <ul class="nav navbar-nav flex-row pull-right">
                <?php
                  if(!$_SESSION["validar"]){
                    echo '<li><a class="nav-item" href="index.php?usuario=login">Iniciar Sesión</a></li>';
                    echo '<li><a class="nav-item" href="index.php?usuario=usuario">Registrar Usuario</a></li>';
                  }else{
                    echo '<li><a class="nav-item" href="#">'.$_SESSION["usuario"].'</a></li>';
                    echo '<li><a class="nav-item" href="index.php?usuario=logout">Cerrar Sesión</a></li>';
                  }
                ?>
                
            </ul>
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</header>