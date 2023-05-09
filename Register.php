<?php 
require 'conn.php';

if(isset($_POST["submit"])){


  $FirstN= $_POST['fname'];
  $LastN= $_POST['lname'];
  $Section= $_POST['section'];
  $Username = $_POST['UserN'];
  $Email = $_POST['GvEmail'];
  $Password = $_POST['GvPass'];
  $ConPassword = $_POST['GvConPass'];
  $RegRole = $_POST['status'];

  // Check for duplicate username or email
  $DupCheck = mysqli_query($conn, "SELECT * FROM thesisdata WHERE Username = '$Username' OR Email = '$Email'");
  if(mysqli_num_rows($DupCheck) > 0){
    echo "<script>alert('Username or Email is taken...');</script>";
  } else {
    // Check password match
    if($Password == $ConPassword){
      
      // Handle profile picture upload
      if(isset($_FILES['ProfilePic'])){
        $file_name = $_FILES['ProfilePic']['name'];
        $file_size = $_FILES['ProfilePic']['size'];
        $file_tmp = $_FILES['ProfilePic']['tmp_name'];
        $file_type = $_FILES['ProfilePic']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Set maximum file size (in bytes)
        $max_file_size = 9999999;
        
        // Set allowed file types
        $allowed_types = array("jpg", "jpeg", "png", "gif");
        
        // Check file size and type
        if(in_array($file_ext, $allowed_types) && $file_size <= $max_file_size){
          
          // Move file to server folder
          $upload_path = "uploads/";
          $new_file_name = uniqid() . "." . $file_ext;
          move_uploaded_file($file_tmp, $upload_path . $new_file_name);
          
          // Insert data into database, including file path
          $sql = "INSERT INTO thesisdata (Username, Email, PassW, RoleSTI, ProfileP, FirstN, LastN, SectionN) 
          VALUES('$Username','$Email','$Password', '$RegRole', '$upload_path$new_file_name', '$FirstN', '$LastN', '$Section')";
          mysqli_query($conn, $sql);
          
          echo "<script>alert('Account registered!');</script>";
          
        } else {
          echo "<script>alert('Error: Invalid file type or file too large!');</script>";
        }
      } else {
        // If no profile picture is uploaded, insert data into database without file path
        $sql = "INSERT INTO thesisdata (Username, Email, PassW, RoleSTI, FirstN, LastN, SectionN) 
        VALUES('$Username','$Email','$Password', '$RegRole', '$FirstN', '$LastN', '$Section')";
        mysqli_query($conn, $sql);
        echo "<script>alert('Account registered!');</script>";
      }
      
    } else {
      echo "<script>alert('Password is incorrect!');</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <style>
    body {
      
    }
    h1 {
      font-size: 48px;
      text-align: center;
      margin-top: 50px;
    }
    .container {
      max-width: 700px;
      margin-top: 55px;
      
    }
    form {
      -webkit-backdrop-filter: blur(1.5px);
        backdrop-filter: blur(1.5px);
        border: 0.5px solid white;
        color: white;
        font-weight: bold;
      
      padding: 18px;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }
    label, p,{
      font-weight: bold;
    }
    input {
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      margin-bottom: 10px;
    }

    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  border-radius: 10px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #79c2d0;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: red;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    
.Mdl{
  border-radius: 10px;
  border: 0.5px solid white;
  text-align: center;
}


/* CSS */
.button-30 {
  align-items: center;
  appearance: none;
  background-color: #FCFCFD;
  border-radius: 4px;
  border-width: 0;
  box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px,rgba(45, 35, 66, 0.3) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
  box-sizing: border-box;
  color: #36395A;
  cursor: pointer;
  display: inline-flex;
  font-family: "JetBrains Mono",monospace;
  height: 38px;
  justify-content: center;
  line-height: 1;
  list-style: none;
  overflow: hidden;
  padding-left: 16px;
  padding-right: 16px;
  position: relative;
  text-align: left;
  text-decoration: none;
  transition: box-shadow .15s,transform .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  will-change: box-shadow,transform;
  font-size: 12px;
}

.button-30:focus {
  box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
}

.button-30:hover {
  box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
  transform: translateY(-2px);
}

.button-30:active {
  box-shadow: #D6D6E7 0 3px 7px inset;
  transform: translateY(2px);
}

.input-group {
    display: flex;
    align-items: center;
  }
  
  .input-group input {
    flex: 1;
  }



.button-29 {
  align-items: center;
  appearance: none;
  background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
  border: 0;
  border-radius: 6px;
  box-shadow: rgba(45, 35, 66, .4) 0 2px 4px,rgba(45, 35, 66, .3) 0 7px 13px -3px,rgba(58, 65, 111, .5) 0 -3px 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: "JetBrains Mono",monospace;
  height: 48px;
  justify-content: center;
  line-height: 1;
  list-style: none;
  overflow: hidden;
  padding-left: 16px;
  padding-right: 16px;
  position: relative;
  text-align: left;
  text-decoration: none;
  transition: box-shadow .15s,transform .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  will-change: box-shadow,transform;
  font-size: 18px;
}

.button-29:focus {
  box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
}

.button-29:hover {
  box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
  transform: translateY(-2px);
}

.button-29:active {
  box-shadow: #3c4fe0 0 3px 7px inset;
  transform: translateY(2px);
}
    
input[type=file]::file-selector-button {
  border-radius: 40px;
  border: 0.2px solid black;
}

input[type=file]::file-selector-button:hover {
  border-radius: 40px;
  border: 0.2px solid black;
  transform: scale(1.1);
}
  </style>
</head>
  <body style="background-image:url(Pic/STIBcK.png);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment:fixed;
  ">
  <div class="container">
      <form class="" action="" method="POST" enctype="multipart/form-data" >
        <div><h2>Registration</h2></div>
        <br>
        <div class="row">
        
        <div class="col-6 form-group">
          <label>First name</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name*">
        </div>

        <div class="col-6 form-group">
          <label>Last name</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name*" >
        </div>

        <!-- <div class="col-6 form-group">
          <label>Section</label>
          <input type="text" class="form-control" id="section" name="section" placeholder="Enter section*" >
        </div> -->


          <div class="col-6 form-group">
        <label>Status</label>
          <select id="status" name="status" class="form-control" required>
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
            <!-- <option value="Admin">Admin</option> -->
          </select>
        </div>


        <div class="col-6 form-group">
          <label>Username</label>
          <input type="text" class="form-control" id="UserN" name="UserN" placeholder="Enter username*" >
        </div>

        <div class="col-6 form-group">
          <label>Email</label>
          <input type="email" class="form-control" id="GvEmail" name="GvEmail" placeholder="Enter email*" >
        </div>

        
        <div class="col-6 form-group">
          <label>Section</label>
            <select id="section" name="section" class="form-control" required>
              <option value="CS101">CS101</option>
              <option value="CS201">CS201</option>
              <option value="CS301">CS301</option>
              <option value="CS401">CS401</option>
              <option value="CS501">CS501</option>
              <option value="CS601">CS601</option>
            </select>
          </div>


          <script>
             // Get references to the status and section dropdowns
            const statusDropdown = document.getElementById('status');
            const sectionDropdown = document.getElementById('section');

            // Define the options for the section dropdown for teachers
            const teacherOptions = `
            <option value="Faculty">Faculty</option>
            `;

            // Define the options for the section dropdown for students
            const studentOptions = `
            <option value="CS101">CS101</option>
            <option value="CS201">CS201</option>
            <option value="CS301">CS301</option>
            <option value="CS401">CS401</option>
            <option value="CS501">CS501</option>
            <option value="CS601">CS601</option>
            `;

            // Listen for changes in the status dropdown
            statusDropdown.addEventListener('change', () => {
            // Clear the current options in the section dropdown
            sectionDropdown.innerHTML = '';

            // Get the selected status value
            const selectedStatus = statusDropdown.value;

            // Add the appropriate options to the section dropdown based on the selected status
            if (selectedStatus === 'Student') {
            sectionDropdown.innerHTML = studentOptions;
            }
          });
        </script>



        <div class="col-12 form-group">
          <label>Upload Profile Pic</label>
          <input type="file" class="form-control" id="ProfilePic" name="ProfilePic" placeholder="Enter Profile Pic*" style="height: 44px;">
        </div>


        <div class="col-6 form-group">
          <label>Password</label>
          <input type="password" class="form-control" id="GvPass" name="GvPass" placeholder="Enter password*" >
        </div>

        <div class="col-6 form-group">
          <label>Confirm Password</label>
          <input type="password" class="form-control" id="GvConPass" name="GvConPass" placeholder="Enter con-password*" >
        </div>

        <div class="col-12 form-group" id="teacher-code">
  <label>Teacher Code</label>
  <div class="input-group">
    <input type="text" name="teacher_code" class="form-control">&nbsp;&nbsp;
    <button id="send-code" style="border-radius: 10px;" class="button-30">Send Code</button>
  </div>
  <div id="random-code"></div>
  <div id="countdown" style="color:red;"></div>
</div>


        
     

       </div>
        
       <button type="submit" class="button-29" style="width: 100%;" id="submit" name="submit">Register</button>
        <div class="text-center" style="Margin-top: 14px; ">
            <label>Already have an account &nbsp<a href="Login.php">Sign-up now</a> </label>
        </div>

              
        <script>
document.addEventListener('DOMContentLoaded', function() {

  var statusSelect = document.getElementById("status");
var teacherCodeDiv = document.getElementById("teacher-code");
var teacherCodeInput = document.querySelector("input[name='teacher_code']");
var submitButton = document.getElementById("submit");
console.log(teacherCodeInput);

window.onload = (e) => {
  teacherCodeDiv.style.display = "none";
}

// Add an event listener to the select element
statusSelect.addEventListener('change', function() {
  // If the selected value is "Teacher"
  if (this.value === 'Teacher') {
    // Prompt the user for a password
    const password = prompt('Please enter the password:');
    // Check if the password is correct
    if (password === 'TcH') { // pag pumasok dito
      // Set the selected status to "Teacher"
      this.value = 'Teacher';
      sectionDropdown.innerHTML = teacherOptions;
    } else {
      // If the password is incorrect, set the selected status to "Student"
      this.value = 'Student';
      sectionDropdown.innerHTML = studentOptions;
    }
  }
});

statusSelect.addEventListener("change", function() {
  if (statusSelect.value === "Teacher") {
    teacherCodeDiv.style.display = "block";
  } else {
    teacherCodeDiv.style.display = "none";
  }
});

  function getRandomCode() {
    // Generate a random 6-digit code
    let code = Math.floor(Math.random() * 900000) + 100000;
    return code.toString();
  }

  let sendButton = document.getElementById("send-code");
  let randomCode = 0;

  let countdownEl = document.getElementById("countdown");
  const duration = 60;
  let remainingTime = duration;
  let countdownRunning = false;

  
sendButton.addEventListener("click", function(event) {
  event.preventDefault();
  if (!countdownRunning) {
    remainingTime = 60;
    randomCode = getRandomCode();
    console.log(randomCode)
    let codeDiv = document.getElementById("random-code");
    codeDiv.textContent = "Random code: " + randomCode;
    countdownRunning = true;
    updateCountdown();
  }
});

function updateCountdown() {
  if (remainingTime > 0) {
    remainingTime--;
    countdownEl.textContent = remainingTime;
    setTimeout(updateCountdown, 1000);
  } else {
    randomCode = 0;
    countdownRunning = false;
  }
}

document.querySelector("form").addEventListener("submit", function(event) {
  if (statusSelect.value === "Teacher" && teacherCodeInput.value !== randomCode) {
    if(randomCode == 0){
      event.preventDefault(); // Prevent form submission
      alert("Invalid, Teachers code runtime.");
    } else {
      event.preventDefault(); // Prevent form submission
      alert("Please enter the correct teacher code.");
    }
  }
});

});


</script>

      </form>
    
      
    </div>
  </body>
  </html>
