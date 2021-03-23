<?php
session_start();
include('connection.php');

$player1 = $_SESSION['player_1'];
$player2 = $_SESSION['player_2'];
if($player1==true || $player2==true){

}else{
       header('Location: index.php');
 
}
include('details.php');



//data form main page  post method


$player1 = $_POST['player1'];
$player2 = $_POST['player2'];
$wins1 = $_POST['player1_wins'] + $player1_wins;
$loss1 = $_POST['player1_loss'] + $player1_loss;
$wins2 = $_POST['player2_wins'] + $player2_wins;
$loss2 = $_POST['player2_loss'] + $player2_loss;

// FOR PLAYER1

$u_check =mysqli_query($con,"SELECT * FROM players WHERE player ='$player1'");
$total = mysqli_num_rows($u_check);

if($total != 0)
{
    echo "player1 exist";
    $query =  "UPDATE `players` SET `wins`='$wins1',`loss`='$loss1' WHERE player = '$player1'";
    $data = mysqli_query($con, $query);
    // UPDATE `players` SET `id`='[value-1]',`player`='[value-2]',`wins`='[value-3]',`loss`='[value-4]' WHERE 1

}else{

    $query = "INSERT INTO `players`(`id`, `player`, `wins`, `loss`) VALUES ('','$player1','$wins1','$loss1')";
    $data = mysqli_query($con , $query);
}

// FOR PLAYER2


$u_check =mysqli_query($con,"SELECT * FROM players WHERE player ='$player2'");
$total = mysqli_num_rows($u_check);

if($total != 0)
{    
    echo "player1 exist";
    $query =  "UPDATE `players` SET `wins`='$wins2',`loss`='$loss2' WHERE player = '$player2'";
    $data = mysqli_query($con, $query);
}else{
    $query = "INSERT INTO `players`(`id`, `player`, `wins`, `loss`) VALUES ('','$player2','$wins2','$loss2')";
    $data = mysqli_query($con , $query);
}



// $query = "INSERT INTO `players`(`id`, `player`, `wins`, `loss`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')";
// /// mysql query to insert data////////
// $query = "  INSERT INTO players VALUES ('','$player2','$wins','$loss',) ";
// $data = mysqli_query($con , $query);

if($data){
	echo "hello";
}

?>



