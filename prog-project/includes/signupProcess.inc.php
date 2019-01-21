<?php
  include_once 'dbh.inc.php';

  if (isset($_POST['btnsubmit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $usn = mysqli_real_escape_string($conn, $_POST['USN']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Encrypting password to sha1
    $password = sha1($password);
    $confirmPassword = sha1($confirmPassword);

    // Validating password with confirm Password
    // And doing a prepared statement to prevent SQL Injections
    if ($password == $confirmPassword) {
      $sql = "INSERT INTO user_tbl (user_fullname, user_USN, user_email, user_password)
      VALUES (?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL Statement Failed";
      } else {
        mysqli_stmt_bind_param($stmt, "ssss", $fullname, $usn, $email, $password);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?signup=success");
      }

    } else {
      echo 'Signup failed <a href="../signup.php">Signup</a>';
    }
  } else {
    header('Location: signup.php');
  }
 ?>
