<?php
require 'conn.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM thesisdata WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: Admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: Admin.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $Username = mysqli_real_escape_string($conn, $_POST['name']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $PassWord = mysqli_real_escape_string($conn, $_POST['password']);
    $FirstN = mysqli_real_escape_string($conn, $_POST['firstname']);
    $LastN = mysqli_real_escape_string($conn, $_POST['lastname']);
    $SectionN = mysqli_real_escape_string($conn, $_POST['section']);

    $query = "UPDATE thesisdata SET Username='$Username', Email='$Email', PassW='$PassWord', FirstN='$FirstN',
    LastN='$LastN', SectionN='$SectionN' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: Admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: Admin.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $Username = mysqli_real_escape_string($conn, $_POST['Uname']);
    $Email = mysqli_real_escape_string($conn, $_POST['Uemail']);
    $PassWord = mysqli_real_escape_string($conn, $_POST['Upassword']);
    $Role = mysqli_real_escape_string($conn, $_POST['Ustatus']);
    $FirstN = mysqli_real_escape_string($conn, $_POST['Ufirstname']);
    $LastN = mysqli_real_escape_string($conn, $_POST['Ulastname']);
    $SectionN = mysqli_real_escape_string($conn, $_POST['Usection']);
    $query = "INSERT INTO thesisdata (Username, Email, PassW, RoleSTI, FirstN, LastN, SectionN) VALUES ('$Username','$Email','$PassWord','$Role','$FirstN','$LastN','$SectionN')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: Admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: Admin.php");
        exit(0);
    }
}



?>