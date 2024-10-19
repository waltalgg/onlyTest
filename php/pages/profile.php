<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/php/db/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/php/handlers/UserHandler.php';

if (!isset($_SESSION['user_id']))
{
	header('Location: index.php');
	exit;
}
$pdo = DB::connect();
$userHandler = new UserHandler($pdo);
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

require_once $_SERVER['DOCUMENT_ROOT'].'/php/templates/header.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/php/templates/profile_form.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/php/templates/footer.php';
