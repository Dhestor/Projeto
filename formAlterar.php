<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Logon de usuário</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery.mask.js"></script>

<script>
	
	
	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});	
	
});
	
</script>
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
</style>
	
	
	
	
</head>

<body>
	
<?php
	
	session_start();
	
	
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		
		header('location:index.php');
		
	}
	
	
	$id_prod = $_GET['id'];
	
	
	include 'conexao.php';	
	include 'menu.php';
	include 'cabecalho.html';
	
	
	$consulta = $conexao->query("SELECT * FROM produtos WHERE id='$id_prod'");
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC)
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de produto</h2>
				
				<form method="post" action="alterarProduto.php?id=<?php echo $id_prod; ?>" name="incluiProd" enctype="multipart/form-data">
				
					<div class="form-group">
				
						<label for="produto">Produto</label>
						<input type="text" name="produto" value="<?php echo $exibe['produto']; ?>"  class="form-control" required id="produto">
					</div>
				
				<div class="form-group">
					
					
					<label for="marca">Marca</label>
					
					<select class="form-control" name="marca">
					  <option value="SAMSUNG" <?=($exibe['marca'] == 'SAMSUNG')?'selected':''?>>SAMSUNG</option>
					  <option value="LG" <?=($exibe['marca'] == 'LG')?'selected':''?>>LG</option>
					  <option value="APPLE" <?=($exibe['marca'] == 'APPLE')?'selected':''?>>APPLE</option>
					  <option value="DELL" <?=($exibe['marca'] == 'DELL')?'selected':''?>>DELL</option>
					  <option value="JBL" <?=($exibe['marca'] == 'JBL')?'selected':''?>>JBL</option>
					   <option value="OUTROS" <?=($exibe['marca'] == 'OUTROS')?'selected':''?>>OUTROS</option>
					</select>

			
					</div>
					
					
					
					<div class="form-group">
				
					<label for="departamento">Departamento</label>
					
					<select class="form-control" name="departamento">
					  <option value="VIDEO" <?=($exibe['departamento'] == 'VÍDEO')?'selected':''?>>VÍDEO</option>
					  <option value="AUDIO" <?=($exibe['departamento'] == 'AUDIO')?'selected':''?>AUDIO</option>
					  <option value="INFORMÁTICA" <?=($exibe['departamento'] == 'INFORMÁTICA')?'selected':''?>>INFORMÁTICA</option>
					  <option value="OUTROS" <?=($exibe['departamento'] == 'OUTROS')?'selected':''?>>OUTROS</option>
					</select>

					</div>
					
					
					<div class="form-group">
				
					<label for="secao">Seção</label>
					
					<select class="form-control" name="secao">
					  <option value="TV" <?=($exibe['secao'] == 'TV')?'selected':''?>>TV</option>
					  <option value="DOCK STATION" <?=($exibe['secao'] == 'DOCK STATION')?'selected':''?>>DOCK STATION</option>
					  <option value="FONE" <?=($exibe['secao'] == 'FONE')?'selected':''?>>FONE</option>
					  <option value="OUTROS" <?=($exibe['secao'] == 'OUTROS')?'selected':''?>>OUTROS</option>
					</select>
						

					</div>
					
					
					<div class="form-group">
				
					<label for="descricao">Descrição</label>
					
						<textarea rows="5" class="form-control" name="descrição"><?php echo $exibe['descrição']; ?></textarea>
						

					</div>
					
					
					
					<div class="form-group">
				
					<label for="quantidade">Quantidade</label>
					
					<input type="number" class="form-control" required name="quantidade" value="<?php echo $exibe['quantidade']; ?>" id="quantidade">

					</div>
					
					
					
					<div class="form-group">
				
					<label for="preco">Preço</label>
					
					<input type="text" class="form-control" required name="preco" value="<?php echo $exibe['preco']; ?>" id="preco">

					</div>
					
					<br>
					<!-- FOTO principal -->
					<div class="form-group">
				
					<label for="foto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control"  name="foto1" id="foto1">

					<div class="form-group">
						
					<img src="upload/<?php echo $exibe['foto1']; ?>" width="100px" >
<br><br>


						<!-- FOTO 2 -->
					</div>
					
					<div class="form-group">
				
					<label for="foto2">Foto 2</label>
					
					<input type="file" accept="image/*" class="form-control" name="foto2" id="foto2">
					
					<div class="form-group">
						
					<img src="upload/<?php echo $exibe['foto2']; ?>" width="100px" >
						
					</div>
                    <br>


					<!-- FOTO 3 -->
					<div class="form-group">
				
					<label for="foto2">Foto 3</label>
					
					<input type="file" accept="image/*" class="form-control"  name="foto3" id="foto3">

					</div>
					
					<div class="form-group">
						
					<img src="upload/<?php echo $exibe['foto3']; ?>" width="100px" >
						
					</div>
					<br>
							
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Alterar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
<br> <br>
	
</body>
</html>