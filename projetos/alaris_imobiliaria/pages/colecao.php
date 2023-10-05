<h1>Coleções</h1>
<?php
isset($check)?true:die('Acesso negado'); 

require_once 'includes/conexao.php';

$sql="SELECT c.id_colecao, c.nome, c.descricao FROM colecao c";

$colecoes=$conexao->query($sql);

foreach($colecoes as $c){
    echo '<div class="imovel">';
    echo '<h3>'.$c['nome'].'</h3>';
    echo '<p>'.$c['descricao'].'</p>';
    echo '<a class="det" href="?page=imoveis_colecao&&c='.$c['id_colecao'].'">Ver os Imóveis</a>';
    echo '</div>';
}

?>

<form action="?page=criar_colecao" method="get">
    <input type="hidden" name="page" value="criar_colecao">
    <div class="continuar">
        <input type="submit" value="Criar">
    </div>
</form>