<?PHP

function edit_article_form_template($id, $title, $description, $image_url)
{
  return <<<HTML
    <form action="./action.php" method="POST">
      <label for="title">Title:</label>
      <p>
        <input type="text" name="title" value="{$title}">
      </p>

      <label for="description">Description:</label>
      <p>
        <textarea name="description" cols="100" rows="15">{$description}</textarea>
      </p>
      
      <label for="image_url">IMG URL:</label>
      <p>
        <input type="text" name="image_url" value="{$image_url}">
      </p>
      
      <input type="submit" name="edit_article_btn" value="Update">
      <input type="hidden" name="article_id" value="{$id}">
    </form>
  HTML;
}

function edit_error_template() {
  return <<<HTML
    <p class="error">Failed editing the article, please try again!</p>
  HTML;
}
