<?php isset($check)?true:die('Acesso negado');?>

<h1 class="categorias">Categorias</h1>

<?php
require_once 'includes/conexao.php'; 
$sql='select * from categoria order by nome';
$categorias=$conexao->query($sql);

foreach($categorias as $c){
    echo '<div class="categoria">';
    echo '<a href="?page=imovel_por_categoria&id='.$c['id'].'">';
    echo $c['nome'];
    echo '</a>';
    echo '</div>';
}
?>


