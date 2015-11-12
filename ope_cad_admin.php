<?php
 
include ('conn.php');

session_start();
			  if((!isset ($_SESSION['userAdmin']) == true) and (!isset ($_SESSION['passAdmin']) == true)) {
				   unset($_SESSION['userAdmin']);
				    unset($_SESSION['passAdmin']);
					 header('location:login.php'); 
				   } 
                   //$logado = $_SESSION['login']; 


$cad_admin_nome = $_POST['cad_admin_nome'];
$cad_admin_sobrenome= $_POST['cad_admin_sobrenome'];
$cad_admin_email= $_POST['cad_admin_email'];
$cad_admin_senha= $_POST['cad_admin_senha'];
$cad_admin_senha = md5($cad_admin_senha);

//$cliente_email = "valodiapilquevitch@gmail.com";
//$cliente_senha = "1010";

// grava evento

	$query_adm = "SELECT * FROM user_admin WHERE email = '{$cad_admin_email}' ";
	$result_adm = $conn->query($query_adm);
	$row_cnt_adm = $result_adm->num_rows;
	if ($row_cnt_adm == 1){
			echo "Administrador já cadastrado";
	}	
	else {				
				mysqli_query($conn,"INSERT INTO user_admin (nome,sobrenome,email,senha) 
				VALUES ('{$cad_admin_nome}','{$cad_admin_sobrenome}','{$cad_admin_email}','{$cad_admin_senha}')");
				mysqli_close($conn);
				header('location: index.php');
	}
	
				


?>