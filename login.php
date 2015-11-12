<?php
include('header.php');
?>

<body>
<div class="container">
    <div class="header-container">
    	 <Center><span class="title">Sistema de Venda de Ingressos</span></center>
    </div> 
   <center> <p> Para visualizar os eventos disponíveis faça o login abaixo, caso nao tenha um cadastre-se.</p> </center>  
<table width="1000">

    <tr>
        <td><h3>Não possue cadastro?<br>Preencha o formulário</h3></td>
        <td><h3>Ja possue cadastro?<br>Faça o Login</h3></td>
    </tr>
    <tr>
        <td>
            <table width="500">
                <form action="ope_cad_cliente.php" method="post">
                    <tr>
                    	<td><input type="text" name="cad_nome" id="cad_nome" placeholder="Nome"></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="cad_sobrenome" id="cad_sobrenome" placeholder="Sobrenome"></td>
                    </tr>
                    <tr>
                    	<td><input type="email" name="cad_email" id="cad_email" placeholder="Email"></td>
                    </tr>
                    <tr>
                    	<td><input type="password" name="cad_senha" id="cad_senha" placeholder="Senha"></td>
                    </tr>
                    <tr>
                    	<td><input type="submit" name="logar" id="logar" value="Cadastrar"></td>
                    </tr>
                </form>
            </table>
        </td>
        <td>
            <table width="500">
                <form action="ope_login_cliente.php" method="post">
                    <tr>
                   		<td><input type="email" name="cliente_email" id="cliente_email" placeholder="Email"></td>
                    </tr>
                    <tr>
                    	<td><input type="password" name="cliente_senha" id="cliente_senha" placeholder="Senha"></td>
                    </tr>
                    <tr>
                    	<td><input type="submit" name="logar" id="logar" value="Entrar"></td>
                    </tr>
                </form>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2"><span class="restrito">Acesso Restrito</span></td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="1000">
                <form action="ope_login_admin.php" method="post">
                    <tr>
                    	<td><input type="email" name="admin_email" id="admin_email" placeholder="Email"></td>
                    </tr>
                    <tr>
                    	<td><input type="password" name="admin_senha" id="admin_senha" placeholder="Senha"></td>
                    </tr>
                    <tr>
                    	<td><input type="submit" name="logar" id="logar" value="Acessar"></td>
                    </tr>
                </form>
            </table>
        </td>
    </tr>
</table>
</div>
</body>
</html>