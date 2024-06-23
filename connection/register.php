<?php 
  include("db.php");
  $name = $_POST['name'];
  $number = $_POST['number'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $role= $_POST['role'];
  $image = $_FILES["photo"]["name"];
  $tmp_name = $_FILES["photo"]["tmp_name"];  
  

  if($password==$cpassword){
      move_uploaded_file($tmp_name,"../uploads/$image");
      $query ="INSERT INTO user(name,mobile,password,image,address,role,status,votes)";                                                                                                                                                                                                                                                                                                                                                                                                     
      $query .="VALUES ('$name','$number','$password','$image','$address','$role',0,0)";
      $result = mysqli_query($connection, $query);
        if(!$result) {
            echo '
            <script>
            alert("error! try again");
            window.location= "../inside/registration.html";
            </script>
            ';
        } 
        else{
            echo 'Registration successful';
        }

  }
  else{
    echo '
    <script>
    alert("password and confirm password does not match!");
    window.location= "../inside/registration.html";
    </script>
    ';
  }
?>