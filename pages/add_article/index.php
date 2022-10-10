<!DOCTYPE html>
<html lang="en">

<?PHP
session_start();
include('../shared/head.php');
include("../shared/navbar.php");
include('./templates.php');
?>

<head>
  <?PHP echo get_head(); ?>
  <title>Add Article</title>
</head>

<body>
  <?PHP echo get_navbar(); ?>
  <?PHP echo add_article_for_template() ?>
</body>

</html>