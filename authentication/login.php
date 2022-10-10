<?PHP
session_start();
include('../db/conn.php');
include('user.php');

if (isset($_POST['login_btn'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT *
          FROM   users
          WHERE  email = '$username'
            AND  pass = '$password'";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_num_rows($result);

  if ($rows == 1) {
    $info = mysqli_fetch_array($result);

    $user = new User($info['id'], $info['email'], $info['first_name'], $info['last_name'], $info['permission']);
    $_SESSION['user'] = serialize($user);
  } else {
    $_SESSION['login_error'] = true;
  }

  header('Location:../pages/home/index.php');
}
