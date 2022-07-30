<?php
session_start();
  require_once("./header.php");
?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Chate Here</header>

      <form action="" enctype="multipart/form-data">
        <!--now we can include file in our form -->
        <div class="error-txt">...</div>
        <div class="name-details">
          <div class="field input">
            <label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="first name" required />
          </div>
          <div class="field input">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required />
          </div>
        </div>
        <div class="field input">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Enter your email" required />
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter password" required />
          <i class="fas fa-eye"></i>

        </div>
        <div class="field image">
          <label for="file">Select Profile</label>
          <input type="file" name="image" placeholder="Select profile" require />
        </div>
        <div class="field button">
          <input type="submit"  id="submit" name="submit" value="Start Chatting" />
        </div>
      </form>
      <div class="link">Already signed up? <a href="./login.php">Login Now</a></div>
    </section>
  </div>

  <script src="./js/toggle-password-view.js"></script>
  <script src="./js/signup.js"></script>
</body>

</html>
