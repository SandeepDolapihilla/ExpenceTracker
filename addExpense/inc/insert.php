<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use the encrypted password if required
$database = "expensetracker";
$connection = new mysqli($servername, $username, $password, $database);

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['submit'])) {

    $Pass_Name = $_POST['Pass_Name'];
    $Contact_Number = $_POST['Contact_Number'];
    $Email = $_POST['Email'];
    $No_Of_Passenger = $_POST['No_Of_Passenger'];
    $Pickup = $_POST['Pickup'];
    $Destination = $_POST['Destination'];
    $Reserve_Date = $_POST['Reserve_Date'];
    $Vehicle_Type = $_POST['Vehicle_Type'];
    
    // Assuming 'tbl_reservation' is the name of your table
    $stmt = $connection->prepare("INSERT INTO tbl_reservation ( Pass_Name, Contact_Number, Email, No_Of_Passenger, Pickup, Destination, Reserve_Date, Vehicle_Type) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the statement
    $stmt->bind_param("ssssssss", $Pass_Name, $Contact_Number, $Email, $No_Of_Passenger, $Pickup, $Destination, $Reserve_Date, $Vehicle_Type); 

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to another page on success
        header("Location: /TAXI/Passenger/passenger.php");
        exit;
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

$connection->close();

?>
