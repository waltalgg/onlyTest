<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center">Профиль пользователя</h2>
            <form method="post" action="process.php">
                <input type="hidden" name="update" value="1">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Новый пароль (оставьте пустым, если не хотите менять)</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Обновить данные</button>
                <a href="index.php" class="btn btn-secondary btn-block mt-3">На главную</a>
            </form>
			<?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success mt-3">
					<?= htmlspecialchars($_SESSION['success']) ?>
					<?php unset($_SESSION['success']); ?>
                </div>
			<?php endif; ?>
			<?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger mt-3">
					<?= htmlspecialchars($_SESSION['error']) ?>
					<?php unset($_SESSION['error']); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</div>
