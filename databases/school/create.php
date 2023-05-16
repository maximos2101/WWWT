<?php 
    require_once "config.php";

    $name = $email = "";
    $name_error = $email_error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = trim ($_POST["name"]);
        if (empty($name))
        {
            $name_error = "Name is required";
        }
        $email = trim ($_POST["email"]);
        if (empty($email))
        {
            $email_error = "Email is required";
        }

        if (empty($name_error) && empty($email_error))
        {
            $sql = "INSERT INTO `students`(`name`, `email`) VALUES ('$name','$email')";

            if (mysqli_query($conn, $sql)) 
            {
                header("Location: index.php");
                exit(0);
            }
            else
            {
                echo "Something went wrong. Please try again!!";
            }
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new student</title>
</head>
<body>
    <h2>Add a new student!!</h2>

    <form action="create.php" method="POST">
        <div>
            <label>Name</label>
            <input type="text" name="name" value=""/>
            <span><?php echo $name_error; ?></span>
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" value=""/>
            <span><?php echo $email_error; ?></span>
        </div>

        <input type="submit" value="Submit"/>
        <a href="index.php">Cancel</a>
        

    </form>

</body>
</html>