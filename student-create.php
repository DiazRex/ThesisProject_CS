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

    <title>Student Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 3px outset #333333;">
                    <div class="card-header">
                        <h4>Student Add 
                            <a href="Admin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="Uname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="Uemail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="Upassword" class="form-control">
                            </div>
                            

                            <div class="mb-3">
                                <label>Status</label>
                                <select id="status" name="Ustatus" class="form-control" required>
                                <option value="Teacher">Teacher</option>
                                <option value="Student">Student</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Firstname</label>
                                <input type="text" name="Ufirstname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Lastname</label>
                                <input type="text" name="Ulastname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Section</label>
                                <input type="text" name="Usection" class="form-control">
                            </div>

                            

                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>