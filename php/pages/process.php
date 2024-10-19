<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/php/db/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/php/handlers/UserHandler.php';

class UserController
{
	private $userHandler;
	public function __construct($pdo)
	{
		$this->userHandler = new UserHandler($pdo);
	}

	public function register($data)
	{
		try
		{
			$this->userHandler->register($data['name'], $data['phone'], $data['email'], $data['password']);
			$_SESSION['success'] = 'Регистрация прошла успешно!';
			header('Location: page_authorization.php');
			exit;
		}
		catch (Exception $e)
		{
			$_SESSION['errors'] = [$e->getMessage()];
			header('Location: page_registration.php');
			exit;
		}
	}


	public function login($data)
	{
		try
		{
			$user = $this->userHandler->login($data['login'], $data['password']);
			$_SESSION['user_id'] = $user['id'];
			header('Location: profile.php');
			exit;
		}
		catch (Exception $e)
		{
			$_SESSION['error'] = $e->getMessage();
			header('Location: page_authorization.php');
			exit;
		}
	}

	public function updateProfile($data)
	{
		if (!isset($_SESSION['user_id']))
		{
			header('Location: index.php');
			exit;
		}
		try
		{
			$this->userHandler->updateProfile($_SESSION['user_id'], $data['name'], $data['phone'], $data['email'], $data['password']);
			$_SESSION['success'] = 'Данные обновлены!';
			header('Location: profile.php');
			exit;
		}
		catch (Exception $e)
		{
			$_SESSION['error'] = $e->getMessage();
			header('Location: profile.php');
			exit;
		}
	}
}

$pdo = DB::connect();
$userController = new UserController($pdo);

// Обработка запросов
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if (isset($_POST['register']))
	{
		$userController->register($_POST);
	}
	elseif (isset($_POST['login']))
	{
		$userController->login($_POST);
	}
	elseif (isset($_POST['update']))
	{
		$userController->updateProfile($_POST);
	}
}