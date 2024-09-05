<?php 

namespace App;

class Controller 
{

    // Vai pra pagina de listagem
    public function listar() 
    {
        require __DIR__ . "/Views/listagem.php";
    }

    // Vai pra pagina de formulario
    public function criar() 
    {
        require __DIR__ . "/Views/formulario.php";
    }

    // Vai pra pagina de listagem
    public function salvar() 
    {
        // Salva no banco de dados
        // Precisa dos dados do input de criar item
    }

    // Vai pra pagina de listagem
    public function editar() 
    {
        // Salva o item editado no banco de dados
        // Precisa do id do input de salvar item
    }


    // ? Vai pra pagina de listagem
    public function atualizar() 
    {
        // atualiza no banco de dados
        // precisa do id da pagina do formulario
        // ou o do input de salvar item
    }

    // Vai pra pagina de listagem
    public function deletar() 
    {
        // Deleta o item do banco de dados
        // Precisa do id do input deletar
    }


    // Vai pra pagina de listagem (id-busca)
    // Buscar???

    // Imprimi item especifico
    // Precisa do id do input buscar

}
