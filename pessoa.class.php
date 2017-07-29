<?php
	include_once('conexao.class.php');
	class Pessoa{

		public $idpessoa;
		public $nome;
		public $rg;
		public $nascimento;
		public $email;
		public $senha;

		public function __construct(){
			// print "Pessoa instanciada!";
		}
			
		public function __get($var){
	        return $this->$var;
	   	}
	    public function __set($var, $valor){
	    	$this->$var = $valor;
	    }



		public function gravar(){
			try {
			
				//echo "gravando pessoa"; 
				$sql = "insert into pessoa (nome, rg, nascimento, email, senha) values (?,?,?,?,?)";
				$con = new Conexao();
			  	$stm = $con->prepare($sql);
			 	$stm->bindParam(1, $this->nome);
			  	$stm->bindParam(2, $this->rg);
			  	$stm->bindParam(3, $this->nascimento);
			  	$stm->bindParam(4, $this->email);
			  	$stm->bindParam(5, $this->senha);
			 // 	$stm->bindParam(3, $this->rg);
			 // 	$stm->bindParam(4, $this->cgm);
			

			  	$stm->execute();

			  	$sql = ("select * from pessoa where rg=? and email=?");
				$con = new Conexao();
				$stm = $con->prepare($sql);
				$stm->bindParam(1,$this->rg);
				$stm->bindParam(2,$this->email);
				$stm->execute();
				foreach ($stm as $linha) {
							$this->idpessoa=$linha['id_pessoa'];
							
				}

		 	}catch(PDOExeption $e){
		 		return "<div class='danger'>".$e->getMessage()."</div>";
		 	}
	 	}


	    public function recuperar_senha(){
		    	try{
					$sql = ("select * from aluno where email=?");
					$con = new Conexao();
					$stm = $con->prepare($sql);
					$stm ->bindParam(1, $this->email);
					$stm ->execute();	

						if ($stm->rowCount()>0){
							foreach ($stm as $linha) {
							  	$this->email=$linha['email'];
							 	$this->senha=$linha['senha'];
							}
						  
							$para = $this->email;
							$senha = $this->senha;
							$headers = 'From: luanrohde11@gmail.com';
							$mensagem ="Recuperação da senha: $senha";
							$titulo = "Recuperacao de senha";
						
					
							if (mail($para, $titulo, $mensagem, $headers)){
								echo'<p class="text text-success">Sucesso</p>';
								session_destroy();
							}else{
								echo '<p class="text-danger">Email não enviado</p>';
								session_destroy();
							}
						}else{
							echo "Email não cadastrado!";
						}
				}catch(PDOExeption $e){
			 		return "<div class='danger'>".$e->getMessage()."</div>";
			 	}
		}
    }
?>