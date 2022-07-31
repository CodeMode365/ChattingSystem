<?php
session_start();
if(!isset($_SESSION["unique_id"])){
  header("location:./login.php");
}

  require_once("header.php");
?>
  </head>
  <body>
    <div class="wrapper">
      <section class="chat-area">
        <header>
          <?php
          require_once("./php/config.php");
          $user_id = mysqli_real_escape_string($conn, $_GET["user_id"]);
          
          $user_info = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}';");

          if(mysqli_num_rows($user_info) > 0){
            $row =mysqli_fetch_assoc($user_info)
          ?>
          <a href="./users.php" class="back-button">
            <i class="fas fa-arrow-left"></i>
          </a>
          <img src="./assets/profiles/<?php echo $row["profile"]?>" alt="" />
          <div class="details">
            <span><?php echo ucfirst($row["fname"])." ".ucfirst($row["lname"]); }?></span>
            <p><?php echo $row["status"];?></p>
          </div>
        </header>


          <!-- chatting area  -->
        <div class="chat-box" id="chat-box">
          <div class="chat outgoing">
            <div class="details">
              <p>
                Lorem ipsum dolor sit amet lorem500 consectetur adipisicing
                elit. Ipsam
              </p>
            </div>
          </div>
          <div class="chat incoming">
            <img src="./profile.jpg" alt="" />
            <div class="details">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam
                hic nihil sed obcaecati consequatur doloremque.
              </p>
            </div>
          </div>
           <div class="chat outgoing">
            <div class="details">
              <p>
                Lorem ipsum dolor sit amet lorem500 consectetur adipisicing
                elit. Ipsam
              </p>
            </div>
          </div>
          <div class="chat outgoing">
            <div class="details">
              <p>
                Lorem ipsum dolor sit amet lorem500 consectetur adipisicing
                elit. Ipsam
              </p>
            </div>
          </div>
          
        </div>
        <form action="#" class="typing-area" id="messenger">
          <input type="text" name="user_id" value="<?php echo $row['unique_id']; ?>" hidden > 
          <input type="text" name="sender_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden> 
          <input type="text" id="message" name="message" placeholder="Type a message ...">
          <button id="send"><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>

    <script src="./js/chat.js"></script>
  </body>
</html>
