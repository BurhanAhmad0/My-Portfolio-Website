<?php


$sever_name = 'localhost';
$username = 'root';
$password = '';
$dbname = 'portfolio_contact_form';

$conn = mysqli_connect($sever_name, $username, $password, $dbname);

if (!$conn) {
    die("Unable to build connection " . mysqli_connect_error());
}
    
echo "Successfully build the connection.";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['fname'];
    $last = $_POST['lname'];
    $email = $_POST['email'];
    $user_comment = $_POST['cmnt'];
}

$sql = "INSERT INTO `student_record` (`first_name`, `last_name`, `user_email`, `user_comment`) VALUES ('$first_name', '$last_name', '$email', '$user_comment');";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Successfuly inserted data into the table." . mysqli_error($conn);
}
    
echo "Unsuccessful to insert data into the table.";

?>