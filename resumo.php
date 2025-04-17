<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrições Realizadas</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Alinhar o conteúdo do topo */
            min-height: 100vh;
            margin: 0;
            padding-top: 20px; /* Espaço superior para o título */
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .inscription-item {
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .inscription-item strong {
            font-weight: bold;
            color: #555;
        }

        .no-results {
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inscrições Realizadas:</h1>
        <?php
            // Definição das credenciais do banco de dados
            $host = 'localhost'; // Ou o endereço do servidor MariaDB
            $usuario = 'letty493';
            $senha = 'root123';
            $banco = 'inscricao';

            // Criar uma nova conexão com o banco de dados MySQLi
            $conexao = new mysqli($host, $usuario, $senha, $banco);

            // Verificar se houve erro na conexão
            if ($conexao->connect_error) {
                echo "<p class='error'>Erro na conexão com o banco de dados: " . $conexao->connect_error . "</p>";
            } else {
                $sql = "SELECT id, nome, cpf, celular, email FROM pessoa";
                $resultado = $conexao->query($sql);

                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<div class='inscription-item'>";
                            echo "<p><strong>ID:</strong> " . htmlspecialchars($linha["id"]) . "</p>";
                            echo "<p><strong>Nome:</strong> " . htmlspecialchars($linha["nome"]) . "</p>";
                            echo "<p><strong>CPF:</strong> " . htmlspecialchars($linha["cpf"]) . "</p>";
                            echo "<p><strong>Celular:</strong> " . htmlspecialchars($linha["celular"]) . "</p>";
                            echo "<p><strong>Email:</strong> " . htmlspecialchars($linha["email"]) . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='no-results'>Nenhum resultado encontrado.</p>";
                    }
                    $resultado->free(); // Liberar a memória do resultado
                } else {
                    echo "<p class='error'>Erro na consulta: " . $conexao->error . "</p>";
                }

                $conexao->close();
            }
        ?>
    </div>
    
    <div class="back-button-container">
        <a href="index.php" class="back-button">Voltar</a>
    </div>
</body>
</html>
