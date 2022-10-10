<?PHP
session_start();
session_destroy();
header('Location:../pages/home/index.php');
