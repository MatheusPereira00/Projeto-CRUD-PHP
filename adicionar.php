<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tarefas</title>
    <link rel="stylesheet" href="style.css">  <!-- Incluindo o CSS -->
</head>

<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $stmt = $pdo->prepare('INSERT INTO tarefas (titulo, descricao) VALUES (?, ?)');
    $stmt->execute([$titulo, $descricao]);

    header('Location: index.php');
    exit;
}
?>
<form method="POST">
    <label>Título:</label>
    <input type="text" name="titulo" required><br>
    <label>Descrição:</label>
    <textarea name="descricao" required></textarea><br>
    <button type="submit">Adicionar</button>
</form>
