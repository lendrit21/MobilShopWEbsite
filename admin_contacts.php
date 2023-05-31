<?php
//Përfshin file config.php, i cili permban 
//detaje të lidhjes së bazës së të dhënave dhe konfigurime të tjera.
include 'config.php';
session_start();//Fillon një sesion PHP për të ruajtur dhe aksesuar variablat e sesionit
$admin_id = $_SESSION['admin_id'];//Merr vlerën admin_id nga ndryshorja e sesionit PHP
//Ridrejton faqen e identifikimit nëse ndryshorja e sesionit admin_id nuk është vendosur
if(!isset($admin_id)){
   header('location:login.php');
};
//Kodi kontrollon nëse është marrë një kërkesë GET me parametrin 'fshij' perndryshe deshton
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") 
   or die('query failed');
   header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="./css/admin_style.css">

</head>
<body>
   <!-- Përfshin skedarin "admin_header.php", i cili përmban seksionin e headerit 
     për panelin e administratorit -->
<?php include 'admin_header.php'; ?>

<section class="messages">
   <h1 class="title"> messages </h1>
   <div class="box-container">
<!-- Kodi ekzekuton një pyetje SQL duke përdorur mysqli_query për të marrë të gjitha
 të dhënat nga tabela 'message'.
Nëse pyetja dështon, ai përfundon ekzekutimin dhe shfaq një mesazh gabimi. -->
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){//Nëse numri i rreshtave është më i madh se 0, do të thotë se 
         //ka regjistrime mesazhesh të disponueshme për t'u shfaqur.
         while($fetch_message = mysqli_fetch_assoc($select_message)){
   ?>
   <div class="box">
      <p> user id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
      <p> name : <span><?php echo $fetch_message['name']; ?></span> </p>
      <p> number : <span><?php echo $fetch_message['number']; ?></span> </p>
      <p> email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <p> message : <span><?php echo $fetch_message['message']; ?></span> </p>
      <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">you have no messages!</p>';
   }
   ?>
   </div>
</section>

<!-- custom admin js file link  -->
<script src="./js/admin_script.js"></script>

</body>
</html>