<?php $this->use('templates/user.php', ['title' => 'Setting | User']) ?>


<!-- <section class="section">
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-6">
				<div class="box">
					<h1 class="title">Setting</h1>
					<hr>
					<?php include VIEW_PATH . '/partials/_message.php' ?>
					<?php include VIEW_PATH . '/partials/_change-password-form.php' ?>
				</div>
			</div>
		</div>
	</div>
</section>
 -->

<body>
    <div class="settings-container glass-effect">
        <h2>Profile Settings</h2>
        <form action="#">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="Tarannum">

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="Mahtab">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="tarannum.mahtab@gmail.com">

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="933-089-6193">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="Kankinara North 24 Parganas">

            <label for="gender">Gender</label>
            <select id="account-type" name="account-type" required>
                <option value="savings">Male</option>
                <option value="current">Female</option>
            </select>


            <button type="submit" class="btn">Save Changes</button>
        </form>
    </div>
