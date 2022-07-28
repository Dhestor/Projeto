<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha loja</title>
    
	

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style> 
	
	.navbar {
		margin-bottom: 0;  /* Barra de navegação superior */
	}
	</style>	

</head>
<body>	

<?php 
	session_start();
 include 'conexao.php';
 include 'menu.php'; 
 include 'cabecalho.html';

$consulta= $conexao -> query('SELECT * FROM produtos');

?>

<div class="container-fluid">
	<div class="row">
	<?php 
	while ($exibir=$consulta->fetch(PDO::FETCH_ASSOC)) {

	?>
	<div class="col-sm-3">
		 <img src="upload/<?php echo $exibir['foto1']; ?>" class="img-responsive" style="width:100%">
		<div><h1><?php echo mb_strimwidth($exibir['produto'],0,22,'...');  ?></h1></div>
		<div><h5>R$<?php echo number_format($exibir['preco'],2,',','.');   ?></h5></div>
		<div class="text-center" style="margin-top: 6px"> 
		
		<a href="detalhes.php?id=<?php echo $exibir ['id'];?>">
		<button class="btn btn-lg btn-block btn-default">
			<span class="glyphicon glyphicon-info-sign" style="color: cadetblue;"> Detalhes </span> </button> </a> <!-- Botão Info !-->

			<div class="text-center" style="margin-top: 6px">                  <!-- Botão Compra !-->
			
			<?php if ($exibir['quantidade']>0) { ?>
			
		<button class="btn btn-lg btn-block btn-success">
			<span class="glyphicon glyphicon-usd"> Comprar </span> 
		</button>
		<?php } else {  ?>
					<button class="btn btn-lg btn-block btn-danger" disabled>
					<span class="glyphicon glyphicon-ban-circle"> Indísponivel </span> 
				</button>  
				<?php  } ?>
		
</div>
</div>
	</div>	

<?php 
}
?>
</div>
</div>

<?php 
include "footer.html"
?>

</body>
</html>