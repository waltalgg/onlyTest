<?php

class UserHandler
{
	private PDO $pdo;

	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function register(string $name, string $phone, string $email, string $password): void
	{
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
		$stmt->execute([$email, $phone]);

		if ($stmt->fetch())
		{
			throw new Exception("Email или телефон уже зарегистрированы.");
		}

		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
		$stmt = $this->pdo->prepare("INSERT INTO users (name, phone, email, password) VALUES (?, ?, ?, ?)");
		$stmt->execute([$name, $phone, $email, $hashedPassword]);
	}

	public function login(string $login, string $password): array
	{
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
		$stmt->execute([$login, $login]);
		$user = $stmt->fetch();

		if (!$user || !password_verify($password, $user['password']))
		{
			throw new Exception("Неправильный email/телефон или пароль.");
		}

		return $user;
	}

	public function updateProfile(int $userId, string $name, string $phone, string $email, ?string $password = null): void
	{
		$sql = "UPDATE users SET name = ?, phone = ?, email = ?";
		$params = [$name, $phone, $email];

		if ($password)
		{
			$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
			$sql .= ", password = ?";
			$params[] = $hashedPassword;
		}

		$sql .= " WHERE id = ?";
		$params[] = $userId;

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($params);
	}
}