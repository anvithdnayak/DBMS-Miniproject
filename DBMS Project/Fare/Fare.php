<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "dbmsmp";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
if(!$connect){
    die("Connection Failed:".mysqli_connect_error());
}


$All_Stations = "(SELECT `station_name` FROM `g_stations`) UNION (SELECT `station_name` FROM `p_stations`)";
$result1 = mysqli_query($connect, $All_Stations);

$options = "";
while($row1 = mysqli_fetch_array($result1))
{
    $options = $options."<option>$row1[0]</option>";
}

?>


<html lang="eng">
<head>
    <title>Fare</title>
</head>

<style>
    #center
    {
        text-align: center;
    }
    .center {
        width: 100%;
    }
    .button {
        background-color: #ffc2c2;
        color: rgb(0, 0, 0);
        padding: 20px 60px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 10px;
        border-color: #ffc2c2;
    }
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
        background-color: #2bff00;
        color: rgb(0, 0, 0);
    }
</style>

<div class="topnav">
        <a class="active" href="/HomePage.php">Home</a>
      </div>

<body>
    <br><br><br><br><br><br><br><br>
    
    <form action="Fare_Calculation.php" method="post">

    <label style="margin-left:200px; font-size: x-large;">Choose From Station:
        <br><br>
    <input name="from" style="margin-left: 200px; height:35px; width: 1000px;" list="stations">
    </label>
    

    <br><br><br><br><br><br>

    <label style="margin-left:200px; font-size: x-large;">Choose To Station:
        <br><br>
    
    
    
    
    <input name="to" style="margin-left: 200px; height:35px; width: 1000px;" list="stations"></label>
    
    <br><br>

    
    <datalist id="stations">
        <option value = <select>"<?php echo $options;?>"</select>>
    </datalist>

    <br><br>
    <div class="Container" id="center">
        
        <button type="submit" name="submit" value="redirect" style="margin-right:50px" class="button btn-primary btn-lg">Calculate</button>
    </div>
</form>
</body>
</html>