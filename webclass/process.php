<?php
    if (isset($_POST['email'])) {
        echo $_POST['email'];
    }
    else {
        header('Location: form.html');
        exit(0);
    }

?>