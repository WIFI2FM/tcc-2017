<?php

	include_once('disciplina.class.php');
		$nome = $_POST['nome_disciplina'];
		$prof = $_POST['prof_disciplina'];
		$curso_disciplina = $_POST['curso_disciplina'];
		$carga = $_POST['carga_disciplina'];


		$disc = new Disciplina();
		$disc->__set("nome",$nome);  
	    $disc->__set("professor",$prof);  
	    $disc->__set("curso",$curso_disciplina);
	    $disc->__set("carga_horaria",$carga);  

	    $disc->gravar();
	

?>