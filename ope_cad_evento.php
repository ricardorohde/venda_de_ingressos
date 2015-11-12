<?php
 
include ('conn.php');

session_start();
			  if((!isset ($_SESSION['userAdmin']) == true) and (!isset ($_SESSION['passAdmin']) == true)) {
				   unset($_SESSION['userAdmin']);
				    unset($_SESSION['passAdmin']);
					 header('location:login.php'); 
				   } 
                   //$logado = $_SESSION['login']; 

$nome = $_POST['nome'];
$data= $_POST['data'];
$local= $_POST['local'];
$valor= $_POST['valor'];
$status= $_POST['status'];


$id_evento= $_POST['id_evento'];

// grava evento

$query = "SELECT * FROM eventos";
$result = $conn->query($query);
$row_cnt = $result->num_rows;

if($row_cnt != 1)	{
	
	mysqli_query($conn,"INSERT INTO eventos (nome,data,local,valor,status) 
						VALUES ('$nome','$data','$local','$valor','$status')");
						mysqli_close($conn);
						header('location: index.php');	
} else	{
	
	while($row = $result->fetch_array())
	
	{
		$id_evento_db = $row['id_evento'];	

			mysqli_query($conn,"UPDATE eventos SET nome = '$nome', data = '$data', local = '$local', valor = '$valor', status = '$status' WHERE id_evento = '$id_evento' ");
						mysqli_close($conn);
						header('location:eventos_admin.php');			
		
	}
}




?>