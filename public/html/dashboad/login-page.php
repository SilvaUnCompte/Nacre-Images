<main id="section-core">
    <div class="form-box">
        <div class="form-value">
            <form action="/controler/dashboard/login/login.php" method="post">
                <h2>Login</h2>
                <div class="input-box">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input id="email_id" type="email" name="input_email" required placeholder=" ">
                    <label for="email_id">Email</label>
                </div>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input id="password_id" type="password" name="input_password" required placeholder=" ">
                    <label for="password_id">Password</label>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</main>

<link rel="stylesheet" href="/public/styles/dashboard/login/login.css">