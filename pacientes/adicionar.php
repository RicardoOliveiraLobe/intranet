<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO Pacientes (nome, data_nascimento, cpf, telefone, endereco) VALUES ('$nome', '$data_nascimento', '$cpf', '$telefone', '$endereco')";

    if ($conn->query($sql) === TRUE) {
        echo "Paciente adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post">
    Nome: <input type="text" name="nome" required>
    Data de Nascimento: <input type="date" name="data_nascimento" required>
    CPF: <input type="text" name="cpf" required>
    Telefone: <input type="text" name="telefone">
    Endereço: <input type="text" name="endereco">
    <input type="submit" value="Adicionar Paciente">
</form>