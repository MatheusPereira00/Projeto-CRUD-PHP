<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tarefas</title>
    <link rel="stylesheet" href="style.css">  <!-- Incluindo o CSS -->
</head>


<?php
include 'conexao.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tarefas WHERE id = ?');
$stmt->execute([$id]);
$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare('UPDATE tarefas SET titulo = ?, descricao = ?, status = ? WHERE id = ?');
    $stmt->execute([$titulo, $descricao, $status, $id]);

    header('Location: index.php');
    exit;
}
?>
<form method="POST">
    <label>Título:</label>
    <input type="text" name="titulo" value="<?= $tarefa['titulo'] ?>" required><br>
    <label>Descrição:</label>
    <textarea name="descricao" required><?= $tarefa['descricao'] ?></textarea><br>
    <label>Status:</label>
    <select name="status">
        <option value="pendente" <?= $tarefa['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
        <option value="em andamento" <?= $tarefa['status'] === 'em andamento' ? 'selected' : '' ?>>Em Andamento</option>
        <option value="concluída" <?= $tarefa['status'] === 'concluída' ? 'selected' : '' ?>>Concluída</option>
    </select><br>
    <button type="submit">Salvar</button>
</form>
