<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tarefas</title>
    <link rel="stylesheet" href="style.css">  <!-- Incluindo o CSS -->
</head>

<?php
include 'conexao.php';

$stmt = $pdo->query('SELECT * FROM tarefas');
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($tarefas as $tarefa): ?>
    <tr>
        <td><?= $tarefa['id'] ?></td>
        <td><?= $tarefa['titulo'] ?></td>
        <td><?= $tarefa['descricao'] ?></td>
        <td><?= $tarefa['status'] ?></td>
        <td>
            <a href="editar.php?id=<?= $tarefa['id'] ?>">Editar</a>
            <a href="excluir.php?id=<?= $tarefa['id'] ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="adicionar.php">Adicionar Tarefa</a>
