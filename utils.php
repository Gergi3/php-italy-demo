<?PHP
function normalize_date($date)
{
  $new = explode('-', $date);
  $new_date = $new[2];
  $new_date .= ".";
  $new_date .= $new[1];
  $new_date .= ".";
  $new_date .= $new[0];

  return $new_date;
}
