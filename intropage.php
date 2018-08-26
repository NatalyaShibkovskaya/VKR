<?php
 
session_start();
 
if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<!Doctype html>
<html lang="ru">
 <head>
  <meta charset="UTF-8">
  <title>Авторизация</title>
  <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
   <div id="welcome">
     <h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
      <p><a href="logout.php">Выйти</a> из системы</p>
   </div>
   <footer>
      <p>
        &copy; Все права защищены     
      </p>
   </footer>
 </body>
</html>
	
<?php endif; ?>
