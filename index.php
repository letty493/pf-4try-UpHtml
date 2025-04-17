<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Final</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #0056b3;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulário de Inscrição</h1>
        <form method="POST">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="Nome" required>
            </div>
            <div>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="CPF" required pattern="[0-9]{11}" title="Digite um CPF válido com 11 dígitos">
            </div>
            <div>
                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="Celular" required pattern="[0-9]{10,11}" title="Digite um número de celular válido com 10 ou 11 dígitos">
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="Email" required>
            </div>
            <div class="button-container">
                <input type="submit" name="botao" value="Enviar Dados">
                <a href="resumo.php">
                    <input type="button" name="Botao2" value="Ver Inscrições">
                </a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
	if(isset($_POST["botao"])){
		
		$host = 'localhost'; // Ou o endereço do servidor MariaDB
		$usuario = 'letty493';
		$senha = 'root123';
		$banco = 'inscricao';

		$conexao = new mysqli($host, $usuario, $senha, $banco);

		// Verificar se houve erro na conexão
		if ($conexao->connect_error) {
			die("Erro na conexão: " . $conexao->connect_error);
		}

		// ... (código para inserir) ...

		$nome = $_POST["Nome"];
		$cpf = $_POST["CPF"];
		$celular = $_POST["Celular"];
		$email = $_POST["Email"];
		
		$sql = "INSERT INTO pessoa (nome, cpf, celular, email) VALUES ('$nome','$cpf','$celular','$email')";

		if ($conexao->query($sql) === TRUE) {
			echo "<script>alert('Inscrição realizada com sucesso.');</script>";
		} else {
			echo "Erro ao inserir registro: " . $conexao->error;
		}

		$conexao->close();
	}
?>