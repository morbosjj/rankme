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

        <?php include 'include/layout/header.php'; ?>

        <?php include 'include/layout/main.php'; ?>

    </div>

    <?php include 'include/layout/footer.php'; ?>


    <script src="js/config.js"></script>
    <script src="js/autocomplete.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script> 
    <script src="js/app.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>