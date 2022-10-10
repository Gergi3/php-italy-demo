<?PHP

function article_card_template($id, $title, $author_name, $image_url, $is_authorized)
{
  return "
    <div class=\"article-container\">
      <div class=\"article\">
        <a href=\"../article/index.php?id={$id}\" class=\"img-container\">
          <img src=\"{$image_url}\" alt=\"MILIONITEE\" class=\"article-img\">
        </a>
        <div class=\"break\"></div>
        <a href=\"../article/index.php?id={$id}\" class=\"title\">{$title}</a>
        <div class=\"break\"></div>
        <div class=\"bottom-row\">
          <h2 class=\"author\">By {$author_name}</h2>" .
          ($is_authorized == true ?
          "<form action=\"redirect.php\" method=\"post\">
            <input type=\"submit\" name=\"edit\" class=\"right edit-btn\" value=\"EDIT\">
            <input type=\"submit\" name=\"delete\" class=\"right delete-btn\" value=\"DELETE\">
            <input type=\"hidden\" name=\"article_id\" value=\"{$id}\">
          </form>" : '') . "
        </div>
      </div>
    </div>
  ";
}

function articles_container_template($articles_html)
{
  return <<<HTML
    <div class="articles-container">
      {$articles_html}
    </div>
  HTML;
}

function delete_error_template()
{
  return <<<HTML
    <p class="error">Failed deleting the article, please try again!</p>
  HTML;
}
