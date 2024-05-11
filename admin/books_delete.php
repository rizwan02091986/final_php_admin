<?php
include("connection.php");

$Id = $_GET['id'];
$sql = "delete from books where id = $Id";
$result = mysqli_query($conn,$sql);

echo "<script>
            alert('Books Has Been Deleted');
            window.location.href = 'books_show.php'
        </script>";

?>