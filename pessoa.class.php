<?php
	include_once('conexao.class.php');
	class Pessoa 
	{
		
		private $id_pessoa;
		public $nome;
		public $rg;
		public $nascimento;
		/* public $foto; */
		public $email;
		private $senha;
		

		public function setNome($nome){
			$this->$nome = $nome;
		}
		public function getNome(){
			return $this->$nome;
		}

		public function setRg($rg){
			$this->$rg = $rg;
		}
		public function getRg(){
			return $this->$rg;
		}

		public function setNascimento($nascimento){
			$this->$nascimento = $nascimento;
		}
		public function getNascimento(){
			return $this->$nascimento;
		}

		public function setEmail($email){
			$this->$email = $email;
		}
		public function getEmail(){
			return $this->$email;
		}

		public function recuperar_senha(){
			$email = $_POST['email-rec'];
			$sql = ("SELECT senha FROM login WHERE email='$email'");
			$con = new Conexao();
			$stm = $con->prepare($sql);
			// $stm ->bindParam(1, $this->email);
			$stm ->execute();
			$verificar = $sql->num_rows;
			// echo $total = $sql->num_rows;
			// if (($total)> 0 ){
			// 	echo "existe";
			// }
		 
			// if ($verificar == 0) {
			// 	echo "Email não cadastrado";
			// }
			
				foreach ($stm as $linha) {
				  	$this->email=$linha['email'];
				 	$this->senha=$linha['senha'];
				  }


				  
			$para = $email;
			$senha = $this->senha;
			$headers = 'From: luanrohde11@gmail.com';
			$mensagem ="Recuperação da senha: $senha";
			$titulo = "Recuperacao de senha";
				
				// echo $mensagem['a']['b'];
			
			if (mail($para, $titulo, $mensagem, $headers)){
				echo'<p class="text text-success">Sucesso</p>';
				session_destroy();
			}else{
				echo '<p class="text-danger">Email não enviado</p>';
				session_destroy();
		}
	}
}

?>