<?php
include('connection.php');




$u_check =mysqli_query($con,"SELECT * FROM players WHERE player ='$player1'");
$total = mysqli_num_rows($u_check);


// if($total != 0){
$query ="SELECT * FROM players WHERE player='$player1'";
$data =mysqli_query($con, $query);
$result = mysqli_fetch_assoc($data);

//set variables for values
$player1_wins = $result['wins'];
$player1_loss = $result['loss'];
// }else
// {
// $player1_wins = 0;
// $player1_loss = 0;
// }


// Player2
$u_check =mysqli_query($con,"SELECT * FROM players WHERE player ='$player2'");
$total = mysqli_num_rows($u_check);


// if($total != 0){

$query ="SELECT * FROM players WHERE player='$player2'";
$data =mysqli_query($con, $query);
$result = mysqli_fetch_assoc($data);

//set variables for values
$player2_wins = $result['wins'];
$player2_loss = $result['loss'];

// }else{
//   $player2_wins = 0;
//   $player2_loss = 0;
// }

?>


