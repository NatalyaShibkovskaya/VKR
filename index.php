<?php
	session_start();
 require_once("connection.php");


	if(isset($_SESSION["session_username"])){
	header("Location: intropage.php");
	}
	if(isset($_POST["login"])){
	if(!empty($_POST['name_log']) && !empty($_POST['pwd_hash'])) {
	$username=htmlspecialchars($_POST['name_log']);
	$password=md5(htmlspecialchars($_POST['pwd_hash'])); 
	$query =pg_query('SELECT * FROM "DOP".logins WHERE name_log =\''.$username.'\'');
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
	 $_SESSION['session_username']=$username;	 
   header("Location: intropage.php");
	} else {
	
	echo  "Invalid username or password!";
 }
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
          <input class="edit" type="text" name="name_log" placeholder="login">
         </div>
         <div>
          <input class="edit" type="text" name="pwd_hash" placeholder="password">
         </div>
          <input  name="login" type="submit" value="Отправить">
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