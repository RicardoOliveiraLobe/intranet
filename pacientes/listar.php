<?php
include '../conexao.php';

$sql = "SELECT * FROM Pacientes";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nome</th><th>Data de Nascimento</th><th>CPF</th><th>Telefone</th><th>Endereço</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["data_nascimento"]. "</td><td>" . $row["cpf"]. "</td><td>" . $row["telefone"]. "</td><td>" . $row["endereco"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>0 resultados</td></tr>";
}
echo "</table>";

$conn->close();
?>