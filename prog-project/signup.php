<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup | AMA Library</title>
    <link rel="stylesheet" href="css/bulma.css"> <!-- use min.css at the final -->
    <link rel="icon" href="img/amau_logo.png">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>

    <level class="level level-left">
      <section class="section">
        <form action="includes/signupProcess.inc.php" method="post">

          <!-- Fullname -->
          <div class="control">
            <label class="label">*Please enter your fullname</label>
            <div class="field">
              <div class="control">
                <input class="input" type="text" name="fullname" placeholder="Fullname*" required>
              </div>
            </div>
          </div>

          <!-- Register USN -->
          <div class="control">
            <label class="label">*Please enter your existing USN</label>
            <div class="field">
              <div class="control">
                <input class="input" type="text" name="USN" placeholder="Enter USN Here*" maxlength="11" required>
              </div>
            </div>
          </div>

          <!-- Register Email -->
          <div class="control">
            <label class="label">*Enter Email Here</label>
            <div class="field">
              <div class="control">
                <input class="input" type="email" name="email" placeholder="Email*" required>
              </div>
            </div>
          </div>

          <!-- Register Password -->
          <div class="control">
            <label class="label">*Enter Your Password</label>
            <div class="field">
              <div class="control">
                <input class="input" type="password" name="password" placeholder="Password*" required>
              </div>
            </div>
          </div>

          <!-- Confirm Password -->
          <div class="control">
            <label class="label">*Confirm Password</label>
            <div class="field">
              <div class="control">
                <input class="input" type="password" name="confirmPassword" placeholder="Confirm Password*">
              </div>
            </div>
          </div>

          <!-- School District (to be added) -->

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" type="submit" name="btnsubmit">Register</button>
            </div>
            <div class="control">
              <a class="button is-text"href="index.php">Already have an account? Login Here</a>
            </div>
          </div>

        </form>
      </section>
    </level>


  </body>
</html>
