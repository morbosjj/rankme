<header class="main-header">
            <div class="container-custom">
                    <div class="logo">
                        <div class="img-logo">
                            <img src="img/logo.png" alt="rankme">
                        </div>
                        <div class="text-logo">
                            <h1>rankme</h1>
                        </div>
                    </div>
                    
                    
                    <nav>
                            <div class="menu-icon">
                                <i class="fas fa-bars"></i>
                                <i class="fas fa-window-close"></i>
                            </div>
                            
                            <ul class="nav-bar-nav">
                                <li><a href="https://rank-me.000webhostapp.com/index.php">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="/about.php">About</a></li>
                                <?php
                                    if(!isset($_SESSION['user'])){
                                ?>
                                <li id="btn-auth">
                                    <a href="user/login.php">
                                        <button class="button signin-button">Sign in</button>
                                    </a>
                                </li>
                                <li id="btn-auth">
                                    <a href="user/register-user.php">
                                        <button class="button signin-button" id="register-button">Register</button>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>

                                <?php
                                    if(@$_SESSION['user']){
                                ?>
                                <li id="dropdown" class="profile-account">
                                    <button id="profile-name" class="button currentuser-btn dropdown-btn icon i-caret"><?php echo @$_SESSION['user']['firstname'] ?>&nbsp <?php echo @$_SESSION['user']['lastname'] ?></button>
                 
                                    <ul class="dropdown-content">
                                        <li><a href="#">Profile</a></li>
                                        <li id="signout-button"><a href="user/function/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                    </ul>
                                </li>
                                <?php 
                                    }
                                ?>
                            </ul>
                    </nav>
            </div>
</header>