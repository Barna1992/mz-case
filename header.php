<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="./" class="logo">
            <img src="./assets/images/logo_mz.png" height="35" alt="Mz-Case" />
        </a>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <span class="separator"></span>

        <ul class="notifications">
            <li>
                <a href="user_list.php" class="dropdown-toggle notification-icon" title="Tutti i records">
                    <i class="fa fa-tasks"></i>
                </a>
            </li>
            <li>
                <a href="add_user.php" class="dropdown-toggle notification-icon" title="Aggiungi nuovo...">
                    <i class="fa fa-plus"></i>
                </a>

            </li>
        </ul>

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="./assets/images/!logged-user.jpg" alt="Utente" class="img-circle" data-lock-picture="./assets/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="Utente">
                    <span class="name"><?php
                            if( isset($_SESSION['session_id']) ) {
                                echo $_SESSION['session_user_first_name'] . ' ' .  $_SESSION['session_user_last_name'];
                            }
                        ?></span>
                    <span class="role">
                        <?php
                        if( isset($_SESSION['session_id']) ) {
                            echo $_SESSION['session_user'];
                        }
                        ?>
                    </span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="./logout.php"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->
