<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - <?= $editar ? "Editar" : "Criar"?></title>
    <link rel="stylesheet" href="\css\style.css">
    <link rel="icon" href="\img\<?=$editar ? "editar.ico" : "criar.ico"?>" type="image/x-icon"/>
</head>
<body>
    <header>
        <nav>
            <a href="/">Listagem</a>
            <a href="/produtos/criar">Adicionar</a>
        </nav>
    </header>
    <main class="main">
        <h1><?= $editar ? "Editar Item" : "Novo Item"?></h1>
        <form class="main__form" action=<?= $editar ? "/produtos/atualizar?id-editar={$produto['id']}" : "/produtos/salvar"?> method="post">
            <div class="div nome">
                <label for="">Nome do Item</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o Nome do Item" <?= $editar ? ("value='{$produto["nome"]}'") : ""?> required>
            </div>
            <div class="form__colunas">
                <div class=coluna>
                    <div class="div">
                        <label for="">SKU</label>
                        <input type="text" name="sku" id="sku" placeholder="Digite o SKU" <?= $editar ? "value='{$produto['sku']}'" : ""?> required>
                    </div>
                    <div class="div">
                        <label for="">Unidade de Medida</label>
                        <select name="unidade_medida_id" id="unidade_medida_id">
                            <option value="1" <?= $editar ? (($produto['unidade_medida_id'] == '1') ? "selected" : '') : ""?>>Un</option>
                            <option value="2" <?= $editar ? (($produto['unidade_medida_id'] == '2') ? "selected" : '') : ""?>>Kg</option>
                            <option value="3" <?= $editar ? (($produto['unidade_medida_id'] == '3') ? "selected" : '') : ""?>>g</option>
                            <option value="4" <?= $editar ? (($produto['unidade_medida_id'] == '4') ? "selected" : '') : ""?>>L</option>
                            <option value="5" <?= $editar ? (($produto['unidade_medida_id'] == '5') ? "selected" : '') : ""?>>mm</option>
                            <option value="6" <?= $editar ? (($produto['unidade_medida_id'] == '6') ? "selected" : '') : ""?>>cm</option>
                            <option value="7" <?= $editar ? (($produto['unidade_medida_id'] == '7') ? "selected" : '') : ""?>>m</option>
                            <option value="8" <?= $editar ? (($produto['unidade_medida_id'] == '8') ? "selected" : '') : ""?>>m²</option>
                        </select>
                    </div>
                    <div class="div">
                        <label for="">Categoria</label>
                        <select name="categoria_id" id="categoria_id" style="background:<?= $editar ? $categoria[1] : ""?>">
                            <option value="1" <?= $editar ? (($produto['categoria_id'] == '1') ? "selected" : '') : ""?>>Eletrônicos</option>
                            <option value="2" <?= $editar ? (($produto['categoria_id'] == '2') ? "selected" : '') : ""?>>Eletrodomésticos</option>
                            <option value="3" <?= $editar ? (($produto['categoria_id'] == '3') ? "selected" : '') : ""?>>Móveis</option>
                            <option value="4" <?= $editar ? (($produto['categoria_id'] == '4') ? "selected" : '') : ""?>>Decoração</option> 
                            <option value="5" <?= $editar ? (($produto['categoria_id'] == '5') ? "selected" : '') : ""?>>Vestuário</option>
                            <option value="6" <?= $editar ? (($produto['categoria_id'] == '6') ? "selected" : '') : ""?>>Outros</option>
                        </select>
                    </div>
                </div>
                <div class="coluna">
                    <div class="div">
                        <label for="">Valor</label>
                        <input type="text" name="valor" id="valor" placeholder="0.00" <?= $editar ? "value='{$produto['valor']}'" : ""?> required>
                    </div>
                    <div class="div">
                        <label for="">Quantidade</label>
                        <input type="number" name="quantidade" id="quantidade" min=0 placeholder="Digite a Quantidade" <?= $editar ? "value={$produto['quantidade']}" : ""?> required>                
                    </div>
                </div>
            </div>
            <!-- Se o usuário veio da pagina de listagem para a pagina de formulário, o programa pega a URL da pagina de listagem, podendo ser com busca ou não -->
            <!-- Caso o usuário tenha vindo para a pagina de formulário de uma pagina de formulário, a URL não existe, então o valor do input é '' -->
            <input type="hidden" name="url" value="<?= array_key_exists('url', $_POST) ? $_POST['url'] : '' ?>">
            <button type="submit" class="botao geral"> <?= $editar ? "Salvar Item" : "Criar Item"?></button>
        </form>
    </main>
</body>
</html>
