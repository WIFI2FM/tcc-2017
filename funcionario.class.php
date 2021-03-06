<?php
	include_once('pessoa.class.php');
	include_once('conexao.class.php');
	class Funcionario extends Pessoa{

		public $cargo;
		public $cpf;
		public $idpessoa;
		 

		public function __construct(){
			//print "Funcionario instanciado!";
		}

		public function gravar(){
				try{
					echo parent::gravar();
					$sql = "insert into funcionario (cargo, cpf, idpessoa) values (?,?,?)";
				 	$con = new Conexao();
				 	$stm = $con->prepare($sql);
				 	$stm->bindParam(1, $this->cargo);
				 	$stm->bindParam(2, $this->cpf);
				 	$stm->bindParam(3, parent::__get("id"));
				 				 
				 	$stm->execute();
				 	//echo "gravado";
		 		}catch(PDOExeption $e){
		 			return "<div class='danger'>".$e->getMessage()."</div>";
		 		}
	    }

	    public function __get($var){
	        return $this->$var;
	   	}
	   	
	    public function __set($var, $valor){
	        $this->$var = $valor;
	    }

	   	public function listar(){
				try {
					$sql = "select p.id, p.nome, p.nascimento, p.rg, p.senha, p.email, f.cpf, f.cargo from pessoa p join funcionario f on p.id=f.idpessoa";
					$con = new Conexao();
					$stm = $con->prepare($sql);
					$stm->execute();
					return $stm;

			}catch(PDOExeption $e){
		 		return "<div class='danger'>".$e->getMessage()."</div>";
		 	}
	    }

	    public function carregar(){
				try{
					$sql = "select * from pessoa";
					$con = new Conexao();
					$stm = $con->prepare($sql);
					$stm->bindParam(1, $this->idpessoa);
					$stm->execute();
					print_r($sql);

						foreach ($stm as $linha) {
							$this->idpessoa=$linha['id'];
						}
				}catch(PDOExeption $e){
		 			return "<div class='danger'>".$e->getMessage()."</div>";
		 		}
	 	}

	 	public function excluir(){
				try{
					$sql = "select * from funcionario where idpessoa=?";
						$con = new Conexao;
						$stm = $con->prepare($sql);
						$stm->bindParam(1, $this->idpessoa);
						$stm->execute();
						
						if ($stm->rowCount()>0) {
							$sqldel = "delete from funcionario where idpessoa=?";
							$condel = new Conexao;
							$stmdel = $condel->prepare($sqldel);
							$stmdel->bindParam(1, $this->idpessoa);
						
							 if ($stmdel->execute()) {	
							 	return '<div class="sucess">Aluno excluido com sucesso!</div>';
							 }else{
							 	return '<div class="danger">Aluno não excluído!</div>';
							 }

					}
						
				}catch(PDOExeption $e){
		 			return "<div class='danger'>".$e->getMessage()."</div>";
		 		}
					
	 	}

    }
?>