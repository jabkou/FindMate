<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <?php include(dirname(__DIR__) . '/Common/head.php'); ?>
    <title>findMate</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../../Public/img/logo.svg">
    </div>
    <form action="?page=login" method="POST">

        <div class="messages">
            <?php
            if (isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <input name="email" type="text" placeholder="email@sth.com">
        <input name="password" type="password" placeholder="password">
        <button class="continue" type="submit">CONTINUE</button>
        <button class="forgotPassword" type="button">FORGOT PASSWORD</button>
        <div class="signs">
            <button class="sign" id="active" type="button">SIGN IN</button>
            <a href="?page=register">
                <button class="sign" type="button">SIGN UP</button>
            </a>
        </div>
    </form>
</div>
</body>
</html>







