<?php isset($check)?true:die('Acesso negado');?>
<?php
$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
require_once 'includes/conexao.php'; 
$sql="SELECT * FROM categoria WHERE id=$id";
$categorias=$conexao->query($sql);
$categoria=$categorias->fetch();

#pegamos os imoveis da categoria_id do id enviado na url
$sql="SELECT i.id, i.nome, i.descricao, i.valor, i.quantidade_curtidas, m.nome AS cidade FROM imovel i, municipio m WHERE i.municipio_id=m.id AND categoria_id=$id";
$imoveis=$conexao->query($sql);

$curtido=filter_input(INPUT_GET, 'curtido', FILTER_SANITIZE_NUMBER_INT);

if($curtido){
    echo '<div class="msg-alertas">';
    echo '<span class="ms ok"><i class="icon icon-users-1"></i>Curtido com sucesso! Para evitar spam de curtidas, a página foi recarregada</span>';
    echo '</div>';
}

?>
<h1>Imóveis em <?=$categoria['nome']?></h1>
<?php

foreach($imoveis as $i){
    echo '<div class="imovel">';
    echo '<h3>'.$i['nome'].'</h3>';
    echo '<p>R$'. $i['valor'].'</p>';
    echo '<p>'. $i['cidade'].'</p>';
    echo '<div class="feedback">';
    echo '<div class="mais">';
    echo '<a href="?page=escolher_existente&&id='.$i['id'].'"><img src="images/mais.png" alt="botão de adicionar na coleção"></a>';
    echo '</div>';
    echo '<div class="coracao">';
    echo '<a href="actions/curtir_imovel_por_categoria.php?id='.$i['id'].'&categoria='.$id.' "><img class="coracao" src="images/coracao.png" alt="coração"></a>';
    echo '</div>';
    echo '<p class="curtidas" >'. $i['quantidade_curtidas'].'</p>';
    echo '</div>';
    echo '<a class="det" href="?page=imovel_ver&id='.$i['id'].'">Ver Detalhes</a>';
    echo '</div>';
}

?>
