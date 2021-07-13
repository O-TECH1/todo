<?php 


if (isset($_POST['tasksub'])) {
  include 'inc.php';
  if ($con) {
    $st = 0;
    $task = filter_var(strip_tags(mysqli_real_escape_string($con,trim(preg_replace('/[\t\n\r\s]+/', ' ', $_POST['tasksub']))) ), FILTER_SANITIZE_STRIPPED);
    if (!empty(trim(preg_replace('/[\t\n\r\s]+/', ' ', $task)))) {
      if(mysqli_num_rows(mysqli_query($con,"SELECT id FROM tasks WHERE subject = '$task'"))>0){
        $message = "Task Already Exists!";
        $st = 0;
        $res = array('status' => $st, 'msg' => $message);
        echo json_encode($res);
      }else{
        $stmt = $con->prepare("INSERT INTO tasks(subject) VALUES (?)");
        $stmt->bind_param("s",$task);
        if ($stmt->execute()) {
          $message = "Task Added Successfully!";
          $st = 1;
          $res = array('status' => $st, 'msg' => $message);
          echo json_encode($res);
        }else {
          $message = "Unable to Add Task!";
          $st = 0;
          $res = array('status' => $st, 'msg' => $message);
          echo json_encode($res);
        }
      }
    }else{
      $message = "Input feild Cannot be empty!";
      $st = 0;
      $res = array('status' => $st, 'msg' => $message);
      echo json_encode($res);
    }
  }
}else if (isset($_POST['updatetask'])) {
  include 'inc.php';
  if ($con) {
    $id = filter_var(strip_tags(mysqli_real_escape_string($con,trim(preg_replace('/[\t\n\r\s]+/', ' ', $_POST['updateid']))) ), FILTER_SANITIZE_STRIPPED);
    $task = filter_var(strip_tags(mysqli_real_escape_string($con,trim(preg_replace('/[\t\n\r\s]+/', ' ', $_POST['updatetask']))) ), FILTER_SANITIZE_STRIPPED);
    if (!empty(trim(preg_replace('/[\t\n\r\s]+/', ' ', $task)))) {
      if(mysqli_num_rows(mysqli_query($con,"SELECT id FROM tasks WHERE subject = '$task'"))>0){
       $message = 'Task Already Exists!';
       $st = 0;
       $res = array('status' => $st, 'msg' => $message);
       echo json_encode($res);
     }else{
      $stmt = $con->prepare("UPDATE tasks SET subject=? WHERE id = ?");
      $stmt->bind_param("si",$task,$id);
          // $taskQuery = mysqli_query($con,"UPDATE tasks SET subject='$task' WHERE id = '$id'");
      if ($stmt->execute()) {
        $message = 'Task Updated Successfully!';
        $st = 1;
        $res = array('status' => $st, 'msg' => $message);
        echo json_encode($res);
      }else {
       $message = 'Unable to Update Task!';
       $st = 0;
       $res = array('status' => $st, 'msg' => $message);
       echo json_encode($res);
     }
   }
 }else{
  echo "<script>alert('Feild Cannot be empty!')</script>";
}
}
}else if(isset($_POST['deleteid'])) {
  include 'inc.php';
  if ($con) {
    $id = filter_var(strip_tags(mysqli_real_escape_string($con,trim(preg_replace('/[\t\n\r\s]+/', ' ', $_POST['deleteid']))) ), FILTER_SANITIZE_STRIPPED);
    $taskQuery = mysqli_query($con,"DELETE FROM tasks WHERE id = '$id'");
    if ($taskQuery) {
      $message = "Task Deleted Successfully!";
      $st = 1;
      $res = array('status' => $st, 'msg' => $message);
      echo json_encode($res);
    }else {
      $message = 'Unable to Delete Task!';
      $st = 0;
      $res = array('status' => $st, 'msg' => $message);
      echo json_encode($res);
    }
  }
}else{
  echo "No hader found";
}
?>