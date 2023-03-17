<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "dbmsmp";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);




$from = $_REQUEST['from'];
$to = $_REQUEST['to'];


$query1 = "(SELECT `STATION_NUMBER` FROM `G_STATIONS` WHERE `STATION_NAME`='$from') UNION (SELECT `STATION_NUMBER` FROM `P_STATIONS` WHERE `STATION_NAME`='$from')";
$query2 = "(SELECT `STATION_NUMBER` FROM `G_STATIONS` WHERE `STATION_NAME`='$to') UNION (SELECT `STATION_NUMBER` FROM `P_STATIONS` WHERE `STATION_NAME`='$to')";

$fromStation = mysqli_query($connect, $query1);
$toStation = mysqli_query($connect, $query2);


while($row1 = mysqli_fetch_assoc($fromStation) and $row2 = mysqli_fetch_assoc($toStation)){
    if(($row1['STATION_NUMBER'] < 200) and ($row2['STATION_NUMBER'] < 200)){
        $nos = abs(($row1['STATION_NUMBER'])-($row2['STATION_NUMBER'])); # saving a variable nos(no of stations) to store the no of station ie [from-to]
    }
    if(($row1['STATION_NUMBER'] >= 200) and ($row2['STATION_NUMBER'] >= 200)){
        $nos = abs(($row1['STATION_NUMBER'])-($row2['STATION_NUMBER'])); # saving a variable nos(no of stations) to store the no of station ie [from-to]
    }
    if(($row1['STATION_NUMBER'] >= 200) and ($row2['STATION_NUMBER'] < 200)){
        $nos = abs(abs(($row1['STATION_NUMBER'])-209) + abs(($row2['STATION_NUMBER']-116))); # saving a variable nos(no of stations) to store the no of station ie [from-to]
    }
    if(($row1['STATION_NUMBER'] < 200) and ($row2['STATION_NUMBER'] >= 200)){
        $nos = abs(abs(($row1['STATION_NUMBER'])-116) + abs(($row2['STATION_NUMBER']-209))); # saving a variable nos(no of stations) to store the no of station ie [from-to]
    }
}




$query_s_fare = "SELECT `FARE` FROM `FARE_STORED` WHERE `NUMBER_OF_STATIONS` = '$nos'";
$query_t_fare = "SELECT `FARE` FROM `FARE_TOKEN` WHERE `NUMBER_OF_STATIONS` = '$nos'";

$int_stored = mysqli_query($connect, $query_s_fare);
$int_token = mysqli_query($connect, $query_t_fare);

while($row3 = mysqli_fetch_assoc($int_stored)){
    $stored = $row3['FARE'];
}

while($row4 = mysqli_fetch_assoc($int_token)){
    $token = $row4['FARE'];
}

?>


<html>
    <head><title>Fare</title>
        <style> 
    .topnav {
        background-color: #000000;
        overflow: hidden;
    }

    .topnav a {
        float: left;
        color: #000000;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 20px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: rgb(0, 0, 0);
    }

    .topnav a.active {
        background-color: #880fff;
        color: rgb(255, 255, 255);
    }

</style>

</head>

<div class="topnav">
        <a class="active" href="/HomePage.php">Home</a>
      </div>
    
    <body bgcolor="A0A0BA">
        <br><br>
    <center>
        <h3><?php echo "<u>From</u> : $from"?></h3>
        <h3><?php echo "<u>To</u> : $to<br>"?></h3>
        <h2><?php echo "Total Stations Travelled  ===>  $nos<br><br>"?></h2>
        <h2><?php echo "<u>Stored Price</u> = $stored<br>"?></h2>
        <h2><?php echo "<u>Token Price</u> = $token<br><br>"?></h2>
    </center>

    <marquee scrollamount=20>
    <center>
        <h1>Greetings!</h1>
        <h1>Have Fun Travelling in Namma Metro</FONTCOLOR></h1>
        <h2><?php echo "----------------------------------------------------------------------"?></h2>
        <h2><?php echo "You'll have to pay $stored Rupees for the recharge of your metro card!"?></h2>
        <h3><?php echo "------------------------------------------or--------------------------------------------"?></h3>
        <h2><?php echo "You'll have to pay $token Rupees for your Token!"?></h2>
    </center>
    </marquee>
</html>