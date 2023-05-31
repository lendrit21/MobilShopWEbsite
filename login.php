<?php
//Përfshin skedarin e konfigurimit me lidhjen e bazës së të dhënave
include 'config.php';
session_start();//Fillon një sesion të ri ose rifillon një sesion ekzistues
//Kontrollon nëse login form është dorëzuar
if(isset($_POST['submit'])){
    //Merr dhe pastron ose perpunon hyrjen e emailit nga login form.
   $email = mysqli_real_escape_string($conn, $_POST['email']);
       //Merr dhe pastron ose perpunon hyrjen e paswordit nga login form.
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
//Ekzekuton një pyetje për të zgjedhur përdoruesit nga baza e të dhënave 
//që përputhen me emailin dhe fjalëkalimin e dhënë.
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' 
   AND password = '$pass'") or die('query failed');
//Kontrollon nëse ka të paktën një përdorues që përputhet me kredencialet e hyrjes
   if(mysqli_num_rows($select_users) > 0){
//Merr të dhënat e përdoruesit nga grupi i rezultateve.
      $row = mysqli_fetch_assoc($select_users);
//Kontrollon nëse përdoruesi është admin.
      if($row['user_type'] == 'admin'){
//Vendos variablat e sesionit të lidhur me admin dhe ridrejton në faqen e adminit.
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
//Kontrollon nëse përdoruesi është përdorues i rregullt
      }elseif($row['user_type'] == 'user'){
//Vendos variablat e sesioneve të lidhura me përdoruesit dhe ridrejton në faqen kryesore
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
      }
//Trajton rastin kur emaili ose fjalëkalimi është i pasaktë.
   }else{
      $message[] = 'incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if(isset($message)){//Kontrollon nëse grupi $message është vendosur.
   foreach($message as $message){//Përsërit mbi çdo mesazh në grupin $message
     //Përfaqëson një kuti mesazhi me një mesazh gabimi dhe një buton mbylljeje
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
      <h3>login now</h3>
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>
</body>
</html>
