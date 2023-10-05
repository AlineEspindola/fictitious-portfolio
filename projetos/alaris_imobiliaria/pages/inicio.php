<?php isset($check)?true:die('Acesso negado'); ?>

<!-- arquivo pages/inicio.php -->

<?php

$curtido=filter_input(INPUT_GET, 'curtido', FILTER_SANITIZE_NUMBER_INT);

if($curtido){
    echo '<div class="msg-alertas">';
    echo '<span class="ms ok"><i class="icon icon-users-1"></i>Curtido com sucesso! Para evitar spam de curtidas, a página foi recarregada</span>';
    echo '</div>';
}

?>

<h1>Imóveis Mais Curtidos</h1>

<?php

require_once 'includes/conexao.php';

#paginação
$p=filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (!$p){
    $p=0;
}

#quantidade por pagina
$qpg=3;
$inicio=$p*$qpg;

$sql="SELECT i.id, i.nome, i.descricao, i.valor, i.quantidade_curtidas, m.nome AS cidade FROM imovel i, municipio m WHERE i.municipio_id=m.id ORDER BY i.quantidade_curtidas DESC LIMIT $inicio,$qpg";

$imoveis=$conexao->query($sql);

foreach($imoveis as $i){
    echo '<div class="imovel">';
    echo '<h3>'.$i['nome'].'</h3>';
    echo '<p>'. $i['cidade'].'</p>';
    echo '<div class="feedback">';
    echo '<div class="mais">';
    echo '<a href="?page=escolher_existente&&id='.$i['id'].'"><img src="images/mais.png" alt="botão de adicionar na coleção"></a>';
    echo '</div>';
    echo '<div class="coracao">';
    echo '<a href="actions/curtir_inicio.php?id='.$i['id'].'&p='.$p.'"><img src="images/coracao.png" alt="botão de curtida"></a>';
    echo '</div>';
    echo '<p class="curtidas" >'. $i['quantidade_curtidas'].'</p>';
    echo '</div>';
    echo '<a class="det" href="?page=imovel_ver&id='.$i['id'].'">Ver Detalhes</a>';
    echo '</div>';
}

echo '<div class="paginacao">';
if($p>0){
    echo '<a class="anterior" href="?p='.($p-1).'">Anterior</a>';
}
if($imoveis->rowCount()){
    echo '<a class="proxima" href="?p='.+($p+1).'">Próxima</a>';
}
echo '</div>';

?>