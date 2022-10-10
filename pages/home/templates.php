<?PHP

function welcome_card_template($name)
{
  return <<<HTML
    <h1>Welcome, {$name}</h1>

  HTML;
}

function login_card_template()
{
  return <<<HTML
    <form action="../../authentication/login.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" name="username">

      <label for="password">Password:</label>
      <input type="password" name="password">

      <input type="submit" name="login_btn" value="Log in">
    </form>
  HTML;
}

function wrong_data_error_template()
{
  return <<<HTML
    <p class="error">Wrong username or password. Please try again!</p>
  HTML;
}
