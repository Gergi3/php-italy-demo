<?PHP
session_start();
include('../../authentication/user.php');
include('../../db/conn.php');

if (!isset($_POST['edit_article_btn']) || !isset($_SESSION['edit_author_id']) || !isset($_POST['article_id'])) {
  redirect_with_error();
}

$author_id = $_SESSION['edit_author_id'];
unset($_SESSION['edit_author_id']);
$user = unserialize($_SESSION['user']);
if ($author_id != $user->get_id()) {
  redirect_with_error();
}

$article_id = mysqli_real_escape_string($conn, $_POST['article_id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
$sql = "UPDATE articles
        SET    title='$title', description_text='$description', image_url='$image_url'
        WHERE  id=$article_id";

$result_query = mysqli_query($conn, $sql);

if (!$result_query) {
  redirect_with_error();
}

unset($_SESSION['edit_clicked']);
unset($_SESSION['edit_id']);
header('Location:../catalog/index.php');

function redirect_with_error()
{
  $_SESSION['edit_error'] = true;
  header('Location:./index.php');
  exit;
}
