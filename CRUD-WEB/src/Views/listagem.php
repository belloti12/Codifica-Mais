<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <link rel="stylesheet" href="\css\style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Listagem</a>
            <a href="produtos/criar">Adicionar</a>
        </nav>
    </header>
    <main class="main">
        <div class="main__funcoes">
            <a class="botao geral" href="produtos/criar">Novo item</a>
            <form class="funcoes__buscar" action="">
                <label for="">Buscar Item</label>
                <input type="search" name="id-busca">
            </form>
        </div>
        <div class="main__lista">
            <?php
                // Vai sair com o SQL
                # IFs prevalecem, o foreach da busca passa a ser um WHERE
                # A lista de produtos da SESSION passa a ser um SELECT (bem feito)

                $lista = [];

                // Se não houver produtos, não faz sentido uma busca, e é informado ao usuário que a lista está vazia
                if (empty($_SESSION['produtos'])) {echo 'Lista vazia';}
                // Caso o ID de busca exista na URL, então verificamos quais produtos contem o nome que o usuário informou na busca
                elseif (array_key_exists('id-busca', $_GET)) {
                    // O foreach faz essa busca em cada um dos items
                    foreach ($_SESSION['produtos'] as $produto) {
                        if (str_contains(mb_strtolower($produto['nome']), mb_strtolower($_GET['id-busca']))) {
                            $lista[] = $produto;
                        }
                    }
                }
                // Se o ID de busca não existir então o usuário esta na página de listagem normal e todos os produtos são listados
                else {
                    $lista = $_SESSION['produtos'];
                }

                foreach ($lista as $key => $produto):

                // Vai sair com o SQL
                $categoria = match ($produto['categoria_id']) {
                    '1' => ['Eletrônicos', '#f8f877'],
                    '2' => ['Eletrodomésticos', 'lightcoral'],
                    '3' => ['Móveis', '#C4A484'],
                    '4' => ['Decoração', 'lightgreen'],
                    '5' => ['Vestuário', 'lightblue'],
                    '6' => ['Outros', 'lightgrey']
                };
                
                // Vai sair com o SQL
                $unidade_de_medida = match ($produto['unidade_medida_id']) {
                    '1' => 'Un',
                    '2' => 'Kg',
                    '3' => 'g',
                    '4' => 'L',
                    '5' => 'mm',
                    '6' => 'cm',
                    '7' => 'm',
                    '8' => 'm²',
                };

                ?>
                <section class="lista__item">
                    <div class="item__dados">
                        <div class="dados__esquerda"> 
                            <div class="esquerda__info">
                                <span class="esquerda__id">#<?php echo sprintf('%05d', $produto['id'])?> </span>
                                <span class="esquerda__categoria" style= <?= "background-color:" . $categoria[1] ?> > <?= $categoria[0] ?></span>
                            </div>
                            <span class="esquerda__nome"><?= "{$produto['nome']}" ?></span>
                        </div>
                        <div class="dados__direita">
                            <span class="direita__sku">Sku: <?= "{$produto['sku']}" ?></span>
                            <span class="direita__quantidade">Quantidade: <?= "{$produto['quantidade']}"?></span>                    
                        </div>
                    </div>
                    <div class="item__funcoes">
                        <form class="botao funcoes__editar" action="produtos/editar?id-editar=<?= $produto['id']?>" method="post">
                            <input type='hidden' name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <button class='botao funcoes__botao' type='submit'>Editar</button>
                        </form>
                        <form class="botao funcoes__deletar" action="produtos/deletar?id-deletar=<?= $produto['id']?>" method="post">
                            <input type='hidden' name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <button class='botao funcoes__botao' type='submit'>Deletar</button>
                        </form>
                    </div>
                </section>
                <br>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
