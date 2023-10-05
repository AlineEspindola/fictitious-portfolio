<?php isset($check)?true:die('Acesso negado');?>

<?php
require_once './includes/conexao.php';
$pesquisa = filter_input(INPUT_GET, 'pesquisar', FILTER_SANITIZE_SPECIAL_CHARS);
echo '<h1>Sua Pesquisa</h1>';

if (trim($pesquisa)) {
    $sql = "SELECT i.id, i.nome, i.descricao, i.valor, i.quantidade_curtidas, m.nome AS cidade
    FROM imovel i, municipio m
    WHERE i.municipio_id=m.id AND (i.nome LIKE '%". $pesquisa ."%' OR i.descricao LIKE '%". $pesquisa ."%')";
    $imoveis = $conexao->query($sql);

    foreach($imoveis as $i) {
    echo '<div class="imovel">';
    echo '<h3>'.$i['nome'].'</h3>';
    echo '<h3>'.$i['descricao'].'</h3>';
    echo '<h3> R$ '.$i['valor'].'</h3>';
    echo '<h3>'.$i['cidade'].'</h3>';
    echo '<div class="feedback">';
    echo '<div>';
    echo '<img class="coracao" src="images/coracao.png" alt="coração">';
    echo '</div>';
    echo '<p class="curtidas" >'. $i['quantidade_curtidas'].'</p>';
    echo '</div>';
    echo '<a class="det" href="?page=imovel_ver&id='.$i['id'].'">Ver Detalhes</a>';
    echo '</div>';
    };
};

?>