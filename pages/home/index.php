<!DOCTYPE html>
<html lang="en">

<?PHP
session_start();
include("../../authentication/user.php");
include("../shared/head.php");
include("../shared/navbar.php");
include("templates.php");
?>

<head>
  <?PHP echo get_head(); ?>
  <link rel="stylesheet" href="../../styles/pages/home.css">
  <title>Homepage</title>
</head>

<body>
  <?PHP
  echo get_navbar();

  $html = "";
  if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    $welcome_info = "{$user->get_full_name()} ({$user->get_email()})";

    $html = welcome_card_template($welcome_info);
  } else {
    $html = login_card_template();

    if (isset($_SESSION['login_error'])) {
      unset($_SESSION['login_error']);
      $html = $html . wrong_data_error_template();
    }
  }

  echo $html;
  ?>
</body>

</html>