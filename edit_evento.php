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
				   
				   $nome= $_POST['nome'];
				   $local= $_POST['local'];
				   $valor= $_POST['valor'];
					$id_evento= $_POST['id_evento'];
?>
<body>
    <div class="container">
        <div class="header-container">
        	<Center><span class="title">Sistema de Venda de Ingressos</span></center>
        </div> 
		
<form action="ope_cad_evento.php" method="post">
    <table id="edit_evento">
     <thead>
		<tr>
		<td colspan='6'> <b>Editar Evento</b> </td>
		</tr> 
	</thead>
      <tbody>
        <tr>
          <td>Nome do Evento: </td>
          <td><input type="text" name="nome" id="nome" value="<?php echo $nome ?>"></td>
    
        </tr>
        <tr>
          <td>Data: </td>
          <td><input type="date" name="data" id="data"></td>
    
        </tr>
        <tr>
          <td>Local:</td>
          <td><input type="text" name="local" id="local"value="<?php echo $local ?>"></td>
    
        </tr>
        <tr>
          <td>Valor:</td>
          <td>R$ <input type="text" name="valor" id="valor" value="<?php echo $valor ?>"></td>
    
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
          <td colspan="2"><input type='hidden' name='id_evento' value='<?php echo $id_evento ?>'><input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar"></td>   
        </tr>
      </tbody>
    </table>
</form>
</div>
</body>
</html>