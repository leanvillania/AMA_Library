<?php
  include_once 'dbh.inc.php';

  if (isset($_POST['btnsubmit'])) {
    $usn = mysqli_real_escape_string($conn, $_POST['USN']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = sha1($password);

    //Created a template
    $sql = "SELECT * FROM user_tbl WHERE user_USN = ? AND
    user_password = ?;";

    //Create a prepared statement
    $stmt = mysqli_stmt_init($conn);

    //Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL Statement failed";
    } else {
      //Bind parameters to the placeholder
      mysqli_stmt_bind_param($stmt, "ss", $usn, $password);
      //Run parameters inside database
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($result >= 1) {
        //set session variable
        session_start();

        while ($row = mysqli_fetch_array($result)) {
          //set session variables
          $_SESSION["ID"] = $row['ID'];
          $_SESSION["USN"] = $row['USN'];
          $_SESSION["fullname"] = $row['fullname'];
          $_SESSION["email"] = $row['email'];

        }
        header('Location: ../home.php');
      } else {
        header('Location:../index.php?login=failed');
      }
    }
  } else {
    header('Location:../index.php?login=failed');
  }
 ?>
