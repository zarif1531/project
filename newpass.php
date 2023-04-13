<?php
/* This is a PHP script that receives data from a form submission using the POST method. It retrieves
the email, reset token, and new password from the form data. It then connects to a MySQL database
using mysqli_connect() function and selects the registration table where the email matches the one
submitted in the form. If a matching email is found, it updates the password for that user in the
registration table using the UPDATE statement. Finally, it displays a message using JavaScript
alert() function and redirects the user to index2.html using JavaScript location.href property. If
no matching email is found, it displays a message "Email does not exists". */
$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = $_POST["new_password"];

$connection = mysqli_connect("localhost", "root", "", "project 2");

$sql = "SELECT * FROM registration WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_object($result);
    $sql = "UPDATE registration SET password='$new_password' WHERE email='$email'";
    mysqli_query($connection, $sql);
    echo "<script>alert('Password Has Been Changed')</script>";
    echo "<script>location.href='index2.html'</script>";
    }else
{
    echo "Email does not exists";
}
?>