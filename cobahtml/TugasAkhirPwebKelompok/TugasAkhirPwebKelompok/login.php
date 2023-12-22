<?php

include 'koneksi.php';

session_start();

if(isset($_POST['submit'])){


   $username = mysqli_real_escape_string($koneksi, $_POST['username']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($koneksi, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['level'] == 'admin'){

         $_SESSION['admin'] = $row['username'];
         header('location:admin.php');

      }elseif($row['level'] == 'mahasiswa'){

         $_SESSION['user'] = $row['username'];
         header('location:form.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="username" name="username" required placeholder="enter your username">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="regis.php">register now</a></p>
   </form>

</div>

</body>
</html>