<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-signin-client_id" content="328447961111-6ks6c3u6vmo8kvta8pjlbit7f3rpeoup.apps.googleusercontent.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/all.min.js"></script>

    <title>rankme</title>
</head>
<body>
    <div id="signin-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Sign in</h5>
            </div>

              <div class="modal-body">
                <br>
                <div class="g-signin2" id="authorize-button" data-onsuccess="onSignIn"></div>
                

                <div class="middle-modal">
                    <hr>
                      <span class="">OR</span>
                    <hr>
                </div>

                <div class="login-section">
                      <form id="login-form">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                          
                          <button type="submit" class="btn btn-primary">Login</button>
                      </form>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
          </div>
          </div>
    </div>
    
    
    <div class="content">
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
                    
                    <div class="menu-icon">
                        <i class="fas fa-bars"></i>
                    </div>

                    <div class="navigation">
                            <ul class="nav-bar-nav">
                                <li><a href="https://rank-me.000webhostapp.com/index.php">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About</a></li>
                                <li id="btn-auth">
                                    <button class="button signin-button" id="anchorID">Sign in</button>
                                </li>
                                <li id="dropdown" class="profile-account" style="display: none;">
                                    <button id="profile-name" class="button currentuser-btn dropdown-btn icon i-caret"></button>
                 
                                    <ul class="dropdown-content">
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#" id="signout-button"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                    </ul>
                                 </li>
                            </ul>
                    </div>
                
                    
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
    
    <script src="js/autocomplete.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap.native@2.0.15/dist/bootstrap-native-v4.min.js"></script>
    <script src="js/modal.js"></script> 
    <script src="https://apis.google.com/js/platform.js" async defer></script> 
    <script src="js/app.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
</body>
</html>