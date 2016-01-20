<?php
  
  include 'connect.php';

  $name_customer = $_POST['name_customer'];
  $password = $_POST['password2'];
  $sex = $_POST['sex'];
  $city_customer = $_POST['city_customer'];
 
  $query = "INSERT INTO registration_data (name_customer, password, sex, city_customer) 
  VALUES ('".$name_customer."','".$password."','".$sex."','".$city_customer."')";
  $info = mysqli_query($con, $query);
  var_dump($info);   
 
 
 // if (($name_customer == "Admin") && ($password2 == "AdminPass"))
  //  echo "Привет, Admin!";
 // else echo "Доступ закрыт";
  
  include_once 'registration_form.html';
  
  
?>

