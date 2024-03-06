<?php
session_start();
include('includes/dbconnection.php');

$message = '';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if username already exists
    $check_username_query = "SELECT * FROM tb_login WHERE username = '$username'";
    $check_username_result = mysqli_query($con, $check_username_query);
    if(mysqli_num_rows($check_username_result) > 0) {
        $message = "Username already exists";
    } else {
        // Perform password matching
        if($password != $confirmPassword) {
            $message = "Passwords do not match";
        } else {
            // Perform insertion into the database
            $query = "INSERT INTO tb_login (username, email, location, gender, password) VALUES ('$username', '$email', '$location', '$gender', '$password')";
            $result = mysqli_query($con, $query);
            if($result) {
                $message = "Registration successful";
            } else {
                $message = "Registration failed";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Record Management System | Register </title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../dist/css/jquery.validate.css" />

    <style>
        .registration-message {
            text-align: center;
            color: green;
        }
    </style>
</head>

<body>
    <h2 align="center">Student Record Management System</h2>
    <div class="container">
        <br><br><br><br>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Register</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Location" name="location" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required>
                            </div>
                            <input type="submit" value="Register" name="register" class="btn btn-lg btn-success btn-block">
<br>  <a href="login.php">Login Here</a>
                             <input type="submit" value="Register" name="register" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php if (!empty($message)): ?>
            <div class="registration-message">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="dist/jquery-1.3.2.js" type="text/javascript"></script>
    <script src="dist/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function() {
            jQuery("#register-form").validate({
                rules: {
                    username: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    location: "required",
                    gender: "required",
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    }
                },
                messages: {
                    username: "Please enter your username",
                    email: "Please enter a valid email address",
                    location: "Please enter your location",
                    gender: "Please select your gender",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    }
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Add the help-block class to the error element
                    error.addClass("help-block");

                    // Add has-feedback class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".col-sm-5").addClass("has-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
                },
                success: function(label, element) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></