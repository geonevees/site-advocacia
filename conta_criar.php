<?php
// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "advocacia");

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_oab = $_POST['numero_oab'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $sql = "INSERT INTO Conta (Numero_OAB, Nome_completo, Email, CPF) VALUES ('$numero_oab', '$nome_completo', '$email', '$cpf')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Conta cadastrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<form method="POST">
    Número OAB: <input type="text" name="numero_oab" required><br>
    Nome Completo: <input type="text" name="nome_completo" required><br>
    Email: <input type="email" name="email" required><br>
    CPF: <input type="text" name="cpf" required><br>
    <input type="submit" value="Cadastrar Conta">
</form>
