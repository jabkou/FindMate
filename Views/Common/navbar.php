<nav class="navbar fixed-bottom navbar-expand navbar-dark bg-transparent">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav" id="center">
            <li class="nav-item">
                <a class="nav-link" href="?page=logout">
                    <button class="log"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </a>
            </li>
            <li class="nav-item">
                <div class="bottombuttons">
                    <a class="nav-link" href="?page=you">
                    <button><i class="far fa-user fa-2x"></i></button>
                    </a>
                    You
                </div>
            </li>
            <li class="nav-item">
                <div class="bottombuttons">
                    <a class="nav-link" href="?page=board">
                    <button><i class="far fa-bell fa-2x"></i></button>
                    </a>
                    Board
                </div>
            </li>
            <li class="nav-item">
                <div class="bottombuttons">
                    <a class="nav-link">
                    <button><i class="fas fa-gamepad fa-2x"></i></button>
                    </a>
                    Matches
                </div>
            </li>
        </ul>

    </div>
    <?php if($_SESSION['role'] == '1'): ?>
    <a href="?page=admin">
        <div class="continue" id="right">
            <button><i class="fas fa-users-cog"></i></i></i></button>
        </div>
    </a>
    <?php endif; ?>
</nav>