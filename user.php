<?php include "inc/config/user.php"?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SCH DOCS"> 
    <meta name="keywords" content="Data SCH DOCS">
    
    <title>SCH DOCS</title>

    <link rel="stylesheet" href="src/css/style.css">
    <script src="src/js/jquery.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/slick.min.js"></script>
    <script src="src/js/carousel.js"></script>
  
    
</head>

<body class="uform">

<script>

  $(document).ready(function() {

// User input

var input = document.getElementById("userPw");

var fb = document.getElementById("fback");

// Event Listener for capslock

input.addEventListener("keyup", function(event) {

  if(event.getModifierState("CapsLock")) {

    $('#fback').show();
  } 

  else {

    $('#fback').hide();

  }

})

});

</script>

<div class="container">

  <!-- User -->

  <?php if(isset($loginFailed)) { ?>

  <div id="reg-s" class="row mt-3">

  <div id="failed" class="col-lg-3 col-md-10 col-sm-12 mx-auto animated slideInDown shadow-sm">

      <h6><?php echo $loginFailed?></h6>

    </div>

  </div>

<?php }

else if(isset($invalid_Format)) {

?>

<div id="reg-s" class="row mt-3">

  <div id="failed" class="col-lg-3 col-md-10 col-sm-12 mx-auto animated slideInRight shadow-sm">

      <h6><?php echo $invalid_Format?></h6>

    </div>

  </div>

  <?php } 

  else if(isset($user_Exists)) { ?>

    <script>

  $(document).ready(function() {

    $('#login-tab').removeClass('active');

    $('#login').removeClass('active');

    $('#signup-tab').addClass('active');

    $('#signup').addClass('show active');
  });

</script>

    <div id="reg-s" class="row mt-3">

  <div id="failed" class="col-lg-3 col-md-10 col-sm-12 mx-auto animated slideInRight shadow-sm">

      <h6><?php echo $user_Exists?></h6>

    </div>

  </div>

<?php } ?>

  <?php if(isset($success)) { ?>

  <div id="reg-s" class="row mt-3">

  <div id="suk" class="col-lg-3 col-md-10 col-sm-12 mx-auto animated slideInRight shadow-sm">

      <h6>You have successfully registered <i class="fa fa-check-circle fa-green"></i></h6>

    </div>

  </div>

<?php 

} 

else if(isset($connError)) { ?>

  <script>

  $(document).ready(function() {

    $('#login-tab').removeClass('active');

    $('#login').removeClass('active');

    $('#signup-tab').addClass('active');

    $('#signup').addClass('show active');
  });

</script>



<div id="reg-s" class="row mt-3">

  <div id="failed" class="col-lg-3 col-md-10 col-sm-12 mx-auto animated slideInRight shadow-sm">

      <h6><?php echo $connError?></h6>

    </div>

  </div>

<?php 

}

else if(isset($tryAgain)) { ?>

<script>

  $(document).ready(function() {

    $('#login-tab').removeClass('active');

    $('#login').removeClass('active');

    $('#signup-tab').addClass('active');

    $('#signup').addClass('show active');
  });

</script>

<div id="reg-s" class="row mt-3">

  <div id="failed" class="col-lg-3 col-md-10 col-sm-12 mx-auto animated slideInRight shadow-sm">

      <h6><?php echo('<i class="fa fa-info-circle fa-red"></i> ') . $tryAgain?></h6>

    </div>

  </div>

<?php } ?>

  <div id="stab" class="row">

    <div class="col-lg-4 col-md-10 col-sm-12 mtop-sm mx-auto">

      <!-- User Tabs -->

  <ul class="nav nav-pills nav-fill p-2" id="myTab" role="tablist">
  <li class="nav-item p-1">
    <a class="nav-link active brad" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
  </li>
  <li class="nav-item p-1">
    <a class="nav-link brad" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Signup</a>
  </li>
</ul>

</div>

</div>

<!-- Tab Contents -->

  <div class="row">

    <div class="mauto col-lg-4  col-md-10 col-sm-12 p-3 mt-3 mx-auto">

<div class="tab-content" id="userAccount">

  <!-- Login tab -->

  <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">

<h5 class="login">Signin to your account</h5>

<form method="post">

  <label>Student Email</label>

  <div class="mb-3">

      <input type="email" id="user_em" class="form-control userIn" placeholder="* Email Address" name="email" autocomplete="user-email" required>

    </div>

    <label>Password</label>

    <div class="has-f-f mb-3">

      <input type="password" id="user_pw" class="form-control userIn" placeholder="* Password" name="password" autocomplete="user-password" required>
      
    </div>

<button name="signin" class="btn btn-block btn-success">Proceed</button>

  </form>

  <!-- End Login tab -->

</div>

  <!-- Signup tab -->

  <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">

    <h5 class="login">Create an account</h5> 

    <form id="sup" method="post">

      <label>Full Name</label>

      <div class="mb-3">

      <input type="text" id="userFn" class="form-control" value="<?php if(isset($_SESSION['fname'])) { echo $_SESSION['fname']; }?>" placeholder="* Full Name" name="fname"required>

    </div>

    <label>Student Email</label>

    <div class="mb-3">

      <input type="email" id="userEm" class="form-control" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; }?>" placeholder="* Must include @st.futminna.edu.ng" name="email" required>

      
    </div>

    <label>Department</label>

    <div class="mb-3">

      <select name="dept" class="form-control">

        <option value="IMT">IMT</option>

        <option value="CSS">CSS</option>

        <option value="CPT">CPT</option>

      </select>
      
    </div>

     <label>Signup As?</label>

    <div class="mb-3">

      <select name="type" class="form-control">

        <option value="Student">Student</option>

        <option value="Staff">Staff</option>

      </select>
      
    </div>

    <label>Password</label>

    <div class="has-f-f mb-3">

      <input type="password" id="userPw" class="form-control" placeholder="* Password" name="password" required>

      <div id="fback" class="invalid-feedback"><strong>Capslock is on.</strong></div>

    </div>

<button id="new-user" name="reg" class="trans-nr btn btn-block btn-success">Register</button>

  </form>

<!-- End signup tab -->

  </div>

  <!-- End All -->

</div>

</div>

</div>

</div>