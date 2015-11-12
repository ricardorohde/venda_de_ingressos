<?php
 
include ('conn.php');

session_start();
			  if((!isset ($_SESSION['userAdmin']) == true) and (!isset ($_SESSION['passAdmin']) == true)) {
				   unset($_SESSION['userAdmin']);
				    unset($_SESSION['passAdmin']);
					 header('location:login.php'); 
				   } 
                   //$logado = $_SESSION['login'];

$cad_nome = $_POST['cad_nome'];
$cad_sobrenome= $_POST['cad_sobrenome'];
$cad_email= $_POST['cad_email'];
$cad_senha= $_POST['cad_senha'];
$cad_senha= md5($cad_senha);

//$cliente_email = "valodiapilquevitch@gmail.com";
//$cliente_senha = "1010";

// grava evento

	$query = "SELECT * FROM cliente WHERE email = '{$cad_email}' ";
	$result = $conn->query($query);
	$row_cnt = $result->num_rows;
	if ($row_cnt == 1){
			echo "usuario já cadastrado";
	}	
	else {				
				mysqli_query($conn,"INSERT INTO cliente (nome,sobrenome,email,senha) 
				VALUES ('{$cad_nome}','{$cad_sobrenome}','{$cad_email}','{$cad_senha}')");
				mysqli_close($conn);
				header('location: index.php');
	}				


?>