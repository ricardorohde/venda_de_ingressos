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
<form action="ope_cad_cliente.php" method="post">
<thead>
<tr><td colspan='6'> <b>Cadastro de Cliente</b></td>
</tr>
</thead>
      <tbody>
        <tr>
          <td>Nome: </td>
          <td><input type="text" name="cad_nome" id="cad_nome"></td>
    
        </tr>
        <tr>
          <td>Sobrenome: </td>
          <td><input type="text" name="cad_sobrenome" id="cad_sobrenome"></td>
    
        </tr>
        <tr>
          <td>Email:</td>
          <td><input type="email" name="cad_email" id="cad_email"></td>
    
        </tr>
        <tr>
          <td>Senha: </td>
          <td><input type="text" name="cad_senha" id="cad_senha"></td>
    
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