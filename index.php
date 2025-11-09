<?php

$nameErr = "";
$emailErr = "";
$pswErr = "";

if(isset($_POST["submit"])){
$user = $_POST["user"];
    $password = $_POST["psw"];
    $email = $_POST["email"];
if(empty($user)){
    $nameErr = "Name is Required";
}
else{
    $user = trim($user);
    $user = htmlspecialchars($user);
    if(!preg_match("/^[a-zA-Z ]+$/", $user)){
        $nameErr = 'Name should contain only char and space';
}
}



if(empty($email)){
    $emailErr = "Email is Required";
}
else{
    if(preg_match("/^@gmail.com$/", $email)){
        $emailErr = "Email should contain only @gmail.com";
}
}




if(empty($password)){
    $pswErr = "Password is Required";
}
else{
    if(strlen($password) < 6){
        $pswErr = 'At least 6 digits';
}elseif(!preg_match('#[0-9]+#', $password)){
    $pswErr = '<br /> At least one digits';
}elseif(!preg_match('#[a-z]+#', $password)){
    $pswErr = '<br /> At least one small char';
}elseif(!preg_match('#[A-Z]+#', $password)){
    $pswErr = '<br /> At least one upper case';
}else{
    $pswErr = "you entered more than 6";
}



}



}
?>



<?php
require_once "header.php";
?>



<div class="container right-panel-active">
	<!-- Sign Up -->
	<div class="container__form container--signup">
		<form action="index.php" class="form" id="form1" method="POST">
			<h2 class="form__title">Sign Up</h2>
			<input type="text" placeholder="User" class="input" name="user"/>
            <span style="color: red;"><?php  echo $nameErr ?></span>

			<input type="email" placeholder="Email" class="input" name="email" />
            <span style="color:red"><?= $emailErr ?></span>

			<input type="password" placeholder="Password" class="input" name="psw"/>
<span style="color:red"><?= $pswErr ?></span>

			<button class="btn" type="submit" name="submit">Sign Up</button>
		</form>
	</div>



	
<?php
require_once "overlay.php";
?>



<?php
include_once "footer.php";
?>
