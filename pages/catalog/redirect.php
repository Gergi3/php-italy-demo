<?PHP
session_start();

if (isset($_POST['delete'])) {
  $_SESSION['delete_clicked'] = true;
  $_SESSION['delete_id'] = $_POST['article_id'];
  header('Location:../delete_article/action.php');
} else if (isset($_POST['edit'])) {
  $_SESSION['edit_clicked'] = true;
  $_SESSION['edit_id'] = $_POST['article_id'];
  header('Location:../edit_article/index.php');
} else {
  header('Location:index.php');
}
