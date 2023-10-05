<?php
require '../includes/conexao.php';

$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_GET, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

$conexao->query("INSERT INTO colecao (nome, descricao) VALUES ('$nome', '$descricao')");

header("Location: ../index.php?page=colecao");
?>