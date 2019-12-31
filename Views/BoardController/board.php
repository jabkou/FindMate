<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../../Public/css/board.css">
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
        <div class="todobuttons">
            <button>LIKEEE</button>
        </div>
    </div>
    <div class="bottom">
        <div class="bottombuttons">
            <button>AA</button>
            AA
        </div>
        <div class="bottombuttons">
            <button>bb</button>
            bb
        </div>
        <div class="bottombuttons">
            <button>cc</button>
            cc
        </div>
    </div>
</div>
</body>
</html>