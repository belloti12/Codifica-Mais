<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="\css\style.css">
    <link rel="icon" href="\img\config.ico" type="image/x-icon"/>
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
        <h1>Configurações</h1>
        <form class="main__form" action="/config/atualizar" method="post">
            <table class="form__tabela">
                <tr>
                    <th></th>
                    <?php for ($a = 0; $a < count($paletas); $a += 1): ?>
                        <th><input type="radio" name="escolha" value="<?=$a?>" <?= ($a == (count($paletas) - 1))  ? 'checked' : '' ?>></th>
                    <?php endfor; ?>
                </tr>
                <?php for ($l = 0; $l < count($nomes); $l += 1): ?>
                <tr style="background:<?=$cores[$l]?>">
                    <th><span><?=$nomes[$l]?></span></th>
                    <?php for ($c = 0; $c < count($paletas); $c += 1): ?>
                    <th><input class="tabela__cor" type="color" name="paleta<?=$c?>-cor<?=$l?>" value="<?=$paletas[$c][$l]?>"></th>
                    <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </table>
            <button type="submit" class="botao geral"> Salvar</button>
        </form>
    </main>
</body>
</html>
