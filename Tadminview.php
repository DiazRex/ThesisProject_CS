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

    <title>Student View</title>

    <style>

.progress {
  margin-top: 30px;
  height: 30px;
  background-color: #e6e6e6;
  border-radius: 15px;
}

.progress-bar {
  height: 100%;
  background-color: #007bff;
  border-radius: 15px;
  transition: width 0.5s ease;
}

.col-auto {
  margin-right: 20px;
}

img:hover {
    transform: scale(5);
  }



    </style>

</head>
<body>

    <a href="Admin.php" class="btn btn-danger float-end fix-anchor" style="position: fixed; top: 0; right: 0; margin: 7px;">BACK</a>
    <br><br>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 3px outset #333333;">
                    <div class="card-header">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM thesisdata WHERE RoleSTI ='Teacher' AND id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                              $student = mysqli_fetch_array($query_run);
                           ?>
                              <div style="display: flex; align-items: center;">
                                <h4 style="margin-right: 10px;"><?=$student['Username'];?> Details</h4>
                                <img src="<?=$student['ProfileP'];?>" alt="Profile Picture" style="height: 25px; width: 25px; border-radius: 50%; transition: transform 0.1s;">
                                </div>
                              
                              
                            <?php  
                              }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM thesisdata WHERE RoleSTI ='Teacher' AND id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <p class="form-control">
                                            <?=$student['Username'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$student['Email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <p class="form-control">
                                            <?=$student['PassW'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Firstname</label>
                                        <p class="form-control">
                                            <?=$student['FirstN'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Lastname</label>
                                        <p class="form-control">
                                            <?=$student['LastN'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Section</label>
                                        <p class="form-control">
                                            <?=$student['SectionN'];?>
                                        </p>
                                    </div>

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
                    <!-- <br><br>
        
                    <div class="container" style="border: 3px outset #333333; height: 470px; border-radius: 3px; width: 85%;">
  <div class="row">
    <div class="col-12 text-center" style="background-color: #ebebeb; height: 40px;">
      <h3>Student Progress</h3>
    </div>
    
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 style="margin-top:30px; font-size: 23px;">C# Fundamentals:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 50px;">
            <div class="progress-bar" id="progress-bar-1"></div>
          </div>
        </div>
      </div>
    </div>

    Second progress bar
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 style="margin-top:30px; font-size: 23px;">Classes & Objectives:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 19.5px;">
            <div class="progress-bar" id="progress-bar-2"></div>
          </div>
        </div>
      </div>
    </div>

    Third progress bar
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 style="margin-top:30px; font-size: 23px;">Abstraction:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 112px;">
            <div class="progress-bar" id="progress-bar-3"></div>
          </div>
        </div>
      </div>
    </div>

    Fourth progress bar
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 style="margin-top:30px; font-size: 23px;">Encapsulation:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 86px;">
            <div class="progress-bar" id="progress-bar-4"></div>
          </div>
        </div>
      </div>
    </div>

    Fifth progress bar
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 style="margin-top:30px; font-size: 23px;">Inheritance:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 112px;">
            <div class="progress-bar" id="progress-bar-5"></div>
          </div>
        </div>
      </div>
    </div>

    Sixth progress bar
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 style="margin-top:30px; font-size: 23px;">Polymorphism:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 81px;">
            <div class="progress-bar" id="progress-bar-6"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

        


    <script src="progress.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>