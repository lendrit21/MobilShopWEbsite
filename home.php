<?php
//Përfshin skedarin config.php, i cili përmban 
//detaje të lidhjes së bazës së të dhënave dhe konfigurime të tjera.
include 'config.php';
//Fillimi i një sesioni PHP për të ruajtur dhe aksesuar variablat e sesionit.
session_start();
//Merr vlerën user_id nga ndryshorja e sesionit PHP.
$user_id = $_SESSION['user_id'];
//Ridrejtim në faqen e identifikimit nëse ndryshorja e sesionit user_id nuk është vendosur.
if(!isset($user_id)){
   header('location:login.php');
}
//Kodi kontrollon nëse është marrë një kërkesë POST me parametrin 'add_to_cart'.
//Nëse është marr ai merr vlerat e percaktuara te produktit
if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   //Kodi ekzekuton një pyetje SQL duke përdorur mysqli_query për të kontrolluar nëse ka ndonjë 
   //hyrje ekzistuese për të njëjtin produkt dhe përdorues.
   //Pyetja krahason fushat 'emri' dhe 'user_id' në tabelën 'cart' me 'produkt_emri' dhe 'user_id', ose deshton
   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND 
   user_id = '$user_id'") or die('query failed');
//nese numri i rreshtave eshte me i madh se 0 do te thote qe produkti eshte shtuar ne cart.
//perndryshe produkti paraqet problem per ndonje gabim.
   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) 
      VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or 
      die('query failed');
      $message[] = 'product added to cart!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style.css">

</head>
<body>
   <!-- Përfshin skedarin "header.php", i cili përmban
        seksionin e headerit për faqen e internetit. -->
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Mobil Shop Store .</h3>
      <p>Ngritni përvojën tuaj celulare me pajisjet dhe aksesorët tanë të markës më të mirë celulare!
          Blini telefonat inteligjentë, tabletët, orët inteligjente, kufjet dhe më shumë - të gjitha në majë të gishtave.
          Gjeni përshtatjen tuaj të përsosur, nga iPhone ose Samsung Galaxy më i fundit deri te opsionet buxhetore.
          Produktet tona vijnë me një garanci të prodhuesit dhe ekipin tonë të ditur të shërbimit ndaj klientit
          është gjithmonë këtu për t'ju ndihmuar.
          Blini tani dhe përmirësoni lojën tuaj celular!</p>
      <a href="about.php" class="white-btn">zbuloni më shumë</a>
   </div>
</section>

<section class="products">
   <h1 class="title">latest products</h1>
   <div class="box-container">
<!-- Kodi ekzekuton një pyetje SQL duke përdorur mysqli_query për të 
    tërhequr një numër të kufizuar regjistrimesh nga tabela 'produkte'.
Pyetja përfshin klauzolën 'LIMIT 6', e cila kufizon numrin e regjistrimeve të marra.
Nëse dështon,përfundon ekzekutimin dhe shfaq një mesazh gabimi. -->
<?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

  </div>
</section>
<?php include 'footer.php'; ?>
</body>
</html>

