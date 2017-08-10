<?php
include_once('/../../Class/Authentication/Authen.php');
include_once('/../../Class/Authentication/PsuPassportAuthen.php');
include_once('/../../Class/Authentication/roleprovider.php');


$username = $_POST['username'];
$password = $_POST['password'];

$PsuPassportAuthen=new PsuPassportAuthen($username,$password);

if ($PsuPassportAuthen->Authenticate() == "true")
{
  $GetStaffDetailsResult = $PsuPassportAuthen->Authenticate();

  echo "<h2>Authenticate</h2>";
  echo var_dump($PsuPassportAuthen->Authenticate());
  echo "<hr>";
  echo $PsuPassportAuthen->Authenticate();
  echo "<hr>";


  $GetStaffDetailsResult = $PsuPassportAuthen->GetStaffDetails();

  echo "<h2>GetStaffDetails</h2>";
  echo var_dump($PsuPassportAuthen->GetStaffDetails());
  echo "<hr>";
  foreach($GetStaffDetailsResult['string'] as $data)
  {
    echo $data."<br>";
  }
  echo "<hr>";



  $GetStaffIDResult = $PsuPassportAuthen->GetStaffID();

  echo "<h2>GetStaffID</h2>";
  echo var_dump($PsuPassportAuthen->GetStaffID());
  echo "<hr>";
  echo $PsuPassportAuthen->GetStaffID();
  echo "<hr>";


  $GetStudentDetailsResult = $PsuPassportAuthen->GetStudentDetails();
  echo "<h2>GetStudentDetails</h2>";
  echo var_dump($PsuPassportAuthen->GetStudentDetails());
  echo "<hr>";
  foreach($GetStudentDetailsResult['string'] as $data)
  {
    echo $data."<br>";
  }
  echo "<hr>";


  $GetUserDetailsResult = $PsuPassportAuthen->GetUserDetails();
  echo "<h2>GetUserDetails</h2>";
  echo var_dump($PsuPassportAuthen->GetUserDetails());
  echo "<hr>";
  foreach($GetUserDetailsResult['string'] as $data)
  {
    echo $data."<br>";
  }
  echo "<hr>";




}
 ?>
