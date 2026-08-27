<section class="admin-login">
    <div class="container">
        <form method="POST" action="/jersx-web/public/admin" class="login-box">
            <h1>Panel Admin</h1>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <div class="campo">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required autofocus>
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-enviar">Iniciar sesión</button>
        </form>
    </div>
</section>