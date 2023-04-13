<?php
// This is a PHP code that is used to authenticate a user's login credentials. It takes the email and
//password entered by the user through a form (using the POST method) and checks if they match with
//the email and password stored in a MySQL database table named "registration". If the credentials
//match, it starts a session and redirects the user to the home page. If the credentials do not match,
//it displays an error message and redirects the user back to the login page. 
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','project 2');
if($conn->connect_error){
echo "$conn->connect_error";
die("Connection Failed : ". $conn->connect_error);
}else{
    $select="SELECT * FROM registration WHERE email='$email' &&  password='$password'";
    $query=mysqli_query($conn,$select);
    $row=mysqli_num_rows($query);
    $fetch=mysqli_fetch_array($query);
    if($row==1){
        $name=$fetch['name'];
        session_start();
        $_SESSION['name']=$name;
        echo "<script>location.href='home.php'</script>";
    }else{
        echo "<script>alert('invalid Email/Password please try again or reset data')</script>";
        echo "<script>location.href='index2.html'</script>";
        
    }
}
?>