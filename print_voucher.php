<?php
session_start();
			  if((!isset ($_SESSION['userClient']) == true) and (!isset ($_SESSION['passClient']) == true)) {
				   unset($_SESSION['userClient']);
				    unset($_SESSION['passClient']);
					 header('location:login.php'); 
				   } 
include ('header.php');
include ('conn.php');

				   
?>

<body>
 <?php
 $nome = $_POST['nome'];
 $data = $_POST['data'];
 $local = $_POST['local'];
 $valor = $_POST['valor'];
 $id_ingresso = $_POST['id_ingresso'];
	$id_hash = md5($id_ingresso);
 ?>
<div class='voucher_print'>
	<div class='voucher-header'><?php echo "Evento: " .$nome ?></div>
	<div class='voucher-body'>
		<?php
			echo "Local: " .$local. "<br />";
			echo "Data: " .$data. "<br />";
			echo "Valor: " .$valor. "<br />";
			echo "Autenticação: " .$id_hash. "<br />";		
		?>	
	</div>
</div>
<input type='button' value='IMPRIMIR' onClick='window.print();'>
</body>
</html>