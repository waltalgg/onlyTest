<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/php/db/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/php/handlers/UserHandler.php';

$pdo = DB::connect();
$userHandler = new UserHandler($pdo);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 text-center">
    <h2>Добро пожаловать!</h2>
    <div class="mt-4">
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="profile.php" class="btn btn-primary">Мой профиль</a>
            <a href="exit.php" class="btn btn-danger">Выйти</a>
        <?php endif; ?>
        <?php if(!isset($_SESSION['user_id'])): ?>
            <a href="page_registration.php" class="btn btn-primary">Зарегистрироваться</a>
            <a href="page_authorization.php" class="btn btn-secondary">Авторизоваться</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>