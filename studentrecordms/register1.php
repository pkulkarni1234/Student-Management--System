<?php
session_start();
include('includes/dbconnection.php');

if(isset($_POST['submit']))
{
    $uname = $_POST['id'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];

    // Validate the data (you may add more validation as needed)

    // Check if the passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match";
        exit();
    }

    // Hash the password before storing in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $query = "INSERT INTO tbl_login (loginid, password, email, location, gender) 
              VALUES ('$uname', '$hashed_password', '$email', '$location', '$gender')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Registration successful. You can now login.";
    } else {
        echo "Error in registration: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head section if needed -->
</head>

<body>
    <h2 align="center">Student Record Management System</h2>
    <div class="container">
        <br><br><br><br>

        <div class="col-md-4 col-md-offset-4">

            <div class="panel panel-primary">

                <div class="panel-heading">
                    <h3 class="panel-title">Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" id="id" name="id" type="text" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" id="email" name="email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Location" id="location" name="location" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" id="password" name="password" type="password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirm Password" id="confirm_password" name="confirm_password" type="password" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" value="Register" name="submit" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add your scripts and stylesheets as needed -->

</body>

</html>
