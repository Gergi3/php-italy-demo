<?PHP
$db_host = "localhost";
$db_name = "georgi_blog";
$db_user = "root";
$db_pass = "";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
  echo 'Website under meintance';
  exit;
}
