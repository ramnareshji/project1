<?php

while ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '_dbconnect.php';
  $email = $_POST['loginEmail'];
  $pass = $_POST['loginPass'];

  $sql5 = "SELECT * FROM `users` WHERE `user_email` = '$email'";
  $result = mysqli_query($conn, $sql5);
  $numRows = mysqli_num_rows($result);
  if ($numRows == 1) {
    $row5 = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row5['password'])) {
      session_start();
      $_SESSION['loggin'] = true;
      $_SESSION['loggin'];
      $_SESSION['sno'] = $email;
    
     
    }
    header("Location: /project/Threadlist.php?session_start()");
  }
  header("Location: /project/index.php");
}

?>


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to iDiscuss</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/project/partials/_loginModal.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="loginEmail">Username</label>
            <input type="text" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
          </div>
          <div class="form-group">
            <label for="loginPass">Password</label>
            <input type="password" class="form-control" id="loginPass" name="loginPass">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>