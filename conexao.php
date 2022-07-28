<?php 

try {

$conexao = new PDO ('mysql:host=localhost;dbname=minhaloja;charset=utf8','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'));
$conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOexception $e){

    echo 'Erro na conexao'.$e -> getMessage().'<br>';
    echo 'Código do erro'.$e -> getCode();

}

?>