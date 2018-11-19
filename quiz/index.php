<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>HomePage</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="This is the page of the game.After pressing start you can play the game.">
  <meta name="keywords" content="HTML,CSS,php,game,trivial game,QUIZ,epl425,Internet Technology,Instructions">
  <meta name="author" content="John Doe">
<link rel="shortcut icon" href="home.png">
</head>
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
<div class="game">

<?php

$score;
$button_value;
$qn;
$complexity;
$question;
$answer0;
$answer1;
$answer2;
$answer3;
$correct0;
$correct1;
$correct2;
$correct3;
$correct4;
$complexity0;
$complexity1;
$complexity2;
$complexity3;
$complexity4;

function easyQuest(){
	if($_SESSION['easycounter']==0){
	$rand=rand(0,24);}
	else{
	$flag='F';
	while($flag!='T'){
	$rand=rand(0,24);
	for($i=0;$i<=$_SESSION['easycounter'];$i++){
	
		if(intval($_SESSION['easy'][$i])==intval($rand)){
			$flag='F';}
		else{$flag='T';}
	}
	}
	}
	$_SESSION['easycounter']++;
	$_SESSION['easy'][$_SESSION['easycounter']]=$rand;
	echo $_SESSION['easy'][$_SESSION['easycounter']];
	$xml=simplexml_load_file("Questions.xml");
	$GLOBALS['complexity']=0;
	$GLOBALS ['question']=$xml->easy->question[$rand]->q;
	$GLOBALS ['answer0']=$xml->easy->question[$rand]->answer[0];
	$GLOBALS ['answer1']=$xml->easy->question[$rand]->answer[1];
	$GLOBALS ['answer2']=$xml->easy->question[$rand]->answer[2];
	$GLOBALS ['answer3']=$xml->easy->question[$rand]->answer[3];

	if($xml->easy->question[$rand]->answer[0]['right']==T){
		$GLOBALS ['correct']=0;
	}
	if($xml->easy->question[$rand]->answer[1]['right']==T){
		$GLOBALS ['correct']=1;
	}
	if($xml->easy->question[$rand]->answer[2]['right']==T){
		$GLOBALS ['correct']=2;
	}
	if($xml->easy->question[$rand]->answer[3]['right']==T){
		$GLOBALS ['correct']=3;
	}
}

