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
    </style>
</head>
<body>
    <h2>Listagem de Cadastros</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        
        <?php
        $conexao = new mysqli('localhost', 'root', '', 'formulario');

        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }

        // Consulta para listar os cadastros
        $consulta = "SELECT * FROM usuario";
        $resultado = $conexao->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo '<td>
                    <a class="edit-button" href="editar.php?id=' . $row["id"] . '">Editar</a>
                    <a class="delete-button" href="excluir.php?id=' . $row["id"] . '">Excluir</a>
                </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum cadastro encontrado.</td></tr>";
        }

        $conexao->close();
        ?>
    </table>
</body>
</html>
