<?php $this->use('templates/base.php', ['title' => 'Register']) ?>

<div class="form-container">
    <h2>Sign Up for Virtual Finance</h2>
    <form action="/auth/register/store" method="post">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <label for="account_type">Account Type</label>
        <select id="account_type" name="account_type" required>
            <option value="1">Savings</option>
            <option value="2">Current</option>
        </select>

        <button type="submit" class="btn">Sign Up</button>
    </form>
</div>