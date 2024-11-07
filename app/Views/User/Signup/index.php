<?php $this->use('templates/user.php', ['title' => 'Signup | User']) ?>




    <div class="form-container">
        <h2>Sign Up for Virtual Finance</h2>
        <form action="#">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" required>

            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="gender">Gender</label>
            <select id="account-type" name="account-type" required>
                <option value="savings">Male</option>
                <option value="current">Female</option>
            </select>

            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div> 

