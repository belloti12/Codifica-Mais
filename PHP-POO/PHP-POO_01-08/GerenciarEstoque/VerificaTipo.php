<?php

// Originalmente era um método exclusivo da classe Produto
// Separei ele em outro arquivo para poder utiliza-lo no arquivo de meno
abstract class VerificaTipo 
{
    // Método que verificada o tipo do dado inserido 
    public static function verificarTipo($dado, string $tipo, string $nomeDado)
    {
        // Se o dado precisar se uma string o programa só para quando o input deixar de ser uma string numérica
        if ($tipo == "string") {
            while (is_numeric($dado)) {
                $dado = trim(readline("O campo $nomeDado do produto deve estar em $tipo ! Tente novamente: "));
            }
        }
        else {
            // Se não o programa faz o contrario, parando só quando a string vira numérica
            while (is_numeric($dado) == false) {
                $dado = trim(readline("$nomeDado do produto deve estar em $tipo ! Tente novamente: "));
            }
            // Se o valor for em int, ele passa pra int
            if ($tipo == "int") {
                $dado = (int) $dado;
            }
        }
        return $dado;
    }
}
