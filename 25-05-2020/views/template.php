<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<title>Inventarios | TAW | UPV</title> 
	<!-- Tell the browser to be responsive to screen width --> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<!-- Font Awesome --> 
	<link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css"> 
	<!-- Ionicons --> 
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
	<!-- Tempusdominus Bbootstrap 4 --> 
	<link rel="stylesheet" href="views/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> 
	<!-- iCheck --> 
	<link rel="stylesheet" href="views/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap --> 
	<link rel="stylesheet" href="views/assets/plugins/jqvmap/jqvmap.min.css"> 
	<!-- Theme style --> 
	<link rel="stylesheet" href="views/assets/dist/css/adminlte.min.css"> 
	<!-- overlayScrollbars --> 
	<link rel="stylesheet" href="views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> 
	<!-- Daterange picker --> 
	<link rel="stylesheet" href="views/assets/plugins/daterangepicker/daterangepicker.css"> 
	<!-- summernote --> 
	<link rel="stylesheet" href="views/assets/plugins/summernote/summernote-bs4.css"> 
	<!-- Google Font: Source Sans Pro --> 
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
	<!-- DataTables --> 
	<link rel="stylesheet" href="views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<?php 
		/* Se inicia la sesión y se verifica que se haya iniciado sesión correctamente para mostrar el tablero y el menu principal */
		session_start();

		if (isset($_SESSION['validar']) && $_SESSION['validar'] == "true") {
			include 'modules/navegacion.php';
		}
	?>
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<div class="container-fluid">
					<div class="row mr-3 mt-2 mb-2">
						<?php 
							/* Se verifica que la vista actual sea el tablero, en ese caso se muestra el titulo de la vista */
							if ($_GET['action'] == 'tablero') {
						?>
						<div class="col-sm-12">
							<h1><b>Tablero</b></h1>
						</div>
						<?php 
							}
						?>

						<!-- Aquí va el contenido de la página -->

						<?php 
							}
							$mvc = new MvcContrller();
							$mvc->enalcesPaginaController();
						?>
					</div>
				</div>
			</section>
		</div>
	</div>


</body>