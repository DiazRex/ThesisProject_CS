<?php
require 'conn.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Question Edit</title>

<style>

.dash{
  border-radius: 10px; -webkit-backdrop-filter: blur(6.5px);
  backdrop-filter: blur(6.5px);
  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
  border: 0.8px solid white;
}

.Fnt{
  color:white;
  font-weight: bold;
}

</style>

</head>
<body style="
  background-image:url(Pic/Bckg_1.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment:fixed;
  color: #350918;
  
  ">
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
            <div class="dash" style="border: 1.2px solid white;">
                    <div class="card-header">
                        <h4>Question Edit 
                            <a href="content.php#ManageQuestion" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM default_questions WHERE id='$id'";
                            $query_run = mysqli_query($conn, $query);

                            $questionType = mysqli_query($conn, "SELECT * FROM question_type WHERE id='$id'");
                            $type = $questionType->fetch_assoc()['question_type'];

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $question = mysqli_fetch_array($query_run);
                                ?>
                                <form method="POST">

                                    <div class="mb-3">
                                        <label>Question</label>
                                        <input type="text" name="question" value="<?=$question['question_title'];?>" class="form-control">
                                    </div>
                                    <?php 
                                    if($type === 'multiple_choice'){
                                      $stmt = $db->prepare("SELECT * FROM multiple_choice WHERE id='$id'");
                                      $stmt->execute();
                                      $result = $stmt->fetch();
                                      ?>
                                        <div class="mb-3">
                                            <label>A</label>
                                            <input type="text" name="a" value="<?=htmlspecialchars($result['a'], ENT_QUOTES, 'UTF-8');?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>B</label>
                                            <input type="text" name="b" value="<?=htmlspecialchars($result['b'], ENT_QUOTES, 'UTF-8');?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>C</label>
                                            <input type="text" name="c" value="<?=htmlspecialchars($result['c'], ENT_QUOTES, 'UTF-8');?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>D</label>
                                            <input type="text" name="d" value="<?=htmlspecialchars($result['d'], ENT_QUOTES, 'UTF-8');?>" class="form-control">
                                        </div>

                                      <?php
                                    } else if($type === 'identification'){
                                      $stmt = $db->prepare("SELECT * FROM identification WHERE id='$id'");
                                      $stmt->execute();
                                      $result = $stmt->fetch();

                                    }
                                    ?>
                                    
                                    <div class="mb-3">
                                        <label>Answer</label>
                                        <input type="text" name="answer" value="<?=$question['answer'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_question" class="btn btn-primary">
                                            Update Question
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
  if(isset($_POST['update_question'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $questionType = mysqli_query($conn, "SELECT * FROM question_type WHERE id='$id'");
    $type = $questionType->fetch_assoc()['question_type'];

    try {
      //Multiple Choice
      $stmt = $db->prepare("UPDATE default_questions SET question_title = :question WHERE id = :id");
      // bind parameters
      $stmt->bindParam(':question', $_POST['question']);
      $stmt->bindParam(':id', $_GET['id']);

      $stmt->execute();

    } catch(PDOException $e){
      die("Error: " . $e->getMessage());
    }
    if (!$stmt) {
      die("Error in the SQL query: " . $db->errorInfo()[2]);
    }

    if($type === 'multiple_choice'){
      try {
        //Multiple Choice
        $stmt = $db->prepare("UPDATE multiple_choice JOIN default_questions ON multiple_choice.question_id = default_questions.id SET 
        multiple_choice.a=:a,
        multiple_choice.b=:b,
        multiple_choice.c=:c,
        multiple_choice.d=:d,
        default_questions.answer=:answer
        WHERE default_questions.id = :id");
        // bind parameters
        $stmt->bindParam(':a', $_POST['a']);
        $stmt->bindParam(':b', $_POST['b']);
        $stmt->bindParam(':c', $_POST['c']);
        $stmt->bindParam(':d', $_POST['d']);
        $stmt->bindParam(":answer", $_POST['answer']);
        $stmt->bindParam(':id', $_GET['id']);

        $stmt->execute();

      } catch(PDOException $e){
        die("Error: " . $e->getMessage());
      }

      if (!$stmt) {
        die("Error in the SQL query: " . $db->errorInfo()[2]);
      }
    } else if($type === 'identification'){
      try {
        //Multiple Choice
        $stmt = $db->prepare("UPDATE default_questions SET question_title = :question, answer = :answer WHERE id = :id");
        // bind parameters
        $stmt->bindParam(':answer', $_POST['answer']);
        $stmt->bindParam(':question', $_POST['question']);
        $stmt->bindParam(':id', $_GET['id']);

        $stmt->execute();

      } catch(PDOException $e){
        die("Error: " . $e->getMessage());
      }
      if (!$stmt) {
        die("Error in the SQL query: " . $db->errorInfo()[2]);
    }
    }

    

    

    header("Location: content.php#ManageQuestion");
  }

?>