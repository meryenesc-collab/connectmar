<?php
include 'conexao.php';

// Receber dados do POST
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';

if(empty($nome) || empty($email)){
    echo "Preencha todos os campos.";
    exit;
}

// Inserir com prepared statements para segurança
$stmt = $conn->prepare("INSERT INTO alunos (nome, email) VALUES (?, ?)");
$stmt->bind_param("ss", $nome, $email);

if ($stmt->execute()) {
    echo "Inscrição realizada com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
