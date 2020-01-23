<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if ($_SESSION['role'] != '1') {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <title>picmash</title>
</head>
<body>
<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
<div class="container">
    <div class="col-6">
        <table class="table mt-4 text-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><?= $user->getId(); ?></th>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getName(); ?></td>
                <td><?= $user->getSurname(); ?></td>
            </tr>
            </tbody>
            <tbody class="users-list">
            </tbody>
        </table>
        <button class="btn-primary btn-lg ml-0" type="button" onclick="getUsers()">
            Get all users
        </button>
    </div>
</div>
</body>
</html>