<?php 
require 'db.php';

$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Usuários</h2>
<a href="create.php">Novo Usuário</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td>
            <a href="edit.php?id=<?= $user['id'] ?>">Editar</a>
            <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
