<?php 

namespace App;
use PDO;

class Controller 
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Método que vai pra pagina de listagem listar os produtos
    public function listar() : void
    {
        $sql = "SELECT a.id, a.sku, a.nome, a.valor, b.nome as categoria, b.cor, a.quantidade, c.nome as unidade_medida FROM tb_produtos a 
        INNER JOIN tb_categorias b ON a.categoria_id = b.id 
        INNER JOIN tb_unidades_medida c ON a.unidade_medida_id = c.id
        ORDER BY a.id;";
        $produtos = $this->pdo->query($sql);
        $produtos = $produtos->fetchAll(PDO::FETCH_ASSOC);        

        // Caso o ID de busca exista na URL, então verificamos quais produtos contem o nome que o usuário informou na busca
        if (isset($_GET['id-busca'])){
            $produtos = self::buscar($_GET['id-busca']);
        }

        require __DIR__ . "/Views/listagem.php";
    }

    // Método que vai pra pagina de formulário para criar um produto
    public function criar()  : void
    {
        // A página de formulário se adequá caso seja um edição ou uma criação, por isso a variável editar recendo false, já que o método criar() irá criar um item e não edita-lo
        $editar = false;

        require __DIR__ . "/Views/formulario.php";
    }

    // Método que vai pra pagina de formulário para editar um produto
    public function editar($id)  : void
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        // Como no método de criar(), temos a variável editar para indicar o objetivo da página, no caso, editar um produto
        $editar = true;
        
        // Pega o produto do ID que será atualizado
        $sql = "SELECT a.id, a.sku, a.nome, a.valor, a.categoria_id, b.cor, a.quantidade, a.unidade_medida_id FROM tb_produtos a INNER JOIN tb_categorias b ON a.categoria_id = b.id WHERE a.id = $id;";        
        $sttm = $this->pdo->query($sql);
        $sttm->bindValue(':id', $id);
        $produto = $sttm->fetch(PDO::FETCH_ASSOC);

        require __DIR__ . "/Views/formulario.php";
    }

    // Salva o produto enviado da página de formulário (criar)
    public function salvar()  : void
    {
        // Coloca um array com o ID e chave 'id' no array recebido (o que possui os dados do formulário)
        // $dados = array_merge(['id' => (int) $id], $_POST);
        // $dados['quantidade'] = (int) ($dados['quantidade']);
        $dados = $_POST;

        // Adiciona os dados do novo produto
        $sql = "INSERT INTO tb_produtos (sku, nome, valor, categoria_id, quantidade, unidade_medida_id) VALUES (:sku, :nome, :valor, :categoria_id, :quantidade, :unidade_medida_id);";
        $sttm = $this->pdo->prepare($sql);
        $sttm->bindValue(":sku", $dados['sku']);
        $sttm->bindValue(":nome", $dados['nome']);
        $sttm->bindValue(":valor", $dados['valor']);
        $sttm->bindValue(":categoria_id", $dados['categoria_id']);
        $sttm->bindValue(":quantidade", $dados['quantidade']);
        $sttm->bindValue(":unidade_medida_id", $dados['unidade_medida_id']);

        // Retorna para a página de listagem
        header('location: /');

        # INSERT
    }

    // Atualiza produto enviado da página de formulário (editar)
    public function atualizar($id)  : void
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
    public function deletar($id)  : void
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        $sql = "DELETE FROM tb_produtos WHERE id = :id";
        $sttm = $this->pdo->prepare($sql);
        $sttm->bindValue(':id', $id);
        $sttm->execute();

        // Redireciona o usuário para a URL que ele estava na página de listagem (para o caso de termos "buscas ativas")
        header("location: {$_POST['url']}");
    }

    public function buscar($nome) 
    {
        $sql = "SELECT a.id, a.sku, a.nome, a.valor, b.nome as categoria, b.cor, a.quantidade, c.nome as unidade_medida 
        FROM tb_produtos a 
        INNER JOIN tb_categorias b ON a.categoria_id = b.id 
        INNER JOIN tb_unidades_medida c ON a.unidade_medida_id = c.id
        WHERE a.nome LIKE '%{$nome}%'
        ORDER BY a.id;";
        $produtos = $this->pdo->query($sql);
        $produtos = $produtos->fetchAll(PDO::FETCH_ASSOC);
        return $produtos;
    } 
}
