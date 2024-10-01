<?php
include '../conexao.php';

$sql = "SELECT i.id, p.nome as paciente, i.data_internacao, i.data_alta, i.motivo 
        FROM Internacoes i 
        JOIN Pacientes p ON i.paciente_id = p.id";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Paciente</th><th>Data de Internação</th><th>Data de Alta</th><th>Motivo</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["paciente"]. "</td><td>" . $row["data_internacao"]. "</td><td>" . $row["data_alta"]. "</td><td>" . $row["motivo"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 resultados</td></tr>";
}
echo "</table>";

$conn->close();
?>