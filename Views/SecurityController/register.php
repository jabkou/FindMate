<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <?php include(dirname(__DIR__) . '/Common/head.php'); ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/style.css"/>
    <title>findMate</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../../Public/img/logo.svg">
    </div>
    <form action="?page=register" method="POST">

        <div class="messages">
            <?php
            if (isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <input name="email" required="required" type="email" placeholder="email@sth.com">
        <input name="password1" required="required" type="password" placeholder="password">
        <input name="password2" required="required" type="password" placeholder="repeat password">
        <input name="user_name" required="required" type="text" placeholder="name">
        <input name="birth_year" required="required" type="text" placeholder="years">
        <input name="gender" required="required" type="text" placeholder="gender">

        <button class="continue" type="submit">CONTINUE</button>
        <div class="signs">
            <a href="?page=login">
                <button class="sign" type="button">SIGN IN</button>
            </a>
            <button class="sign" id="active" type="button">SIGN UP</button>
        </div>
    </form>
</div>
</body>
</html>







