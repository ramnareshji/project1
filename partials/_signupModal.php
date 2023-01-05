<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '_dbconnect.php';
  $email = $_POST['signupEmail'];
  $password = $_POST['signupPassword'];
  $cpassword = $_POST['signupcPassword'];

  $sql4 = "SELECT * FROM `users` WHERE `user_email` = '$email'";
  $result4 = mysqli_query($conn, $sql4);

  if (mysqli_num_rows($result4) > 0) {

    $row = mysqli_fetch_assoc($result4);
    if ($email == isset($row['user_email'])) {
      echo " '$email' already exists";
      exit();
    }
  } 
  if ($password !=  $cpassword) {
    echo "Password didn't matched.";
    exit();
  }
   else {
    $paswordhash = password_hash($password, PASSWORD_DEFAULT);
    $sql3 = "INSERT INTO `users` ( `user_email`, `password`) VALUES ( '$email', '$paswordhash')";
    $result3 = mysqli_query($conn, $sql3);
    $showAlert = true;
    header("Location: /project/index.php?signupsuccess=true");
    exit();

  }
}


?>



<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for an iDiscuss Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/project/partials/_signupModal.php" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <!-- <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp"> -->
                        <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                    </div>
                     
                    <button type="submit" class="btn btn-primary">Signup</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
                </form>
    </div>
  </div>
</div>