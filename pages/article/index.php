<!DOCTYPE html>
<html lang="en">

<?PHP
session_start();
include("../../db/conn.php");
include("../../utils.php");
include("../shared/head.php");
include("../shared/navbar.php");
include("templates.php");
?>

<head>
  <?PHP echo get_head(); ?>
  <link rel="stylesheet" href="../../styles/pages/article.css">
  <title>Article</title>
</head>

<body>
  <?PHP echo get_navbar() ?>


  <div class="content-container">
    <?PHP
    if (!isset($_GET['id'])) {
      header('Location:../catalog/index.php');
    }
    $article_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql_article = "SELECT *
            FROM   articles
            WHERE  id='$article_id'";
    $result_query_article = mysqli_query($conn, $sql_article);
    $rows_count_article = mysqli_num_rows($result_query_article);
    if ($rows_count_article != 1) {
      header('Location:../catalog/index.php');
    }

    $article = mysqli_fetch_array($result_query_article);
    $title_article = $article['title'];
    $description_text_article = $article['description_text'];
    $date_article = normalize_date($article['created_at']);
    $image_url_article = $article['image_url'];
    echo article_template($title_article, $image_url_article, $date_article, $description_text_article);
    ?>
    <div class="gap"></div>
    <div class="comments-container">
      <?PHP

      if (isset($_SESSION['post_comment_error'])) {
        echo add_comment_error_template();
      }

      if (isset($_SESSION['user'])) {
        echo add_comment_template($article_id);
      }
      
      $html_comments = "";
      $sql_comments ="SELECT *,
                             C.id      AS comment_id,
                             C.user_id AS user_id_com,
                             U.id      AS user_id
                      FROM   comments AS C
                             LEFT JOIN users AS U
                                    ON U.id = C.user_id
                      WHERE  article_id = '$article_id'";

      $result_query_comments = mysqli_query($conn, $sql_comments);
      if (!$result_query_comments) {
        $html_comments = "Failed to load comments. Try refreshing the page or coming back later :)";
      } else {
        while ($comment = mysqli_fetch_array($result_query_comments)) {
          $text_comment = $comment['text'];
          $name = $comment['first_name'].' '.$comment['last_name'];
          $date_comment = normalize_date($comment['created_at']);
          $html_comments .= comment_template($text_comment, $name, $date_comment);
        }
      }
      echo $html_comments;
      ?>
    </div>
  </div>
</body>

</html>