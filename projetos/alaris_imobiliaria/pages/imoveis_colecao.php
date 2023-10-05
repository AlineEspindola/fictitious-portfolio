<h1>Imóveis da Coleção</h1>
<?php
isset($check)?true:die('Acesso negado'); 

require_once 'includes/conexao.php';

$c=filter_input(INPUT_GET, 'c', FILTER_SANITIZE_NUMBER_INT);

$sql="SELECT i.nome, i.descricao, i.valor, m.nome AS cidade FROM municipio m, colecao_imovel ci, imovel i WHERE i.municipio_id=m.id AND ci.id_imovel=i.id AND ci.id_colecao=$c ORDER BY ci.id_colecao_imovel DESC";

$imoveis=$conexao->query($sql);

foreach($imoveis as $i){
    echo '<div class="imovel">';
    echo '<h3>'.$i['nome'].'</h3>';
    echo '<p>'. $i['descricao'].'</p>';
    echo '<p>R$'. $i['valor'].'</p>';
    echo '<p>'. $i['cidade'].'</p>';
    echo '</div>';
}

?>