function mediumQuest(){
	if($_SESSION['mediumcounter']==0){
	$rand=rand(0,14);}
	else{
	$flag='F';
	while($flag!='T'){
	$rand=rand(0,14);
	for($i=0;$i<=$_SESSION['mediumcounter'];$i++){
		if(intval($_SESSION['medium'][$i])==intval($rand)){
			$flag='F';}
		else{$flag='T';}
	}
	}
	}
	$_SESSION['mediumcounter']++;
	$_SESSION['medium'][$_SESSION['mediumcounter']]=$rand;
	
	$xml=simplexml_load_file("Questions.xml");
	$GLOBALS['complexity']=1;
	$GLOBALS ['question']=$xml->medium->question[$rand]->q;
	$GLOBALS ['answer0']=$xml->medium->question[$rand]->answer[0];
	$GLOBALS ['answer1']=$xml->medium->question[$rand]->answer[1];
	$GLOBALS ['answer2']=$xml->medium->question[$rand]->answer[2];
	$GLOBALS ['answer3']=$xml->medium->question[$rand]->answer[3];

	if($xml->medium->question[$rand]->answer[0]['right']==T){
		$GLOBALS ['correct']=0;
	}
	if($xml->medium->question[$rand]->answer[1]['right']==T){
		$GLOBALS ['correct']=1;
	}
	if($xml->medium->question[$rand]->answer[2]['right']==T){
		$GLOBALS ['correct']=2;
	}
	if($xml->medium->question[$rand]->answer[3]['right']==T){
	$GLOBALS ['correct']=3;
	}
}
function hardQuest(){
	$flag='F';
	if($_SESSION['hardcounter']==0){
	$rand=rand(0,14);}
	else{
	while($flag!='T'){
	$rand=rand(0,14);
	for($i=0;$i<=$_SESSION['hardcounter'];$i++){
		if(intval($_SESSION['hard'][$i])==intval($rand)){
			$flag='F';}
		else{$flag='T';}
	}
	}
	}
	$_SESSION['hardcounter']++;
	$_SESSION['hard'][$_SESSION['hardcounter']]=$rand;
	
	$rand=rand(0,14);
	$xml=simplexml_load_file("Questions.xml");
	$GLOBALS['complexity']=2;
	$GLOBALS ['question']=$xml->hard->question[$rand]->q;
	$GLOBALS ['answer0']=$xml->hard->question[$rand]->answer[0];
	$GLOBALS ['answer1']=$xml->hard->question[$rand]->answer[1];
	$GLOBALS ['answer2']=$xml->hard->question[$rand]->answer[2];
	$GLOBALS ['answer3']=$xml->hard->question[$rand]->answer[3];

	if($xml->hard->question[$rand]->answer[0]['right']==T){
		$GLOBALS ['correct']=0;
	}	
	if($xml->hard->question[$rand]->answer[1]['right']==T){
		$GLOBALS ['correct']=1;
	}
	if($xml->hard->question[$rand]->answer[2]['right']==T){
		$GLOBALS ['correct']=2;
	}
	if($xml->hard->question[$rand]->answer[3]['right']==T){
		$GLOBALS ['correct']=3;
	}
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
     echo "
<div class=\"container_outside_question container\">
<form id=\"play\" class=\"play_form\" action=\"\" method=\"post\">

<div class=\"welcome\" >Welcome to EPL425 Quiz GAME!</div>
<input class=\"btn btn-outline-secondary\" name=\"start\" id=\"start_button\"type=\"submit\" value=\"start\">
<input name=\"first\" id=\"first\" type=\"hidden\" value=\"T\">

</form>
</div>
";


}
else{  
	

	if(isset($_POST['next'])||isset($_POST['start'])){

	$GLOBALS['button_value']="next";
	$finish="F";
	if($_POST['first']=='T'){
		$easy=array();
		$medium=array();
		$hard=array();
		$_SESSION['easy']=$easy;
		$_SESSION['medium']=$medium;
		$_SESSION['hard']=$hard;
		$_SESSION['easycounter']=0;
		$_SESSION['mediumcounter']=0;
		$_SESSION['hardcounter']=0;
		$GLOBALS['score']=0;
		mediumQuest(); 
		$_POST['first']=='F';
		$GLOBALS['qn']=$_POST['qn']+1;
		
		
	
		
	}
	else{	
		$GLOBALS['correct0']=$_POST['correct0'];
       	$GLOBALS['correct1']=$_POST['correct1'];
		$GLOBALS['correct2']=$_POST['correct2']; 
		$GLOBALS['correct3']=$_POST['correct3'];
		$GLOBALS['correct4']=$_POST['correct4'];
		
		$GLOBALS['complexity1']=$_POST['complexity1'];
		$GLOBALS['complexity2']=$_POST['complexity2'];
		$GLOBALS['complexity3']=$_POST['complexity3'];
		$GLOBALS['complexity4']=$_POST['complexity4'];
		 
		
		if($_POST['qn']<5){
		if($_POST['qn']==4){	
			

			$GLOBALS['button_value']="Finish";	

			if($_POST['answer']==$_POST['correct']){
			
			
			$GLOBALS['answers[$GLOBALS[\'qn\']']="correct";
 			if(($_POST['complexity']==1) || ($_POST['complexity']==2) ){
				if($_POST['complexity']==1){
					$GLOBALS['score']=$_POST['score']+2;
				}
				if($_POST['complexity']==2){
				$GLOBALS['score']=$_POST['score']+3;}
				$GLOBALS['complexity4']=2;	
				$_POST['complexity']=2; 
				hardQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
				
				
			}
 			else if($_POST['complexity']== 0){
				$GLOBALS['score']=$_POST['score']+1;
				$GLOBALS['complexity4']=1;	
				$_POST['complexity']=1;
				mediumQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
			}$GLOBALS['correct3']="correct";
		 	 
		}
		else{ 	
 			if(($_POST['complexity']==0) || ($_POST['complexity']==1) ){
				$GLOBALS['score']=$_POST['score'];
				$GLOBALS['complexity4']=0;
				$_POST['complexity']=0;
				easyQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
			}
 			else if($_POST['complexity']== 2){
				$GLOBALS['score']=$_POST['score'];
				$GLOBALS['complexity4']=1;
				$_POST['complexity']=1;
				mediumQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
			}
			$GLOBALS['correct3']="wrong";
			
		}

		
		}else{ 
		if($_POST['answer']==$_POST['correct']){
			
 			if(($_POST['complexity']==1) || ($_POST['complexity']==2) ){
				if($_POST['complexity']==1){
					$GLOBALS['score']=$_POST['score']+2;
				}
				if($_POST['complexity']==2){
					$GLOBALS['score']=$_POST['score']+3;
				}
				if($_POST['qn']==1){$GLOBALS['complexity1']=2;}
				if($_POST['qn']==2){$GLOBALS['complexity2']=2;}
				if($_POST['qn']==3){$GLOBALS['complexity3']=2;}
				$_POST['complexity']=2; 
				hardQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
				
			}
 			else if($_POST['complexity']== 0){
				$GLOBALS['score']=$_POST['score']+1;
				if($_POST['qn']==1){$GLOBALS['complexity1']=1;}
				if($_POST['qn']==2){$GLOBALS['complexity2']=1;}
				if($_POST['qn']==3){$GLOBALS['complexity3']=1;}
				$_POST['complexity']=1;
				mediumQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
			}
			if($_POST['qn']==1){$GLOBALS['correct0']="correct";}
			else if($_POST['qn']==2){$GLOBALS['correct1']="correct";}
			else if($_POST['qn']==3){$GLOBALS['correct2']="correct";}
			else if($_POST['qn']==5){$GLOBALS['correct4']="correct";}
			
		 	 
		}
		else{ 	
 			if(($_POST['complexity']==0) || ($_POST['complexity']==1) ){
				$GLOBALS['score']=$_POST['score'];
				if($_POST['qn']==1){$GLOBALS['complexity1']=0;}
				if($_POST['qn']==2){$GLOBALS['complexity2']=0;}
				if($_POST['qn']==3){$GLOBALS['complexity3']=0;}
				$_POST['complexity']=0;
				easyQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
			}
 			else if($_POST['complexity']== 2){
				$GLOBALS['score']=$_POST['score'];
				if($_POST['qn']==1){$GLOBALS['complexity1']=1;}
				if($_POST['qn']==2){$GLOBALS['complexity2']=1;}
				if($_POST['qn']==2){$GLOBALS['complexity2']=1;}
				$_POST['complexity']=1;
				mediumQuest();
				$GLOBALS['qn']=$_POST['qn']+1;
			}
			if($_POST['qn']==1){$GLOBALS['correct0']="wrong";}
			else if($_POST['qn']==2){$GLOBALS['correct1']="wrong";}
			else if($_POST['qn']==3){$GLOBALS['correct2']="wrong";}
			else if($_POST['qn']==5){$GLOBALS['correct4']="wrong";}
		}
}
}
else{
if($_POST['answer']==$_POST['correct']){
	$GLOBALS['correct4']="correct";
	if($_POST['complexity']==0){
		$GLOBALS['score']=$_POST['score']+1;}
	else if($_POST['complexity']==1){
		$GLOBALS['score']=$_POST['score']+2;}
	else if($_POST['complexity']==2){
		$GLOBALS['score']=$_POST['score']+3;}
}
else{$GLOBALS['correct4']="wrong";$GLOBALS['score']=$_POST['score'];}

$finish="T";

if($GLOBALS['complexity1']==0){
	$comp1=" easy complexity";
	if($GLOBALS['correct1']=="correct"){		
		$points1=1;
		}
	else{$points1=0;}
}
elseif($GLOBALS['complexity1']==1){
	$comp1=" medium complexity";
	if($GLOBALS['correct1']=="correct"){		
		$points1=2;
		}
	else{$points1=0;}
}
elseif($GLOBALS['complexity1']==2){
	$comp1=" hard complexity";
	if($GLOBALS['correct1']=="correct"){		
		$points1=3;
		}
	else{$points1=0;}
}
if($GLOBALS['complexity2']==0){
	$comp2=" easy complexity";
	if($GLOBALS['correct2']=="correct"){		
		$points2=1;
		}
	else{$points2=0;}
}
elseif($GLOBALS['complexity2']==1){
	$comp2=" medium complexity";
	if($GLOBALS['correct2']=="correct"){		
		$points2=2;
		}
	else{$points2=0;}}
elseif($GLOBALS['complexity2']==2){
	$comp2=" hard complexity";
	if($GLOBALS['correct2']=="correct"){		
		$points2=3;
		}
	else{$points2=0;}}
if($GLOBALS['complexity3']==0){
$comp3=" easy complexity";
if($GLOBALS['correct3']=="correct"){		
		$points3=1;
		}
	else{$points3=0;}}
elseif($GLOBALS['complexity3']==1){
$comp3=" medium complexity";
if($GLOBALS['correct3']=="correct"){		
		$points3=2;
		}
	else{$points3=0;}}
elseif($GLOBALS['complexity3']==2){
$comp3=" hard complexity";
if($GLOBALS['correct3']=="correct"){		
		$points3=3;
		}
	else{$points3=0;}}
if($GLOBALS['complexity4']==0){
$comp4=" easy complexity";
if($GLOBALS['correct4']=="correct"){		
		$points4=1;
		}
	else{$points4=0;}}
elseif($GLOBALS['complexity4']==1){
$comp4=" medium complexity";
if($GLOBALS['correct4']=="correct"){		
		$points4=2;
		}
	else{$points4=0;}}
elseif($GLOBALS['complexity4']==2){
$comp4=" hard complexity";
if($GLOBALS['correct4']=="correct"){		
		$points4=3;
		}
	else{$points4=0;}
	}
if($GLOBALS['correct0']=="correct"){$points0=2;}
else{$points0=0;}
echo"<div class=\"score container_outside_question container\">";
echo"<div class=\"table\">";
echo"<table align=\"center\">";
echo "<tr><th>Question</th><th>Answer</th><th>Complexity </th><th>Gain</th></tr>";
echo "<tr><td>1</td><td>".$GLOBALS['correct0']."</td><td>"." medium complexity </td><td>".$points0."</td></tr>";
echo "<tr><td>2</td><td>".$GLOBALS['correct1']."</td><td>".$comp1."</td><td> ".$points1."</td></tr>";
echo "<tr><td>3</td><td>".$GLOBALS['correct2']."</td><td>".$comp2."</td><td>" .$points2."</td></tr>";
echo "<tr><td>4</td><td>".$GLOBALS['correct3']."</td><td>".$comp3 ."</td><td>".$points3."</td></tr>";
echo "<tr><td>5</td><td>".$GLOBALS['correct4']."</td><td>".$comp4."</td><td>".$points4."</td></tr>";
echo "<tr><td>Final Score: ".$GLOBALS['score']."</td></tr>";
echo "</table>";
echo "</div>";


echo"
<form id=\"save_score\" class=\"save_score\" action=\"\" method=\"post\">
<div class=\"submit_message \">Do you want to submit your score?</div>
<input class=\"btn btn-outline-secondary\" name=\"yes\" id=\"yes_button\"type=\"submit\" value=\"yes\">
<input class=\"btn btn-outline-secondary\" name=\"no\" id=\"no_button\"type=\"submit\" value=\"no\">
<input type=\"hidden\" name=\"score\" value=\"".$GLOBALS['score']."\">
</form>
</div>";


}

}
if($finish=="F"){

 echo "

<div class=\"container_outside_question container form-group\">
<form id=\"play\" class=\"question_form\" action=\"\" method=\"post\">


<div class=\"question\">";
echo "(".$GLOBALS['qn'].")"
.htmlspecialchars($question)."
</div>

<div class=\"answer\">
<input type=\"radio\" name=\"answer\" value=\"0\" >";
print(htmlspecialchars($answer0));
echo"<br>
<input type=\"radio\" name=\"answer\" value=\"1\">"; 
print(htmlspecialchars($answer1));
echo "<br>
<input type=\"radio\" name=\"answer\" value=\"2\">"; 
print(htmlspecialchars($answer2));
echo" <br>
<input type=\"radio\" name=\"answer\" value=\"3\">";
print(htmlspecialchars($answer3));
echo "
<input type=\"hidden\" name=\"qn\" value=\"". $GLOBALS['qn']."\">
<input type=\"hidden\" name=\"complexity\" value=\"". $GLOBALS['complexity']."\">
<input type=\"hidden\" name=\"correct\" value=\"". $GLOBALS['correct']."\" >
<input type=\"hidden\" name=\"correct0\" value=\"". $GLOBALS['correct0']."\" >
<input type=\"hidden\" name=\"correct1\" value=\"". $GLOBALS['correct1']."\" >
<input type=\"hidden\" name=\"correct2\" value=\"". $GLOBALS['correct2']."\" >
<input type=\"hidden\" name=\"correct3\" value=\"". $GLOBALS['correct3']."\" >
<input type=\"hidden\" name=\"correct4\" value=\"". $GLOBALS['correct4']."\" >
<input type=\"hidden\" name=\"complexity0\" value=\"". $GLOBALS['complexity0']."\" >
<input type=\"hidden\" name=\"complexity1\" value=\"". $GLOBALS['complexity1']."\" >
<input type=\"hidden\" name=\"complexity2\" value=\"". $GLOBALS['complexity2']."\" >
<input type=\"hidden\" name=\"complexity3\" value=\"". $GLOBALS['complexity3']."\" >
<input type=\"hidden\" name=\"complexity4\" value=\"". $GLOBALS['complexity4']."\" >
<input type=\"hidden\" name=\"score\" value=\"".$GLOBALS['score']."\">
</div>
<div class=\"next_button\">
<input class=\"btn btn-outline-secondary\" type=\"submit\" name=\"next\" value=\"". $GLOBALS['button_value']."\">
<input class=\"btn btn-outline-secondary\" type=\"submit\" name=\"end\" value=\"end game\">
</div>
<div class=\"user_info\">
<div id=\"questions_left\">".(5-$GLOBALS['qn'])." questions are left!</div>


</div>
</form>
</div>";
}
}
if(isset($_POST['yes'])){
$GLOBALS['score']=$_POST['score'];

echo "

<div class=\"container_outside_question container form-group\">
<form id=\"add_nickname\" class=\"add_nickname\" action=\"\" method=\"post\">
<label id=\"nickname\" >Give a nickname:<label>
<input type=\"text\" name=\"nickname\" maxlength=\"7\" placeholder=\"username(max 7 chars)\" required>
<input type=\"hidden\" name=\"score\" value=\"".$GLOBALS['score']."\">
<input class=\"btn btn-outline-secondary\" name=\"submit_nickname\" id=\"submit_nickname\"type=\"submit\" value=\"Submit\">
</form>
</div>";
}

if((isset($_POST['no']))||(isset($_POST['end']))){
echo "
<div class=\"container_outside_question container \">
<form id=\"play\" class=\"form-group play_form\" action=\"index.php\" method=\"post\">
<div class=\"welcome\">Welcome to EPL425 Quiz GAME!</h1>
<input class=\"btn btn-outline-secondary\" name=\"start\" id=\"start_button\"type=\"submit\" value=\"start\">
<input name=\"first\" id=\"first\" type=\"hidden\" value=\"T\">
</form></div>
";}
if(isset($_POST['submit_nickname'])){
 $nickname=$_POST['nickname'];
 $score=$_POST['score'];
 $score_line= $nickname."\t".$score."\n";
 
$my_file = 'scores.txt';
$handle = fopen($my_file, 'a');
if($handle){
fwrite($handle, $score_line);
echo "<div class=\"container_outside_question container\">Successfully submited score!</div>";
echo"<meta http-equiv=\"refresh\" content=\"0.7\">";
}else{
echo "<div class=\"container_outside_question container\">Unsuccessfully submited score!</div>";
echo"<meta http-equiv=\"refresh\" content=\"0.7\">";
}
fclose($handle);
}
}
?>
</div>
</div>
</body>
<?php include 'footer.php';?>
</html>
