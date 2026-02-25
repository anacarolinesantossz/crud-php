<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $email, $id]);

    header("Location: index.php");
    exit;
}
?>

<h2>Editar Usuário</h2>

<form method="POST">
    Nome: <br>
    <input type="text" name="name" value="<?= $user['name'] ?>" required><br><br>

    Email: <br>
    <input type="email" name="email" value="<?= $user['email'] ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>
