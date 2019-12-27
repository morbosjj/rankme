<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-signin-client_id" content="328447961111-6ks6c3u6vmo8kvta8pjlbit7f3rpeoup.apps.googleusercontent.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.min.css">
    <script src="js/all.min.js"></script>
    <title>rankme</title>
</head>
<body>
    
    <div class="main-content">
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
                                <li><a href="#">About</a></li>
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
                                <li id="dropdown" class="profile-account" style="display: none;">
                                    <button id="profile-name" class="button currentuser-btn dropdown-btn icon i-caret"></button>
                 
                                    <ul class="dropdown-content">
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#" id="signout-button"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                    </ul>
                                 </li>
                            </ul>
                    </nav>
                
                    
            </div>
        </header>

        <main>
            <div class="relative-background">
                <img src="img/undraw.svg" alt="youtube">
            </div>
            <div class="container-custom">
                    <div class="search-content relative-form">
                        <form id="search-form">
                            <div class="search-group">
                                <span class="custom-prepend input-group-custom rounded-left text-muted">
                                    <i class="fas fa-search"></i>
                                </span>

                                <div class="search-input autocomplete">
                                    <input id="search" type="text" id="search"class="form-control-custom rounded-right custom-search rounded-left" autocomplete="off" placeholder="Find other rankings: Top 10 Most Subscribed in PH ">

                                    <div class="match-content" class="autocomplete-container">
                                        <ul id="match-list">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <div class="details-section">
                        <h1 id="keyword-title">Top 10 Influencers 2019</h1>
                        <p>Find top 10 Youtube influencers. Identify the most popular Youtube accounts by category on Rankme.</p>
                    </div>
            </div>

            <div class="container-custom rank-wrap">
                <div class="all-rankings-tag">
                    
                </div>

                <div class="ranking-list" id="search-result">

                </div>
            </div>
        </main>

    </div>

    <footer class="app-footer">
        <div class="container-custom">
            <div class="logo">
                <h1>rankme</h1>
            </div>

            <div class="copyright">
                <p>Copyright &copy 2019 rank-me.000webhostapp.com</p>
            </div>

            <div class="social-list">
                <ul class="social-platform">
                    <li>
                        <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href="mailto:rankme0130@gmail.com"><i class="fas fa-at"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com"><i class="fab fa-youtube-square"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>


    <script src="js/config.js"></script>
    <script src="js/autocomplete.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script> 
    <script src="js/app.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>