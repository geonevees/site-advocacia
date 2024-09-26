<?php
// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "advocacia");

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $turno_contato = $_POST['turno_contato'];
    $vara_processual = $_POST['vara_processual'];
    $descricao_processo = $_POST['descricao_processo'];

    $sql = "INSERT INTO Orçamento (Cpf, Nome_completo, Email, Telefone, Turno_contato, Vara_processual, Descricao_processo) VALUES ('$cpf', '$nome_completo', '$email', '$telefone', '$turno_contato', '$vara_processual', '$descricao_processo')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Orçamento cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<form method="POST">
    CPF: <input type="text" name="cpf" required><br>
    Nome Completo: <input type="text" name="nome_completo" required><br>
    Email: <input type="email" name="email" required><br>
    Telefone: <input type="text" name="telefone" required><br>
    Turno para Contato: <input type="text" name="turno_contato" required><br>
    Vara Processual: <input type="text" name="vara_processual" required><br>
    Descrição do Processo: <textarea name="descricao_processo" required></textarea><br>
    <input type="submit" value="Cadastrar Orçamento">
</form>
