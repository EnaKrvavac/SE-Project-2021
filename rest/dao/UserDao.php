<?php
require_once 'BaseDao.php';
class UserDao extends BaseDao{
  public $table = 'user';

  public function __construct(){
    parent::__construct($this->table);
  }

  public function get_user_by_email($email){

    $query= "SELECT * FROM user WHERE email=:email;";
    return @($this->execute_query($query, ['email'=> $email]))[0];
  }


}




?>
