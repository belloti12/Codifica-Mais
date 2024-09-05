<?php
// session_start();
$caminho_path = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : '/';
$caminho_query = (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : '';

if (str_contains($caminho_query, "id-editar")) {

    $id = $_GET['id-editar'];
    // var_dump($id);

    $key_produto = array_search($id, array_column($_SESSION['produtos'], 'id'));
    $produto = $_SESSION['produtos'][$key_produto];
    // var_dump($produto['categoria_id']);
    // var_dump(($produto['categoria_id'] == '2') ? "selected" : '');


    $categoria = match ($produto['categoria_id']) {
        '1' => ['Eletrônicos', '#f8f877'],
        '2' => ['Eletrodomésticos', 'lightcoral'],
        '3' => ['Móveis', '#C4A484'],
        '4' => ['Decoração', 'lightgreen'],
        '5' => ['Vestuário', 'lightblue'],
        '6' => ['Outros', 'lightgrey']
    };
};

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - <?= (str_contains($caminho_query, "id-editar")) ? "Editar" : "Criar"?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Listagem</a>
            <a href="/formulario">Adicionar</a>
        </nav>
    </header>
    <main class="main">
        <h1><?= (str_contains($caminho_query, "id-editar")) ? "Editar Item" : "Novo Item"?></h1>
        <form class="main__form" action="">
            <div class="div nome">
                <label for="">Nome do Item</label>
                <input type="text" name="" id="" placeholder="Digite o Nome do Item" <?= (str_contains($caminho_query, "id-editar")) ? ("value='{$produto["nome"]}'") : ""?> required>
            </div>
            <div class="form__colunas">
                <div class=coluna>
                    <div class="div">
                        <label for="">SKU</label>
                        <input type="text" name="" id="" placeholder="Digite o SKU" <?= (str_contains($caminho_query, "id-editar")) ? "value={$produto['sku']}" : ""?> required>
                    </div>
                    <div class="div">
                        <label for="">Unidade de Medida</label>
                        <select name="" id="">
                            <option value="1" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '1') ? "selected" : '') : ""?>>Un</option>
                            <option value="2" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '2') ? "selected" : '') : ""?>>Kg</option>
                            <option value="3" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '3') ? "selected" : '') : ""?>>g</option>
                            <option value="4" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '4') ? "selected" : '') : ""?>>L</option>
                            <option value="5" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '5') ? "selected" : '') : ""?>>mm</option>
                            <option value="6" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '6') ? "selected" : '') : ""?>>cm</option>
                            <option value="7" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '7') ? "selected" : '') : ""?>>m</option>
                            <option value="8" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['unidade_medida_id'] == '8') ? "selected" : '') : ""?>>m²</option>
                        </select>
                    </div>
                    <div class="div">
                        <label for="">Categoria</label>
                        <select name="" id="" style="background:<?=$categoria[1]?>">
                            <option value="1" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['categoria_id'] == '1') ? "selected" : '') : ""?>>Eletrônicos</option>
                            <option value="2" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['categoria_id'] == '2') ? "selected" : '') : ""?>>Eletrodomésticos</option>
                            <option value="3" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['categoria_id'] == '3') ? "selected" : '') : ""?>>Móveis</option>
                            <option value="4" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['categoria_id'] == '4') ? "selected" : '') : ""?>>Decoração</option> 
                            <option value="5" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['categoria_id'] == '5') ? "selected" : '') : ""?>>Vestuário</option>
                            <option value="6" <?= (str_contains($caminho_query, "id-editar")) ? (($produto['categoria_id'] == '6') ? "selected" : '') : ""?>>Outros</option>
                        </select>
                    </div>
                </div>
                <div class="coluna">
                    <div class="div">
                        <label for="">Valor</label>
                        <input type="text" name="" id="" placeholder="0.00" <?= (str_contains($caminho_query, "id-editar")) ? "value={$produto['valor']}" : ""?> required>
                    </div>
                    <div class="div">
                        <label for="">Quantidade</label>
                        <input type="number" name="" id="" min=0 placeholder="Digite a Quantidade" <?= (str_contains($caminho_query, "id-editar")) ? "value={$produto['quantidade']}" : ""?> required>                
                    </div>
                </div>
            </div>
            <button type="submit" class="botao geral"> <?= (str_contains($caminho_query, "id-editar")) ? "Salvar Item" : "Criar Item"?></button>
        </form>
    </main>
</body>
</html>
