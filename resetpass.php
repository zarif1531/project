<?php
/* This is a PHP code that retrieves the email and reset token from the URL parameters using the 
method. It then connects to a MySQL database using mysqli_connect() function and selects all the
rows from the "registration" table where the email matches the email parameter. If there is at least
one row returned, it displays a form to change the password with hidden input fields for the email
and reset token. If there are no rows returned, it displays a message "Email does not exist". */
$email = $_GET["email"];
$reset_token = $_GET["reset_token"];

$connection = mysqli_connect("localhost", "root", "", "project 2");

$sql = "SELECT * FROM registration WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    
}
else
{
    echo "Email does not exists";
}

?>
    <form method="POST" action="newpass.php">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
    	<input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
		
    	<input type="password" name="new_password" placeholder="Enter new password">
    	<input type="submit" value="Change password">
    </form>
<?php

?>