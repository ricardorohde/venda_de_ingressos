<?php
include('header.php');
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
<table id="area_admin">
  <tbody>
    <tr>
      <td><a href="cad_usuario.php">Cadastro de Usuarios Administrativos<img src='img/new_admin.png' width='60'></a></td>
      <td><a href="cad_cliente.php">Cadastro de Clientes <img src='img/new_user.png' width='60'></a></td>
      <td><a href="cad_evento.php">Cadastro de Eventos <img src='img/new_event.png' width='60'></a></td>
    </tr>
    <tr>
      <td><a href="eventos_admin.php">Lista de Eventos<img src='img/relatory.png' width='60'></a></td>
	  <td><a href="relatorio.php">Relatorio<img src='img/relatorio.png' width='60'></a></td>
      <td><a href="logout.php">Sair<img src='img/exit.png' width='60'></a></td>
    </tr>

  </tbody>
</table>
</div>
</body>
</html>