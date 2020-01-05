<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if(!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../../Public/css/board.css">
    <script src="https://kit.fontawesome.com/67b82f3810.js" crossorigin="anonymous"></script>
    <title>findMate</title>
</head>
<body>
<div class="container">
    <div class="all">
        <div class="tweet">
            <div>
                Gaming news
            </div>
            <div class="todo">

            </div>
        </div>
        <div class="board">
            <div class="candidate">
            <?php foreach($candidates as $candidate): ?>
                <img src="<?= '../Public/img/'.$candidate->getImage() ?>">
                <div>
                    <div class="name"><?= $candidate->getName() ?></div>
                    <div class="info">
                        <?= $candidate->getAge() ?> years old <br>
                        <?= $candidate->getRange() ?> km away
                        <div>
                            <?= $candidate->getGame() ?>
                        </div>
                    </div>

                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="rightColumn">
            <div class="todobuttons">
                <button><i class="fas fa-rocket fa-6x"></i></button>
            </div>
            <div class="rightRow">
                <button><i class="fas fa-times-circle fa-6x"></i></button>
                <button><i class="fas fa-heart fa-6x"></i></button>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="bottombuttons">
            <button><i class="far fa-user fa-2x"></i></button>
            You
        </div>
        <div class="bottombuttons">
            <button><i class="far fa-bell fa-2x"></i></button>
            News
        </div>
        <div class="bottombuttons">
            <button><i class="fas fa-gamepad fa-2x"></i></button>
            Matches
        </div>
    </div>
</div>
</body>
</html>