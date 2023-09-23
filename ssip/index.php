<?php
  include('session.php');
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
        header("Location: http://localhost/ssip/index.php");
      }
      echo "</div>";
      echo "</div>";
    }
  }

  function showtenant($result){
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='show'>";
      echo "<div class='table-container'>";
      echo "<table class='displaytable'>";
      echo "<th>Tenant ID</th>";
      echo "<th>Tenant Name</th>";
      echo "<th>Tenant Address</th>";
      echo "<th>Tenant KTP Number</th>";
      echo "<th>Tenant Phone Number</th>";
      echo "<th>Tenant Email</th>";
      echo "<th>Tenant Emergency Contact Person</th>";
      echo "<th>Tenant Emergency CP Phone</th>";
      echo "<th>Tenant Emergenct CP Email</th>";
      echo "<th>Tenant Bank Account</th>";
      echo "<th>Tenant Bank Account Number</th>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["tenant_id"] . "</td>" . "  
        " . "<td>" . $row["tenant_name"] . "</td>" . " 
        " . "<td>" . $row["tenant_address"] . "</td>" . "
        " . "<td>" . $row["tenant_ktp_no"] . "</td>" . "
        " . "<td>" . $row["tenant_phone"] . "</td>" . "
        " . "<td>" . $row["tenant_email"] . "</td>" . "
        " . "<td>" . $row["tenant_emergcp"] . "</td>" . "
        " . "<td>" . $row["tenant_emergcp_phone"] . "</td>" . "
        " . "<td>" . $row["tenant_emergcp_email"] . "</td>" . "
        " . "<td>" . $row["tenant_bankaccount"] . "</td>" . "
        " . "<td>" . $row["tenant_bankaccount_no"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
      echo '<form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>';
      if(isset($_POST['close'])) {
        header("Location: http://localhost/ssip/index.php");
      }
      echo "</div>";
      echo "</div>";
    }
  }

  function showbook($result){
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='show'>";
      echo "<div class='table-container'>";
      echo "<table class='displaytable'>";
      echo "<th>Book ID</th>";
      echo "<th>Room ID</th>";
      echo "<th>Tenant ID</th>";
      echo "<th>Start</th>";
      echo "<th>End</th>";
      echo "<th>Transaction Date</th>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["book_id"] . "</td>" . "  
        " . "<td>" . $row["room_id"] . "</td>" . " 
        " . "<td>" . $row["tenant_id"] . "</td>" . "
        " . "<td>" . $row["book_start_date"] . "</td>" . "
        " . "<td>" . $row["book_end_date"] . "</td>" . "
        " . "<td>" . $row["transaction_date"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
      echo '<form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>';
      if(isset($_POST['close'])) {
        header("Location: http://localhost/ssip/index.php");
      }
      echo "</div>";
      echo "</div>";
    }
  }

  function showincome($result, $x){
    $total_income = 0;
    echo '<div class ="show">';
    echo '<div class="table-container">';
    echo '<h4>Total Income from ' . $x . '</h4>';
    echo '<table class="displaytable">';
    echo '<th>Book ID</th>';
    echo '<th>Room ID</th>';
    echo '<th>Room Label</th>';
    echo '<th>Transaction Date</th>';
    echo '<th>Book Start Date</th>';
    echo '<th>Book End Date</th>';
    echo '<th>Period</th>';
    echo '<th>Room Monthly Price</th>';
    echo '<th>Total Amount</th>';
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row["book_id"] . "</td>" . "  
          " . "<td>" . $row["room_id"] . "</td>" . " 
          " . "<td>" . $row["room_label"] . "</td>" . "
          " . "<td>" . $row["transaction_date"] . "</td>" . "
          " . "<td>" . $row["book_start_date"] . "</td>" . "
          " . "<td>" . $row["book_end_date"] . "</td>" . "
          " . "<td>" . $row["period"] . "</td>" . "
          " . "<td>" . $row["room_monthly_price"] . "</td>" . "
          " . "<td> Rp. " . $row["totalamount"] . "</td>";
      echo "</tr>";
      $total_income += $row['totalamount'];
    }
    echo "<tr>";
    echo "<td colspan='8'>Total Income</td>";
    echo "<td> Rp. " . $total_income . "</td>";
    echo "</tr>";
    echo "</table>";
    echo '<form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>';
    if(isset($_POST['close'])) {
      header("Location: http://localhost/ssip/index.php");
    }
    echo '</div>';
    echo '</div>';
  }
  
  function close(){
    echo '<form method="POST" class="closetable"> <button type="submit" class="closetablebutton" name="close">Close</button></form>';
    if(isset($_POST['close'])) {
      header("Location: http://localhost/ssip/index.php");
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
    <div class="option"><a href="#about">Home</a></div>
    <div class="option"><a href="#room">Room</a></div>
    <div class="option"><a href="#tenant">Tenant</a></div>
    <div class="option"><a href="#booking">Book</a></div>
    <div class="option"><a href="logout.php">Logout</a></div>
</div>

<div class="header-container">
    <div class="header">
    </div>
</div>
 
<section class="about" id="about">
  <div class="main">
    <img src="img/SSIP.png">
      <div class="about-text">
        <h2>Member introduction</h2>
        <h5>Information System 2021</h5>
        <p>Hello! Welcome to our website, your one-stop destination for renting hotels and tents!<br>
        I am develope a website to rent hotels and tents below.<br>
        We hope that every feature we make can be useful and help you in using our facilities.<br><br>
        For more, please click the contact button below:
        </p>
        <button type="button">Contact</button>
      </div>
    </div>
  </section>
 
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
 
    </div>
`</div>
  
<div class="room" id ="room">
  <div class="header-container1">
  </div>

  <div class="button">    
      <button class="open-button" onclick="openAddRoom()">Add New Room</button>
      <button class="open-button" onclick="openRoomTable()">Display Room</button>
      <button class="open-button" onclick="openUpdateRoom()">Update Room</button>
      <button class="open-button" onclick="openDeleteRoom()">Delete Room</button>
  </div>

  <div class="popup" id="newroom">
    <form action="" method="POST" class="form-container">

      <label for="room_id"><b>Room ID</b></label>
      <input type="text" placeholder="Enter Room ID" name="room_id" required>
      <br>

      <label for="room_label"><b>Room Label</b></label>
      <input type="text" placeholder="Enter Room Label" name="room_label" required> 
      <br>

      <label for="room_location"><b>Room Location</b></label>
      <select name="room_location" required>
          <option>1st Floor</option>
          <option>2nd Floor</option>
      </select>
      <br>

      <label for="room_gender"><b>Room Gender</b></label>
      <select name="room_gender" required>
          <option>Female</option>
          <option>Male</option>
      </select>
      <br>

      <label for="room_window"><b>Room Window</b></label>
      <input type="text" placeholder="Enter Room Window" name="room_window" required>
      <br>

      <label for="room_monthly_price"><b>Room Monthly Price</b></label>
      <input type="text" placeholder="Enter Room Monthly Price" name="room_monthly_price" required> 
      <br>

      <label for="room_availability"><b>Room Availability</b></label>
      <select name="room_availability" required>
          <option>Occupied</option>
          <option>Vacant</option>
      </select>
      <br>

      <label for="room_description"><b>Room Description</b></label>
      <input type="text" placeholder="Enter Room Description" name="room_description" required>
      <br>

      <button type="submit" name="addroom">Add</button>
      <button type="button" onclick="closeAddRoom()">Cancel</button>
    </form>
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

  <div class="popup" id="updateroom">
    <form action="" method="POST" class="form-container">

      <label for="room_id"><b>Room ID</b></label>
      <input type="text" placeholder="Enter Room ID" name="room_id" required>
      <br>

      <label for="tenant_name"><b>Tenant Name</b></label>
      <select name="tenant_name">
        <?php
          $tenant_result = mysqli_query($db, "SELECT tenant_name FROM Tenant ORDER BY tenant_name");
          $i=0;
          while($row = mysqli_fetch_array($tenant_result)){
          ?>
      <option value="<?=$row['tenant_name'];?>"><?=$row['tenant_name'];?></option>
        <?php
        $i++;
        }
        ?>
      </select>
      <br>

      <label for="room_damage"><b>Room Damage</b></label>
      <select name="room_damage" required>
        <option>Broken Bed</option>
        <option>Broken Mattress</option>
        <option>Broken Pillow</option>
        <option>Light Bulb</option>
        <option>Desk</option>
        <option>Chair</option>
        <option>Cabinet</option>
        <option>Air Conditioner</option>      
        <option>Trash Can</option>
        <option>Window</option>
      </select>
      <br>

      <button type="submit" name="updateroom">Update</button>
      <button type="button" onclick="closeUpdateRoom()">Cancel</button>
    </form>
  </div>

  <div class="popup" id="deleteroom">
    <form action="" method="POST" class="form-container">

      <label for="room_id"><b>Room ID</b></label>
      <input type="text" placeholder="Enter Room ID" name="room_id" required>
      <br>

      <button type="submit" name="deleteroom">Delete</button>
      <button type="button" onclick="closeDeleteRoom()">Cancel</button>
    </form>
  </div>

  <?php
    if (isset($_POST['addroom'])){
      $room_id = $_POST['room_id'];
      $room_label = $_POST['room_label'];
      $room_location = $_POST['room_location'];
      $room_gender = $_POST['room_gender'];
      $room_window = $_POST['room_window'];
      $room_monthly_price = $_POST['room_monthly_price'];
      $room_availability = $_POST['room_availability'];
      $room_description = $_POST['room_description'];
    
      $query = "INSERT INTO Room (room_id, room_label, room_location, room_gender, room_window, room_monthly_price, room_availability, room_description)
                    VALUES ('$room_id', '$room_label', '$room_location', '$room_gender', '$room_window', '$room_monthly_price', '$room_availability', '$room_description')";
      if (mysqli_query($db, $query)){
        $sql = "SELECT room_id, room_label, room_location, room_gender, room_window, room_monthly_price, room_availability, room_description FROM room";
        $result = mysqli_query($db, $sql);
        showroom($result);
      } else {
        echo "no results";
        close();
      }
    }

    if (isset($_POST['updateroom'])){
      $room_id = $_POST['room_id'];
      $tenant_name = $_POST['tenant_name'];
      $room_damage = $_POST['room_damage'];

      $tenantid =mysqli_query($db, "SELECT tenant_id FROM Tenant WHERE tenant_name = '$tenant_name'");
      $tenant_id = $tenantid->fetch_array()[0] ?? '';

      switch ($room_damage) {
        case 'Broken Bed':
          $damage_fine = 1500000;
          break;
        case 'Broken Mattress':
          $damage_fine = 500000;
          break;
        case 'Broken Pillow':
          $damage_fine = 100000;
          break;
        case 'Light Bulb':
          $damage_fine = 30000;
          break;
        case 'Desk':
          $damage_fine = 150000;
          break;
        case 'Chair':
          $damage_fine = 150000;
          break;
        case 'Cabinet':
          $damage_fine = 150000;
          break;
        case 'Air Conditioner':
          $damage_fine = 1500000;
          break;
        case 'Trash Can':
          $damage_fine = 25000;
          break;
        case 'Window':
          $damage_fine = 1000000;
          break;
        default:
          $damage_fine = 0;
      }

      $query = "INSERT INTO damage (room_id, tenant_id, room_damage, damage_fine)
      VALUES ('$room_id', '$tenant_id', '$room_damage', '$damage_fine')";
      if (mysqli_query($db, $query)){
        ?>
          <div class = 'show'>
            <div class='form-container'><p>Damage added to invoice</p>
              <form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>
            </div>
          </div>
        <?php
      } else {
        ?>
          <div class = 'show'>
            <div class='form-container'><p>Damage failed added</p>
              <form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>
            </div>
          </div>
        <?php
        close();
      }
    }

    if (isset($_POST['deleteroom'])){
      $room_id = $_POST['room_id'];
      $query = "DELETE FROM Room WHERE room_id = '$room_id'";
      if (mysqli_query($db, $query)){
        $sql = "SELECT room_id, room_label, room_location, room_gender, room_window, room_monthly_price, room_availability, room_description FROM room";
        $result = mysqli_query($db, $sql);
        showroom($result);
      } else {
        echo "no results";
        close();
      }
    }

  ?>
</div>

<div class="tenant" id ="tenant">
  <div class="header-container2">
  </div>
          
  <div class="button">
    <button class="open-button" onclick="openAddTenant()">Add New Tenant</button>
    <button class="open-button" onclick="openTenantTable()">Display Tenant</button>
    <button class="open-button" onclick="openUpdateTenant()">Update Tenant</button>
    <button class="open-button" onclick="openDeleteTenant()">Delete Tenant</button>
  </div>

  <div class="popup" id="newtenant">
    <div class="form-box">
        <form action="" method="POST" class="form-container">

        <label for="tenant_id"><b>Tenant ID</b></label>
        <input type="text" placeholder="Enter Tenant ID" name="tenant_id" required>
        <br>

        <label for="tenant_name"><b>Tenant Name</b></label>
        <input type="text" placeholder="Enter Tenant Name" name="tenant_name" required> 
        <br>

        <label for="tenant_address"><b>Tenant Address</b></label>
        <input type="text" placeholder="Enter Tenant Address" name="tenant_address" required> 
        <br>

        <label for="tenant_ktp_no"><b>Tenant Identification Number</b></label>
        <input type="text" placeholder="Enter Identification Number" name="tenant_ktp_no" required> 
        <br>

        <label for="tenant_phone"><b>Tenant Phone</b></label>
        <input type="text" placeholder="Enter Tenant Phone" name="tenant_phone" required> 
        <br>

        <label for="tenant_email"><b>Tenant Email</b></label>
        <input type="text" placeholder="Enter Tenant Email" name="tenant_email" required> 
        <br>

        <label for="tenant_emergcp"><b>Tenant Emergency Contact Person</b></label>
        <input type="text" placeholder="Enter Tenant Emergency Contact Person Name" name="tenant_emergcp" required> 
        <br>

        <label for="tenant_emergcp_phone"><b>Tenant Emergency Contact Person Phone</b></label>
        <input type="text" placeholder="Enter Tenant Emergency Contact Person Phone" name="tenant_emergcp_phone" required> 
        <br>

        <label for="tenant_emergcp_email"><b>Tenant Emergency Contact Person Email</b></label>
        <input type="text" placeholder="Enter Tenant Emergency Contact Person Email" name="tenant_emergcp_email" required> 
        <br>

        <label for="tenant_bankaccount"><b>Tenant Bank Account</b></label>
        <input type="text" placeholder="Enter Tenant Bank Account" name="tenant_bankaccount" required> 
        <br>

        <label for="tenant_bankaccount_no"><b>Tenant Bank Account Number</b></label>
        <input type="text" placeholder="Enter Tenant Bank Account Number" name="tenant_bankaccount_no" required> 
        <br>

        <button type="submit" name="addtenant">Add</button>
        <button type="button" onclick="closeAddTenant()">Cancel</button>
        </form>
    </div>
  </div>

  <div class="popup" id="tenanttable">
    <div class="table-container">
    <table class="displaytable">
        <th>Tenant ID</th>
        <th>Tenant Name</th>
        <th>Tenant Address</th>
        <th>Tenant KTP Number</th>
        <th>Tenant Phone</th>
        <th>Tenant Email</th>
        <th>Tenant Emergency Contact Person</th>
        <th>Tenant Emergency CP Phone</th>
        <th>Tenant Emergency CP Email</th>
        <th>Tenant Bank Account</th>
        <th>Tenant Bank Account Number</th>
        <?php
            $sql = "SELECT tenant_id, tenant_name, tenant_address, tenant_ktp_no, tenant_phone, tenant_email, tenant_emergcp, tenant_emergcp_phone, tenant_emergcp_email, tenant_bankaccount, tenant_bankaccount_no FROM tenant";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["tenant_id"] . "</td>" . "  
                   " . "<td>" . $row["tenant_name"] . "</td>" . " 
                   " . "<td>" . $row["tenant_address"] . "</td>" . "
                   " . "<td>" . $row["tenant_ktp_no"] . "</td>" . "
                   " . "<td>" . $row["tenant_phone"] . "</td>" . "
                   " . "<td>" . $row["tenant_email"] . "</td>" . "
                   " . "<td>" . $row["tenant_emergcp"] . "</td>" . "
                   " . "<td>" . $row["tenant_emergcp_phone"] . "</td>" . "
                   " . "<td>" . $row["tenant_emergcp_email"] . "</td>" . "
                   " . "<td>" . $row["tenant_bankaccount"] . "</td>" . "
                   " . "<td>" . $row["tenant_bankaccount_no"] . "</td>";
                echo "</tr>";
                }
            } else {
                echo "no results";
            }
        ?>
    </table>
    <button type="button" class="closetablebutton" onclick="closeTenantTable()">Close</button>
    </div>
  </div>
  
  <div class="popup" id="updatetenant">
    <form action="" method="POST" class="form-container">
    <label for="tenant_id"><b>Tenant ID</b></label>
    <input type="text" placeholder="Enter Tenant ID" name="tenant_id" required>
    <br>

    <label for="tenant_name"><b>Tenant Name</b></label>
    <input type="text" placeholder="Enter Tenant Name" name="tenant_name" required> 
    <br>

    <label for="tenant_address"><b>Tenant Address</b></label>
    <input type="text" placeholder="Enter Tenant Address" name="tenant_address" required> 
    <br>

    <label for="tenant_ktp_no"><b>Tenant Identification Number</b></label>
    <input type="text" placeholder="Enter Identification Number" name="tenant_ktp_no" required> 
    <br>

    <label for="tenant_phone"><b>Tenant Phone</b></label>
    <input type="text" placeholder="Enter Tenant Phone" name="tenant_phone" required> 
    <br>

    <label for="tenant_email"><b>Tenant Email</b></label>
    <input type="text" placeholder="Enter Tenant Email" name="tenant_email" required> 
    <br>

    <label for="tenant_emergcp"><b>Tenant Emergency Contact Person</b></label>
    <input type="text" placeholder="Enter Tenant Emergency Contact Person Name" name="tenant_emergcp" required> 
    <br>

    <label for="tenant_emergcp_phone"><b>Tenant Emergency Contact Person Phone</b></label>
    <input type="text" placeholder="Enter Tenant Emergency Contact Person Phone" name="tenant_emergcp_phone" required> 
    <br>

    <label for="tenant_emergcp_email"><b>Tenant Emergency Contact Person Email</b></label>
    <input type="text" placeholder="Enter Tenant Emergency Contact Person Email" name="tenant_emergcp_email" required> 
    <br>

    <label for="tenant_bankaccount"><b>Tenant Bank Account</b></label>
    <input type="text" placeholder="Enter Tenant Bank Account" name="tenant_bankaccount" required> 
    <br>

    <label for="tenant_bankaccount_no"><b>Tenant Bank Account Number</b></label>
    <input type="text" placeholder="Enter Tenant Bank Account Number" name="tenant_bankaccount_no" required> 
    <br>

    <button type="submit" name="updatetenant">Update</button>
    <button type="button" onclick="closeUpdateTenant()">Cancel</button>
    </form>
  </div>
  
  <div class="popup" id="deletetenant">
  <form action="" method="POST" class="form-container">

    <label for="tenant_id"><b>Tenant ID</b></label>
    <input type="text" placeholder="Enter Tenant ID" name="tenant_id" required>
    <br>

    <button type="submit" name="deletetenant">Delete</button>
    <button type="button" onclick="closeDeleteTenant()">Cancel</button>
  </form>
  </div>

  <?php
    if (isset($_POST['addtenant'])){
      $tenant_id = $_POST['tenant_id'];
      $tenant_name = $_POST['tenant_name'];
      $tenant_address = $_POST['tenant_address'];
      $tenant_ktp_no = $_POST['tenant_ktp_no'];
      $tenant_phone = $_POST['tenant_phone'];
      $tenant_email = $_POST['tenant_email'];
      $tenant_emergcp = $_POST['tenant_emergcp'];
      $tenant_emergcp_phone = $_POST['tenant_emergcp_phone'];
      $tenant_emergcp_email = $_POST['tenant_emergcp_email'];
      $tenant_bankaccount = $_POST['tenant_bankaccount'];
      $tenant_bankaccount_no = $_POST['tenant_bankaccount_no'];
    
      $query = "INSERT INTO Tenant (tenant_id, tenant_name, tenant_address, tenant_ktp_no, tenant_phone, tenant_email, tenant_emergcp, tenant_emergcp_phone, tenant_emergcp_email, tenant_bankaccount, tenant_bankaccount_no)
                    VALUES ('$tenant_id', '$tenant_name', '$tenant_address', '$tenant_ktp_no', '$tenant_phone', '$tenant_email', '$tenant_emergcp', '$tenant_emergcp_phone', '$tenant_emergcp_email', '$tenant_bankaccount', '$tenant_bankaccount_no')";
      if (mysqli_query($db, $query)){
        $sql = "SELECT tenant_id, tenant_name, tenant_address, tenant_ktp_no, tenant_phone, tenant_email, tenant_emergcp, tenant_emergcp_phone, tenant_emergcp_email, tenant_bankaccount, tenant_bankaccount_no FROM tenant";
        $result = mysqli_query($db, $sql);
        showtenant($result);
      } else {
        echo "no results";
        close();
      }
    }
  
    if (isset($_POST['updatetenant'])){
      $tenant_id = $_POST['tenant_id'];
      $tenant_name = $_POST['tenant_name'];
      $tenant_address = $_POST['tenant_address'];
      $tenant_ktp_no = $_POST['tenant_ktp_no'];
      $tenant_phone = $_POST['tenant_phone'];
      $tenant_email = $_POST['tenant_email'];
      $tenant_emergcp = $_POST['tenant_emergcp'];
      $tenant_emergcp_phone = $_POST['tenant_emergcp_phone'];
      $tenant_emergcp_email = $_POST['tenant_emergcp_email'];
      $tenant_bankaccount = $_POST['tenant_bankaccount'];
      $tenant_bankaccount_no = $_POST['tenant_bankaccount_no'];
    
      $query = "UPDATE Tenant SET tenant_id = '$tenant_id', 
                                  tenant_name = '$tenant_name', 
                                  tenant_address = '$tenant_address',
                                  tenant_ktp_no = '$tenant_ktp_no', 
                                  tenant_phone = '$tenant_phone', 
                                  tenant_email = '$tenant_email', 
                                  tenant_emergcp = '$tenant_emergcp', 
                                  tenant_emergcp_phone = '$tenant_emergcp_phone', 
                                  tenant_emergcp_email = '$tenant_emergcp_email', 
                                  tenant_bankaccount = '$tenant_bankaccount', 
                                  tenant_bankaccount_no = '$tenant_bankaccount_no'  
                WHERE tenant_id = '$tenant_id'";
      if (mysqli_query($db, $query)){
        $sql = "SELECT tenant_id, tenant_name, tenant_address, tenant_ktp_no, tenant_phone, tenant_email, tenant_emergcp, tenant_emergcp_phone, tenant_emergcp_email, tenant_bankaccount, tenant_bankaccount_no FROM tenant";
        $result = mysqli_query($db, $sql);
        showtenant($result);
      } else {
        echo "no results";
        close();
      }
    }
  
    if (isset($_POST['deletetenant'])){
      $tenant_id = $_POST['tenant_id'];
    
      $query = "DELETE FROM Tenant WHERE tenant_id = '$tenant_id'";
      if (mysqli_query($db, $query)){
        $sql = "SELECT tenant_id, tenant_name, tenant_address, tenant_ktp_no, tenant_phone, tenant_email, tenant_emergcp, tenant_emergcp_phone, tenant_emergcp_email, tenant_bankaccount, tenant_bankaccount_no FROM tenant";
        $result = mysqli_query($db, $sql);
        showtenant($result);
      } else {
        echo "no results";
        close();
      }
    }
  ?>
  
</div>

<div class="book" id="booking">
  <div class="header-container3">
  </div>

  <div class="button">
    <button class="open-button" onclick="openBook()">Book A Room</button>
    <button class="open-button" onclick="openBookTable()">Show Booking Table</button>
  </div>

  <div class="popup" id="book">
    <form action="" method="POST" class="form-container">

      <label for="date"><b>Today's date</b></label>
      <input type="date" onload="getDate()" name="todaysdate" required>
      <br>

      <label for="tenant_name"><b>Tenant Name</b></label>
      <select name="tenant_name">
        <?php
          $tenant_result = mysqli_query($db, "SELECT tenant_name FROM Tenant ORDER BY tenant_name");
          $i=0;
          while($row = mysqli_fetch_array($tenant_result)){
          ?>
      <option value="<?=$row['tenant_name'];?>"><?=$row['tenant_name'];?></option>
        <?php
        $i++;
        }
        ?>
      </select>
      <br>

      <label for="room_label"><b>Room Label</b></label>
      <select name="room_label">
        <?php
          $room_result = mysqli_query($db, "SELECT room_label FROM Room ORDER BY room_label");
          $i=0;
          while($row = mysqli_fetch_array($room_result)){
          ?>
      <option value="<?=$row['room_label'];?>"><?=$row['room_label'];?></option>
        <?php
        $i++;
        }
        ?>
      </select>
      <br>

      <label for="date"><b>Start date</b></label>
      <input type="date" onload="getDate()" name="startdate" required>
      <br>

      <label for="date"><b>End date</b></label>
      <input type="date" onload="getDate()" name="enddate" required>
      <br>

      <button type="submit" name="book">Book</button>
      <button type="button" onclick="closeBook()">Cancel</button>
    </form>
  </div>

  <div class="popup" id="booktable">
    <div class="table-container">
    <table class='displaytable'>
    <th>Book ID</th>
    <th>Room ID</th>
    <th>Tenant ID</th>
    <th>Start</th>
    <th>End</th>
    <th>Transaction Date</th>
    <th>Print</th>
    <th>Delete</th>
    <?php
    $sql = "SELECT book_id, room_id, tenant_id, book_start_date, book_end_date, transaction_date FROM Book";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $book_id = $row["book_id"];
      $_SESSION['book_id'] = $book_id;
      echo "<tr>";
      echo "<td>" . $row["book_id"] . "</td>" . "  
       " . "<td>" . $row["room_id"] . "</td>" . " 
       " . "<td>" . $row["tenant_id"] . "</td>" . "
       " . "<td>" . $row["book_start_date"] . "</td>" . "
       " . "<td>" . $row["book_end_date"] . "</td>" . "
       " . "<td>" . $row["transaction_date"] . "</td>" ."
       " . "<td><a href=\"invoicee.php?book_id=", urlencode($book_id) . "\"><img src='img/print.png' alt='print' width=30px height=30px></a></td>" . "
       " . "<td><a href=\"deletebookinvoice.php?book_id=", urlencode($book_id) . "\"><img src='img/delete.png' alt='print' width=30px height=30px></a></td>";
      echo "</tr>"; 
    }
    }
    ?>
    </table>
    <button type="button" class="closetablebutton" onclick="closeBookTable()">Close</button>
    </div>
  </div>

  <?php
    if (isset($_POST['book'])){
        $todaysdate = $_POST['todaysdate'];
        $tenant_name = $_POST['tenant_name'];
        $room_label = $_POST['room_label'];
        $startdate = date('Y-m-d',strtotime($_POST['startdate']));
        $enddate = date('Y-m-d',strtotime($_POST['enddate']));

        $query = mysqli_query($db, "SELECT max(book_id) as biggestcode FROM Book");
        $data = mysqli_fetch_array($query);
        $id = $data['biggestcode'];
        $order = (int) substr($id, 1, 2);
        $order++;
        $id = sprintf("%02s", $order);
        $book_id = mysqli_real_escape_string($db, $id);
        $roomid = mysqli_query($db, "SELECT room_id FROM Room WHERE room_label = '$room_label'");
        $room_id = $roomid->fetch_array()[0] ?? '';
        $tenantid =mysqli_query($db, "SELECT tenant_id FROM Tenant WHERE tenant_name = '$tenant_name'");
        $tenant_id = $tenantid->fetch_array()[0] ?? '';

        $oquery=$db->query("SELECT * FROM `book` WHERE (room_id = '$room_id') 
                          AND (('$startdate' BETWEEN book_start_date and book_end_date) OR ('$enddate' BETWEEN book_start_date and book_end_date) 
                          OR (book_start_date BETWEEN '$startdate' and '$enddate') OR (book_end_date BETWEEN '$startdate' and '$enddate'))");
        if(mysqli_num_rows($oquery)){
        ?>
          <div class = 'show'>
            <div class='form-container'><p>Choose another date!!!!!</p>
              <form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>
            </div> 
          </div>
        <?php
        if(isset($_POST['close'])) {
            header("Location: http://localhost/ssip/index.php");
        }
        } else{
        $query = "INSERT INTO Book (book_id, room_id, tenant_id, book_start_date, book_end_date, transaction_date)
                    VALUES ('$book_id', '$room_id', '$tenant_id', '$startdate', '$enddate', '$todaysdate')";
        if (mysqli_query($db, $query)){
          $tenantaddress = mysqli_query($db, "SELECT tenant_address FROM Tenant WHERE tenant_id = '$tenant_id'");
          $tenant_address = $tenantaddress->fetch_array()[0] ?? '';

          $tenantphone = mysqli_query($db, "SELECT tenant_phone FROM Tenant WHERE tenant_id = '$tenant_id'");
          $tenant_phone = $tenantphone->fetch_array()[0] ?? '';

          $roomlabel = mysqli_query($db, "SELECT room_label FROM Room WHERE room_id = '$room_id'");
          $room_label = $roomlabel->fetch_array()[0] ?? '';

          $roomprice = mysqli_query($db, "SELECT room_monthly_price FROM Room WHERE room_id = '$room_id'");
          $room_monthly_price = $roomprice->fetch_array()[0] ?? '';
          $price = (int) filter_var($room_monthly_price, FILTER_SANITIZE_NUMBER_INT);  

          $months = mysqli_query($db, "SELECT TIMESTAMPDIFF(MONTH, '$startdate', '$enddate')");
          $month = $months->fetch_array()[0] ?? '';
          $period =(int) filter_var($month);
          
          $total = $price * $period;
          $totalamount = mysqli_real_escape_string($db, $total);

          $invoice = mysqli_query($db, "INSERT INTO invoice (invoice_id, date, tenant_id, tenant_name, tenant_address, tenant_phone, room_label, room_monthly_price, period, totalamount)
                                         VALUES ('$book_id', '$todaysdate', '$tenant_id', '$tenant_name', '$tenant_address', '$tenant_phone', '$room_label', '$room_monthly_price', '$period', '$totalamount')");
          $update = mysqli_query($db,"UPDATE Room SET room_availability = 'Occupied' WHERE room_id = '$room_id'");
          $sql = "SELECT book_id, room_id, tenant_id, book_start_date, book_end_date, transaction_date FROM Book";
          $result = mysqli_query($db, $sql);
          showbook($result);
        } else {
            echo "no results";
            close();
        }
        }
    }
  ?>
</div>

<div class="income" id="income">
  <div class="header-container4">
  </div>
  
  <div class="button">
    <button class="open-button" onclick="openIncomeDate()">Show Income Based on Date</button>
    <button class="open-button" onclick="openIncomeRoom()">Show Income Based on Room</button>
  </div>

  <div  class="popup" id="incomeDate">
    <form action="" method="POST" class="form-container">
      <label for="date"><b>From</b></label>
      <input type="date" onload="getDate()" name="from" required>
      <label for="date"><b>Until</b></label>
      <input type="date" onload="getDate()" name="until" required>
      <br>

      <button type="submit" name="incomedate">show</button>
      <button type="button" onclick="closeIncomeDate()">Cancel</button>
    </form>
  </div>

  <div  class="popup" id="incomeRoom">
    <form action="" method="POST" class="form-container">
      <label for="room_label"><b>Room Label</b></label>
      <select name="room_label">
        <?php
          $room = mysqli_query($db, "SELECT room_label FROM Room ORDER BY room_label");
          $i=0;
          while($row = mysqli_fetch_array($room)){
          ?>
      <option value="<?=$row['room_label'];?>"><?=$row['room_label'];?></option>
        <?php
          $i++;
          }
        ?>
      </select>
      <br>

      <button type="submit" name="incomeroom">show</button>
      <button type="button" onclick="closeIncomeRoom()">Cancel</button>
    </form>
  </div>

  <?php
    if(isset($_POST['incomedate'])){
      $from = $_POST['from'];
      $until = $_POST['until'];
      $check = mysqli_query($db, "SELECT book_id, room_id, room_label, transaction_date, book_start_date, book_end_date, period, room_monthly_price, totalamount FROM book, invoice
                                  WHERE (transaction_date BETWEEN '$from' AND '$until')
                                  AND (book.book_id = invoice.invoice_id) AND (book.tenant_id = invoice.tenant_id) AND (book.transaction_date = invoice.date)");
      if(mysqli_num_rows($check)){
        $date = $from . " until " . $until;
        showincome($check, $date);
      }else{
        ?>
          <div class = 'show'>
            <div class='form-container'><p>No income were found from <?php echo $from; ?> until <?php echo $until; ?></p>
            <form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>
            </div> 
          </div>
        <?php
      }
    }

    if(isset($_POST['incomeroom'])){
      $room_label = $_POST['room_label'];
      $check = mysqli_query($db, "SELECT book_id, room_id, room_label, transaction_date, book_start_date, book_end_date, period, room_monthly_price, totalamount FROM book, invoice
                                  WHERE (room_label = '$room_label') AND (book.book_id = invoice.invoice_id) AND (book.tenant_id = invoice.tenant_id) AND (book.transaction_date = invoice.date)");
      if(mysqli_num_rows($check)){
        showincome($check, $room_label);
      } else{
        ?>
          <div class = 'show'>
            <div class='form-container'><p>No income were found from room  <?php echo $room_label; ?> </p>
            <form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>
            </div> 
          </div>
        <?php
      }
    }
  ?>
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