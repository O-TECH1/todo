
<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>TODO - List</title>
  <link rel="apple-touch-icon" sizes="57x57" href="fav/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="fav/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="fav/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="fav/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="fav/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="fav/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="fav/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="fav/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="fav/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="fav/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
  <link rel="manifest" href="fav/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <style> body {
   background-color: #8f4df8
 }

 .main-todo-input {
   background: #fff;
   padding: 0 120px 0 0;
   border-radius: 1px;
   margin-top: 200px;
   box-shadow: 0px 0px 0px 6px rgba(255, 255, 255, 0.3)
 }

 .fl-wrap {
   float: left;
   width: 100%;
   position: relative
 }

 .main-todo-input:before {
   content: '';
   position: absolute;
   bottom: -40px;
   width: 50px;
   height: 1px;
   background: rgba(255, 255, 255, 0.41);
   left: 50%;
   margin-left: -25px
 }

 .main-todo-input-item {
   float: left;
   width: 100%;
   box-sizing: border-box;
   border-right: 1px solid #eee;
   height: 50px;
   position: relative
 }

 .main-todo-input-item input:first-child {
   border-radius: 100%
 }

 .main-todo-input-item input {
   float: left;
   border: none;
   width: 100%;
   height: 50px;
   padding-left: 20px
 }

 .main-search-button {
   background: #4DB7FE
 }

 .main-search-button {
   position: absolute;
   right: 0px;
   height: 50px;
   width: 120px;
   color: #fff;
   top: 0;
   border: none;
   border-top-right-radius: 0px;
   border-bottom-right-radius: 0px;
   cursor: pointer
 }

 .main-todo-input-wrap {
   max-width: 500px;
   margin: 20px auto;
   position: relative
 }

 :focus {
   outline: 0
 }

 @media only screen and (max-width: 768px) {
   .main-todo-input {
     background: rgba(255, 255, 255, 0.2);
     padding: 14px 20px 10px;
     border-radius: 10px;
     box-shadow: 0px 0px 0px 10px rgba(255, 255, 255, 0.0)
   }

   .main-todo-input-item {
     width: 100%;
     border: 1px solid #eee;
     height: 50px;
     border: none;
     margin-bottom: 10px
   }

   .main-todo-input-item input {
     border-radius: 6px !important;
     background: #fff
   }

   .main-search-button {
     position: relative;
     float: left;
     width: 100%;
     border-radius: 6px
   }
 }

 .remove {
   float: right;
   color: #757575 !important;
   font-size: 14px
 }

 #list-items {
   padding-left: 20px;
   padding-top: 15px
 }

 ul {
   padding: 0;
   text-align: left;
   list-style: none
 }

 .todo-text {
   color: #757575;
   margin-left: 10px
 }

 .strike {
   color: blue
 }

 .todo-listing {
   padding: 0px 29px 0 0;
   margin-top: 54px !important
 }

 .edit {
  margin-right: 30px;
}
.update {
  display: none;
}
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body oncontextmenu='return false' class='snippet-body'>

  <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
  <div class="row" id="cont">
    <div class="col-md-12">
      <div class="main-todo-input-wrap">
        <div class="main-todo-input fl-wrap">
          <form method="POST" action="" id="addForm">
            <div class="main-todo-input-item"> <input type="text" id="todo-list-item" placeholder="What will you do today?" name="tasksub" require> </div> <button class="add-items main-search-button" id="addbtn" name="taskadd">ADD</button>
          </form>
        </div>
        <a class="btn btn-link" href="https://github.com/O-TECH1/assignments/tree/main/task3" style="color:white">Link to Source Code in GitHub</a>
      </div>
    </div>
  </div>

  <div class="row" id="mains">
    <div class="col-md-12">
      <div class="main-todo-input-wrap">
        <div class="main-todo-input fl-wrap todo-listing">
          <ul id="list-items">
            <?php
            include 'inc.php';
            $listQuery = mysqli_query($con,"SELECT * FROM tasks ORDER BY id desc");
            if (mysqli_num_rows($listQuery)>0) {
              $i = 1;
              while ($task = mysqli_fetch_assoc($listQuery)) {

                ?>

                <li>
                  <span class="checkbox">Task <?=$i?></span> - 

                  <span class="todo-text"><?= htmlspecialchars($task['subject'])?></span>
                  <a id="btn<?php $id = $task['id']; echo $id; ?>" class="remove text-right"><i class="fa fa-trash"></i></a>
                  <a id="edit<?=$id?>" id="edit<?=$id?>" class="remove edit text-right"><i class="fa fa-pen"></i></a>
                  <form method="POST" class="update" id="task<?=$id?>">
                    <br>
                    <br>
                    <p>Update Task <?=$i?> Here:</p>
                    <input class="form-control" id="val<?=$i?>" placeholder="Update task <?=$i?>" name="newTask" type="text" required>
                    <input type="text" name="id" value="<?=$id?>" hidden>
                    <button name="taskedit" class="btn btn-primary">Update</button>
                  </form>
                  <script>
                    $("#edit<?=$id?>").click(function(){
                      $("#task<?=$id?>").slideToggle();
                    });
                    $("#btn<?=$id?>").click(function(){
                      $.post('proc.php',{deleteid:<?=$id?>},function(data){
                        var rawData = JSON.parse(data);
                        if (rawData.status) {
                          Swal.fire(rawData.msg,'','success').then(function(){
                            $("body").load(location.href);
                          });
                        }else{
                          Swal.fire(rawData.msg,'','error');
                        }
                      })
                    });
                    document.getElementById("task<?=$id?>").addEventListener("submit", function(evt){
                      evt.preventDefault();
                      var updateTask = document.getElementById('val<?=$i?>').value;
                      $.post('proc.php',{updateid:<?=$id?>,updatetask:updateTask},function(data){
                        var rawData = JSON.parse(data);
                        if (rawData.status) {
                          Swal.fire(rawData.msg,'','success').then(function(){
                            $("body").load(location.href);
                          });
                        }else{
                          Swal.fire(rawData.msg,'','error');
                        }
                      })
                    })

                  </script>
                  <hr>
                </li>
                <?php
                $i++;
              }
            }else {
              ?>
              <li>
                <span class="todo-text">No Task found, task added will be shown here!</span>

              </li>
              <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>

  <script src="js/background.js"></script>
</body>
</html>