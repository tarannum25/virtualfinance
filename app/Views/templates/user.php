<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Finance Dashboard</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">

</head>
<body>
    <header>
        <div class="logo">
            <!-- <img src="logo.png" alt="Virtual Finance Logo"> -->
            <h1>Virtual Finance</h1>
        </div>

        <div class="header-buttons">
            <!-- <button class="settings-btn">Settings</button>
                <button class="logout-btn">Logout</button> -->

                <button class="settings-btn" onclick="window.location.href='settings.html'">Settings</button>
                <button class="logout-btn" onclick="window.location.href='logout.html'">Logout</button>
               
         </div>
     </header>


<?php $this->content() ?>


</body>
</html>
