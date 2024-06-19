<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultório</title>
</head>

<body>
    <header>

        <h1>Consultório Dr. Jefinho</h1>

        <div class="botao">
            <a href="index.php"><button>Início</button></a>
        </div>

    </header>
    <main class="main2">
        <h2>Cadastro de cliente</h2><br>

        <form action="cliente.php" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required>
            <br><br>

            <label for="ano">Ano Nascimento: </label>
            <input type="number" id="ano" name="ano" maxlength="4" required>
            <br><br>

            <label for="peso">Peso: </label>
            <input type="number" id="peso" name="peso" maxlength="5" step="0.01" required>
            <br><br>

            <label for="altura">Altura: </label>
            <input type="number" id="altura" name="altura" maxlength="5" step="0.01" required>
            <br><br>

            <button class="buttonForm" role="buttonForm" type="submit"><span class="text">Imprimir</span></button>
            <button class="buttonForm" role="buttonForm" type="submit"><span class="text">Limpar</span></button>
           
        </form>
        <div class="resposta">
            <?php

            require './Consultorio.php';

            $cliente = new Consultorio();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['nome']) && isset($_POST['ano']) && isset($_POST['peso']) && isset($_POST['altura'])) {
                    $nome = $_POST['nome'];
                    $peso = $_POST['peso'];
                    $ano = $_POST['ano'];
                    $altura = $_POST['altura'];

                    $erro =  empty($nome) || empty($peso) || empty($ano) || empty($altura) ? "Preencha todos os  campos!" : ((!is_numeric($peso) || (!is_numeric($altura)) || (!is_numeric($ano)) || $peso <= 0 || $ano <= 1920 || $ano > 2024 || $altura <= 0) ? "Insira valores válido" : "");
                    if ($erro) {
                        echo $erro;
                    } else {
                        $cliente->setNome($nome);
                        $cliente->setAno($ano);
                        $cliente->setPeso($peso);
                        $cliente->setAltura($altura);

                        $cliente->calcularIdade($ano);
                        $cliente->calcularIMC($peso, $altura);

                        $cliente->imprimirResult();
                    }
                } else {
                    echo "Formulário não enviado corretamente";
                }
            }
            ?>
        </div>


    </main>
    
</body>

</html>