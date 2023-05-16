<?php 
    require_once "config.php";

    $name = $email = "";
    $name_error = $email_error = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET" &&  isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $query = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");

        if ($student = mysqli_fetch_assoc($query))
        {
            $name = $student["name"];
            $email = $student["email"];
        }
    }

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
            $id = $_POST["id"];
            $sql = "UPDATE `students` SET `name`='$name',`email`='$email' WHERE `id`='$id'";

            if (mysqli_query($conn, $sql))
            {
                header("Location: index.php");
                exit(0);
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
    <title>Edit student</title>
</head>
<body>
    <h2>Edit student!!</h2>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>"/>
            <span><?php echo $name_error; ?></span>
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>"/>
            <span><?php echo $email_error; ?></span>
        </div>

        <input type="submit" value="Submit"/>
        <a href="index.php">Cancel</a>
        

    </form>

</body>
</html>