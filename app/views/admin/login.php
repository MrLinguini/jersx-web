<section class="admin-login">
    <div class="login-box">
        <div class="login-icono">🔒</div>
        <h1>Panel Admin</h1>
        <p class="login-subtitulo">Acceso exclusivo para administradores</p>

        <?php if ($error): ?>
            <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="/jersx-web/public/admin">
            <div class="campo">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required autofocus>
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-primary btn-full">Iniciar sesión</button>
        </form>

        <a href="/jersx-web/public/" class="login-volver">← Volver al sitio</a>
    </div>
</section>