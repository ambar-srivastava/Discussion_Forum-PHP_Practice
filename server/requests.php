<?php
include("../common/db.php");
if (isset($_POST["signup"])) {
    echo "user email is " . $_POST["username"] . "<br/>";
    echo "user email is " . $_POST["email"] . "<br/>";
    echo "user password is " . $_POST["password"] . "<br/>";
    echo "user address is " . $_POST["address"] . "<br/>";
}
