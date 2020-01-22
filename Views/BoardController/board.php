<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if (!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/style.css"/>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/board.css">
    <script src="https://kit.fontawesome.com/67b82f3810.js" crossorigin="anonymous"></script>
    <script async src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <?php include(dirname(__DIR__) . '/Common/head.php'); ?>
    <title>findMate</title>
</head>
<body>
<?php include(dirname(__DIR__) . '/Common/navbar.php'); ?>
<div class="container">
    <div class="all">
        <div class="tweet">
            <a class="twitter-timeline" data-width="400" data-height="500" data-theme="dark"
               href="https://twitter.com/IGN?ref_src=twsrc%5Etfw">Tweets by IGN</a>
        </div>
        <div class="board" id="rel">
            <div class="candidate">
                <?php
                echo '  
                        
                                    <img src="data:image/jpeg;base64,' . base64_encode($candidate->getImage()) . '" class="pom" />  
                          
                     ';
                ?>
                <div>
                    <div class="name"><?= $candidate->getName() ?></div>
                    <div class="info">
                        <?= $candidate->getAge() ?> years old <br>
                        <?= $candidate->getLocation() ?>
                        <div>
                            <?= $candidate->getGame() ?>
                        </div>
                    </div>
                    <div class="description">
                        <?= $candidate->getDescription() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightColumn">
            <div class="todobuttons">
                <button><i class="fas fa-rocket fa-6x"></i></button>
            </div>
            <div class="rightRow" id="rel2">
                <button type="submit" onclick="crossUser(<?= $candidate->getId() ?>)"><i
                            class="fas fa-times-circle fa-6x"></i></button>

                <button type="submit" onclick="likeUser(<?= $candidate->getId() ?>)"><i
                            class="fas fa-heart fa-6x"></i></button>

            </div>
        </div>
    </div>

</div>


</body>
</html>