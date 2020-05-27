<!-- Incluir la navegacion navbar en todos los archivos -->
<?php
include_once "modules/includes/header.php";
?>
<!-- Contruimos una seccion que va  a ser variable para mostrar todos y cada uno de los controladores -->
<section>
	<?php
		$mvc = new MvcController();
		$mvc -> enlacesPaginasController();
	?>
</section>
<?php include_once "modules/includes/footer.php" ?>