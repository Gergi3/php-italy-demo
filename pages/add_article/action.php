<?PHP
session_start();
include('../../db/conn.php');

if (isset($_POST['add_article_btn'])) {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $img_url = mysqli_real_escape_string($conn, $_POST['image_url']);
  
  include('../../authentication/user.php');
  $user = unserialize($_SESSION['user']);

  $sql = "INSERT INTO articles (title, description_text, image_url, user_id)
          VALUES               ('$title', '$description', '$img_url', {$user->get_id()})";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header('Location:index.php');
  } else {
    $_SESSION['add_article_error'] = true;
    header('Location:index.php');
  }
}
