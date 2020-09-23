<?php

	require_once('conexao.php');
	
	$id = $_GET['id'];
	
	if($id != ""){
		
		$sql = "delete from consultas where id = ".$id;
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$msg = "Atendimento cancelado com sucesso!";
		}
		echo "<script>window.location.href='consultas.php?msg=$msg';</script>";
		
	}
	
?>