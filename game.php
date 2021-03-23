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



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Tic-Toe</title>
    <style>
        body{
            /* text-align: center; */
            margin: 0;
        }

        #header{
            height: 50px;
            background-color: black;
        }
        
        #main{
            text-align: center;
            position: relative;
            left: 450px; */
        }

        #div1, #div2, #div3, #div4, #div5, #div6, #div7, #div8, #div9 {

        border: 1px solid black;    
        height: 150px;
        width: 150px;
        float: left;
        font-size: 140px;
        }
        #div1, #div4, #div7{
            clear: left;
            border-left: none;
        }
        #div3, #div6, #div9{
            border-right: none;
        }
        #div1, #div2, #div3{
            border-top: none;
        }
        #div7, #div8, #div9{
            border-bottom: none;
        }


        .button-container{
            position: relative;
            top:500px;
            left: 170px; */
            /* float: center; */
        }
      
        .player-box{
            height: 100%;
            width: 300px;
            background-color: grey;
            padding: 20px;
            color: white;
        }

        #player1{
            position: absolute;
            left: 10px;

        }
        
        #player2{
            position: absolute;
            right: 10px;
        }


    </style>
</head>
<body>
        <!-- <div class="header"> 
        <a href ="exit.php">EXIT</a>
        <div> -->
        <div class="player-box" id="player1"><h1>
        <?php echo $player1 ; ?></h1>
        <div>WINS:<h2 id="score1"></h2></div>
        <div>lOSSES:<h2 id="losses1"></h2></div>
              <div>Total Matches Wins: <?php echo $player1_wins; ?></div>
              <div>Total Matches Losses: <?php echo $player1_loss; ?></div>

        </div>
        <div class="player-box" id="player2">
        <h1><?php echo $player2 ; ?></h1>
        <div>WINS:<h2 id="score2"></h2></div>
        <div>LOSSES:<h2 id="losses2"></h2></div>
             <div>Total Matches Wins: <?php echo $player2_wins; ?></div>
             <div>Total Matches Losses: <?php echo $player2_loss; ?></div>

        </div>

         <div id="main">
            <div id="div1" onclick="fill(this)"></div> <div id="div2" onclick="fill(this)"></div> <div id="div3" onclick="fill(this)"></div>
            <div id="div4" onclick="fill(this)"></div> <div id="div5" onclick="fill(this)"></div> <div id="div6" onclick="fill(this)"></div>
            <div id="div7"onclick="fill(this)"></div> <div id="div8" onclick="fill(this)"></div> <div id="div9" onclick="fill(this)"></div>
        </div> 
    
       

        <div class="button-container">
        <button><a href ="exit.php">ESC</a></button>
        <!-- <button onClick="run()"> CONTINUE</button> -->
        <button id="btn">Update</button>
        </div>





<script>
   
   var count=1;
   var winner = "";
   var winnerPlayer = "";
   var wins1 = "";
   var wins2 = "";
   var losses1= "";
   var losses2= "";
   function fill(control){
      
     
      
            if(count < 9){


                if(count%2!=0)
                {
                    document.getElementById(control.id).innerHTML="X";
                }else
                {
                    document.getElementById(control.id).innerHTML="O";
                }
                count++;
                  if(checkWin())
                {
                 swal(winnerPlayer+' WON The MATCH');
                 reset();
                }
            }else{
                swal("Match Draw");
                reset();
            }
        
    }

    function reset()
    {
        for(var i =1; i<=9; i++)
        {
            document.getElementById('div'+i).innerHTML="";
            count=1;
        }
    }

    function checkWin(){
       if(checkCondition('div1','div2','div3') ||checkCondition('div1','div5','div9') || 
         checkCondition('div1','div4','div7') || checkCondition('div3','div5','div7') ||
         checkCondition('div4','div5','div6') || checkCondition('div7','div8','div9') ||
         checkCondition('div2','div5','div8') || checkCondition('div3','div6','div9') )
         {
            return true;
         }
    }
    
    function checkCondition(div1,div2,div3){
        if( getData(div1)!="" && getData(div2)!="" && getData(div3)!="" && 
        getData(div1) == getData(div2) && getData(div2) == getData(div3))
        {
            winner = getData(div1)
            whoWon();
            Totalscore();
            return true;
        }
    }

    function whoWon(){
        if(winner == 'X'){
           winnerPlayer = "Player1"
        }else{
           winnerPlayer = "Player2" 
        }
    }
    
    function Totalscore(){
        if(winnerPlayer == "Player1"){
            wins1++;

            losses2++;
        
            document.getElementById('score1').innerHTML = wins1;
            document.getElementById('losses2').innerHTML = losses2;
        }else{
            wins2++;
            
            losses1++
        
            document.getElementById('score2').innerHTML = wins2;
            document.getElementById('losses1').innerHTML = losses1;
        }
    }

    function getData(div){
        return document.getElementById(div).innerHTML;
    }

 var valu_wins = '<?php echo $player1_wins;  ?>';   
 

$(document).ready(function(){
  $("#btn").click(function(){
    $.post("upload.php",
    {
      player1: "<?php echo $player1;  ?>",
      player1_wins: wins1 ,
      player1_loss: losses1,
      player2: "<?php echo $player2;  ?>",
      player2_wins: wins2 ,
      player2_loss: losses2,
    },
    function(data,status){

      console.log("Data: " + data + "\nStatus: " + status);
      location.reload(); 
    });
  });
});

</script>    
</body>
</html>