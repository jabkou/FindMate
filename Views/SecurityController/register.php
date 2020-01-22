<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/style.css"/>
    <?php include(dirname(__DIR__) . '/Common/head.php'); ?>
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







