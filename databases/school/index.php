<?php
    require_once "config.php";

    $data = "SELECT * FROM students";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indexxxx</title>
</head>
<body>

    <h2>Students List</h2>
    <a href="create.php">Add new student</a>

    <table>
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </thead>
        
        <tbody>
            <?php
                if ($students = mysqli_query($conn, $data))
                {
                    if (mysqli_num_rows($students) > 0)
                    {
                        while ($student = mysqli_fetch_array($students))
                        {
                ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    
                    <td>
                            <a href="read.php?id=<?php echo $student['id']?>">Read </a>
                            <a href="update.php?id=<?php echo $student['id']?>">Update </a>
                            <a href="delete.php?id=<?php echo $student['id']?>">Delete </a>
                    </td>
                </tr>
                <?php
                
                        }
                    }
                    
                    mysqli_free_result($students);
                }
            ?>
        </tbody>
    
    </table>

<?php
    mysqli_close($conn);
?>
</body>
</html>