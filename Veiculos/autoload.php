
<?php

spl_autoload_register(function (string $nomeCompletoDaClasse) {

    //echo $nomeCompletoDaClasse;
    //exit();
    // $caminhoArquivo = str_replace('Seu\\NameSpace', 'src', $nomeCompletoDaClasse);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $nomeCompletoDaClasse);
    $caminhoArquivo .= ".php";

    if (file_exists($caminhoArquivo)) {
        require_once $caminhoArquivo;
    }
});
