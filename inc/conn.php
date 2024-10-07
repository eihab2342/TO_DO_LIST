<?php

    $conn = mysqli_connect("localhost", "root", "", "todolist");

    if(!$conn) {
        echo mysqli_connect_errno($conn);
    }
    

