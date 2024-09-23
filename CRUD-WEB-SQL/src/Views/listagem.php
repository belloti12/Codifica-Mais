<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <link rel="stylesheet" href="\css\style.css">
    <link rel="icon" href="\img\listagem.ico" type="image/x-icon"/>
</head>
<body>
    <header>
        <nav class="nav">
            <a href="/">Listagem</a>
            <a href="/produtos/criar">Adicionar</a>
            <a class="nav__config" href="/config"><img  src="\img\config.ico" /></a>
        </nav>
    </header>
    <main class="main">
        <div class="main__funcoes">
            <a class="botao geral" href="produtos/criar">Novo item</a>
            <form class="funcoes__buscar" action="">
                <label for="">Buscar Item</label>
                <input class="input" type="search" name="id-busca">
            </form>
        </div>
        <div class="main__lista">
            <?php
                // Se não houver produtos, não faz sentido uma busca, então é informado ao usuário que a lista está vazia
                // O array de $produtos vai estar vazio, então o foreach também não ira imprimir nenhum produto
                if (empty($produtos)) {
                    echo 'Lista vazia';
                }

                foreach ($produtos as $produto):
            ?>
            <section class="lista__item">
                <div class="item__dados">
                    <div class="dados__esquerda"> 
                        <div class="esquerda__info">
                            <span class="esquerda__id">#<?php echo sprintf('%05d', $produto['id'])?> </span>
                            <span class="esquerda__categoria" style= <?= "background-color:" . $produto['cor'] ?> > <?= $produto['categoria'] ?></span>
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
