<?php
 
include ('conn.php');

session_start();
			  if((!isset ($_SESSION['userClient']) == true) and (!isset ($_SESSION['passClient']) == true)) {
				   unset($_SESSION['userClient']);
				    unset($_SESSION['passClient']);
					 header('location:login.php'); 
				   } 
                   //$logado = $_SESSION['login'];

				   
$cliente_email = $_POST['cliente_email'];
$cliente_senha= $_POST['cliente_senha'];
$cliente_senha= md5($cliente_senha);

//$cliente_email = "valodiapilquevitch@gmail.com";
//$cliente_senha = "1010";

$query = "SELECT email, senha from cliente WHERE email = '{$cliente_email}' AND senha = '{$cliente_senha}' ";
$result = $conn->query($query);
$row_cnt = $result->num_rows;

//var_dump($query);
//var_dump($result);

if ($row_cnt == 1){
	 $_SESSION['userClient'] = $cliente_email;
	 $_SESSION['passClient'] = $cliente_senha;
	header('location:minhas_compras.php');
}	else	{
		unset ($_SESSION['userClient']);
		unset ($_SESSION['passClient']);
	header('location:login.php');
}

?>