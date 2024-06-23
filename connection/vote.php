<?php
session_start();
include("db.php");

$votes=$_POST['gvotes'];
if($_SESSION['userdata']['status']==0){
$totalVotes=$votes+1;
$gid=$_POST['gid'];
$userid=$_SESSION['userdata']['id'];
$updated_Vote = mysqli_query($connection, "UPDATE user SET votes=$totalVotes where id=$gid");
$update_status= mysqli_query($connection, "UPDATE user SET status=1 where id=$userid");

if($update_status and $updated_Vote){
   
  $groups=mysqli_query($connection,"SELECT *FROM user where role=2");
  $groupsdata =mysqli_fetch_all($groups,MYSQLI_ASSOC);
  $_SESSION['userdata']['status']=1;
  $_SESSION['groupsdata']=$groupsdata;
  echo'
  <script>
  alert("voted successfully");
  window.location= "../inside/dashboard.php";
  </script>
  ';
}
else{
    echo'
   <script>
   alert("error");
   window.location= "../inside/dashboard.php";
   </script>
   ';
}
}
else{
    echo'
    <script>
    alert("already voted");
    window.location= "../inside/dashboard.php";
    </script>
    ';
}

?>