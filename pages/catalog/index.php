<!DOCTYPE html>
<html lang="en">

<?PHP
session_start();
include("../shared/head.php");
include("../shared/navbar.php");
include("../../db/conn.php");
include("../../authentication/user.php");
include("templates.php");
?>

<head>
  <?PHP echo get_head(); ?>
  <link rel="stylesheet" href="../../styles/pages/catalog.css">
  <title>Catalog</title>
</head>

<body>
  <?PHP
  echo get_navbar();

  if (isset($_SESSION['delete_error'])) {
    unset($_SESSION['delete_error']);
    echo delete_error_template();
  }

  $sql = "SELECT *,
                 a.id AS article_id,
                 u.id AS user_id
          FROM   articles AS A
                 LEFT JOIN users AS U
                        ON A.user_id = U.id
          ORDER  BY A.created_at DESC"; 

$articles_query = mysqli_query($conn, $sql);
  $articles_html = "";
  while ($article = mysqli_fetch_array($articles_query)) {
    $id = $article['article_id'];
    $title = $article['title'];
    $name = $article['first_name'] . ' ' . $article['last_name'];
    $image_url = $article['image_url'];

    $user_id = NULL;
    if (isset($_SESSION['user'])) {
      $user = unserialize($_SESSION['user']);
      $user_id = $user->get_id();
    }
    $is_authorized = $user_id == $article['user_id'];
    $articles_html .= article_card_template($id, $title, $name, $image_url, $is_authorized);
  }
  $html = articles_container_template($articles_html);

  echo $html;
  ?>
</body>

</html>