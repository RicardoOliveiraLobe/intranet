<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $conn->real_escape_string($_POST['paciente_id']);
    $data_internacao = $conn->real_escape_string($_POST['data_internacao']);
    $data_alta = $conn->real_escape_string($_POST['data_alta']);
    $motivo = $conn->real_escape_string($_POST['motivo']);

    $sql = "INSERT INTO Internacoes (paciente_id, data_internacao, data_alta, motivo) VALUES ('$paciente_id', '$data_internacao', '$data_alta', '$motivo')";

    if ($conn->query($sql) === TRUE) {
        echo "Internação registrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$pacientes = $conn->query("SELECT id, nome FROM Pacientes");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Internação</title>
    <link rel="stylesheet" href="../style.css"> <!-- Link para o CSS -->
</head>
<body>

<h1>Registrar Internação</h1>

<form method="post">
    <label for="paciente_id">Paciente:</label>
    <select name="paciente_id" id="paciente_id" required>
        <?php while($row = $pacientes->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>
    
    <label for="data_internacao">Data de Internação:</label>
    <input type="datetime-local" name="data_internacao" id="data_internacao" required>
    
    <label for="data_alta">Data de Alta:</label>
    <input type="datetime-local" name="data_alta" id="data_alta">
    
    <label for="motivo">Motivo:</label>
    <textarea name="motivo" id="motivo" required></textarea>
    
    <input type="submit" value="Registrar Internação">
</form>

</body>
</html>

<?php
$conn->close(); // Fechar a conexão ao final
?>