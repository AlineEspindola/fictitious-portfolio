<?php
#pegar o id do imóvel
require_once 'includes/conexao.php';
$curtido=filter_input(INPUT_GET, 'curtido', FILTER_SANITIZE_NUMBER_INT);

if($curtido){
    echo '<div class="msg-alertas">';
    echo '<span class="ms ok"><i class="icon icon-users-1"></i>Curtido com sucesso! Para evitar spam de curtidas, a página foi recarregada</span>';
    echo '</div>';
}

$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql="SELECT i.id, i.nome, i.descricao, i.valor, i.quantidade_curtidas, m.nome AS cidade FROM imovel i, municipio m WHERE i.municipio_id=m.id AND i.id=$id";
$i=$conexao->query($sql)->fetch();
echo '<div class="imovel">';
echo '<h3>'.$i['nome'].'</h3>';
echo '<p>'. $i['descricao'].'</p>';
echo '<p>R$'. $i['valor'].'</p>';
echo '<div class="feedback">';
echo '<div class="mais">';
echo '<a href="?page=escolher_existente&&id='.$i['id'].'"><img src="images/mais.png" alt="botão de adicionar na coleção"></a>';
echo '</div>';
echo '<div class="coracao">';
echo '<a href="actions/curtir_imovel_ver.php?id='.$i['id'].'"><img class="coracao" src="images/coracao.png" alt="coração"></a>';
echo '</div>';
echo '<p class="curtidas" >'. $i['quantidade_curtidas'].'</p>';
echo '</div>';
echo '<p>'. $i['cidade'].'</p>';
echo '</div>';
?>