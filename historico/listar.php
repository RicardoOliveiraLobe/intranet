<?php
include '../conexao.php';

$sql = "SELECT h.id, p.nome as paciente, h.descricao, h.data 
        FROM Historico_Medico h 
        JOIN Pacientes p ON h.paciente_id = p.id";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Paciente</th><th>Descrição</th><th>Data</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["paciente"]. "</td><td>" . $row["descricao"]. "</td><td>" . $row["data"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 resultados</td></tr>";
}
echo "</table>";

$conn->close();
?>