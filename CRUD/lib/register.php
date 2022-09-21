

    <?php 
    include './../inc/header.php';
    include './User.php';
    ?>
    <?php 
     
   $user = new User ();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
     $userRegi = $user->userregistation($_POST);
}

    ?>
            
      <div class="container mt-3" style ="max-width:500px; margin: 
     0 auto">  

<?php 
  if (isset($userRegi)) {
     echo $userRegi;
  }
?>

        <form action="" class="was-validated" method="POST">

        <div class="mb-3 mt-3">
              <label for="name" class="form-label">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter username" name="name" >
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3 mt-3">
              <label for="uname" class="form-label">Username:</label>
              <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" >
              <div class="valid-feedback">Valid</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="mb-3 ">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  value="">
              <div class="valid-feedback">Valid</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Submit</button>
          </form>
      </div>



 
    
</body>
</html>