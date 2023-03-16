

<?php

    $currPasswordError = "";
    $newPasswordError = "";
    $reTypePasswordError= "";

    $currPassword = "";
    $newPassword = "";
    $reTypePassword = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currPassword = $_POST['currentPass'];
        // echo $wordCount;
        if (empty($currPassword)) {
            $currPasswordError = "Current Password is required";
            $_POST['currentPass'] = "";
            $currPassword = "";
            // echo $nameError;
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newPassword = $_POST['newPass'];
        // echo $wordCount;
        if (empty($newPassword) || strlen($newPassword) < 8) {
            // check if password size in 8 or more and  check if it is empty
            $newPasswordError = "Write at least 8 Character";
            $_POST['newPass'] = "";
            $newPassword = "";
        }else if (!preg_match('/[@#$%]/', $newPassword)) {
            // check if password contains at least one special character
            $newPasswordError = "Password must contain at least one special character (@, #, $, %)";
            $_POST['newPass'] = "";
            $newPassword = "";
        }else if($_POST['currentPass'] === $_POST['newPass']){
            // check if password old pass and new pass got matched
            $newPasswordError = "Current Password and New Password can't be same";
            $_POST['newPass'] = "";
            $newPassword = "";
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $reTypePassword = $_POST['reTypeNewPass'];
        // echo $wordCount;
        if (empty($reTypePassword) || strlen($reTypePassword) < 8) {
            // check if password size in 8 or more and  check if it is empty
            $reTypePasswordError = "Write at least 8 Character";
            $_POST['reTypeNewPass'] = "";
            $reTypePassword = "";
        }else if (!($_POST['newPass'] === $_POST['reTypeNewPass'])) {
            // check if password contains at least one special character
            $reTypePasswordError = "New Password and Retype New Password must be same";
            $_POST['reTypeNewPass'] = "";
            $reTypePassword = "";
        }else{
            header('Location:Login.php'); 
        }
    }



?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

</head>

<body>
    <style>
    body {
        text-align: center;
    }

    .output {
        width: 100%;
        height: 100%;
        background-color: #f1f1f1;
        padding: 20px;
        /* border: 1px solid black; */
    }

    .required {
        color: red;
    }

    .border {
        border: 1px solid black;
        border-collapse: collapse;
    }

    legend {
        font-weight: bold;
        font-size: 20px;
    }

    fieldset {
        margin: 10px;
    }

    form {
        display: inline-block;
    }


    .container {
        display: flex;
        height: 400px;
        border: 1px solid black;
    }

    .left {
        width: 30%;
        border-right: 1px solid black;
    }

    .right {
        width: 70%;
    }

    ul {
        align-items: center;
        display: flex;
        flex-direction: column;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        display: inline-block;
        margin-right: 10px;
        /* add some spacing between items */
    }
    </style>
    </head>

    <body>

        <?php include 'Header2.php';?>


        <div class="container">
            <div class="left">
                <p>
                <h3>Account</h3>
                <hr>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li><a href="">View Profile</a></li>
                    <li><a href="">Edit Profile</a></li>
                    <li><a href="UploadProfilePhoto.php">Change Profile Picture</a></li>
                    <li><a href="ChangePassword.php">Change Password</a></li>
                    <li><a href="Logout.php">Logout</a></li>
                </ul>

                </p>


            </div>
            <div class="right">
                <p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <legend>Change Password</legend>
                    <fieldset>
                        <label for="currentPass">Current Password</label>
                        <input type="password" name="currentPass" id="currentPass" style="margin: 5px">
                        <span class="required">&nbsp; i &nbsp; <?php echo $currPasswordError; ?></span>
                        <br>
                        <label for="newPass" style="color: green">New Password</label>
                        <input type="password" name="newPass" id="newPass" style="margin: 5px">
                        <span class="required">&nbsp; i &nbsp; <?php echo $newPasswordError; ?> </span> <br>
                        <label for="reTypeNewPass" style="color: red">Retype New Password</label>
                        <input type="password" name="reTypeNewPass" id="reTypeNewPass" style="margin: 5px">
                        <span class="required">&nbsp; i &nbsp;<?php echo $reTypePasswordError; ?> </span>
                        <br>
                        <hr>
                        <input type="submit" name="submit" value="Submit" style="margin: 15px" /> <br>
                    </fieldset>


                </form>
                </p>

            </div>
        </div>



        <?php include 'Footer.php';?>


    </body>
</body>

</html>