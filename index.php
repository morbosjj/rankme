<!DOCTYPE html>
<html lang="en">

<head>
     <meta name="google-signin-client_id" content="328447961111-6ks6c3u6vmo8kvta8pjlbit7f3rpeoup.apps.googleusercontent.com"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                <div class="g-signin2"></div>
                

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


   <header class="main-header">
    <div class="container-fluid">

       <div class="navbar">
            <a href="#" class="nav-brand">
                <h2>rankme</h2>
            </a>
           <ul class="nav-bar-nav ml-auto align-items-center flex-row">
               <li><a href="#" class="nav-item">Home</a></li>
               <li><a href="#" class="nav-item">Blog</a></li>
               <li><a href="#" class="nav-item">About</a></li>
               <li id="btn-auth"><a id="anchorID" class="btn signin-btn">Sign in</a></li>
               <li id="dropdown" class="profile-account" style="display: none;">
                  <a href="#" class="btn currentuser-btn dropdown-btn icon i-caret" id="profile-name"></a>

                  <ul class="dropdown-content">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#" id="signout-button"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                  </ul>
                </li>
           </ul>
       </div>
    </div>
   </header>

<main class="main-content">
<div class="bg-search">
    <img src="img/undraw.svg" alt="utube">
</div>
<div class="container">
    <div class="row bg-position">
       <form id="search-form">
           <div class="input-group">
               <span class="custom-prepend input-group-text rounded-left text-muted">
                   <i class="fas fa-search"></i>
               </span>
               <div class="search-input">
                   <input type="text" class="form-control rounded-right custom-search rounded-left" autocomplete="off" placeholder="Find other rankings: Top 5 Gaming in Philippines ">
               </div>
               <div class="autocomplete-container">
                   <ul style="display: none;">
                       <li>
                           <div class="eac-item">
                               <a href=""></a>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
       </form>
    </div>

    <div class="row mt-4">
        <div class="details-content">
           <h1>Top 5 Bloggers in Philippines in 2019</h1>
            <p class="lead mb-4 mt-2">Find top Instagram influencers in Philippines. Identify the most popular Instagram accounts on Heepsy.</p>
        </div>
    </div>

    <div class="row mt-5 data-box">
        <div class="col-md-12">
            <div class="row border-bottom border-muted py-4">
                <div class="col-1 align-middle lead">
                        <div class="span"><strong>1</strong></div>
                </div>

                <div class="col-3 col-md-2">
                        <div class="user_img mb-3 mb-sm-0">
                            <img class="img rounded-circle img-user" src="img/IU.jpg" alt="">
                            <i class="fas fa-check-circle user_status"></i>
                        </div>
                </div>

                <div class="col-12 col-sm-8 col-md-9">
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 align-middle">
                                <h2 class="font-weight-bold text-secondary lead mb-0">Jhon</h2>
                            </div>
                            <div class="col-12 col-md-8 my-3 my-sm-0">
                                <div class="row">
                                    <div class="col align-middle"><span class="text-uppercase lead"><strong>3.1m</strong></span><span class="d-block"> followers</span></div>
                                    <div class="col align-middle"><span class="lead"><strong>16.0 %</strong></span><span class="d-block"> engagement</span></div>
                                    <div class="col align-middle"><span class="lead"><strong>300</strong></span><span class="d-block"> videos</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col align-middle small"><span>Cinema, Theater and Dance, Cinema</span></div>
                        </div>
                </div>
            </div>

            <div class="row border-bottom border-muted py-4">
                <div class="col-1 align-middle lead">
                        <div class="span"><strong>2</strong></div>
                </div>

                <div class="col-3 col-md-2">
                        <div class="user_img mb-3 mb-sm-0">
                            <img class="img rounded-circle img-user" src="img/IU.jpg" alt="">
                            <i class="fas fa-check-circle user_status"></i>
                        </div>
                </div>

                <div class="col-12 col-sm-8 col-md-9">
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 align-middle">
                                <h2 class="font-weight-bold text-secondary lead mb-0">Ja Mill</h2>
                            </div>
                            <div class="col-12 col-md-8 my-3 my-sm-0">
                                <div class="row">
                                    <div class="col align-middle"><span class="text-uppercase lead"><strong>2m</strong></span><span class="d-block"> followers</span></div>
                                    <div class="col align-middle"><span class="lead"><strong>16.0 %</strong></span><span class="d-block"> engagement</span></div>
                                    <div class="col align-middle"><span class="lead"><strong>200</strong></span><span class="d-block"> videos</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col align-middle small"><span>Cinema, Theater and Dance, Cinema</span></div>
                        </div>
                </div>
            </div>



        </div>
    </div>
</div>
</main>
    
<footer class="r-footer mt-40">
    <div class="footer-container">
        <div class="footer-flex">
            <div class="footer-logo">  
                <a href="#">
                    <h2>rankme</h2>
                </a>
            </div>

             <div class="copyright">

                    <p>Copyright &copy 2019 rankme.000webhostapp.com</p>
            </div>

            <div class="footer-social">
                <ul class="social-platform">
                    <li><a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="mailto:rankme0130@gmail.com"><i class="fas fa-at"></i></a></li>
                    <li>
                        <a href="https://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com"><i class="fab fa-youtube-square"></i></a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</footer>
  



  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap.native@2.0.15/dist/bootstrap-native-v4.min.js"></script>
  <script src="js/modal.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script> 
  <script src="js/app.js"></script>
    <script src="index.js"></script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
  </script>
</body>
</html>