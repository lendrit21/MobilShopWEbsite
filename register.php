<?php
//përfshin filen 'config.php', i cili zakonisht përmban detajet e konfigurimit 
//të kërkuara për t'u lidhur me bazën e të dhënave
include 'config.php';
//Ky kusht kontrollon nëse butoni 'submit' në formën HTML është klikuar. 
//Siguron që kodi brenda kushtit të ekzekutohet kur formulari dorëzohet.
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];
//kontrollon bazen e te dhenave nëse një përdorues 
//me të njëjtin email dhe fjalëkalim ekziston tashmë në tabelën 'përdoruesit'.
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
//kontrollon nëse një përdorues me të njëjtin email dhe fjalëkalim ekziston tashmë.
// Nëse ekziston, ai vendos variablin $message me një mesazh gabimi të duhur
   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{//Ky bllok kodi ekzekutohet kur përdoruesi nuk ekziston në bazën e të dhënave
      //Ky kusht kontrollon nëse fjalëkalimi i futur dhe fjalëkalimi i konfirmuar nuk përputhen. 
      //perndryshe shfaq mesazhin e gabimit.
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }
      //Ky bllok kodi ekzekutohet kur fjalëkalimi i futur dhe ai i konfirmuar përputhen. 
      else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
      <select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>
