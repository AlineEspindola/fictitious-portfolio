<?php
#actions/curtir.php
require '../includes/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$conexao->query("UPDATE imovel SET curtidas=curtidas+1 WHERE id=$id");

#redireciona pra página inicial
header('Location: ../index.php?page=inicio');

?>