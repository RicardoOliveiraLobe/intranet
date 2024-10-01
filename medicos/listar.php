<?php
include '../conexao.php';

$sql = "SELECT * FROM Medicos";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nome</th><th>Especialidade</th><th>CRM</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["especialidade"]. "</td><td>" . $row["crm"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 resultados</td></tr>";
}
echo "</table>";

$conn->close();
?>