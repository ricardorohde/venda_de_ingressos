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
<table id="minhas-Compras">
  <tbody>
    
<?php
$query = "SELECT 
 a.id_cliente,
 a.email,
 b.id_ingresso,
 b.id_evento,
 b.id_cliente,
 c.id_evento,
 c.nome,
 c.local,
 c.valor,
 c.data, DATE_FORMAT(data,'%d/%m/%Y') As data
 FROM cliente a INNER JOIN ingressos b on a.id_cliente = b.id_cliente 
 INNER JOIN eventos c on b.id_evento = c.id_evento 
 WHERE a.email = '".$_SESSION['userClient']."'";
 
$result = $conn->query($query);

	echo " <thead> ";
		echo " <tr> ";
			echo " <td colspan='6'> <b>Meus Dados</b> </td>";
		echo " </tr> ";
	echo " </thead>";
$query2 = "SELECT id_cliente, nome, sobrenome, email FROM cliente WHERE email= '{$_SESSION['userClient']}' limit 1 ";
$result2 = $conn->query($query2);
while($row2 = $result2->fetch_array())
				{
				$id_cliente = $row2['id_cliente'];
				$nome = $row2['nome'];
				$sobrenome = $row2['sobrenome'];
				$email = $row2['email'];
				
				echo " <tr> ";
					echo " <td> Nome </td>";
					echo " <td> Sobrenome </td>";
					echo " <td> Email </td>";
					echo " <td rowspan='2' colspan='2' style='	text-align:center; !important'> <a href='eventos.php'>Ir para lista de Eventos<img src='img/shop.png' width='40'></a></td>";					
				echo " <td rowspan='2'  style='	text-align:center; !important'> <a href='logout.php'><img src='img/exit.png' width='55'></a></td>";
				echo " </tr> ";
				
				echo " <tr> ";
					echo " <td> $nome </td>";
					echo " <td> $sobrenome </td>";
					echo " <td> $email </td>";					
				echo " </tr> ";
				}
				
				echo " <thead> ";
				echo " <tr> ";
					echo " <td colspan='6'><b>Minhas Compras</b></td>";
				echo " </tr> ";
				echo " </thead> ";
				
				echo " <tr> ";
					echo " <td> Nome </td>";
					echo " <td> Data </td>";
					echo " <td> Local </td>";
					echo " <td> Valor </td>";
					echo " <td> Autenticação </td>";
					echo " <td> Ação </td>";
				echo " </tr> ";

while($row = $result->fetch_array())
{$rows[] = $row;}

foreach($rows as $row)
{
		echo "<form action='print_voucher.php' method='post' target='_blank'>";
		echo " <tr> ";
			echo " <td> <input type='hidden' name='nome' value='".$row['nome']. "'>".$row['nome']. "</td>";
			echo " <td> <input type='hidden' name='data' value='".$row['data']. "'>".$row['data']." </td>";
			echo " <td> <input type='hidden' name='local' value='".$row['local']. "'>".$row['local']." </td>";
			echo " <td> <input type='hidden' name='valor' value='".$row['valor']. "'>".$row['valor']."</td>";
			echo " <td> <input type='hidden' name='id_ingresso' value='".$row['id_ingresso']. "'>".md5($row['id_ingresso'])." </td>";
			echo " <td> <input type='submit' value='Imprimir Ingresso'> </td>";
			//echo " <td> <input type='button' value='IMPRIMIR' onClick='window.print();'> </td>";
		echo " </tr> ";
		echo "</form>";
}
				
?>
  </tbody>
</table>
</div>
</body>
</html>