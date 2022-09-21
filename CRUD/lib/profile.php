

    <?php 
        include './User.php';
    include './../inc/header.php';
    Session::checkSession();
    ?>

    <?php 
    
     if (isset($_GET['id'])) {
       $userid =(int)$_GET['id'];
     }
     $user = new User();
    ?>
            
      <div class="container mt-3" style ="max-width:500px; margin: 
     0 auto">  
           
           <h2>User Profile<span class="d-flex flex-row-reverse"> <a href="index.php">Back</a> </span></h2>       
        
         <?php 
        
         $userdata = $user->getUserById($id);
           if ($userdata) {
            
         ?>
           <form action="" method="Post">

        <div class="mb-3 ">
              <label for="name" class="form-label">Name:</label>
              <input type="text" class="form-control" id="name" name="name" value =" <?php echo $userdata->name; ?>">
            <div class="mb-3 mt-3">
              <label for="uname" class="form-label">Username:</label>
              <input type="text" class="form-control" id="uname"  name="uname"  value =" <?php echo $userdata->uname; ?>">
            <div class="mb-3 ">
              <label for="email" class="form-label">Email:</label>
              <input type="text" class="form-control" id="email"  name="email"  value =" <?php echo $userdata->email; ?>">
            </div>
            <?php 
            $sesId = Session:: get("id");
            // if ($userdata == $sesId ) {
            ?>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <!-- <?php } ?> -->
          </form>
         
      </div>



 
    
</body>
</html>