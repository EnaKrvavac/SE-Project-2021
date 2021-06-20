<?php
require_once 'BaseDao.php';
class DoctorDao extends BaseDao{
  public $table = 'doctor';

  public function __construct(){
    parent::__construct($this->table);
  }

public function delete_doctor($doctor_id){
  $entity = [':id' => $doctor_id];
    $query = 'DELETE FROM  '.  $this->table . ' WHERE id = :id';
    return $this->execute($entity, $query);
  }



}




?>
