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
        $id = $_POST["id"];
        $sql = "DELETE FROM students WHERE id = $id";

        if (mysqli_query($conn, $sql))
        {
            header("Location: index.php");
            exit(0);
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
    <title>Delete student</title>
</head>
<body>
    <h2>Delete student!!</h2>

    <form action="delete.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div>
            <label>Name</label>
            <label><?php echo $name; ?></label>
        </div>
        <div>
            <label>Email</label>
            <label><?php echo $email; ?></label>
        </div>

        <input type="submit" value="Delete"/>
        <a href="index.php">Go back</a>
        

    </form>

</body>
</html>