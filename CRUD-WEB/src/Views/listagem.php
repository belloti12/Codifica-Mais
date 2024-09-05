<?php
// session_start();


?>

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
            <a href="/formulario">Adicionar</a>
        </nav>
    </header>
    <main class="main">
        <div class="main__funcoes">
            <a class="botao geral" href="/formulario">Novo item</a>
            <!-- <button class="botao geral">Novo item</button> -->
            <form class="funcoes__buscar" action="">
                <label for="">Buscar Item</label>
                <input type="search" name="id-busca">
            </form>
        </div>
        <div class="main__lista">
            <?php 
                foreach ($_SESSION['produtos'] as $key => $produto):


                // Sair primeira parte com MySQL
                $categoria = match ($produto['categoria_id']) {
                    '1' => ['Eletrônicos', '#f8f877'],
                    '2' => ['Eletrodomésticos', 'lightcoral'],
                    '3' => ['Móveis', '#C4A484'],
                    '4' => ['Decoração', 'lightgreen'],
                    '5' => ['Vestuário', 'lightblue'],
                    '6' => ['Outros', 'lightgrey']
                };
                
                // Sair com o MySQL
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
                                <span class="esquerda__id">#<?php echo sprintf('%05d', $key + 1)?> </span>
                                <span class="esquerda__categoria" style= <?= "background-color:" . $categoria[1] ?> > <?= $categoria[0] ?></span>
                            </div>
                            <span class="esquerda__nome"><?= $produto['nome'] ?></span>
                        </div>
                        <div class="dados__direita">
                            <span class="direita__sku">Sku: <?= $produto['sku'] ?></span>
                            <span class="direita__quantidade">Quantidade: <?= $produto['quantidade'] . ' ' . $unidade_de_medida ?></span>                    
                        </div>
                    </div>
                    <div class="item__funcoes">
                        <a class="botao funcoes__editar" href="/formulario?id-editar=<?= $produto['id']?>">Editar</a>
                        <!-- <a class="botao funcoes__editar" href="/editar?id-editar=<?= $produto['id']?>">Editar</a> -->
                        <button class="botao funcoes__deletar" onclick="">Deletar</button>
                    </div>
                </section>
                <br>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
