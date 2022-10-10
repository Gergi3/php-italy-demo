<?PHP

function get_navbar()
{
  include('../../db/conn.php');

  $root = "{$db_host}/demo-one";
  $html = '<nav class="navbar-global">';

  $html .= <<<HTML
    <a href="http://www.{$root}/pages/home/index.php" class="navbar-btn"><button>Home</button></a>
    <a href="http://www.{$root}/pages/catalog/index.php" class="navbar-btn"><button>Catalog</button></a>
  HTML;

  if (isset($_SESSION['user'])) {
    $html .= <<<HTML
      <a href="http://www.{$root}/pages/add_article/index.php" class="navbar-btn"><button>Create an Article</button></a>
      <form action="http://www.{$root}/authentication/logout.php" method="POST">
        <button type="submit" name="logout_btn" class="navbar-btn">Logout</button>
      </form>
    HTML;
  }

  $html .= '</nav>';

  return $html;
}
