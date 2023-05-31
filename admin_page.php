<?php
//Përfshin skedarin config.php, i cili përmban
// detaje të lidhjes së bazës së të dhënave dhe konfigurime të tjera.
include 'config.php';

session_start();//Fillon një sesion PHP për të ruajtur dhe aksesuar variablat e sesionit

$admin_id = $_SESSION['admin_id'];//Merr vlerën admin_id nga ndryshorja e sesionit PHP.
//Ridrejtohet në faqen e identifikimit nëse ndryshorja e sesionit admin_id nuk është vendosur.
if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html> <!--Përcakton llojin e dokumentit si HTML-->
<html lang="en">  <!--Përcakton gjuhen e dokumentit-->
<head>  <!--Përmban metadata dhe referenca të skedarëve të jashtëm-->
   <meta charset="UTF-8"> <!--Specifikon kodimin e karaktereve të dokumentit-->
   <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Vendos modalitetin e përputhshmërisë për Internet Explorer-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Konfiguron portin e pamjes për dizajn të përgjegjshëm.-->
   <title>admin panel</title> <!--Vendos titullin e faqes së internetit-->

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="./css/admin_style.css">

</head>
<body>
   <!--Përfshin skedarin "admin_header.php", i cili
    përmban seksionin e kokës për panelin e administratorit.-->
<?php include 'admin_header.php'; ?>
<!-- fillimi i seksionit te panelit të administratorit -->
<section class="dashboard">
   <h1 class="title">dashboard</h1>
   <!--Përmban kuti të shumta që shfaqin statistika të ndryshme-->
   <div class="box-container">
      <!--Paraqet një kuti për një statistikë specifike-->
      <div class="box">

         <!--Kodi PHP brenda kutisë merr informacionin e kërkuar nga baza e të dhënave 
         duke përdorur pyetjet SQL dhe kryen llogaritjet-->
         <!--<h3>...</h3>: Shfaq vlerën e llogaritur statistikore.
           <p>...</p>: Shfaq një përshkrim për statistikat përkatëse.-->
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_pendings; ?>/-</h3>
         <p>total pendings</p>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_completed; ?>/-</h3>
         <p>completed payments</p>
      </div>

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>order placed</p>
      </div>

      <div class="box">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>products added</p>
      </div>

      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>normal users</p>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p>admin users</p>
      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>total accounts</p>
      </div>

      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>new messages</p>
      </div>
   </div>
</section>
<!-- përfundimi i seksionit te panelit të administratorit -->

<!-- custom admin js file link  -->
<script src="./js/admin_script.js"></script>
</body>
</html>