<?php
error_reporting(0);
session_start();
include("connection.php");

session_start();
include('connection.php');

$player1 = $_SESSION['player_1'];
$player2 = $_SESSION['player_2'];
if($player1==true || $player2==true){
    header('Location: game.php');
}else{
    
 
}

$error = "";

if(isset($_POST['submit']))
 {
    $player1 = strip_tags($_POST['player1']);
    $player2 = strip_tags($_POST['player2']); 
  //  $query = SELECT * FROM data WHERE  password='$pass';
     
//    echo $player1;
//    echo $player2;

   if($player1 == $player2){
       echo "both name can not be same";
   }
   else{    
   if($player1 != "" || $player2 != ""){

   
       $_SESSION['player_1']=$player1;
       $_SESSION['player_2']=$player2;
       
            header('Location: game.php');
   }else{
       $error = "player name is required";
   }
}
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIC-TAC-TOE</title>
    <style>
    body{
        text-align: center;
        margin: 0;
    }
    .logo{
        height: 200px;
    }
    input{
        padding: 10px;
    }
    </style>
</head>
<body>
    <div>
        <br><br>
      <img class="logo" src="logo.gif" />
      <br>
      <h1><?php echo $error ; ?></h1>
      <form action="" method="post">
      <input type="text" name="player1" placeholder="Player1" />
      <input type="text" name="player2" placeholder="Player2" />
      <input type="submit" name="submit" value="Lets Go" />
      </form>
    </div>
</body>
</html>