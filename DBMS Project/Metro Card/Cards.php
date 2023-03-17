<?php
include_once("config.php");

$query = "SELECT * FROM `metro_cards`";
$data = mysqli_query($connect, $query);
?>
<html>
    <head><title>Metro Cards</title>
<style>
    .button {
        background-color: #ffc2c2;
        color: rgb(200, 0, 0);
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        font-size: 17px;
        border-radius: 10px;
        border-color: #ffc2c2;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-risk {
        color: #fff;
        background-color: #ff0705;
        border-color: #a72845;
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
      background-color: #0bff52;
      color: rgb(0, 0, 0);
  }

</style>

</head>

<div class="topnav">
      <a class="active" href="/HomePage.php">Home</a>
    </div>

<body>
<br><br>
<center><img src="Images\Card.jpg", width=15%></center>
<br>
<center><h1><u>CARDS</h1></u></center>
    <table bgcolor="D0B0E0" align="center" border="2" width=800>
        <th>NAME</th>
            <th>CARD_NO</th>
            <th>BALANCE</th>
            <th>ENTRY</th>
            <th>UPDATE</th>
            <th>REMOVE</th>
        
        
        <?php
            
            while($res=mysqli_fetch_assoc($data))
            {
                if($data)
                {
                    echo "<tr><td align='center'>".$res['NAME']."</td>";
                    echo "<td align='center'>".$res['CARD_NO']."</td>";
                    echo "<td align='center'>".$res['BALANCE']."</td>";
                    if($res['ENTRY'])
                    {
                        echo "<td align='center'>Allowed";
                    }
                    else
                    {
                        echo "<td align='center'>Not Allowed";
                    }
                    echo "<td align='center'><a href=\"Update.php?id=$res[CARD_NO]\"><button type=\"submit\" value=\"redirect\" class=\"button btn-success btn-lg\">EDIT</button></a>";
                    echo "<td align='center'><a href=\"Delete.php?id=$res[CARD_NO]\" onClick=\"return confirm('Are you sure you want to Delete?')\"><button type=\"button\" class=\"button btn-risk btn-lg\">DELETE</button></a>";
                    
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <br><br>
    <a href="New Card.php"><center><h3>ADD CARDS</h3></center></a>
</body>
</html>
