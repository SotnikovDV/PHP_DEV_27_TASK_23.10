<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Автородео</h1>
    <hr>
    <p>
<?php
include_once ('auto.class.php');

echo '<h2>Легковушка</h2>';
$car = new Car();
showAuto($car);
echo '<br>';

echo '<h2>Грузовик</h2>';
$truck = new Truck();
showAuto($truck);
echo '<br>';

echo '<h2>Бульдозер</h2>';
$bulldozer = new Bulldozer();
showAuto($bulldozer);
echo '<br>';

echo '<h2>Танк</h2>';
$panzer = new Panzer();
showAuto($panzer);
echo '<br>';

?>
</p>
</body>
</html>