<?php

	require_once('conexao.php');
	
	$nome = '';
	$telefone = '';
	$atividades = '';
    $id = '';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){

		$sql = "select * from consultas where id = ".$_GET['id'];
        $resultado = mysqli_query($conexao, $sql);
        
		if($resultado){
			$dados = mysqli_fetch_array($resultado);
			$nome = $dados['nome'];
			$telefone = $dados['telefone'];
			$atividades = $dados['atividades'];
			$id = $dados['id'];
		}
	}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Agência</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body background-color = "gray">
    <div width=60% align=center>
    <form class="formulario" method="post" action="consultas.php" align=left> 
        <p> Atendimento </p>
        
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="field">
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" placeholder="Digite o nome do cliente*" required>
        </div>
        
        <div class="field">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" placeholder="Digite o telefone do cliente">
        </div>
        
        <div class="field radiobox">
            <span>Atividade</span>
            <input type="radio" name="atividades" id="2viaconta" value="2viaconta" <?php if($atividades=='sim'){echo 'checked';} ?> ><label for="2viaconta">Segunda Via de Conta</label><br/>
            <input type="radio" name="atividades" id="mudarendereco" value="mudarendereco" <?php if($atividades=='mudarendereco'){echo 'checked';} ?> ><label for="mudarendereco">Mudar Endereço</label><br/>
            <input type="radio" name="atividades" id="negociacaodebitos" value="negociacaodebitos" <?php if($atividades=='negociacaodebitos'){echo 'checked';} ?> ><label for="mudarendereco">Negociação de Débitos</label><br/>
        </div> 

        <input type="submit" name="consultas" value="Enviar">
    </form>
    
</div>
</body>
</html>