<?php
class connect
{
 public function connect()
 {
  $con=mysqli_connect("localhost","a16673ai_payamath","Payamath@2016","a16673ai_majesticweb");
  //mysql_select_db("dbtuts");
 }
 public function setdata($con,$sql)
 {
  mysqli_query($con,$sql);
 }
 public function getdata($con,$sql)
 {
  return mysqli_query($con,$sql);
 }
 public function delete($con,$sql)
 {
  mysqli_query($con,$sql);
 }
 public function escape_string($value)
	{
		return $con->real_escape_string($value);
	}
}
?>