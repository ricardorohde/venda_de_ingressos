<?php
 
include ('conn.php');

session_start();
			  if(
					(!isset ($_SESSION['userAdmin']) == true) and (!isset ($_SESSION['passAdmin']) == true)
				) {
				   unset($_SESSION['userAdmin']);
				   unset($_SESSION['passAdmin']);
					  
					 header('location:login.php'); 
				} 
                   //$logado = $_SESSION['login'];

				   
$admin_email = $_POST['admin_email'];
$admin_senha= $_POST['admin_senha'];
$admin_senha= md5($admin_senha);

//$cliente_email = "valodiapilquevitch@gmail.com";
//$cliente_senha = "1010";

$query = "SELECT email, senha from user_admin WHERE email = '{$admin_email}' AND senha = '{$admin_senha}' ";
$result = $conn->query($query);
$row_cnt = $result->num_rows;

//var_dump($query);
//var_dump($result);

if ($row_cnt == 1){
	$_SESSION['userAdmin'] = $admin_email;
	 $_SESSION['passAdmin'] = $admin_senha;
	header('location:index.php');
}	else	{
	unset ($_SESSION['userAdmin']);
	  unset ($_SESSION['passAdmin']);
	header('location:login.php');
}

?>