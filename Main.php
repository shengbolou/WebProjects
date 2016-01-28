<?php

// for login
if(isset($_POST['submit'])){

   header('Cache-Control: no-cache,must-revalidate',true);

  include_once 'connection.php';
  $username = strip_tags($_POST['userName']);
  $password = strip_tags($_POST['password']);

  $query ="SELECT Password FROM users WHERE UserName = '$username'";

  $result = mysqli_query($conn,$query);

  $row = $result->fetch_array(MYSQLI_BOTH);

  if($result){
    $RightPass = $row['Password'];
  }

  if($password == $RightPass && $password!=""){
    header('Location: user.php');
    exit();
  }
  else{
    header('Location: Main.php');
  }
}

// for register
if(isset($_POST['RegisterSubmit'])){
  include 'connection.php';

  $name = strip_tags($_POST['name']);
  $password = strip_tags($_POST['password']);
  $passwordConfirm = strip_tags($_POST['passwordConfirm']);

  if($name == '' || $password == '' || $passwordConfirm == ''){
    echo
    "<script type='text/javascript'>
      $('#UserNameLoginInput').effect('shake');
    </script>";
    // header('Location:Main.php');
  }
  else{

      if($password != $passwordConfirm){
      //   echo "
      //   <div id = 'Mine' class='alert alert-warning alert-dismissible'>
      //    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      //    <strong>Warning!</strong> Please retype your passsword!
      //  </div>
      //   ";
        //header('Location: register.php');
      }
      else{

        $query = "INSERT INTO users(Name,UserName,Password) VALUES('$name','$name','$password')";

        $result = mysqli_query($conn,$query);

        if($result){
          header('Location: user.php');
        }
      }
  }


}


 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Main</title>
     <link rel="stylesheet" href="/css/bootstrap.min.css"charset="utf-8"/>
     <link rel="stylesheet" href="Main.css" charset="utf-8">

     <script src="js/jquery-2.2.0.min.js"></script>
     <script src="js/jquery-ui.min.js" charset="utf-8"></script>
     <script src="js/bootstrap.min.js" charset="utf-8"></script>
     <script src="js/Main.js"></script>
   </head>
   <body>

     <div class="page-header text-center">

       <div class="header">
       </div>

       <div class="headerContainer">
         <h1 id="header">Home page</h1>
       </div>

       <input id='Home' class="btn btn-primary" type="Submit" value="Home"/>
       <input id='login' type="Submit" class="btn btn-primary" name="login" value="login" data-toggle="modal" data-target="#Signin"/>
       <input id='register' type="Submit" class="btn btn-primary" name="register" value="Register" data-toggle="modal" data-target="#RegisterModal"/>

     </div>

  <!-- sign-in modal -->
   <div class="modal fade" id="Signin" role="dialog" aria-labelledby="modallabel">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="modallabel">Log in</h4>
         </div>
         <div class="modal-body">
           <!-- input-group -->
           <form method="post">
             <div class="row">
               <div class="col-md-4 col-md-offset-4">
                 <div class="form-group">
                   <h3 style="font-family:'Raleway-Light'" class="text-center">Your Name</h3>
                   <input type="text" class="form-control" placeholder="UserName" name="userName"/>
                 </div>
                 <div class="form-group">
                   <h3 style="font-family:'Raleway-Light'" class="text-center">Password</h3>
                   <input type="password" class="form-control" placeholder="Password" name="password"/><br>
                 </div>
               </div>
             </div>
             <div class="modal-footer">
               <input style="font-family:'Raleway-Light'" type="Submit" class="btn btn-primary" name = "submit" value="login"/>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>


 <!-- register modal -->
 <div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="RegisterHeader" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 style="font-family:'Raleway-Light'" class="modal-title" id="RegisterHeader">Register</h4>
       </div>
       <div class="modal-body">
         <form method="post">
           <div class="row">
             <div class="col-md-4 col-md-offset-4">
               <div class="form-group">
                 <h4 style="font-family:'Raleway-Light'" class="text-center">UserName</h4>
                 <input id="UserNameLoginInput" type="text" class="form-control" name="name" placeholder="Your Name"/>
               </div>
               <div class="form-group">
                 <h4 style="font-family:'Raleway-Light'" class="text-center">Password</h4>
                 <input type="password" class="form-control" name="password" placeholder="Your Password"/>
               </div>
               <div class="form-group">
                 <h4 style="font-family:'Raleway-Light'" class="text-center inline-block">Confirm Password</h4>
                 <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirm Password"/>
               </div>
             </div>
           </div>
           <div class="modal-footer">
             <input type="Submit" class="btn btn-primary" name="RegisterSubmit" value="Submit"/>
              <!-- <button id="button" type="button" name="button">button</button> -->
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>

    <!-- carousel -->
     <div id = "mycarousel" class="carousel slide" data-ride="carousel">

       <ol class="carousel-indicators">
         <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
         <li data-target="#mycarousel" data-slide-to="1"></li>
         <li data-target="#mycarousel" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner" role="listbox">
         <div id="imgs" class="item active">
           <img src="imgs/wedding4.jpg" />
         </div>
         <div id="imgs" class="item">
           <img src="imgs/wedding2.jpg"/>
         </div>
         <div id="imgs" class="item">
           <img src="imgs/wedding3.jpg" />
         </div>
       </div>

     </div>

   </body>
 </html>
