<?PHP

function get_head() {
  $html = <<<HTML
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmY81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/shared/shared.css">
    <link rel="stylesheet" href="../../styles/shared/navbar.css">
  HTML;
  
  return $html;
}
