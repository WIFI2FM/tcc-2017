<?php 
session_start();
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Página de Login">
	<meta name="author" content="Luan Rohde">
	<link rel="icon" href="img/favicon.ico">

	<title>Cadastro</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">
	<link href="css/style.css" type="text/css "rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap-datepicker.js"></script>
	<script>
	$(document).ready(function () {
		$('#old').datepicker({
			format: "dd/mm/yyyy",
			language: "pt-BR"
		});
	});
	</script>
</head>
<body class="cadastro">
	<div class="container">
		<div class="row">
			<a href="#" class="thumbnail">
				<img class="img-responsive" src="img/logo.jpg" alt="Ceep">
			</a>
		</div>
		<div class="row">
			<div class="col-md-4">
				<img src="img/aluno.png" class="img-rounded thumbnail">
				<label  for="exampleInputFile">Selecione uma imagem</label>
				<input type="file" id="exampleInputFile">
			</div>
			<div class="col-md-6">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<br />

					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#aluno" class="nav-link active" role="tab" data-toggle="tab">Aluno</a>
						</li>

						<li class="nav-item">
							<a href="#professor" class="nav-link" role="tab" data-toggle="tab">Professor</a>
						</li>
						

					</ul>
					<div class="tab-content">
						<div role="tablepanel" class="tab-pane fade in active" id="aluno">


							<!--ALUNO-->
							<form method="POST ">
								<label>Nome: </label>
								<input type="text" name="nome" class="form-control" required autofocus><br>
								<div class="row">
									<div class="col-sm-6 pull-left">
										<label id="input" for="exampleInputName2">CGM:</label>
										<input type="text" class="form-control" id="exampleInputName2" placeholder="448807959">
										<label id="input" for="course">Curso</label>
										<select name="tipo" class="form-control" id="sel1">
											<option value="informatica">Informática</option>
											<option value="administração">Administração</option>
											<option value="meioambiente">Meio Ambiente</option>
										</select>
									</div>
									<div class="col-sm-6 pull-right">
										<label id="input" for="rg">RG:</label>
										<input type="text" class="form-control" id="rg" placeholder="13.195.492-1">
										<label for="old">Data de Nascimento:</label>
										<input type="text" class="form-control pull-right" id="old" placeholder="05/03/1999">
									</div>
								</div><br>
								<label>Email:</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="luan.rohde" aria-describedby="basic-addon2">
									<span class="input-group-addon" id="basic-addon2">@ceepcascavel.com.br</span>
								</div><br>
								<label>Senha:</label>
								<input type="password" name="senha" class="form-control" required><br> 
								<label>Tipo</label><br>
								<select name="tipo" class="form-control" id="sel1">
									<option value="cliente">Aluno</option>
									<option value="funcionario">Funcionário</option>
								</select><br>
								<button type="submit" class="btn">Cadastrar</button>
							</form>
						</div>
						<div role="tablepanel" class="tab-pane fade in" id="professor">
							

							<!--PROFESSOR-->
							<form method="POST">
								<label>Nome: </label>
								<input type="text" name="nome" class="form-control" required autofocus>
								<label id="input" for="rg">RG:</label>
								<input type="text" class="form-control" id="rg" placeholder="13.195.492-1">
								<label for="old">Data de Nascimento:</label>
								<input type="text" class="form-control" id="old" placeholder="05/03/1999">
								<br>
								<label>Email:</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="luan.rohde" aria-describedby="basic-addon2">
									<span class="input-group-addon" id="basic-addon2">@ceepcascavel.com.br</span>
								</div><br>
								<label>Senha:</label>
								<input type="password" name="senha" class="form-control" required><br> 
								<button type="submit" class="btn">Cadastrar</button>
							</form>
						</div>

					</div>
				</div>



			</div>
		</div>
	</div> <!-- /container -->

</body>
</html>

<?php
if(isset($_SESSION['error'])){
	echo $_SESSION['error'];
}
session_destroy();
?>