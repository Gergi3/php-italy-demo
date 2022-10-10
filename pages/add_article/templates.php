<?PHP

function add_article_for_template()
{
  return <<<HTML
    <form action="./action.php" method="POST">
      <label for="title">Title:</label>
      <p>
        <input type="text" name="title">
      </p>

      <label for="description">Description:</label>
      <p>
        <textarea name="description" cols="100" rows="15"></textarea>
      </p>
      
      <label for="image_url">IMG URL:</label>
      <p>
        <input type="text" name="image_url">
      </p>
      
      <input type="submit" name="add_article_btn">
    </form>
  HTML;
}
