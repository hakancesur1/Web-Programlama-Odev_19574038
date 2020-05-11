<?php

$username=$_POST['userName'];
$password=$_POST['password'];

$username=stripcslashes($username);
$password=stripcslashes($password);

$con=mysqli_connect("localhost","root","","login");

$username=mysqli_real_escape_string($con,$username);
$password=mysqli_real_escape_string($con,$password);

if( isset($_POST['newUser'])==FALSE ) {

	$result=mysqli_query($con,"select * from users where username='$username' and password='$password'") 
		or die("Failed to query database ".mysql_error());
		
	$row=mysqli_fetch_array($result);
	if(is_null($row)!==TRUE){
	if($row['username']==$username && $row['password']==$password){
		echo "<b>WELCOME</b><br/>"."<i>".strtoupper($row['username']." <br/>ID: ".$row['id'])."</i>";
		
?>
		
<html>
	<head>
		<title>String Formatter</title>
		<link rel="stylesheet" text="text/css" href="style.css">
		<script src="jquery-ui-1.12.1\jquery-ui-1.12.1\external\jquery\jquery.js"></script>
	<head>
	<body class="forPhp">
		<form action="#" method="Post">
			<textarea id="inputText" rows="10" cols="45" placeholder="Data" class="forInput"></textarea>
			<br/>
			<p>
				<input type="text" id="startPara" placeholder="Start Parameter" class="forParameter">
				<input type="text" id="endPara" placeholder="End Parameter" class="forParameter">
			</p>
			
			<textarea id="outputText" rows="10" cols="45" class="forInput"></textarea>
			
			<br/>
			<input type="button" value="Run" id="run">
			<input type="reset" value="Reset">
			<input type="button" value="Upper" id="upperCase">
			<input type="button" value="Lower" id="lowerCase">
			<input type="button" value="Find and Replace" id="findReplace">
			</br>
			</br>
			<input type="button" value="Show PHP Detail" id="phpDet">
			
			<div class="forPhpPara"><?php phpinfo(); ?></div>
			
<script type="text/javascript">

window.onload=function(){
	document.getElementById("inputText").onkeyup=response;
	document.getElementById("run").onclick=process;
	document.getElementById("upperCase").onclick=upperFunc;
	document.getElementById("lowerCase").onclick=lowerFunc;
	document.getElementById("findReplace").onclick=replaceFunc;
	document.getElementById("phpDet").onclick=phpDetFunc;
	$(".forPhpPara").hide();
}
	
	function response(){
		var inputValues=document.getElementById("inputText").value;
		document.getElementById("outputText").innerHTML=inputValues;
	}
	
	function process(){
		var inputValues=document.getElementById("inputText").value;
		var start=document.getElementById("startPara").value;
		var end=document.getElementById("endPara").value;
		
		var dizi=inputValues.split("\n");
		for (i=0;i<dizi.length;i++){
			dizi[i]=start+dizi[i]+end;
		}		
		lastValue=dizi.join("\n");
		document.getElementById("outputText").innerHTML=lastValue;
	}

	function upperFunc(){
		var inputValues=document.getElementById("inputText").value;
		var upperValue=inputValues.toUpperCase();
		document.getElementById("outputText").innerHTML=upperValue;
	}
	
	function lowerFunc(){
		var inputValues=document.getElementById("inputText").value;
		var lowerValue=inputValues.toLowerCase();
		document.getElementById("outputText").innerHTML=lowerValue;
	}
	
	function replaceFunc(){
		var inputValues=document.getElementById("inputText").value;
		var findValue=window.prompt("Find");
		var ReplaceValue=window.prompt("Replace");
		var newValue=inputValues.replace(findValue,ReplaceValue);
		document.getElementById("outputText").innerHTML=newValue;
	}
	
	function phpDetFunc(){
		var buttonValue=document.getElementById("phpDet").value
		if(buttonValue=="Hide PHP Detail"){
		$(".forPhpPara").hide();
		document.getElementById("phpDet").value="Show PHP Detail";
		}
		else{
			$(".forPhpPara").show();
			document.getElementById("phpDet").value="Hide PHP Detail";	
		}
			
	}

</script>
		</form>
	</body>
</html>
<?php
	//phpinfo();
	}}else{
		echo "Wrong User/Password "."<body><a href="."login.html".">Click For Login Page</a></body>";
	}
}
else{
	$sql = "insert into users(username , password) values ('".$username."','".$password."')";
if (mysqli_query($con,$sql))
	{
    echo "Successful... "."<body><a href="."login.html".">Click For Login Page</a></body>";
	$result=mysqli_query($con,"select * from users where username='$username' and password='$password'") 
		or die("Failed to query database ".mysql_error());
	$row=mysqli_fetch_array($result);
	echo "<br/>Your Id: ".$row['id'];
	}
}

?>

