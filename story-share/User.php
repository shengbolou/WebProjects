<?php

  include 'php/register.php';
  include 'php/login.php';

  $UserName = $_COOKIE['UserName'];

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="./css/bootflat.min.css" media="screen" title="no title" charset="utf-8">

    <!-- scripts -->
    <script src="./js/jquery-2.2.0.min.js" charset="utf-8"></script>
    <script src="./js/bootstrap.min.js" charset="utf-8"></script>
    <script src="./js/velocity.min.js" charset="utf-8"></script>
    <script src="./js/velocity.ui.js" charset="utf-8"></script>


  </head>
  <body>
    <h4 class="text-center">Welcome <?php echo $UserName ?></h4>
  </body>
</html>