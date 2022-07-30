<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	
	</style>
	
	
	
</head>

<body>	
	
	<?php
	
	session_start();

    if (empty($_SESSION['id'])) {
        header(`location:login.php`);
    }
	
	include 'conexao.php';	
	include 'menu.php';
	include 'cabecalho.html';
	
	$id_user = $_SESSION['id'];
    $consultaVenda = $conexao->query("SELECT * FROM vendas WHERE id_comprador='$id_user' GROUP BY ticket")

	?>
	
<div class="container-fluid">
<div> <h1 class="text-center">Minhas Compras</h1> </div>
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"> Data </div>
		<div class="col-sm-2"> Ticket </div>
		<div class="col-sm-5"> Produto </div>
				
	</div>		
	
	<?php while ($exibeVenda=$consultaVenda->fetch(PDO::FETCH_ASSOC)) {
    ?>

<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><?php echo date ('d/m/Y', strtotime($exibeVenda['data'])); ?></div>
		<div class="col-sm-2"><a href="ticket.php?ticket=<?php echo $exibeVenda['ticket']; ?>"> <?php echo $exibeVenda['ticket']; ?> </a> </div>

        <?php $consultaProd = $conexao->query("SELECT produto FROM produtos WHERE id='$exibeVenda[id_produto]'"); 
        $exibeProd=$consultaProd->fetch(PDO::FETCH_ASSOC);
        ?>
        

		<div class="col-sm-5"> <?php echo $exibeProd['produto']; ?> </div>
				
	</div>	
<?php } ?>
</div>
	
	
</body>
</html>