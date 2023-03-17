<?php
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Card</title>
    <link rel="stylesheet" href="style.css">
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
      background-color: #2bff00a2;
      color: rgb(255, 255, 255);
  }


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
    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }
    </style>
</head>

<div class="topnav">
      <a class="active" href="/HomePage.php">Home</a>
    </div>

<body>
    <br><br><br><br><br><br><br><br>
    
    <form action="" method="POST">
        <center>
            <label style="font-size: x-large;">Enter Name:
                <input type="text" name="name" style="height:25px; width: 250px;">
        </label>
        
        <br><br><br><br><br><br>
        
        <label style="font-size: x-large;">Enter Card Number:  
            <input type="number" name="num" style="height:25px; width: 250px;">
        </label>
        
        <br><br><br><br>

        <label style="font-size: x-large;">Enter Balance:
            <input type="number" name="bal" style="height:25px; width: 250px;">
        </label>
        
        <br><br><br><br><br><br>

        <div class="Container" id="center">
            
            <button type="submit" name="submit" value="Insert" style="margin-right:50px" class="button btn-primary btn-lg">Submit</button>
        </div>
    </center>
</form>

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $num = $_POST['num'];
    $bal = $_POST['bal'];

    if($bal >= 50)
    {
        $query = "INSERT INTO `metro_cards` VALUES('$name', '$num', '$bal', 1)";
    }
    
    else
    {
        $query = "INSERT INTO `metro_cards` VALUES('$name', '$num', '$bal', 0)";
    }

    $result = mysqli_query($connect, $query);

    echo "<br><br>";
    if($result)
    {
        echo "<h1><center>Success!!</center></h1>";
        header("location: Cards.php");
    }
    else
    {
        echo "<h1><center>Failed!!!!</center></h1>";
    }
}
?>

</body>
</html>