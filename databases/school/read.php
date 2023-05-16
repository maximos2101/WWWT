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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display student info</title>
</head>
<body>
    <h2>Disply student information!!</h2>

        <div>
            <label>Name</label>
            <label><?php echo $name; ?></label>
        </div>
        <div>
            <label>Email</label>
            <label><?php echo $email; ?></label>
        </div>

        <a href="index.php">Go back</a>

</body>
</html>