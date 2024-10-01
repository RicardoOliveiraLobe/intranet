<?php
include '../conexao.php';

$sql = "SELECT c.id, p.nome as paciente, m.nome as medico, c.data_hora, c.status 
        FROM Consultas c 
        JOIN Pacientes p ON c.paciente_id = p.id 
        JOIN Medicos m ON c.medico_id = m.id";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Paciente</th><th>Médico</th><th>Data e Hora</th><th>Status</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["paciente"]. "</td><td>" . $row["medico"]. "</td><td>" . $row["data_hora"]. "</td><td>" . $row["status"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 resultados</td></tr>";
}
echo "</table>";

$conn->close();
?>