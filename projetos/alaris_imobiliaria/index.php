<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- icone na pagina -->
    <!-- <link rel="shortcut icon" href="pages/images/logo.png" type="image/x-icon"> -->
    <title>Alaris Imobiliária</title>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <img class="logo" src="images/Logo imobiliaria 1.png" alt="logo da mobiliária">
            </div>
            <form class="barra_de_pesquisa" action="?page=pesquisar" method="get" class="form-inline">
                <input type="search" name="pesquisar" placeholder="Pesquise seu imóvel" required>
                <input type="hidden" name="page" value="pesquisar">
                <button type="submit">&#128269</button>
            </form>
            <div>
                <img class="cidade" src="images/mdi_house-city.png" alt="cidade">
            </div>
        </header>
        <nav>
            <a href="index.php">Início</a>
            <a href="?page=comprar">Comprar</a>
            <a href="?page=aluguel">Alugar</a>
            <a href="?page=categorias">Categorias</a>
            <a href="?page=colecao">Coleções</a>
        </nav>
        <!-- parte principal -->
        <main>
            <?php
                $check=true;

                $page=filter_input(INPUT_GET, 'page',FILTER_SANITIZE_SPECIAL_CHARS);
                if($page && file_exists("pages/$page.php")){
                    require "pages/$page.php";
                } else{
                    require 'pages/inicio.php';
                }
            ?>
        </main>
        <!-- rodapé -->
        <footer>
            <p>Técnico em Informática 2021 - Aline de Abreu Espindola</p>
        </footer>
    </div>
</body>
</html>