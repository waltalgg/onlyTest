<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center">Регистрация</h2>
            <form method="post" action="process.php" onsubmit="return validateForm()">
                <input type="hidden" name="register" value="1">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" class="form-control" name="phone" required pattern="\d*" maxlength="15">
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Подтверждение пароля</label>
                    <input type="password" class="form-control" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Зарегистрироваться</button>
                <a href="index.php" class="btn btn-secondary btn-block mt-3">Назад</a>
            </form>
			<?php if (isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger mt-3">
					<?php foreach ($_SESSION['errors'] as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
					<?php endforeach; ?>
					<?php unset($_SESSION['errors']); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</div>

<script>
    document.querySelector('input[name="phone"]').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, ''); // Удаляем все, кроме цифр
    });

    function validateForm()
    {
        const password = document.querySelector('input[name="password"]').value;
        const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

        if (password !== confirmPassword)
        {
            alert('Пароли не совпадают!');
            return false;
        }
        return true;
    }
</script>