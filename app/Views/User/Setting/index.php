<?php $this->use('templates/user.php', ['title' => 'Setting | User']) ?>

<main class="profile-page">

    <div class="container">

        <?php include VIEW_PATH . '/partials/_message.php' ?>

        <div class="profile-settings glassmorphism">
            <h2>Profile Settings</h2>

           <form action="/user/setting/update-profile" method="POST"> 
                
                <div class="input-group">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first_name" placeholder="Enter your first name" value="<?= $user->first_name ?>">
                </div>
                <div class="input-group">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last_name" placeholder="Enter your last name"value="<?= $user->last_name ?>" >
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="input-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your phone number"value="<?= $user->phone ?>">
                </div>
                
                <div class="input-group">
                   <label for="gender">Gender</label>
                   <select id="gender" name="gender" required>
                       <option value="" disabled>Select your gender</option>
                       <option value="1" <?= $user->gender == 1 ? 'selected' : '' ?>>Male</option>
                       <option value="2" <?= $user->gender == 2 ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>

        <div class="password-update glassmorphism">
            <h2>Update Password</h2>
            <form action="#">
                <div class="input-group">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" placeholder="Enter current password">
                </div>
                <div class="input-group">
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" placeholder="Enter new password">
                </div>
                <div class="input-group">
                    <label for="confirm-password">Confirm New Password:</label>
                    <input type="password" id="confirm-password" placeholder="Confirm new password">
                </div>

                <button type="submit" class="update-btn">Update</button>
            </form>
        </div>
    </div>
    
</main>
