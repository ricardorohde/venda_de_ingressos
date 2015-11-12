<?php
	include ('header.php');
	include ('conn.php');
	session_start();
	if((!isset ($_SESSION['userClient']) == true) and (!isset ($_SESSION['passClient']) == true)) {
	unset($_SESSION['userClient']);
	unset($_SESSION['passClient']);
	header('location:login.php'); 
} 
?>

<body>
    <div class="container">
        <div class="header-container">
        	<Center><span class="title">Sistema de Venda de Ingressos</span></center>
        </div> 
<?php
	$id_evento = $_POST['id_evento'];
	$query = "SELECT id_evento, nome, valor, local,   DATE_FORMAT(data,'%d/%m/%Y') As data FROM eventos
	WHERE id_evento = '{$id_evento}' " ;
	$result = $conn->query($query);
	while($row = $result->fetch_array())
	{
		$nome = $row['nome'];
		$data = $row['data'];
		$local = $row['local'];
		$valor = $row['valor'];
		$id_evento = $row['id_evento'];
		echo "<form action='ope_compra_evento.php' method='post'>";
		echo "<table id='confirm-table'>";
			echo " <thead> ";
				echo " <tr> <td colspan='6'><b>Confirmar Compra de Ingresso</b></td>";
				echo " <tr> ";
			echo " </thead> ";
			echo " <tr> ";
					echo " <td> Nome </td>";
					echo " <td> Data </td>";
					echo " <td> Local </td>";
					echo " <td colspan='3'> Valor </td>";
				echo " </tr> ";

				echo " <tr> ";
					echo " <td>".$nome."</td>";
					echo " <td>".$data."</td>";
					echo " <td>".$local."</td>";
					echo " <td> R$ ".$valor."</td>";
					echo " <td> <input type='hidden' name='id_evento' value='".$id_evento."'>
							<input type='submit' value='COMFIRMAR' ></td>";
				echo " <td > <input type='button' value='Voltar' onClick='history.go(-1)'> </td>";
				echo " </tr> ";
		echo "</form>";
		echo "</table>";
	}
?>
	</div>
</body>
</html>