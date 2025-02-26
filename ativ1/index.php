<?php
    // ATIVIDADE 1
    function substituirVogais($texto) {
        return preg_replace('/[aeiouAEIOU]/', '*', $texto);
    }

    // ATIVIDADE 2
    function ehPrimo($numero) {
        if ($numero < 2) return false;
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) return false;
        }
        return true;
    }

    // ATIVIDADE 3
    function inverterString($texto) {
        $invertida = "";
        for ($i = strlen($texto) - 1; $i >= 0; $i--) {
            $invertida .= $texto[$i];
        }
        return $invertida;
    }

    // ATIVIDADE 4
    function verificarNumero($numero) {
        return ($numero > 0) ? "positivo" : (($numero < 0) ? "negativo" : "zero");
    }

    // ATIVIDADE 5
    function contarPalavras($texto) {
        return array_filter(explode(" ", trim($texto)));
    }

    // ATIVIDADE 6
    function ehPalindromo($palavra) {
        $palavra = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $palavra));
        $invertida = "";
        for ($i = strlen($palavra) - 1; $i >= 0; $i--) {
            $invertida .= $palavra[$i];
        }
        return $palavra === $invertida;
    }

    // ATIVIDADE 7
    function substituirMultiplosDeTres() {
        for ($i = 1; $i <= 20; $i++) {
            echo ($i % 3 == 0) ? "X " : "$i ";
        }
    }

    // ATIVIDADE 8
    function removerEspacos($texto) {
        return str_replace(' ', '', $texto);
    }

    // ATIVIDADE 9
    function fibonacci($termos) {
        $sequencia = [0, 1];
        for ($i = 2; $i < $termos; $i++) {
            $sequencia[] = $sequencia[$i - 1] + $sequencia[$i - 2];
        }
        return $sequencia;
    }

    // ATIVIDADE 10
    function ehPangrama($texto) {
        $texto = strtolower(preg_replace('/[^a-z]/', '', strtr($texto, "áàãâéêíóõôú", "aaaaeeiooou")));
        return count(array_unique(str_split($texto))) == 26;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $texto = $_POST["texto"] ?? '';
        $numero = $_POST["numero"] ?? '';
        $palavra = $_POST["palavra"] ?? '';
        
        $textoModificado = substituirVogais($texto); // ATIVIDADE 1
        $resultadoPrimo = is_numeric($numero) ? (ehPrimo($numero) ? "é um número primo" : "não é um número primo") : ''; // ATIVIDADE 2
        $textoInvertido = inverterString($texto); // ATIVIDADE 3
        $resultadoNumero = is_numeric($numero) ? verificarNumero($numero) : ''; // ATIVIDADE 4
        $palavras = contarPalavras($texto); // ATIVIDADE 5
        $quantidadePalavras = count($palavras); // ATIVIDADE 6
        $resultadoPalindromo = $palavra ? (ehPalindromo($palavra) ? "é um palíndromo" : "não é um palíndromo") : ''; // ATIVIDADE 7
        $textoSemEspacos = removerEspacos($texto); // ATIVIDADE 8
        $resultadoPangrama = ehPangrama($texto) ? "é um pangrama" : "não é um pangrama"; // ATIVIDADE 9
        $sequenciaFibonacci = fibonacci(10); // ATIVIDADE 10
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades PHP</title>
</head>
<body>
    <form method="post">
        <label>Digite um texto:</label>
        <input type="text" name="texto" required>
        <br>
        <label>Digite um número:</label>
        <input type="number" name="numero" step="any">
        <br>
        <label>Digite uma palavra:</label>
        <input type="text" name="palavra">
        <br>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados:</h3>
        <p><strong>Atividade 1:</strong> Frase com vogais substituídas: <?php echo $textoModificado; ?></p>
        <p><strong>Atividade 2:</strong> O número <?php echo $numero; ?> <?php echo $resultadoPrimo; ?></p>
        <p><strong>Atividade 3:</strong> Frase invertida: <?php echo $textoInvertido; ?></p>
        <p><strong>Atividade 4:</strong> O número <?php echo $numero; ?> é <?php echo $resultadoNumero; ?></p>
        <p><strong>Atividade 5:</strong> Número de palavras: <?php echo $quantidadePalavras; ?></p>
        <p><strong>Atividade 5:</strong> Palavras: <?php echo implode(", ", $palavras); ?></p>
        <p><strong>Atividade 6:</strong> A palavra "<?php echo $palavra; ?>" <?php echo $resultadoPalindromo; ?></p>
        <p><strong>Atividade 7:</strong> Números de 1 a 20 (Múltiplos de 3 substituídos por "X"):</p>
        <p><?php substituirMultiplosDeTres(); ?></p>
        <p><strong>Atividade 8:</strong> Texto sem espaços: <?php echo $textoSemEspacos; ?></p>
        <p><strong>Atividade 9:</strong> Sequência de Fibonacci: <?php echo implode(", ", $sequenciaFibonacci); ?></p>
        <p><strong>Atividade 10:</strong> O texto "<?php echo $texto; ?>" <?php echo $resultadoPangrama; ?></p>
        
    <?php endif; ?>
</body>
</html>
