<?php
include_once("config.php");
$id=$_GET['id'];

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "DELETE FROM metro_cards WHERE CARD_NO='$id'";

$result = mysqli_query($connect, $query);

if($result)
{
    header("location: Cards.php");
}

else
{
    echo "<h2>Failed!!</h2>";
}

?>