<?php require_once  BASE_PATH . '/app/views/inc/header.view.php' ?>

<body class="login-body">
    <div class="login-container-out">
        <div class="login-container">
            <div class="login-left">
                <img src="<?= ROOT ?>/assets/images/ReMeD.png" alt="logo">
                <p>ONLINE PHARMACY LOCATOR <br> AND <br> MEDICINE TRACKER</p>
                <h3>ADMINISTRATOR</h3>
            </div>
            <div class="login-right">

                <form method="POST">
                    <h2 class="login-header">Sign Up</h2>
                    <?php if (!empty($errors)): ?>
                        <div class="error">
                            <?= implode("<br>", $errors) ?>
                        </div>
                    <?php endif; ?>
                    <ul>
                        <li>
                            <label for="username">Username</label><br>
                            <input type="text" id="username" name="username" placeholder="value" required>
                        </li>
                        <li>
                            <label for="username">Email</label><br>
                            <input type="email" id="email" name="email" placeholder="value" required>
                        </li>
                        <li>
                            <label for="password">Password:</label><br>
                            <input type="password" id="password" name="password" placeholder="value" required>
                        </li>
                        <li>
                            <label for="password">Verify Password:</label><br>
                            <input type="password" id="password" name="password" placeholder="value" required>
                        </li>
                        <div class="remember">
                            <input type="checkbox" name="remember" id="remember" required>
                            <label for="remember">Remember me</label>
                        </div>

                        <button type="submit">SignUp</button>


                        <p class="forget">Already Have Account<span><a href="<?= ROOT ?>/admin/login"> LogIn</a></span>?</p>
                </form>
            </div>
        </div>
    </div>

    <?php require_once  BASE_PATH . '/app/views/inc/footer.view.php' ?>