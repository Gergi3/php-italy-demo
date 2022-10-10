<?PHP
function article_template($title, $image_url, $date, $description)
{
  return <<<HTML
    <div class="article-container">
      <div class="title">{$title}</div>
      <img src="{$image_url}" alt="article-img" class="img">
      <div class="date">Date: {$date}</div>
      <div class="description">{$description}</div>
    </div>
  HTML;
}

function add_comment_template($article_id)
{
  return <<<HTML
    <form action="./add_comment.php" method="POST">
      <input type="text" name="comment-text" placeholder="Write a comment..." class="comment-input">
      <input type="submit" name="comment-btn" value="Comment">
      <input type="hidden" name="article_id" value ="{$article_id}">
    </form>
  HTML;
}

function comment_template($text, $username, $date)
{
  return <<<HTML
    <div class="comment">
      <div class="username">${username}</div>
      <hr>
      <div class="date">{$date}</div>
      <p class="text">{$text}</p>
    </div>
  HTML;
}

function add_comment_error_template() 
{
  return <<<HTML
    <p class="error">Failed posting comment, please try again!</p>
  HTML;
}