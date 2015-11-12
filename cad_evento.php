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
<table id='cad_cliente'>
<form action="ope_cad_evento.php" method="post">
     <thead>
<tr><td colspan='6'> <b>Cadastro de Evento</b></td>
</tr>
</thead>
      <tbody>
        <tr>
          <td>Nome do Evento: </td>
          <td><input type="text" name="nome" id="nome"></td>
    
        </tr>
        <tr>
          <td>Data: </td>
          <td><input type="date" name="data" id="data"></td>
    
        </tr>
        <tr>
          <td>Local:</td>
          <td><input type="text" name="local" id="local"></td>
    
        </tr>
        <tr>
          <td>Valor:</td>
          <td>R$ <input type="text" name="valor" id="valor"></td>
    
        </tr>
		<tr>
          <td>Estatus</td>
          <td>
		  <select name="status" id="status">
			<option value="1">Disponível</option>
			<option value="2">Em Espera</option>
			<option value="0">Cancelado</option>
		  </select>
		  </td>
    
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar"></td>   
        </tr>
      </tbody>
    </table>
</form>
</div>
</body>
</html>