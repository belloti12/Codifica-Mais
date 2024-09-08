<?php 

namespace App;

class Controller 
{
    // Método que vai pra pagina de listagem listar os produtos
    public function listar() 
    {
        require __DIR__ . "/Views/listagem.php";
    }

    // Método que vai pra pagina de formulário para criar um produto
    public function criar() 
    {
        // A página de formulário se adequá caso seja um edição ou uma criação, por isso a variável editar recendo false, já que o método criar() irá criar um item e não edita-lo
        $editar = false;

        require __DIR__ . "/Views/formulario.php";
    }

    // Método que vai pra pagina de formulário para editar um produto
    public function editar($id) 
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        // Como no método de criar(), temos a variável editar para indicar o objetivo da página, no caso, editar um produto
        $editar = true;
        
        // Pega o produto do ID que será atualizado
        # Trocar por um SELECT com WHERE
        $produto = $_SESSION['produtos'][$id];
    
        // Vai sair com o SQL
        $categoria = match ($produto['categoria_id']) {
            '1' => ['Eletrônicos', '#f8f877'],
            '2' => ['Eletrodomésticos', 'lightcoral'],
            '3' => ['Móveis', '#C4A484'],
            '4' => ['Decoração', 'lightgreen'],
            '5' => ['Vestuário', 'lightblue'],
            '6' => ['Outros', 'lightgrey']
        };

        require __DIR__ . "/Views/formulario.php";
    }

    // Salva o produto enviado da página de formulário (criar)
    public function salvar() 
    {
        // Puxa o maior ID do array dos produtos, caso o array seja vazio (sem produtos) ele retorna 0
        $maior_id = empty($_SESSION['produtos']) ? 0 : max(array_column($_SESSION['produtos'], 'id'));
        $id = $maior_id + 1;

        // Coloca um array com o ID e chave 'id' no array recebido (o que possui os dados do formulário)
        $dados = array_merge(['id' => (int) $id], $_POST);
        $dados['quantidade'] = (int) ($dados['quantidade']);

        // Adiciona os dados do novo produto
        $_SESSION['produtos'][$id] = $dados;

        // Retorna para a página de listagem
        header('location: /');

        # INSERT
    }

    // Atualiza produto enviado da página de formulário (editar)
    public function atualizar($id) 
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        $dados = array_merge(['id' => (int) $id], $_POST);
        $dados['quantidade'] = (int) ($dados['quantidade']);
        array_pop($dados);

        $_SESSION['produtos'][$id] = $dados;

        // Redireciona o usuário para a URL que ele estava na página de listagem (para o caso de termos "buscas ativas")
        header("location: {$_POST['url']}");

        #UPDATE
    }

    // Vai pra pagina de listagem
    public function deletar($id) 
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        unset($_SESSION['produtos'][$id]);

        // Redireciona o usuário para a URL que ele estava na página de listagem (para o caso de termos "buscas ativas")
        header("location: {$_POST['url']}");

        #DELETE
    }
}
