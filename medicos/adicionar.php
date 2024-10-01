<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];
    $crm = $_POST['crm'];

    $sql = "INSERT INTO Medicos (nome, especialidade, crm) VALUES ('$nome', '$especialidade', '$crm')";

    if ($conn->query($sql) === TRUE) {
        echo "Médico adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post">
    Nome: <input type="text" name="nome" required>
    Especialidade: <input type="text" name="especialidade" required>
    CRM: <input type="text" name="crm" required>
    <input type="submit" value="Adicionar Médico">
</form>