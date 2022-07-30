<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("location: ./login.php");
}

require_once("./header.php");
?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <?php
        //Fetch the user information from the database
        require_once("./php/config.php");

        $fetchQry = "SELECT * FROM `users` WHERE unique_id = {$_SESSION['unique_id']};";
        $fetch = mysqli_query($conn, $fetchQry);

        $data = mysqli_fetch_assoc($fetch);

        ?>

        <div class="content">
          <img src="<?php echo "./assets/profiles/".$data['profile'];?>" alt="" />
          <div class="details">
            <span><?php echo ucfirst($data["fname"])." ".ucfirst($data["lname"]); ?></span>
            <p style="font-size: 0.9rem;"><?php  echo ucfirst($data["status"]); ?></p>
          </div>
        </div>
        <a href="./php/logout.php" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text selectMessage">Select user to chat</span>
        <input type="text" placeholder="Enter your friend name" onkeyup="search(this.value)"/>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list" id="friends-list">

        <!-- place holder for users friend list  -->
        <!-- <a href="#">
          <div class="content">
            <img src="./profile.jpg" alt="" />
            <div class="details">
              <span>Random Guy</span>
              <p>Test message</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a> -->
      </div>
    </section>
  </div>

  <script src="./js/friends.js"></script>
  <!-- <script src="./js/usersList.js"></script> -->
  <!-- <script src="./js/userSearch.js"></script> -->
</body>

</html>