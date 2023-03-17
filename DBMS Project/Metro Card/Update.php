<?php
include_once("config.php");

$id = $_GET['id'];

$query = "SELECT * FROM metro_cards ORDER BY CARD_NO=$id";

$result = mysqli_query($connect, $query);
while($res=mysqli_fetch_array($result))
{
    $name = $res['NAME'];
    $num = $res['CARD_NO'];
    $bal = $res['BALANCE'];
}
?>

<html>
<head>
    <title>Metro Card</title>
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
      background-color: #880fff;
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
<br>
<h3><a href="Cards.php">Back to Metro Cards</a></h3>
<body>
    <br><br><br><br><br><br><br>
    
    <form action="" method="POST">
    <center>
        <label style="font-size: x-large;">Enter Name:
            <input type="text" name="name" style="height:25px; width: 250px;" value="<?php echo $name; ?>">
        </label>
        
        <br><br><br><br><br><br>
        
        <label style="font-size: x-large;">Enter Card Number:  
            <input type="number" name="num" style="height:25px; width: 250px;" value="<?php echo $num; ?>">
        </label>
        
        <br><br><br><br>

        <label style="font-size: x-large;">Enter Balance:
            <input type="number" name="bal" style="height:25px; width: 250px;" value="<?php echo $bal; ?>">
        </label>
        
        <br><br><br>
        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
        <br><br><br>

        <div class="Container" id="center">
            
            <button type="submit" name="submit" value="Update" style="margin-right:50px" class="button btn-primary btn-lg">UPDATE</button>
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
        $query = "UPDATE `metro_cards` SET NAME='$name', CARD_NO='$num', BALANCE='$bal', `ENTRY`=1 WHERE CARD_NO='$id'";
    }
    
    else
    {
        $query = "UPDATE `metro_cards` SET NAME='$name', CARD_NO='$num', BALANCE='$bal', `ENTRY`=0 WHERE CARD_NO='$id'";
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