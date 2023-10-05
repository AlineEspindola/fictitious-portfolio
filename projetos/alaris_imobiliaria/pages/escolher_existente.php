<h1>Coleções</h1>

<?php
isset($check)?true:die('Acesso negado'); 

$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

require_once 'includes/conexao.php';

$sql="SELECT * FROM colecao ORDER BY nome";
$colecoes=$conexao->query($sql);

?>

<form action="actions/colocar_imovel_existente.php" method="get">
    <input type="hidden" name="id" value="<?=$id?>">
    <label for="colecoes">Escolha sua Coleção: </label>
    <select name="colecoes_id" id="colecoes_id">
        <?php
        foreach($colecoes as $c){
            echo '<option value="'.$c['id_colecao'].'">';
            echo $c['nome'];
            echo '</option>';
        }
        ?>
    </select>
    <div class="continuar">
        <input type="submit" value="Continuar">
    </div>
</form>


