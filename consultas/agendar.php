<?php
include '../conexao.php';

$pacientes = $conn->query("SELECT id, nome FROM Pacientes");
$medicos = $conn->query("SELECT id, nome FROM Medicos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $_POST['paciente_id'];
    $medico_id = $_POST['medico_id'];
    $data_hora = $_POST['data_hora'];
    $status = $_POST['status'];

    $sql = "INSERT INTO Consultas (paciente_id, medico_id, data_hora, status) VALUES ('$paciente_id', '$medico_id', '$data_hora', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Consulta agendada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post">
    Paciente:
    <select name="paciente_id" required>
        <?php while($row = $pacientes->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>
    Médico:
    <select name="medico_id" required>
        <?php while($row = $medicos->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>
    Data e Hora: <input type="datetime-local" name="data_hora" required>
    Status:
    <select name="status" required>
        <option value="agendada">Agendada</option>
        <option value="realizada">Realizada</option>
        <option value="cancelada">Cancelada</option>
    </select>
    <input type="submit" value="Agendar Consulta">
</form>