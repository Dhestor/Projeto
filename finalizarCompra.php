<?php

session_start();

include 'conexao.php';


$data = date('Y-m-d');
$ticket = uniqid();
$id_user = $_SESSION['id'];

foreach ($_SESSION['carrinho'] as $id => $qnt)  {
    $consulta = $conexao->query("SELECT * FROM produtos WHERE id='$id'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['preco'];
    
	
	$inserir = $conexao->query("INSERT INTO vendas (ticket, id_comprador, id_produto, quantidade, data, valor) VALUES
	('$ticket','$id_user','$id','$qnt','$data','$preco')");
	
}

include 'fim.php';


?>