<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
	if(isset($_GET['filme'])&& is_numeric($_GET['filmes'])){
		$idFilme=$_GET['filme'];
		$con = new mysqli ("localhost","root","",filmes);

		if($con->connect_errno!=0){
			echo "Ocorreu um erro no acesso á base de dados.<br>".$con->connect_errno;
			exit;
		}
		else{
			$sql = "delete from filmes where id_filme?";
			$stm=$con->prepare($sql);
			if($stm!=false){
				$stm->bind_param('i',$idFilme);
				$stm->execute();
				$stm->close();
				echo '<script>alert("Livro eliminado com sucesso");</script>';
				echo 'Aguarde um momento.A reencaminhar página';
				header('refresh:5;url=index.php');
			}
			else{
				echo'<br>';
				echo($con->error);
				echo '<br>';
				echo "Aguarde um momento.A reencaminhar página";
				echo '<br>';
				header("refresh:5;url=index.php");
			}
			}
		}
		else{
			echo "<h1>Houve um erro ao processor o seu pedido!<br>Irá ser reencaminhado!</h1>";
			header ("refresh:5;url=index.php");
		}
?>