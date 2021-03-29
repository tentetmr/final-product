<?php
  session_start();
  include_once("funcs.php");

  $pdo = db_connect();
    // insert
    if(isset($_POST['submit']) ){

      
      $u_name = $_SESSION["u_name"];
      $todo_contents = $_POST['todo_contents'];
      $deadline = $_POST['deadline'];

      if(empty($todo_contents)){
        header("Location: member.php?error_todo=Todoを入力してください");
        // lpwない時
      } else if(empty($deadline)){
        header("Location: member.php?error_todo=期限を入力してください");
      } else{
        $sql = "INSERT INTO todo (id, u_name, todo_contents, deadline) VALUES (NULL, :u_name, :todo_contents, :deadline)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
        $stmt->bindValue(':todo_contents', $todo_contents, PDO::PARAM_STR);
        $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

        $stmt->execute();      
      }

    
    // delete
    }elseif(isset($_POST['delete'])){
        $id = $_POST['id'];
        $stmt = $pdo->prepare("delete from todo where id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <style>
      input {
        width: 80%;
      }
    </style>
</head>

<body class="container">
    <h2 class="heading">Todoリスト</h2>
        <?php if(isset($_GET["error_todo"])) {?>
          <div class="alert alert-danger mx-auto" role="alert" style="width: 80%;">
          <?php
            echo $_GET["error_todo"];
          ?>
          </div>
        <?php }?>
    <form method="post" action="" class="mb-3">
        <input type="text" name="todo_contents" value="" class="form-control mx-auto" style="width: 80%;" placeholder="Todo"><br>
        <input type="date" name="deadline" class="form-control mx-auto" style="width: 80%;"><br>
        <input type="submit" name="submit" value="Add" class="btn btn-success m-2" style="width: 70%;">
    </form>
    <h3 class="heading">残タスク</h3>
    <div class="mb-5">
      <table class="table table-striped table-hover">
          <therad>
            <tr>
              <th>Task</th>
              <th>Deadline</th>
              <th></th>
            </tr>
          </therad>
          <tbody>
            <!-- select -->
            <?php
                $u_name = $_SESSION["u_name"];
                $stmt = $pdo->prepare(
                  "SELECT * FROM todo 
                  WHERE u_name = '$u_name'
                  ORDER BY deadline ASC");
                $stmt->execute();
                
                foreach($stmt as $row) {

            ?>
              <tr>
                <td><?= htmlspecialchars($row['todo_contents']) ?></td>
                <td><?= htmlspecialchars($row['deadline']) ?></td>
                <td>
                    <form method="POST">
                        <button type="submit" name="delete"  class="btn btn-danger btn-sm">Delete</button>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="delete" value="true">
                    </form>
                </td>
              </tr>
            <?php
                }
            ?>
          </tbody>
      </table>
    </div>
</body>
</html>