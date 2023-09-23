<?php
  include("config.php");
  if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
  }

  function showroom($result){
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='show'>";
      echo "<div class='table-container'>";
      echo "<table class='displaytable'>";
      echo "<th>Room ID</th>";
      echo "<th>Room Label</th>";
      echo "<th>Room Location</th>";
      echo "<th>Room Gender</th>";
      echo "<th>Room Window</th>";
      echo "<th>Room Monthly Price</th>";
      echo "<th>Room Availability</th>";
      echo "<th>Room Description</th>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["room_id"] . "</td>" . "  
        " . "<td>" . $row["room_label"] . "</td>" . " 
        " . "<td>" . $row["room_location"] . "</td>" . "
        " . "<td>" . $row["room_gender"] . "</td>" . "
        " . "<td>" . $row["room_window"] . "</td>" . "
        " . "<td>" . $row["room_monthly_price"] . "</td>" . "
        " . "<td>" . $row["room_availability"] . "</td>" . "
        " . "<td>" . $row["room_description"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
      echo '<form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>';
      if(isset($_POST['close'])) {
        header("Location: http://localhost/ssip/16.php");
      }
      echo "</div>";
      echo "</div>";
    }
  }
  
  function close(){
    echo '<form method="POST" class="closetable"> <button type="submit" class="closetablebutton" name="close">Close</button></form>';
    if(isset($_POST['close'])) {
      header("Location: http://localhost/ssip/16.php");
    }
  }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naranne</title>  
    <link rel="stylesheet" href="naranne.css">
    <script src ="naranne.js"></script>
</head>
<body>

<div id="menu" class="menu">
    <div class="option"><a href="#header-container">Home</a></div>
    <div class="option"><a href="#about">About</a></div>
    <div class="option"><a href="#service">Room Type</a></div>
    <div class="option"><a href="#room">Room Availability</a></div>
    <div class="option"><a href="open.php">Login</a></div>
</div>

<div class="header-container" id="header-container">
    <div class="header">
    </div>
</div>

<div class="home">
  <div class="home-container">
    <div class="content">
    </div>
  </div>
</div>
 
<section class="about" id="about">
  <div class="main">
    <img src="img/SSIP.png">
      <div class="about-text">
        <h2>Member introduction</h2>
        <h5>Information System 2021</h5>
        <p>Hello!
        we are 3 women who developed a website to rent hotels and tents below. This website is set in the name of each of us, namely Regi(Na), (Ra)tu, and Wy(Nne) therefore Naranne was formed.<br>
        We hope that every feature we make can be useful and help you in using our facilities.<br><br>
        For more, please click the contact button below:
        </p>
        <button type="button">Contact</button>
      </div>
    </div>
</section>
 
  <!-- ---Room section start--------- -->
<div class="service" id="service">
    <div class="title">
      <h2>Our Rooms</h2>
    </div>
 
    <div class="box">
      <div class="card">
        <i class="fas fa-bars"></i>
        <h5>Single Room</h5>
        <div class="pra">
          <p>Our comfortable single rooms are just the right size if you are travelling alone. Similar to all the other rooms in the Naranne Hotel, the single room is fully equipped with all comforts.
            In addition to the comfortable hotel lounge, the room is equipped with a Smart TV, Wi-Fi and iPod docking station. With a size of 14.5 m².
          </p>
          <p style="text-align: center; ">
            <a class="button" href="#">Read More</a>
          </p>
        </div>
      </div>
 
      <div class="card1">
        <i class="far fa-user"></i>
        <h5>Twin Room</h5>
        <div class="pra">
          <p>The sleek and warm interior of our rooms invites you to relax and enjoy what the Naranne Hotel has to offer.
            The comfort twin room has a size of 17.5 m². In addition to the two comfy beds, you will have plenty of room to relax. With a book, a movie or a drink from the lounge, for example. The rooms are fully equipped for a relaxing stay.</p>
          <p style="text-align: center;">
            <a class="button" href="#">Read More</a>
          </p>
        </div>
      </div>
 
      <div class="card2">
        <i class="far fa-bell"></i>
        <h5>Double Room</h5>
        <div class="pra">
          <p>Warmth, luxury and peace meet you in our charming comfort double room. In addition to the plush beds, the room (16 m²) is equipped with all amenities the Naranne Hotel has to offer.
            From docking station to Nespresso machine with free coffee and tea and from rain shower to room service. </p>
 
          <p style="text-align: center;">
            <a class="button" href="#">Read More</a>
          </p>
        </div>
      </div>
    </div>
