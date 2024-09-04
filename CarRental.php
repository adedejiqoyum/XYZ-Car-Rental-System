<!DOCTYPE html>
<html>
<head>
<title>Car Rental</title>
<meta charset="utf-8" />
<style>
form{
width: 800px;
background: black;
padding: 20px;
font-size: 20px;
font-family: Arial;
color: white;
Margin: Auto;
}
input[type = text]{
padding: 5px;
font-size: 20px;
width: 700px;
border-radius: 10px;
}
input[type = submit]{
padding: 5px;
font-size: 20px;
width: 200px;
border-radius: 10px;
border: none;
}
input[type = reset]{
padding: 5px;
font-size: 20px;
width: 200px;
border-radius: 10px;
border: none;
}
table, th, td{
border:1px solid green;
}
table{
margin-left: auto;
margin-right: auto;
width: 800px;
}
</style>
</head>
<body>  
<center>   
<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Car_Rental";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$days = (int)$_POST['days'];
$car_size = $conn->real_escape_string($_POST['car_size']);

$costperday = 0;
switch ($car_size) {
    case 'Full':
        $costperday = 54.99;
        break;
    case 'Medium':
        $costperday = 45.99;
        break;
    case 'Small':
        $costperday = 36.99;
        break;
}

$total_cost = $costperday * $days;

// Insert data into the database
$sql = "INSERT INTO rentals (name, email, phone, days, car_size, total_cost)
VALUES ('$name', '$email', '$phone', $days, '$car_size', $total_cost)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Display the data to the user
?>
<!DOCTYPE html>
<html>
<head>
<title>Car Rental</title>
</head>
<body>
<center>
<table>
<tr>
<th colspan="2">XYZ Car Rental</th>
</tr>
<tr>
<td>Customer Name</td>
<td><?php echo $name; ?></td>
</tr>
<tr>
<td>Customer Email</td>
<td><?php echo $email; ?></td>
</tr>
<tr>
<td>Customer Phone</td>
<td><?php echo $phone; ?></td>
</tr>
<tr>
<td>Rental Number of Days</td>
<td><?php echo $days; ?></td>
</tr>
<tr>
<td>Rental Cost Per Day</td>
<td><?php echo $costperday; ?></td>
</tr>
<tr>
<th>Total Cost</th>
<th><?php echo $total_cost; ?></th>
</tr>
</table>
</center>
</body>
</html>

<?php
$conn->close();
?>