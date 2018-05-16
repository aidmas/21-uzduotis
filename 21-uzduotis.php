<!DOCTYPE HTML>  
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>  

    <?php
    // define variables and set to empty values
    $nameErr = $passwordErr = "";
    $name = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed"; 
            }
        }
        
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
            if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) {
                $passwordErr = "Invalid password format"; 
            }
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" id="m1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <h2>Prisijungimo forma</h2>
        <p><span class="error">* required field</span></p>
        <br>
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Password: <input type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Prisijungti">  
    </form>
    <br><br>
    <?php
        echo "<p>Copyright &copy; " . date("Y") . "</p>";
    ?>
</body>
</html>