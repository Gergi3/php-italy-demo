<!DOCTYPE html>
<html lang="en">

<?PHP
session_start();
include('../../db/conn.php');
include('../../authentication/user.php');
include("../shared/head.php");
include("../shared/navbar.php");
include("templates.php");

if (!isset($_SESSION['user']) || !isset($_SESSION['edit_id'])) {
  $_SESSION['edit_error'] = true;
  header('Location:./index.php');
  exit;
}

$article_id = mysqli_real_escape_string($conn, $_SESSION['edit_id']);
$sql_article = "SELECT *
                FROM   articles
                WHERE  id='$article_id'";
$result_query_article = mysqli_query($conn, $sql_article);
$article = mysqli_fetch_array($result_query_article);
$_SESSION['edit_author_id'] = $article['user_id'];

if (isset($_SESSION['edit_error'])) {
  unset($_SESSION['edit_error']);
  echo edit_error_template();
}
?>

<head>
  <?PHP echo get_head(); ?>
  <title>Edit Article</title>
</head>

<body>
  <?PHP
  echo get_navbar();

  $id = $article['id'];
  $title = $article['title'];
  $description = $article['description_text'];
  $image_url = $article['image_url'];
  echo edit_article_form_template($id, $title, $description, $image_url);
  ?>
</body>

</html> 