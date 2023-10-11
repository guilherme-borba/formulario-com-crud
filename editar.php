<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button, .delete-button {
            padding: 5px 10px;
            text-decoration: none;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .edit-button {
            background-color: #4CAF50;
        }

        .delete-button {
            background-color: #f44336;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            background-color: #008CBA;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        form {
            width: 60%;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px #ccc;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Editar Cadastro</h2>

    <?php
    // Verifica se o ID do usuário a ser editado foi fornecido
    if (isset($_GET['id'])) {
        // Conexão com o banco de dados
        $conexao = new mysqli('localhost', 'root', '', 'formulario');

        // Verifica a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }

        // Obtém o ID do usuário a ser editado
        $id = $_GET['id'];

        // Consulta para obter os dados do usuário
        $consulta = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $conexao->query($consulta);

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            // Exibe os campos do formulário para edição
            echo '<form action="atualizar.php" method="POST">';
            echo 'ID: <input type="text" name="id" value="' . $row["id"] . '" readonly><br>';
            echo 'Nome: <input type="text" name="nome" value="' . $row["nome"] . '"><br>';
            echo 'Telefone: <input type="text" name="telefone" value="' . $row["telefone"] . '"><br>';

            echo '<input type="submit" value="Salvar">';
            echo '</form>';
        } else {
            echo "Usuário não encontrado.";
        }

        $conexao->close();
    } else {
        echo "ID do usuário não fornecido.";
    }
    ?>
</body>
</html>
