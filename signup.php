<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>



<?php
include 'functions.php'; // file with containing many functions 

//Main Code

session_start();//starting session
$uEmail=$_POST['uEmail'];
$uPassword=$_POST['psw'];
$age=$_POST['age'];
$name=$_POST['name'];


#character check
$filter_uEmail = filter_var($uEmail, FILTER_SANITIZE_EMAIL);

validate_email($uEmail); # validates if the email is correct or not 
							#output the result by: $_SESSION["loginErrorMsg"]

$filter_uPassword =  filter_var($uPassword, FILTER_SANITIZE_STRING); 
$filter_age =  filter_var($age, FILTER_SANITIZE_NUMBER_INT); 
$filter_name =  filter_var($name, FILTER_SANITIZE_STRING); 

# checks if the entries have been filtered or not due to illegal characters 

if ($filter_uPassword != $uPassword){
	$msg="password contains illegal characters";# error message returned to user
	$_SESSION["loginErrorMsg"]=$msg;
	header("Location: index.php");
	//echo $_SESSION["loginErrorMsg"];// checks its updates the error message
	
}
if ($filter_age != $age){
	$msg="age contains illegal characters";# error message returned to user
	$_SESSION["loginErrorMsg"]=$msg;
	header("Location: index.php");
	//echo $_SESSION["loginErrorMsg"];// checks its updates the error message
	
}
if ($filter_name != $name){
	$msg="name contains illegal characters";# error message returned to user
	$_SESSION["loginErrorMsg"]=$msg;
	header("Location: index.php");
	//echo $_SESSION["loginErrorMsg"];// checks its updates the error message
	
}
if ($filter_uEmail != $uEmail){
	$msg="Email contains illegal characters";# error message returned to user
	$_SESSION["loginErrorMsg"]=$msg;
	header("Location: index.php");
	//echo $_SESSION["loginErrorMsg"];// checks its updates the error message
	
}



$conn=setupconnection_sqli(); # sets up the SQLI connection to the database
testconnection_sqli($conn); #tests the connection to make sure its working 

//selecting what information we want
//SQL qurey we desire 
$sql = "INSERT INTO robust_signup (email,name,password,age) VALUES ('$uEmail','$name','$uPassword','$age')";

if (mysqli_query($conn, $sql)){
    echo"success, your account has been made, please Login!";
}else{
    if($errorMSG == ""){
        //echo "Something went wrong :(";
        echo"Error:".$sql."<br>".mysqli_error($conn);//use to test the DB connection
    } else {
        //echo $errorMSG;
        
    }
}


mysqli_close($conn);

?>


