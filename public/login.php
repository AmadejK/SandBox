<?php
require_once "config.php";
if (isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}
$loginURL=$gClient->createAuthUrl();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no,initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login With Google
    </title> >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div class="container" style="margin-top:100px "
     <div class="row justify-content-center ">
         <div class="col-md-6 col-offset-3" align="center">

             <form>
                 <input placeholder="Email..." name="email" class="form-control"><br>
                 <input type="password"  placeholder="Password..." name="password" class="form-control">
                 <input type="button" onclick="window.location='<?php echo $loginURL?>';" value="Log Inn" class="btn btn-danger">

             </form>
         </div>

     </div>
</div>

</body>
</html>