</div>
  
<div class="room" id ="room">
  <div class="header-container1">
  </div>

  <div class="button">    
      <button class="open-button" onclick="openRoomTable()">Display Room</button>
  </div>
  
  <div class="popup" id="roomtable">
      <div class="table-container">
      <table class="displaytable">
          <th>Room ID</th>
          <th>Room Label</th>
          <th>Room Location</th>
          <th>Room Gender</th>
          <th>Room Window</th>
          <th>Room Monthly Price</th>
          <th>Room Availability</th>
          <th>Room Description</th>
          <?php
              $sql = "SELECT room_id, room_label, room_location, room_gender, room_window, room_monthly_price, room_availability, room_description FROM room";
              $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["room_id"] . "</td>" . "  
                      " . "<td>" . $row["room_label"] . "</td>" . " 
                      " . "<td>" . $row["room_location"] . "</td>" . "
                      " . "<td>" . $row["room_gender"] . "</td>" . "
                      " . "<td>" . $row["room_window"] . "</td>" . "
                      " . "<td>" . $row["room_monthly_price"] . "</td>" . "
                      " . "<td>" . $row["room_availability"] . "</td>" . "
                      " . "<td>" . $row["room_description"] . "</td>";
                  echo "</tr>";
                  }
              } else {
                  echo "no results";
              }
          ?>
      </table>
      <button type="button" class="closetablebutton" onclick="closeRoomTable()">Close</button>
      </div>
  </div>

</div>
<div class="partner">
  <div class="header-container5"></div>
  <div class="partner-container">
    <div class="partner-icon">
      <div class="tooltip">
        <img src="img/sment.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">SM Entertainment</span>
      </div>
      <div class="tooltip">
        <img src="img/grandhotel.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Grand Hotel</span>
      </div>
      <div class="tooltip">
        <img src="img/atlantichotel.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Atlantic Hotel</span>
      </div>
      <div class="tooltip">
        <img src="img/internazionale.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Internazionale Hotel</span>
      </div>
      <div class="tooltip">
        <img src="img/sebong.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Seventeen</span>
      </div>
      <div class="tooltip">
        <img src="img/oxford.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">University of Oxford</span>
      </div>
      <div class="tooltip">
        <img src="img/kokobop.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Exo Kokobop</span>
      </div>
      <div class="tooltip">
        <img src="img/attackontitan.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Attack on Titan</span>
      </div>
      <div class="tooltip">
        <img src="img/magna.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Magna Hotel</span>
      </div>
      <div class="tooltip">
        <img src="img/harrypotter.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Harry Potter</span>
      </div>
      <div class="tooltip">
        <img src="img/sunrise.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">GFRIEND Sunrise</span>
      </div>
      <div class="tooltip">
        <img src="img/timeforthemoonlight.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Time For The Moonlight</span>
      </div>
      <div class="tooltip">
        <img src="img/chatime.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Chatime</span>
      </div>
      <div class="tooltip">
        <img src="img/starbuck.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Starbucks</span>
      </div>
      <div class="tooltip">
        <img src="img/pocari.jpeg" alt="" width=50px height=50px >
        <span class="tooltiptext">Pocari Sweat</span>
      </div>
    </div>
  </div>
</div>
</body>
<?php
    mysqli_close($db);
?>
<footer>
  <section class="footer">
    <div class="social">
      <a href="https://www.instagram.com/rgnrm/"><img src="img/instagram.png" alt="instagram" width=35px height=35px></a>
      <a href="#"><img src="img/whatsapp.png" alt="whatsapp" width=35px height=35px></a>
      <a href="https://vt.tiktok.com/ZSd5qVofF/"><img src="img/tik-tok.png" alt="tiktok" width=35px height=35px></a>
      <a href="https://www.youtube.com/c/nctsmtown"><img src="img/youtube.png" alt="youtube" width=35px height=35px></a>
    </div>

    <ul class ="list">
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">About</a>
      </li>
      <li>
        <a href="#">Location</a>
      </li>
      <li>
        <a href="#">Terms & Policy</a>
      </li>
      <li>
        <a href="#">Register</a>
      </li>
    </ul>
    <p class="copyright">© 2022 Copyright: Naranne</p>
  </section>
</footer>
</html>