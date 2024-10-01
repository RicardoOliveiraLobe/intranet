<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $_POST['paciente_id'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];

    $sql = "INSERT INTO Historico_Medico (paciente_id, descricao, data) VALUES ('$paciente_id', '$descricao', '$data')";

    if ($conn->query($sql) === TRUE) {
        echo "Histórico médico adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$pacientes = $conn->query("SELECT id, nome FROM Pacientes");
?>

<form method="post">
    Paciente:
    <select name="paciente_id" required>
        <?php while($row = $pacientes->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>
    Descrição: <textarea name="descricao" required></textarea>
    Data: <input type="date" name="data" required>
    <input type="submit" value="Adicionar Histórico Médico">
</form>