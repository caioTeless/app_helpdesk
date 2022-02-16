<?php 
    session_start();

    $titulo =  str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);
    $texto = $_SESSION['id'] . '#' . $_POST['titulo'] . '#' . $_POST['categoria'] . '#' . $_POST['descricao'] . PHP_EOL;
    // PHP_EOL -> determina uma quebra de linha padrão do SO.
    $arquivo = fopen('../../app_help_desk/arquivo.txt', 'a');
   
    fwrite($arquivo, $texto);

    fclose($arquivo);

    header("Location: abrir_chamado.php");

    // echo $texto;
