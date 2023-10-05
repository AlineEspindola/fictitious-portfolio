<?php
#actions/curtir.php
require '../includes/conexao.php';

$p=filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$conexao->query("UPDATE imovel SET quantidade_curtidas=quantidade_curtidas+1 WHERE id=$id");
$curtido=1;

#redireciona pra página inicial
header("Location: ../index.php?page=inicio&&p='.$p.'&&curtido='.$curtido.'");

?>