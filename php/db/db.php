<?php

class DB
{
	private static $host = 'MySQL-8.2';
	private static $db = 'onlybase';
	private static $user = 'root';
	private static $pass = '';
	private static $charset = 'utf8mb4';

	public static function connect(): PDO
	{
		$dsn = 'mysql:host='.self::$host.';dbname='.self::$db.';charset='.self::$charset;
		$options =
			[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
			];
		try
		{
			return new PDO($dsn, self::$user, self::$pass, $options);
		}

		catch (PDOException $e)
		{
			echo 'Ошибка подключения к базе данных: ' . htmlspecialchars($e->getMessage());
			exit;
		}
	}
}
