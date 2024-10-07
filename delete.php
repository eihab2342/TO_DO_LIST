
<?php require './inc/conn.php' ;?>
<?php require './inc/messages.php'; ?>

<?php 
    require './inc/messages.php';

    if(!isset($_GET['id']) && !is_numeric($_GET['id'])) {
        header("location: indexx.php");
        exit();
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id='$id' ";  
    $result = mysqli_query($conn, $sql);

        /*
        زي الكود ال تحت int واخد نسخة منها واقرنها ب  mysqli_query  و اباصية  (select) مينفعش اكون بعمل استعلام 
        if($result == 0) {
            header("location: indexx.php");
            exit();
     }  */
    // mysqli_num_rows الصح بقا اني استخدم 
    if(mysqli_num_rows($result) == 0) {
        header("location: indexx.php");
        exit();
    }
    require './inc/messages.php';

    if(mysqli_query($conn, "DELETE FROM `tasks` WHERE id='$id' ")) {

        $success_message = "Task Deleted Successfully!";
        header("refresh:2; url=indexx.php");

    } else {
        $error_message = "Can't delete task";
    }
    
        // $error_message = "Can't delete task";
    require './inc/messages.php';
    
    ?>
    





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
