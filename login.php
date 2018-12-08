<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location: setup/user.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main2.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="navbarClass">
        <h3><a href="#">PICKUP</a></h3>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="feedback.html">Feedback</a></li>
            <li class="floatRight1"><a href="login.php">Log In</a></li>
            <li class="floatRight"><a href="signup.php">Sign Up</a></li>
        </ul>
    </div>
    <div class="loginContainer">
        <div class="inputImage" id="camera">
        
        </div>
        <button id="take_snapshots" style="position: absolute;left:50%;z-index:100">Click Picture</button>
        
        <div class="getStartClass">
            <p>- OR -</p>
            <a href="loginwithpass.php">Login Using Email-ID and Password</a>
        </div>
    </div>
    <a href="compare/compare.php"><button id="login" style="position: absolute;z-index:11000">Login</button></a>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
        <script>
            var options = {
            shutter_ogg_url: "jpeg_camera/shutter.ogg",
            shutter_mp3_url: "jpeg_camera/shutter.mp3",
            swf_url: "jpeg_camera/jpeg_camera.swf",
            };
            var camera = new JpegCamera("#camera", options);
        
        $('#take_snapshots').click(function(){
            var snapshot = camera.capture();
            snapshot.show();
            
            snapshot.upload({api_url: "compare/action.php"}).done(function(response) {
        $('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
        }).fail(function(response) {
        alert("Upload failed with status " + response);
        });
        })

        function done(){
            $('#snapshots').html("uploaded");
        }
        </script>
</body>
</html>