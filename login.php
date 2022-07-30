
<?php
//Starting the session
session_start();
// if(!isset($_SESSION['username'])){
//     echo "Login first";
//     header("location:login.php");
// }
  require_once("./header.php");
?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Chate Here</header>
      <form>
        <div class="error-txt">Error message</div>
        <div class="field input">
          <label for="email">Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" />
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter password" />
          <i class="fas fa-eye"></i>
        </div>

        <div class="field button">
          <input id="submit" type="submit" name="submit" value="Start Chatting" />
        </div>
      </form>
      <div class="link">Don't have account?<a href="./index.php"> Create account</a></div>
    </section>
  </div>

  <script src="./js/toggle-password-view.js"></script>
  <script src="./js/login.js"></script>
</body>

</html>

</body>

</html>