<?PHP
include('../../db/conn.php');
include('../../authentication/user.php');
session_start();


if (!isset($_SESSION['user']) || !isset($_SESSION['delete_id']) || !isset($_SESSION['delete_clicked'])) {
  redirect_with_error();
}
unset($_SESSION['delete_clicked']);
$article_id = mysqli_real_escape_string($conn, $_SESSION['delete_id']);

$sql_article = "SELECT *
                FROM   articles
                WHERE  id='$article_id'";
$result_query_article = mysqli_query($conn, $sql_article);
$author_id = mysqli_fetch_array($result_query_article)['user_id'];

$user = unserialize($_SESSION['user']);
if ($author_id != $user->get_id()) {
  redirect_with_error();
}

$sql = "DELETE FROM articles
        WHERE  id='$article_id'";
$result_query = mysqli_query($conn, $sql);
if (!$result_query) {
  redirect_with_error();
}

header('Location:../catalog/index.php');

function redirect_with_error()
{
  $_SESSION['delete_error'] = true;
  header('Location:../catalog/index.php');
  exit;
}
?>