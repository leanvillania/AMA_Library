<?php
  function checkUSN($usn) { //this function checks for duplicates
    require 'dbh.inc.php';
    $sql = "SELECT * FROM user_tbl WHERE user_USN = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL Statement Function Error";
    } else {
      mysqli_stmt_bind_param($stmt, "s", $usn);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $count = mysqli_num_rows($result);

      return $count;
    }
  }

  require 'dbh.inc.php';

  if (isset($_POST['btnsubmit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $usn = mysqli_real_escape_string($conn, $_POST['USN']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Encrypting password to sha1
    $password = sha1($password);
    $confirmPassword = sha1($confirmPassword);

    //Checking if USN exists
    $checkUSN= checkUSN($usn);

    if ($checkUSN >= 1) {
      header('Location: ../signup.php?duplicate');
    } else {
      // Validating password with confirm Password
      // And doing a prepared statement to prevent SQL Injections
      if ($password == $confirmPassword) {
        $sql = "INSERT INTO user_tbl (user_fullname, user_USN, user_email, user_password)
        VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<script>alert('An error occurred: SQL Statement Failed');
          location.href='../index.php'</script>";
        } else {
          mysqli_stmt_bind_param($stmt, "ssss", $fullname, $usn, $email, $password);
          mysqli_stmt_execute($stmt);
          echo "<script>alert('New user added to the database!');
          location.href='../index.php'</script>";
        }

      } else {
        echo 'Signup failed <a href="../signup.php">Signup</a>';
      }
    }


  } else {
    header('Location: ../signup.php');
  }
 ?>
