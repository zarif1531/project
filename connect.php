<?php
/*This is a PHP code that is used to insert user registration data into a MySQL database. The code
first retrieves the user input data from a form using the  method. It then establishes a
connection to the MySQL database using the mysqli() function. If the connection is successful, the
code prepares an SQL statement to insert the user data into the 'registration' table. The
bind_param() method is used to bind the user input data to the SQL statement. The execute() method
is then called to execute the SQL statement and insert the data into the database. Finally, the code
displays a success message and redirects the user to a login page using JavaScript. */
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$rememberme = $_POST['rememberme'];


$conn = new mysqli('localhost','root','','project 2');
if($conn->connect_error){
echo "$conn->connect_error";
die("Connection Failed : ". $conn->connect_error);
} else {
$stmt = $conn->prepare("insert into registration(name, email, password, gender, rememberme) values(?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $password, $gender, $rememberme);
$execval = $stmt->execute();
echo $execval;
echo "<script>alert('Registration Successfull please log IN')</script>";
echo "<script>location.href='index2.html'</script>";
$stmt->close();
$conn->close();
}
?>