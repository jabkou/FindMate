<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/style.css" />
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
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <input name="email" type="text" placeholder="email@sth.com">
        <input name="password" type="password" placeholder="password">
        <button class="continue"  type="submit">CONTINUE</button>
        <button class="forgotPassword" type="button">FORGOT PASSWORD</button>
        <div class="signs">
            <button class ="sign" id="active" type="button">SIGN IN</button>
            <button class="sign" type="button">SIGN UP</button>
        </div>
    </form>
</div>
</body>
</html>







