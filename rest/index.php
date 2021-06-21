<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');

require '../vendor/autoload.php';
require 'config.php';
require 'dao/DoctorDao.php';
require 'dao/UserDao.php';

use \Firebase\JWT\JWT;
Flight::register( 'doctor_dao', 'DoctorDao');

Flight::register( 'user_dao', 'UserDao');

Flight::route('GET /doctor', function(){
 $doctor = Flight::doctor_dao()->get_all();
  Flight::json($doctor);
 });

Flight::route('POST /doctor', function(){
  $request = Flight::request()->data->getData();

  $request['full_name'] = $request['full_name'];
  $request['gender'] = $request['gender'];
  $request['phone_number'] = $request['phone_number'];
  $request['date_of_birth'] = $request['date_of_birth'];
  $request['address'] = $request['address'];
  $request['yes_no'] = $request['yes_no'];
  $request['subject'] = $request['subject'];
  $request['date'] = $request['date'];
  $request['time'] = $request['time'];
  /*unset($request['full_name'], $request['gender'],$request['phone_number'],$request['address']);*/
  Flight::doctor_dao()->add($request);
  Flight::json('Appointment has been made');
});


Flight::route('DELETE /doctor/@id', function($id){

Flight::doctor_dao()->delete_doctor($id);
});

Flight::route('POST /user', function(){
$user=Flight::request()->data->getData();
Flight::user_dao()->add($user);
});

Flight::route('POST /login', function(){
 $user=Flight::request()->data->getData();
 $db_user = Flight::user_dao()->get_user_by_email($user['email']);

 if ($db_user) {
   if ($db_user['password'] == $user['password']) {
   //  Flight:: json($db_user);
    $token_user=[
     'id' => $db_user['id'],
     'email' => $db_user['email']
     ];

     $jwt = JWT::encode($token_user, Config::JWT_SECRET);
     Flight:: json(['id' =>$db_user['id'],'token' => $jwt]);
    } else {
     Flight::halt(404, 'Password incorrect');
    }
 } else {
      Flight::halt(404,'User not found');
    }
});

Flight::start();
?>
