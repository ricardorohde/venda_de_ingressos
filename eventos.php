<?php
include('header.php');
include ('conn.php');
session_start();
if((!isset ($_SESSION['userClient']) == true) and (!isset ($_SESSION['passClient']) == true)) {
unset($_SESSION['userClient']);
unset($_SESSION['passClient']);
header('location:login.php'); 
} 
//$logado = $_SESSION['login'];
?>

<body>
    <div class="container">
        <div class="header-container">
        	<Center><span class="title">Sistema de Venda de Ingressos</span></center>
        </div> 
		<div class='voltar'><a href="minhas_compras.php"><img src='img/home.png' width='40'><br />Voltar </a></div>
        <table id="table-eventos">
            <tbody>

            <?php
				$query = "SELECT id_evento, nome, valor, local, status,  DATE_FORMAT(data,'%d/%m/%Y') As data FROM eventos WHERE (status = '1' OR status = '2' ) ";
				$result = $conn->query($query);
					
				echo " <thead> ";
				echo " <tr><td colspan='6'> <b>Lista de Eventos </b></td>";
				echo " </tr> ";
				echo " </thead> ";
				echo " <tr> ";
					echo " <td> Nome </td>";
					echo " <td> Data </td>";
					echo " <td> Local </td>";
					echo " <td> Valor </td>";
					echo " <td> Estatus </td>";
					echo " <td> Ação </td>";
				echo " </tr> ";

				while($row = $result->fetch_array())
				{
					$nome = $row['nome'];
					$data = $row['data'];
					$local = $row['local'];
					$valor = $row['valor'];
					$status = $row['status'];
					$id_evento = $row['id_evento'];
					
					if($status==0){
						$status="Cancelado";
					}if($status==1){
						$status="Disponivel";
					}if($status==2) {
						$status="Em Espera";
					}
					echo "<form action='confirm_compra_evento.php' method='post'>";
						echo " <tr> ";
							echo " <td>".$nome."</td>";
							echo " <td>".$data."</td>";
							echo " <td>".$local."</td>";
							echo " <td> R$ ".$valor."</td>";
							echo " <td>".$status."</td>";
							if($status == "Disponivel"){
								echo " <td>   <input type='hidden' name='id_evento' value='".$id_evento."'>
							<input type='submit' value='COMPRAR' ></td>";	
							}else{
								echo " <td> Aguarde  <input type='hidden' name='id_evento' value='".$id_evento."'>
							</td>";
							}
							
						echo " </tr> ";
					echo "</form>";
				}
            ?>
            </tbody>
        </table>
    </div>
    </body>
</html>