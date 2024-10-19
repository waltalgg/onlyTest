<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center">Авторизация</h2>
            <form method="post" action="process.php">
                <input type="hidden" name="login" value="1">
                <div class="form-group">
                    <label for="login">Email или телефон</label>
                    <input type="text" class="form-control" name="login" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3">Войти</button>
                <a href="index.php" class="btn btn-secondary btn-block mt-3">Назад</a>

                <div class="form-group">
                    <div class="yandex-smart-captcha" data-captcha-key="YOUR_CAPTCHA_PUBLIC_KEY"></div>
                </div>
            </form>
			<?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger mt-3">
					<?= htmlspecialchars($_SESSION['error']) ?>
					<?php unset($_SESSION['error']); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</div>