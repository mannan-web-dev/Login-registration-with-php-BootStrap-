<?php 
 $filepath = realpath(dirname(__FILE__));
 include_once $filepath.'./../lib/Session.php';
 Session::init();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Log in and registration with PDO</title>
</head>

<?php
 if (isset($_GET['action']) && $_GET['action'] == "logout") {
    session:: destroy();
  
 }


?>
<body>
   
    <div class="container mt-5">
        <h2 class="text-center">Log in and register</h2>
        <ul class="nav">

        <?php 
        $id =Session::get("id");
        $userlogin = Session::get("login");
       if ($userlogin == true) {
      
       ?>
          <li class="nav-item" style="margin-right: 10px;">
            <a class="navbar-brand" href="profile.php?id=<?php echo $id; ?>">Profile</a>
          </li>

          <li class="nav-item" style="margin-right: 10px;">
            <a class="navbar-brand" href="?action=logout">Logout</a>
          </li>
          <?php } else { ?>
          <li class="nav-item" style="margin-right: 10px;">
            <a class="navbar-brand" href="login.php">LogIn</a>
          </li>
          <li class="nav-item" style="margin-right: 10px;">
            <a class="navbar-brand " href="register.php">Registrtion</a>
          </li>
          <?php } ?>
        </ul>
      </div>