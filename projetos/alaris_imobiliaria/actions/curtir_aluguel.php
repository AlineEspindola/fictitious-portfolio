<?php
#actions/curtir.php
require '../includes/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$conexao->query("UPDATE imovel SET quantidade_curtidas=quantidade_curtidas+1 WHERE id=$id");
$curtido=1;

header("Location: ../index.php?page=aluguel&&curtido='.$curtido.'");

?>