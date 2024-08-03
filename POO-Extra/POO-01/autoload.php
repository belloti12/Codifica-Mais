<?php

spl_autoload_register(function (string $nomeCompletoDaClasse) {

    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $nomeCompletoDaClasse);
    $caminhoArquivo = "POO-Extra\\POO-01\\" . $caminhoArquivo;
    $caminhoArquivo .= ".php";
    // echo $caminhoArquivo;
    // exit();
    if (file_exists($caminhoArquivo)) {
        require_once $caminhoArquivo;
    }
});
