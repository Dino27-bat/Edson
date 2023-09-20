<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Despesas - Editar</title>
    <link rel="stylesheet" href="estilos_menu.css">
    <link rel="stylesheet" href="estilos_formulario.css">
</head>
<body>
    <?php
        require "menu.php";

        echo "<h3>Editar Cadastro de Clientes</h3>";
        
        require "conexao.php";
        $Codigo_Cliente = $_REQUEST["Codigo_Cliente"];
        $sql = "SELECT * FROM contas WHERE Codigo_Cliente='$Codigo_Cliente'";
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        $linha = mysqli_fetch_array($resultado);

        $Codigo_Cliente = $linha["Codigo_Cliente"];
        $lancamento = $linha["lancamento"];
        $data = $linha["data"];
        $valor = $linha["valor"];
        $historico = $linha["historico"];

        echo "<form name='cadastro' method='post' action=''>";
            echo "<table align='center'>";
                echo "<tr>";
                    echo "<td><label for='Codigo_Cliente'>Codigo:</label></td>";
                    echo "<td><input type='number' name='Codigo_Cliente' size='4' maxlegth='4' value='$Codigo_Cliente' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='lancamento'>Lancamento:</label></td>";
                    echo "<td><input type='number' name='lancamento' size='4' maxlegth='4' value='$lancamento' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='data'>Data:</label></td>";
                    echo "<td><input type='date' name='data' value='$data' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='valor'>Valor:</label></td>";
                    echo "<td><input type='number' name='valor' size='14' maxlegth='14' value='$valor' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='historico'>Historico:</label></td>";
                    echo "<td><input type='text' name='historico' size='30' maxlegth='200' value='$historico' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan='2' align='center'><input type='submit' name='salvar' value='Salvar'></td>";
                echo "</tr>";
            echo "</table>";
        echo "</form>";

        if (isset($_POST["salvar"])) {
            $lancamento = $_POST["lancamento"];
            $data = $_POST["data"];
            $valor = $_POST["valor"];
            $historico = $_POST["historico"];

            require "conexao.php";
            $sql = "UPDATE clientes SET lancamento='$lancamento', data='$data', valor='$valor', historico='$historico' WHERE codigo='$Codigo_Cliente'";
            mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            echo "<script type =\"text/javascript\">alert('Conta editado com sucesso!');</script>";
            echo "<p align='center'><a href='home.php'>Voltar</a></p>";
        }
    ?>
</body>
</html>