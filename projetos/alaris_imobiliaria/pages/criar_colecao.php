<h1>Criar Coleção</h1>

<?php
isset($check)?true:die('Acesso negado'); 

require_once 'includes/conexao.php';
?>

<form action="actions/adicionar_colecao.php" method="get">
    <input type="hidden" name="actions" value="adicionar_colecao">
    <input type="search" name="nome" placeholder="Nome da Coleção" required>
    <div class="textarea">
        <textarea class="descricao" name="descricao" id="" cols="94" placeholder="Descrição da Coleção" rows="10" required></textarea>
    </div>
    <div class="continuar">
        <input type="submit" value="Criar">
    </div>
</form>