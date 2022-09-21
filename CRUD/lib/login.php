

      <?php 
    include './../inc/header.php';
    include './User.php';

     Session::checklogin();
    ?>
    <?php 
     
   $user = new User ();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
     $userlogin = $user->userlogin($_POST);
}

    
    ?>
            
      <div class="container mt-3" style ="max-width:500px; margin: 
     0 auto">  

<?php 
  if (isset($userlogin)) {
     echo $userlogin;
  }
?>
        <form action="" method ="POST">
            <div class="mb-3 mt-3">
              <label for="email" class="formlabel">Enter your email:</label>
              <input type="text" class="form-control" id="email" placeholder="Enter username" name="email">
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <button type="submit"name="login" class="btn btn-primary">Submit</button>
          </form>
      </div>



 
    
</body>
</html>