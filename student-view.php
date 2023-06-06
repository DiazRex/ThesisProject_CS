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

<a href="content.php" class="btn btn-danger float-end fix-anchor" style="position: fixed; top: 0; right: 0; margin: 7px;">BACK</a>
    <br><br>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="dash" style="border: 1.2px solid white;">
                    <div class="card-header">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM thesisdata WHERE RoleSTI ='Student' AND id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                              $student = mysqli_fetch_array($query_run);
                           ?>
                              <div style="display: flex; align-items: center;">
                                <h4 style="margin-right: 10px; color:white; font-weight:bold;"><?=$student['Username'];?> Details</h4>
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
                        
                        
                                   
                    </div>
                    
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM thesisdata WHERE RoleSTI ='Student' AND id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                      

                                
                                    <div class="mb-3">
                                        <label class="Fnt">Username</label>
                                        <p class="form-control">
                                            <?=$student['Username'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="Fnt">Email</label>
                                        <p class="form-control">
                                            <?=$student['Email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="Fnt">Password</label>
                                        <p class="form-control">
                                            <?=$student['PassW'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="Fnt">Firstname</label>
                                        <p class="form-control">
                                            <?=$student['FirstN'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="Fnt">Lastname</label>
                                        <p class="form-control">
                                            <?=$student['LastN'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="Fnt">Section</label>
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
                    <br><br>
        
                    <div class="container dash" style="border: 1.2px solid white; height: 520px; border-radius: 10px; width: 85%;">
  <div class="row">
    <div class="col-12 text-center" style="margin-top: 4px; height: 40px;">
    <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM thesisdata WHERE RoleSTI ='Student' AND id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                              $student = mysqli_fetch_array($query_run);
                           ?>
                              <h3 class="Fnt  "><?=$student['Username'];?> Progress</h3>
                                <?php  
                              }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
    
  </div>
    
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 class="Fnt" style="margin-top:30px; font-size: 23px;">C# Fundamentals:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 50px;">
            <div class="progress-bar" id="progress-bar-1"><h3 class="text-center" style="margin-top: 3px;">0</h3></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Second progress bar -->
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 class="Fnt" style="margin-top:30px; font-size: 23px;">Classes & Objectives:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 19.5px;">
            <div class="progress-bar" id="progress-bar-2"><h3 class="text-center" style="margin-top: 3px;">0</h3></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Third progress bar -->
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 class="Fnt" style="margin-top:30px; font-size: 23px;">Abstraction:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 112px;">
            <div class="progress-bar" id="progress-bar-3"><h3 class="text-center" style="margin-top: 3px;">0</h3></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Fourth progress bar -->
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 class="Fnt" style="margin-top:30px; font-size: 23px;">Encapsulation:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 86px;">
            <div class="progress-bar" id="progress-bar-4"><h3 class="text-center" style="margin-top: 3px;">0</h3></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Fifth progress bar -->
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 class="Fnt" style="margin-top:30px; font-size: 23px;">Inheritance:</h5>
        </div>
        <div class="col">
          <div class="progress" style="margin-left: 112px;">
            <div class="progress-bar" id="progress-bar-5"><h3 class="text-center" style="margin-top: 3px;">0</h3></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sixth progress bar -->
    <div class="col-12">
      
    <div class="d-flex">
        <div class="col-auto">
          <h5 class="Fnt" style="margin-top:30px; font-size: 23px;">Polymorphism:</h5>
        </div>
        
        <div class="col">
          <div class="progress" style="margin-left: 81px;">
            <div class="progress-bar" id="progress-bar-6"><h3 class="text-center" style="margin-top: 3px;">0</h3></div>
          </div>
        </div>
      </div>
    </div>
        

    <!-- Seventh progress bar (combined progress) -->
    <div class="col-12">
      <div class="d-flex">
        <div class="col-auto">
          <h5 class="Fnt" style="margin-top:30px; font-size: 23px;">Combined Progress:</h5>
        </div>
        
        <div class="col">
          <div class="progress" style="margin-left: 28px;">
            <div class="progress-bar" id="progress-bar-combined"><h3 class="text-center" style="margin-top: 3px;">wow</h3></div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <br><br>
</div>

        


<script>
var progressBar1 = document.getElementById("progress-bar-1");
var progressBar2 = document.getElementById("progress-bar-2");
var progressBar3 = document.getElementById("progress-bar-3");
var progressBar4 = document.getElementById("progress-bar-4");
var progressBar5 = document.getElementById("progress-bar-5");
var progressBar6 = document.getElementById("progress-bar-6");
var combinedProgressBar = document.getElementById("progress-bar-combined");

function updateProgressBar(progressBar, progress) {
  progressBar.style.width = progress + "%";
  progressBar.querySelector('h3').textContent = progress + "%"; // set the progress text
  updateCombinedProgressBar(); // update the combined progress bar whenever any individual bar is updated
}

function updateCombinedProgressBar() {
  var totalProgress = 0;
  totalProgress += parseInt(progressBar1.style.width) || 0;
  totalProgress += parseInt(progressBar2.style.width) || 0;
  totalProgress += parseInt(progressBar3.style.width) || 0;
  totalProgress += parseInt(progressBar4.style.width) || 0;
  totalProgress += parseInt(progressBar5.style.width) || 0;
  totalProgress += parseInt(progressBar6.style.width) || 0;

  var averageProgress = totalProgress / 6;
  combinedProgressBar.style.width = averageProgress + "%";
  combinedProgressBar.querySelector('h3').textContent = Math.round(averageProgress) + "%"; // set the progress text
}

// Example usage: update progress bar 1 to 50%
updateProgressBar(progressBar1, 50);

// Example usage: update progress bar 2 to 75%
updateProgressBar(progressBar2, 75);

// Example usage: update progress bar 3 to 25%
updateProgressBar(progressBar3, 25);

// Example usage: update progress bar 4 to 90%
updateProgressBar(progressBar4, 90);

// Example usage: update progress bar 5 to 10%
updateProgressBar(progressBar5, 10);

// Example usage: update progress bar 6 to 60%
updateProgressBar(progressBar6, 60);
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>