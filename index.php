<?php 
$int = 0;
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
	<title>Login</title>

	<?php include($flow.'assents/app/head.php');?>
</head>

<?php 
session_start();
if (isset($_POST['login']) && !empty($_POST['login'])) {
	$login = input($_POST['login']);
	$password = md5($_POST['password']);
	echo $password;

	$sql_account = "SELECT * FROM `nebula-user` WHERE `user-login`='$login' && `user-password`='$password'";

	$i = $connect->query($sql_account)->num_rows;
	if ($i == 1) {
		$_SESSION['login'] = $login;
		header('Location:'.$flow.'dashboard/');
	}else{
		#header('Location:'.$flow.'?account_error');
	}
}	

if (isset($_SESSION['login'])) {
	header('Location:'.$flow.'dashboard/');
}


?>

<!--Importando Css-->
<?php include($flow.'assents/css/style_global.php'); ?>

<body>

<!--Ativar/Desligar Load-->
<?php #include($flow.'assents/app/load.php'); ?>

<!--Ativar Navbar Editar-->
<?php #include($flow.'assents/app/navbar.php'); ?>

<!-- Body -->


<div class="login-nebula">
	<div class="container">
		<center>
			 <div class="card card-login">
			 	<div class="card-body">
			 		<form method="POST">
				 		<img src="<?php echo $flow ?>assents/img/logo/logo.png" width="20%">
				 		<hr style="background-color: #fff;">
				 		<div class="form-group">
				 			<label class="form-title">Login</label>
				 			<input type="text" class="form-control form-login" name="login">
				 		</div>
				 		<div class="form-group">
				 			<label class="form-title">Password</label>
				 			<input type="password" class="form-control form-login" name="password">
				 		</div>
				 		<div class="form-group">
				 			<button type="submit" class="btn btn-login">Acessar</button>
				 		</div>
			 		</form>
			 		<br>
			 		<br>
			 	</div>
			 </div>
		</center>
	</div>
</div>



<!-- Finalizar/Body -->

<!--Ativar Footer Editar-->
<?php #include($flow.'assents/app/footer.php'); ?>

<!--Import Cookie Enable-->
<?php include($flow.'assents/app/cookie.php'); ?>


</body>
</html>