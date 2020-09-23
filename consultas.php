<?php

require_once('conexao.php');

if(isset($_POST['nome']) && $_POST['nome'] != ""){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $atividades = $_POST['atividades'];
    $registro = date('Y/m/d h:m:s');
    $atatus = 'espera';

    if($id == ""){
        $sql = "insert into registros (nome, telefone, atividades, reg_datahora, alt_datahora)
            values ('$nome', '$telefone', '$atividades', now(), '')
        ";
    }else{
        $sql = "update registros set nome = '$nome', telefone = '$telefone', novidades = '$atividades', alt_datahora = NOW()
                where id = ".$id;
    }
    
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && $id==""){
        $_GET['msg'] = 'Atendimento registrado com sucesso';
        $_POST = null;
    }elseif($resultado && $id!=""){
        $_GET['msg'] = 'Atendimento alterado';
        $_POST = null;
    }elseif(!$resultado){
        $_GET['msg'] = 'Falha ao registrar';
    }
}

if(isset($_GET['msg']) && $_GET['msg'] != ""){
    echo $_GET['msg'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Atendimentos Registrados</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h2 align=center>Atendimentos Registrados</h2>
    <p align=center> <a href="atendimentos.php">Novo Atendimento</a></p>

    <table border=1 width=80% align=center><tr>
        <td><label for="nome">Nome completo</label></td>
        <td><label for="telefone">Telefone</label></td>      
        <td><label for="atividades">Atividade</label></td> 
        <td><label for="atividades">Ação</label></td>
    </tr>

    
    <?php

        include("conexao.php");
        $query = mysqli_query($conexao, "SELECT * FROM atendimentos");

		while($dados = mysqli_fetch_array($query)){
			echo '<tr><td>'.$dados['nome'].'</td>
				  <td>'.$dados['telefone'].'</td>      
                  <td>'.$dados['atividades'].'</td>
                  <td>'.$dados['registro'].'</td>
                  <td>'.$dados['atendimento'].'</td>
                  <td>'.$dados['status'].'</td>
				  <td>
					<a href="cancelar.php?id='.$dados['id'].'">Cancelar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
</body>
</html>