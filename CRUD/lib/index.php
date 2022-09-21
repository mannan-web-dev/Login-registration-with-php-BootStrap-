

    <?php 
    include './../inc/header.php';
    include './User.php';
    Session::checkSession();

    // include 'Database.php';
    // $user =new User ();
    ?>

    <?php 
     $loginmsg =Session::get("loginmsg");
     if (isset($loginmsg)) {
      echo $loginmsg;
     }
     session::set("loginmsg", null);
    
    ?>
            
      <div class="container mt-3">  
        <h2>User list<span class="d-flex flex-row-reverse"> Welcome !
        <?php 
          $name =Session::get ("name");
          if (isset($name)) {
            echo $name;
          }
        ?>    
      </span></h2>  
      
      <table class="table table-hover">
      <thead>
            <tr>
              <th>Serial</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email Address</th>
              <th>Action</th>
            </tr>
          </thead>
      
      <?php 
       $user =new User();
       $userdata = $user->getuserData();
        if ($userdata) {
          $i =0;
          foreach ($userdata as $sdata) {
           $i++;
         
      ?>
       

          <tbody>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $sdata['name']; ?></td>
              <td><?php echo $sdata['uname']; ?></td>
              <td><?php echo $sdata['email']; ?></td>
              <td>
                <a class="btn btn-primary" href="Profile.php?id=<?php echo $sdata['id']; ?>">View</a>
              </td>
            </tr>
            <?php } } else { ?>
              <tr><td> <h1>Data is not found<h1> </td></tr>
          </tbody>
          <?php } ?>
        </table>
      </div>






    
</body>
</html>