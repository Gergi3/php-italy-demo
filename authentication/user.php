<?PHP
class User
{
  public $id;
  public $email;
  public $first_name;
  public $last_name;
  public $permission;

  public function __construct($id, $email, $first_name, $last_name, $permission)
  {
    $this->id = $id;
    $this->email = $email;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->permission = $permission;
  }

  public function get_id()
  {
    return $this->id;
  }

  public function set_id($id)
  {
    $this->id = $id;
  }

  public function get_email()
  {
    return $this->email;
  }

  public function set_email($email)
  {
    $this->email = $email;
  }

  public function get_first_name()
  {
    return $this->first_name;
  }

  public function set_first_name($first_name)
  {
    $this->first_name = $first_name;
  }

  public function get_last_name()
  {
    return $this->last_name;
  }

  public function set_last_name($last_name)
  {
    $this->last_name = $last_name;
  }

  public function get_permission()
  {
    return $this->permission;
  }

  public function set_permission($permission)
  {
    $this->permission = $permission;
  }

  public function get_full_name()
  {
    return "$this->first_name $this->last_name";
  }
}
