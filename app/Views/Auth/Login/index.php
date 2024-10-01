<?php $this->use('templates/auth.php', ['title' => 'Login']) ?>

<div class="login-form">
    <div class="form-container">
        <h2>Login to Virtual Finance</h2>
        <form action="/auth/login/authenticate" method="post">

            <?php
                if (\Fantom\Session::hasFlash('error')) {
                    $error = \Fantom\Session::flash('error');
                }
            ?>
            <div>
                <!-- Show login error here -->
                <?= isset($error) ? $error : '' ?>
            </div>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>