<?PHP
  session_start();
  include('../../db/conn.php');
  include('../../authentication/user.php');
  $article_id = mysqli_real_escape_string($conn, $_POST['article_id']);
  if (!isset($_POST['comment-btn']) || !isset($_SESSION['user'])) {
    header("Location:./index.php?id=$article_id");
  }

  $text = mysqli_real_escape_string($conn, $_POST['comment-text']);
  $author_id_unsafe = unserialize($_SESSION['user'])->get_id();
  $author_id = mysqli_real_escape_string($conn, $author_id_unsafe);
  $sql = "INSERT INTO comments VALUES (NULL, '$text', '$author_id', '$article_id', now())";

  $query_result = mysqli_query($conn, $sql);
  if (!$query_result) {
    $_SESSION['post_comment_error'] = true;
  }

  header("Location:./index.php?id=$article_id");
?>