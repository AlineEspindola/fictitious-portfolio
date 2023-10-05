<h1>colocar imovel existente</h1>
<?php

require '../includes/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$id_colecao = filter_input(INPUT_GET, 'colecoes_id', FILTER_SANITIZE_NUMBER_INT);

$conexao->query("INSERT INTO colecao_imovel (id_colecao, id_imovel) VALUES ('$id_colecao', '$id') ");

header("Location: ../index.php?page=colecao");
?>