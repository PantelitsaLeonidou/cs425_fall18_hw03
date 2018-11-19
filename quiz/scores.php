
<!DOCTYPE html>
<html>
<head>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="css.css">
<title>Scores</title>
<meta name="description" content="This is the highscore page of the game,the scores of each user is showed by the nickaname.">
  <meta name="keywords" content="HTML,CSS,php,game,trivial game,QUIZ,epl425,Internet Technology,Instructions",highscores>
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="scores.png">
</head>
<body>

 
 <div class="navigator">
<nav > 
    <a id="logo" href="index.php">Quiz Game</a>
    <a href="index.php">Home</a> 
    <a href="help.php">Help</a> 
    <a href="scores.php">Scores</a> 
   
  </nav></div>
  
  
<div class="main">

<div class="container_outside container">
<div id="topthree" class=" highscore">
<div class="help_title">
Highscores:</div>

<?php
$my_file = 'scores.txt';
$handle = fopen($my_file, 'r');
$score_lines=array();
$count=0;
$line_score=array();
 while(! feof($handle))  {
	$result = fgets($handle);
	$line_score[$count]=$result;
	$count++;
  } 
  for($i=0;$i<$count;$i++){
	$arr = explode("\t", $line_score[$i]);
	$nickname_ar[$i]=$arr[0];
	$score_ar[$i]=$arr[1];
	
	}
$max1=0;
$t1=0;
for($i=0;$i<$count;$i++){
if(intval($score_ar[$i])>=intval($max1)){
$max1=intval($score_ar[$i]);
$t1=$i;
}
}
$max2=0;
$t2=0;
for($i=0;$i<$count;$i++){

if($i==$t1){}
else{
	if(intval($score_ar[$i])>=$max2){
		$max2=intval($score_ar[$i]);
		$t2=$i;
	}
}
}

$max3=0;
$t3=0;
for($i=0;$i<$count;$i++){
if($i==$t1 || $i==$t2){}
else{
	if(intval($score_ar[$i])>=$max3){
		$max3=intval($score_ar[$i]);
		$t3=$i;
	}
}
}

echo "(1)".$nickname_ar[$t1]." ".$score_ar[$t1]."<br>";
echo "(2)".$nickname_ar[$t2]." ".$score_ar[$t2]."<br>";
echo "(3)".$nickname_ar[$t3]." ".$score_ar[$t3]."<br>";

fclose($handle);

?>
</div>
<div class=" highscore ">
<div class="help_title">All Scores:</div>
<?php
for($i=0;$i<$count;$i++){
echo $nickname_ar[$i]." ".$score_ar[$i]."<br>";
}
 ?>
<div>
</div>
</div>
</div>
</body>
<?php include 'footer.php';?>

</html>
