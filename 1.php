<?php require_once("connection.php"); ?>
<?php
	session_start();
?>
 
<?php require_once("includes/connection.php"); ?>
<?php

	if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location: intropage.php");
	}
 
	if(isset($_POST["login"])){
 
	if(!empty($_POST['name_log']) && !empty($_POST['pwd_hash'])) {
	$username=htmlspecialchars($_POST['name_log']);
	$password=htmlspecialchars($_POST['pwd_hash']); 
	$query =pg_query("SELECT * FROM logins WHERE name_log ='".$username."' AND pwd_hash ='".$password."'");
	$numrows=pg_num_rows($query);
	if($numrows!=0)
 {
while($row=pg_fetch_assoc($query))
 {
	$dbusername=$row['name_log'];
  $dbpassword=$row['pwd_hash'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	// старое место расположения
	//  session_start();
	 $_SESSION['session_username']=$username;	 
 /* Перенаправление браузера */
   header("Location: intropage.php");
	}
	} else {
	//  $message = "Invalid username or password!";
	
	echo  "Invalid username or password!";
 }
	} else {
    $message = "All fields are required!";
	}
	}
	?>
<!Doctype html>
<html lang="ru">
 <head>
  <meta charset="UTF-8">
  <title>Авторизация</title>
  <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 	<div>
       <h1>
         Вход в личный кабинет
       </h1>
       <form action="" method="post"> 
         <div>
          <input class="edit" type="text" name="text" placeholder="login">
         </div>
         <div>
          <input class="edit" type="text" name="e-mail" placeholder="password">
         </div>
          <input type="submit" value="Отправить">
 	      <input type="reset" value="Очистить">
 	   </form> 
    </div>
    <footer>
       <p>
         &copy; Все права защищены     
       </p>
    </footer>
 </body>
</html>





