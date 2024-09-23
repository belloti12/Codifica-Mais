<?php 

namespace App;
use PDO;
use PDOException;

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
        // A página de formulário se adequá caso seja um edição ou uma criação, se o produto for null temos uma pagina de criação
        $produto = null;

        require __DIR__ . "/Views/formulario.php";
    }

    // Método que busca itens com um nome especificado 
    public function buscar($nome) : array
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

    // Salva o produto enviado da página de formulário (criar)
    public function salvar()  : void
    {
        $dados = $_POST;

        // Verifica os campos que o usuario tem controle
        $skuVerificar = (strlen($dados['sku']) <= 16) ? true : false;
        $nomeVerificar = (strlen($dados['nome']) <= 255) ? true : false;
        $valorVerificar = (is_numeric($dados['valor'])) && ($dados['valor'] >= 0);

        if ($skuVerificar == false) {
            echo "ERRO!!!, SKU ultrapassa o limite de 16 digitos" . "<br>";
            echo "SKU inserida: {$dados['sku']} -> " . strlen($dados['sku']) . " digitos" . "<br>";
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . "<br>";
        }
        if ($nomeVerificar == false) {
            echo "ERRO!!!, Nome ultrapassa o limite de 255 digitos" . "<br>";
            echo "Nome inserido: {$dados['nome']} -> " . strlen($dados['nome']) . " digitos" . "<br>";
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . "<br>";
        }
        if ($valorVerificar == false) {
            echo "ERRO!!!, Valor invalido! Deve ser passado um numero positivo" . "<br>";
            echo "Valor inserido: {$dados['valor']}" . "<br>";
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . "<br>";
        }

        // Adiciona os dados do novo produto
        $sql = "INSERT INTO tb_produtos (sku, nome, valor, categoria_id, quantidade, unidade_medida_id) VALUES (:sku, :nome, :valor, :categoria_id, :quantidade, :unidade_medida_id);";
        $sttm = $this->pdo->prepare($sql);      
        $sttm->bindValue(":sku", $dados['sku']);
        $sttm->bindValue(":nome", $dados['nome']);
        $sttm->bindValue(":valor", $dados['valor']);
        $sttm->bindValue(":categoria_id", $dados['categoria_id']);
        $sttm->bindValue(":quantidade", $dados['quantidade']);
        $sttm->bindValue(":unidade_medida_id", $dados['unidade_medida_id']);
        try {
            $sttm->execute();
        }
        catch (PDOException $e) {
            error_log("Erro de banco de dados: " . $e->getMessage());
            echo "Erro ao criar o produto.";
            return; 
        }

        // Retorna para a página de listagem
        header('location: /');
    }

    // Método que vai pra pagina de formulário para editar um produto
    public function editar($id)  : void
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        // Pega os dados do produto será atualizado
        $sql = "SELECT a.id, a.sku, a.nome, a.valor, a.categoria_id, b.cor, a.quantidade, a.unidade_medida_id FROM tb_produtos a INNER JOIN tb_categorias b ON a.categoria_id = b.id WHERE a.id = $id;";        
        $sttm = $this->pdo->query($sql);
        $sttm->bindValue(':id', $id);
        $produto = $sttm->fetch(PDO::FETCH_ASSOC);

        require __DIR__ . "/Views/formulario.php";
    }

    // Atualiza produto enviado da página de formulário (editar)
    public function atualizar($id)  : void
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        $dados = $_POST;

        // Verifica os campos que o usuario tem controle
        $skuVerificar = (strlen($dados['sku']) <= 16) ? true : false;
        $nomeVerificar = (strlen($dados['nome']) <= 255) ? true : false;
        $valorVerificar = (is_numeric($dados['valor'])) && ($dados['valor'] >= 0);

        if ($skuVerificar == false) {
            echo "ERRO!!!, SKU ultrapassa o limite de 16 digitos" . "<br>";
            echo "SKU inserida: {$dados['sku']} -> " . strlen($dados['sku']) . " digitos" . "<br>";
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . "<br>";
        }
        if ($nomeVerificar == false) {
            echo "ERRO!!!, Nome ultrapassa o limite de 255 digitos" . "<br>";
            echo "Nome inserido: {$dados['nome']} -> " . strlen($dados['nome']) . " digitos" . "<br>";
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . "<br>";
        }
        if ($valorVerificar == false) {
            echo "ERRO!!!, Valor invalido! Deve ser passado um numero positivo" . "<br>";
            echo "Valor inserido: {$dados['valor']}" . "<br>";
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . "<br>";
        }

        // Adiciona os dados do novo produto
        $sql = "UPDATE tb_produtos SET sku = :sku, nome = :nome, valor = :valor, categoria_id = :categoria_id, quantidade = :quantidade, unidade_medida_id = :unidade_medida_id WHERE id = :id;";
        $sttm = $this->pdo->prepare($sql);
        $sttm->bindValue(":sku", $dados['sku']);
        $sttm->bindValue(":nome", $dados['nome']);
        $sttm->bindValue(":valor", $dados['valor']);
        $sttm->bindValue(":categoria_id", $dados['categoria_id']);
        $sttm->bindValue(":quantidade", $dados['quantidade']);
        $sttm->bindValue(":unidade_medida_id", $dados['unidade_medida_id']);
        $sttm->bindValue(":id", $id);

        try {
            $sttm->execute();
        }
        catch (PDOException $e) {
            error_log("Erro de banco de dados: " . $e->getMessage());
            echo "Erro ao atualizar o produto.";
            return; 
        }

        // Redireciona o usuário para a URL que ele estava na página de listagem (para o caso de termos "buscas ativas")
        header("location: {$_POST['url']}");
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
        try {
            $sttm->execute();
        }
        catch (PDOException $e) {
            error_log("Erro de banco de dados: " . $e->getMessage());
            echo "Erro ao deletar o produto.";
            return; 
        }

        // Redireciona o usuário para a URL que ele estava na página de listagem (para o caso de termos "buscas ativas")
        header("location: {$_POST['url']}");
    }

    // Método que redireciona o usuário à página de configuração
    public function config() : void
    {
        // Puxa a cor das categorias
        $sql = "SELECT cor FROM tb_categorias ORDER BY id;";
        $sttm = $this->pdo->query($sql);
        $cores = $sttm->fetchAll(PDO::FETCH_COLUMN);

        // Puxa o nome das categorias
        $sql = "SELECT nome FROM tb_categorias ORDER BY id;";
        $sttm = $this->pdo->query($sql);
        $nomes = $sttm->fetchAll(PDO::FETCH_COLUMN);

        // Array com paletas ja definidas
        $paletas = [
            // Standard
            [
                '#f8f877',
                '#f08080',
                '#C4A484',
                '#90EE90',
                '#add8e6',
                '#d3d3d3'
            ],
            // Gyro
            [
                '#F0E9CD',
                '#E4CBAD',  
                '#D2BC8B',
                '#C7E464', 
                '#80B367', 
                '#635087'
            ],
            // Johnny
            [
                '#F3CEBB', 
                '#D1C573', // #FCD3A7
                '#E27B3F', 
                '#82C5DF', 
                '#AEE1FF', 
                '#A084D1'
            ],
            // Lucy
            [
                '#F3C8A6',
                '#D2C5A2',
                '#2743A6',
                '#F2AAB5',
                '#D16F7F',
                '#C43550' 
            ],
            // Funny Valentine
            [
                '#F4C3AD', 
                '#F9ECA3', 
                '#123E8A', 
                '#FFFFFF', 
                '#E796BF', 
                '#A55EAE'  
            ],
            // Current
            [
                "$cores[0]",
                "$cores[1]",
                "$cores[2]",
                "$cores[3]",
                "$cores[4]",
                "$cores[5]"
            ]
        ];

        require __DIR__ . "/Views/configuracao.php";
    }

    // Método para atualizar as novas cores das categorias
    public function atualizarBanco() : void
    {
        // Caso o usuário force uma atualização direto da URL, sem passar pelo formulário (nesse caso o $_POST está vazio)
        if (empty($_POST)) {
            header("location: /");
            return;
        }

        $cores = $_POST;

        $paletaEscolhida = $cores['escolha'];

        $paleta = [];

        // O $_POST vem com todas as cores, por isso é preciso fazer uma filtragem nas cores da paleta que o usuário escolheu
        foreach ($cores as $key => $cor) {
            if (str_contains($key, "paleta$paletaEscolhida")) {
                $paleta[] = $cor;
            }
        }

        // Puxa o nome das categorias para automatizar o processo de UPDATE
        $sql = "SELECT nome FROM tb_categorias ORDER BY id;";
        $sttm = $this->pdo->query($sql);
        $nomes = $sttm->fetchAll(PDO::FETCH_COLUMN);

        // Faz o UPDATE de cada categoria com o incide correspondente
        for ($i = 0; $i < count($nomes); $i += 1) {
            $sql = "UPDATE tb_categorias SET cor = :cor WHERE nome = :nome;";
            $sttm = $this->pdo->prepare($sql);
            $sttm->bindValue(':cor', "$paleta[$i]");
            $sttm->bindValue(':nome', "$nomes[$i]");
            try {
                $sttm->execute();
            }
            catch (PDOException $e) {
                error_log("Erro de banco de dados: " . $e->getMessage());
                echo "Erro ao deletar o produto.";
                return; 
            }
        }

        header("location: /");
    }
}
