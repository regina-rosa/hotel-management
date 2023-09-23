<?php
include("config.php");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$book_id =  $_GET['book_id'];
$roomid = mysqli_query($db, "SELECT room_id FROM Book WHERE book_id = '$book_id'");
$room_id = $roomid->fetch_array()[0] ?? '';
$tenantid = mysqli_query($db, "SELECT tenant_id FROM Book WHERE book_id = '$book_id'");
$tenant_id = $tenantid->fetch_array()[0] ?? '';
$update = mysqli_query($db,"UPDATE Room SET room_availability = 'Vacant' WHERE room_id = '$room_id'");
$query = mysqli_query($db, "DELETE from damage WHERE room_id = '$room_id' and  tenant_id = '$tenant_id'");
if ($update){
    $query1 = mysqli_query($db, "DELETE from invoice WHERE invoice_id = '$book_id'");
    if ($query1){
        $query2 = mysqli_query($db, "DELETE from book WHERE book_id = '$book_id'");
        if ($query2){
            header("Location: http://localhost/ssip/index.php");
        } else {
            echo "Deleting failed";
        }
    }
}
?>