<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "dbmsmp";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
?>
<html>
    <head>
        <title>Green Line Time Table</title>
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
            background-color: #2bff00;
            color: rgb(0, 0, 0);
            }
            th, td {
                font-size: 22px;
            }

        </style>
    </head>
    <div class="topnav">
        <a class="active" href="/HomePage.php">Home</a>
      </div>
<body>
<br>
<center><h2><u>WEEKDAYS</u></h2></center>
    <table bgcolor="70FF60" align="center" border="2" height=500 , width=1000>
        <tr><th>FROM
            <th>TO
            <th>FREQUENCY
        </tr>
        
        <?php
            
            $query = "SELECT * FROM `time_table_gl_weekdays`";
            $week = mysqli_query($connect, $query);
            if($week)
            {
                while($record=mysqli_fetch_assoc($week))
                {
                    echo "<tr><td align='center'>".$record['_FROM_'];
                    echo "<td align='center'>".$record['_TO_'];
                    echo "<td align='center'>".$record['FREQUENCY'];
                }
            }
        ?>
    </table>


<br><br><br><br>
<center><h2><u>WEEKENDS</u></h2></center>
<table bgcolor="70FF60" align="center" border="2" height=500 , width=1000>
        <tr><th>FROM
            <th>TO
            <th>FREQUENCY
        </tr>
        
        <?php
            
            $query = "SELECT * FROM `time_table_gl_weekends`";
            $week = mysqli_query($connect, $query);
            if($week)
            {
                while($record=mysqli_fetch_assoc($week))
                {
                    echo "<tr><td align='center'>".$record['_FROM_'];
                    echo "<td align='center'>".$record['_TO_'];
                    echo "<td align='center'>".$record['FREQUENCY'];
                }
            }
        ?>
    </table>
    <br><br>
</body>
</html>