<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">PHP MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL; ?>task">Tasks <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <?php
                if (Session::get('is_logged') == true) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo URL; ?>task/create">Create task</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo URL; ?>task">List tasks</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo URL; ?>dashboard/logout">Logout</a>
                        </div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL ?>login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL ?>register">Register</a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
