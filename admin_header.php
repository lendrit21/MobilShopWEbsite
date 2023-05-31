<!-- admin header php code -->
<?php
if(isset($message)){ //Kontrollon nëse ndryshorja $message është vendosur.
   foreach($message as $message){ //Përsëritet mbi çdo element në grupin $message dhe ia cakton vlerën variablit $message
      //Nxjerrë shënimin HTML për shfaqjen e një kutie mesazhesh me një buton mbylljeje.
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!-- end of admin header php code -->

<header class="header"> <!-- Përcakton seksionin e headerit së panelit të administratorit-->

   <div class="flex">    <!--Përfaqëson një flex container për përmbajtjen e headerit-->
        <!-- sektioni i logos -->
        <!-- Krijon një lidhje për logon e panelit të administratorit me tekstin "Admin Panel"
           dhe një fjalë të stilizuar "Panel" -->
      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a> 
          <!-- linqet e navigimit -->
      <nav class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">products</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
         <a href="admin_contacts.php">messages</a>
      </nav>
      
      <!-- Ikonat dhe kutia e llogarisë -->
      <div class="icons"> <!--Përmban ikona për menunë dhe opsionet e përdoruesit-->
         <div id="menu-btn" class="fas fa-bars"></div> <!-- shfaq ikonen e menuse -->
         <div id="user-btn" class="fas fa-user"></div> <!-- shfaq ikonen e perdoruesit -->
      </div>

      <div class="account-box"> <!--Përfaqëson një container për informacione të lidhura me llogarinë-->
         <!-- Shfaq emrin e përdoruesit të administratorit duke përdorur një variabël sesioni PHP. -->
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>

         <!-- Shfaq emailin e administratorit duke përdorur një variabël sesioni PHP. -->
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>

         <!--  Represents a link to the logout functionality. -->
         <a href="logout.php" class="delete-btn">logout</a>

         <!-- Përfaqëson një seksion për opsionet e reja të hyrjes dhe regjistrimit. -->
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>
   </div>
</header>
