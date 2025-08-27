<?php
header('Content-Type: application/json');
include 'conexao.php';

$sql = "SELECT id, nome, email, criado_em FROM alunos ORDER BY criado_em DESC";
$result = $conn->query($sql);

$alunos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $alunos[] = $row;
    }
}

echo json_encode($alunos);

$conn->close();
?>
