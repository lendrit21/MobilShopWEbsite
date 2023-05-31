<?php
//përfshin filen 'config.php', i cili zakonisht përmban detajet e 
//konfigurimit të kërkuara për t'u lidhur me bazën e të dhënave.
include 'config.php';
//funksioni fillon ose rifillon një sesion
session_start();
//merr ID-në e përdoruesit nga ndryshorja e sesionit. 
$user_id = $_SESSION['user_id'];
//kontrollon nëse ID-ja e përdoruesit nuk është vendosur,
// duke treguar që përdoruesi nuk është i identifikuar
if(!isset($user_id)){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">
   <div class="flex">
      <div class="image">
         <img src="images/mobile.jpeg" alt="">
      </div>

      <div class="content">
         <h3>pse na zgjodhet ne?</h3>
         <p>Zgjedhja e faqes së internetit të dyqanit tonë celular do të thotë të zgjedhësh një përvojë blerjeje me cilësi të lartë me një shumëllojshmëri
             të përfitimeve. Këtu janë vetëm disa arsye pse duhet të na zgjidhni ne:
             <b> përzgjedhje e pajisjeve celulare dhe aksesorëve -</b> ne ofrojmë një përzgjedhje të madhe të telefonave inteligjentë,
              tableta, orë inteligjente, kufje dhe më shumë, të gjitha nga markat kryesore.
             <b>Çmimi konkurrues -</b> ne përpiqemi t'u ofrojmë klientëve tanë çmime konkurruese për të gjithë
              e produkteve tona.
             <b>Shërbimi i njohur ndaj klientit -</b> ekipi ynë i shërbimit ndaj klientit përbëhet nga ekspertë celularë të cilët
              janë të gatshëm t'ju ndihmojnë për çdo pyetje ose shqetësim që mund të keni.
             <b>Transporti i shpejtë dhe falas -</b> ne ofrojmë transport të shpejtë dhe falas për porositë mbi 50 dollarë,
              duke u siguruar që të merrni produktet tuaja sa më shpejt dhe me lehtësi.
             <b>Garancia e prodhuesit -</b> të gjitha produktet tona vijnë me një garanci të prodhuesit,
              duke ju dhënë më shumë qetësi me blerjen tuaj.
             <b>Arka e sigurt dhe e lehtë -</b> procesi ynë i blerjes është i thjeshtë dhe i sigurt, duke e bërë të lehtë
              që ju të blini me siguri produktet që ju nevojiten.
              Në thelb, ne jemi të përkushtuar t'u ofrojmë klientëve tanë përvojën më të mirë të mundshme të blerjeve,
              nga fillimi në fund. Ne krenohemi që ofrojmë shërbime dhe mbështetje të jashtëzakonshme për çdo klient,
              dhe ne jemi të përkushtuar të sigurojmë kënaqësinë tuaj të plotë me blerjen tuaj.
              Na zgjidhni për nevojat tuaja të pajisjes celulare dhe aksesorëve - nuk do të zhgënjeheni!</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>
   </div>
</section>

<section class="reviews">
   <h1 class="title">client's reviews</h1>
   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>jetmir gashi</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>arbnora bytyqi</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>leonit osmani</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>jehona likaj</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>amir hasani</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>egzona berisha</h3>
      </div>
   </div>
</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="./js/script.js"></script>

</body>
</html>
