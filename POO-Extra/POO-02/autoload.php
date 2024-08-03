<?php

spl_autoload_register(function (string $nomeCompletoDaClasse) {

    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $nomeCompletoDaClasse);
    $caminhoArquivo = str_replace("POO_02", "POO-02", $caminhoArquivo);
    $caminhoArquivo = "POO-Extra\\" . $caminhoArquivo;
    $caminhoArquivo .= ".php";
    // echo $caminhoArquivo;
    // exit();
    if (file_exists($caminhoArquivo)) {
        require_once $caminhoArquivo;
    }
});
