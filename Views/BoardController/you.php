<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if ($_SESSION['role'] != '1' && $_SESSION['role'] != '2') {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <?php include(dirname(__DIR__) . '/Common/head.php'); ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/board.css">
    <title>findMate</title>
</head>
<body>
<?php include(dirname(__DIR__) . '/Common/navbar.php'); ?>
<div class="container">
    <div class="all">

        <div class="col">
            <div class="youInfo">Update information about yourself</div>

        <div class="forms">

            <div class="twoForms">

                <form method="post" action="?page=updateGame" class="you">
                    <input type="text" name="newGame" required="required" placeholder="Games">
                    <button class="continue" type="submit">continue</button>
                </form>

                <form method="POST" action="?page=updatePhoto" enctype="multipart/form-data" class="you">
                    <input type="file" name="myImage" required="required">
                    <button class="continue" type="submit" value="Upload">continue</button>
                </form>

            </div>

            <div class="twoForms">

                <form method="post" action="?page=updateDescription" class="you">
                    <textarea name="newDescription" required placeholder="Description (max 150 characters)" maxlength="150"></textarea>
                    <button class="continue" type="submit">continue</button>
                </form>

                <form method="post" action="?page=updateLocation" class="you">
                    <input type="text" name="newLocation" required="required" placeholder="Location">
                    <button class="continue" type="submit">continue</button>
                </form>

            </div>
        </div>
        </div>


        <div class="board">
            <div class="candidate">
                <?php
                echo '  
                        
                                    <img src="data:image/jpeg;base64,' . base64_encode($active_user->getImage()) . '" class="pom" />  
                          
                     ';
                ?>
                <div>
                    <div class="name"><?= $active_user->getName() ?></div>
                    <div class="info">
                        <?= $active_user->getAge() ?> years old <br>
                        <?= $active_user->getLocation() ?>
                        <div>
                            <?= $active_user->getGame() ?>
                        </div>
                    </div>
                    <div class="description">
                        <?= $active_user->getDescription() ?>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>


</body>
</html>