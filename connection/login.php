<?php
session_start();
include("db.php");

$mobile = $_POST['mobile'];
$password= $_POST['password'];
$role=$_POST['role'];

$check = mysqli_query($connection, "SELECT *FROM user where mobile='$mobile' AND password='$password' AND role ='$role'");
 if(mysqli_num_rows($check)>0){
   $userdata= mysqli_fetch_assoc($check);
   $groups=mysqli_query($connection,"SELECT *FROM user where role=2");
   $groupsdata =mysqli_fetch_all($groups,MYSQLI_ASSOC);
   $_SESSION['userdata']=$userdata;
   $_SESSION['groupsdata']=$groupsdata;

   echo'
   <script>
   alert("login successful");
   window.location= "../inside/dashboard.php";
   </script>
   ';
 }
 else{
    echo'
    <script>
    alert("Invalid credentials");
    window.location= "../index.html";
    </script>
    ';
 }

?>