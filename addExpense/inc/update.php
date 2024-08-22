<?php
$servername = "localhost";
$username = "";
$password = "";
$database = "CityTaxiDB";
$connection = new mysqli($servername, $username, $password, $database);
 
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regID = $_POST['regID'];
    $passNm = $_POST['passNm'];
    $conNm = $_POST['conNm'];
    $email = $_POST['email'];
    $NoOfPasnger = $_POST['NoOfPasnger'];
    $pckup = $_POST['pckup'];
    $destination = $_POST['destination'];
    $reserveDate = $_POST['reserveDate'];
    $vhcleType = $_POST['vhcleType'];
    // Update other fields as needed
 
    $sql = "UPDATE reservation SET
            passNm='$passNm',
            conNm='$conNm',
            email='$email',
            NoOfPasnger='$NoOfPasnger',
            pckup='$pckup',
            destination='$destination',
            reserveDate='$reserveDate',
            vhcleType='$vhcleType',
            WHERE reg_id='$regID'";
 
    if ($connection->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
 
$regID = $_GET["regID"];
 
$sql = "SELECT * FROM reservation WHERE regID = $regID";
$result = $connection->query($sql);
 
if (!$result) {
    die("Invalid query: " . $connection->error);
}
 
$row = $result->fetch_assoc();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Edit reservation Details</h1>
    <form action="inc/insert.php" method="post" onsubmit="generateRegId()">
                        <label for="RegId"> Registration ID:</label>
                        <input type="text" id="regID" name="regID" placeholder="Auto-generated" readonly>
            
                        <label for="passengerName">Passenger Name:</label>
                        <input type="text" id="passNm" name="passNm" placeholder="Enter Passenger Name" required>
            
                        <label for="ContactNumber">Contact Number:</label>
                        <input type="tel" id="conNm" name="conNm" placeholder="Contact Number" required>
            
                        <label for="Email"> Email:</label>
                        <input type="text" id="email" name="email" placeholder="Enter Email Address" required>
            
                        <label for="NoOfPassengers">Number of Passengers:</label>
                        <input type="tel" id="NoOfPasnger" name="NoOfPasnger" placeholder="Number of Passengers" required>
                
                        <label for="pickup">Pickup Location:</label>
                        <input type="text" id="pckup" name="pckup" placeholder="Enter pickup location" required>
                
                        <label for="Destination">Destination:</label>
                        <input type="text" id="destination" name="destination" placeholder="Enter destination" required>
                
                        <label for="reservationDate">Reservation Date:</label>
                        <input type="date" id="reserveDate" name="reserveDate" placeholder="Reservation Date" required>
            
                        <label for="vehicleType">Select Vehicle Type:</label>
                        <select id="vhcleType" name="vhcleType">
                            <option value="sedan">Sedan</option>
                            <option value="suv">SUV</option>
                            <option value="van">Van</option>
                            <option value="motorcycle">Motorcycle</option>
                        </select>
                
                        <button type="submit">Update</button>
                    </form>
</div>
</body>
</html>
 
<?php
// Assuming you have established a database connection earlier in your script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    if (isset($_POST["ratings"])) {
        // Retrieve the submitted rating and driver ID
        $rating = $_POST["ratings"];
        $driverID = 1; // Replace with the actual driver ID; you may get this from your session or another source

        // Update the driver's rating in the database
        $updateQuery = "UPDATE tbl_driver SET Ratings = $rating WHERE DriverID = $driverID";

        if ($conn->query($updateQuery) === TRUE) {
            echo "Rating updated successfully!";
        } else {
            echo "Error updating rating: " . $conn->error;
        }
    }
}
?>

<!-- The HTML form -->
<div class="trip-details-container">
    <h2>Ongoing Taxi Trip</h2>

    <div class="trip-details">
        <p><strong>Destination:</strong> City Center</p>
        <p><strong>Taxi Fee:</strong> $20</p>
    </div>

    <div class="rate-driver">
        <h3>Rate Your Driver</h3>
        <form action="#" method="post">
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>            
            <button type="submit">Submit Rating</button>
        </form>
    </div>
</div>
