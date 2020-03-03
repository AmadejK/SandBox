<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../vendor/autoload.php';
session_start();
if (!isset($_SESSION['access_token']))
{
   header('Location: login.php');
   exit();
}
?>

<?php
$apiKey = "7ad002fec464aa5926c1e33201e709a5";
$cityId = "524901";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);

$currentTime = time();
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login With Google
    </title> >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >

</head>

<body>
<div class="container" style="margin-top:100px "
<div class="col-md-3 ">
    <div class="col-md-3 col-offset-3>
    </div>
    <div class="col-md-9 col-offset-3" >
        <img style="width: 80%" src="<?php echo $_SESSION['picture']?>">

    </div>
    <table class="table table-hover table-bordered">
        <tbody>
        <tr>
            <td>ID</td>
            <td><?php echo $_SESSION['id']?></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?php echo $_SESSION['givenName']?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $_SESSION['familyName']?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $_SESSION['email']?></td>
        </tr><tr>
            <td>Gender</td>
            <td><?php echo $_SESSION['gender']?></td>
        </tr>

        </tbody>
    </table>
</div>
</div>
<title>Forecast Weather using OpenWeatherMap with PHP</title>
<p></p>
<div class="report-container">
    <h2><?php echo $data->name; ?> Weather Status</h2>
    <div class="time">
        <div><?php echo date("l g:i a", $currentTime); ?></div>
        <div><?php echo date("jS F, Y",$currentTime); ?></div>
        <div><?php echo ucwords($data->weather[0]->description); ?></div>
    </div>
    <div class="weather-forecast">
        <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
    </div>
    <div class="time">
        <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
        <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
    </div>
</div>


<form action=logout.php method=post>
    <input type="submit" name="log out" value="Log Out" class="btn btn-danger">
</form>

</body>
</html>


