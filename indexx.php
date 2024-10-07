
<?php require './inc/conn.php'; ?>

<?php

    $result = mysqli_query($conn, "SELECT * FROM tasks");

        if(isset($_POST['submit'])) {
            $task = $_POST['task'];
            if(!empty($task)) {
                if(mysqli_query($conn, "INSERT INTO tasks (title) VALUES ('$task') ")) {
                    $success_message = "Task Added Successfully!";
                } else {
                    $error_message = "Failed To Add Your task";
                }
            } else {
                $error_message = "Add Your Task";
            }
        }

    require './inc/messages.php'; 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TO-DO-LIST</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
            <div class="mb-3 mt-3">
                <label for="task" class="form-label fs-3">Task</label>
                <input type="text" class="form-control" placeholder="ADD task" name="task">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">ADD</button> 
        </form>


  <!-- <h2>All Tasks</h2> -->
  <table class="table table-bordered my-5">
    <thead>
      <tr>
        <th>#</th>
        <th>Task</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if(mysqli_num_rows($result) > 0) : ?>
            <?php 
                while($row = mysqli_fetch_assoc($result)) : ?>
                <tr class="p-4">
                    <td><?php echo $row['id'] ;?></td>
                    <td><?php echo $row['title'] ;?></td>
                    <td><?php echo $row['created_at'] ;?></td>
                <td>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?') ;"><i class="fas fa-trash"></i> </a>
                </td>
                </tr>
                <?php endwhile ;?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">No Tasks Avalible</td>
                </tr>
        <?php endif ;?>
    </tbody>
    </table>
</div>

</body>
</html>