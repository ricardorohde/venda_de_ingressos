<?php
include ('header.php');
include ('conn.php');

session_start();
			  if((!isset ($_SESSION['userAdmin']) == true) and (!isset ($_SESSION['passAdmin']) == true)) {
				   unset($_SESSION['userAdmin']);
				    unset($_SESSION['passAdmin']);
					 header('location:login.php'); 
				   } 
                   //$logado = $_SESSION['login'];
?>
<body>
<div class="container">
        <div class="header-container">
        	<Center><span class="title">Sistema de Venda de Ingressos</span></center>
        </div>
		<div class='voltar'><a href="index.php"><img src='img/home.png' width='40'><br />Voltar </a></div>
<table id='eventos_relatorio'>
  <tbody>
    
<?php
$query = "SELECT id_evento, nome, valor, local, status,  DATE_FORMAT(data,'%d/%m/%Y') As data FROM eventos";
$result = $conn->query($query);
				echo " <thead> ";
				echo " <tr><td colspan='8'> <b>Relatorio de Eventos </b></td>";
				echo " </tr> ";
				echo " </thead> ";
	echo " <tr> ";
		echo " <td> Nome </td>";
		echo " <td> Data </td>";
		echo " <td> Local </td>";
		echo " <td> Valor </td>";
		echo " <td> Estatus </td>";
		echo " <td> Vendidos </td>";
		echo " <td> Lucro</td>";
	echo " </tr> ";
while($row = $result->fetch_array())
{
$nome = $row['nome'];
$data = $row['data'];
$local = $row['local'];
$valor = $row['valor'];
$id_evento = $row['id_evento'];
$status = $row['status'];

if($status==0){
	$status="Cancelado";
}if($status==1){
	$status="Disponivel";
}if($status==2) {
	$status="Em Espera";
}
$subQuery = $conn->query("SELECT id_evento FROM ingressos WHERE id_evento = $id_evento");
$row_cnt = $subQuery->num_rows;

$lucro = $row_cnt*$valor;

echo "<form action='edit_evento.php' method='post'>";
	echo " <tr> ";
		echo " <td> <input type='hidden' name='nome' value='".$nome."'>".$nome."</td>";
		echo " <td> <input type='hidden' name='data' value='".$data."'>".$data."</td>";
		echo " <td> <input type='hidden' name='local'value='".$local."'>".$local."</td>";
		echo " <td> <input type='hidden' name='valor' value='".$valor."'> R$ ".$valor."</td>";
		echo " <td>".$status."</td>";
		echo " <td>".$row_cnt."</td>";
		echo " <td>R$: ".$lucro." </td>";
	echo " </tr> ";
echo "</form>";

}
?>
  </tbody>
</table>
</div>
</body>
</html>