<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | AMA Library</title>
    <link rel="stylesheet" href="css/bulma.css"> <!-- use min.css at the final -->
    <link rel="icon" href="img/amau_logo.png">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
    <div class="level level-right">
      <img class="column is-two-thirds" src="img/amalibrary.png" alt="AMA Digital Library Icon">
    </div>

    <level class="level level-left">
      <section class="section">
        <form action="includes/process.inc.php" method="post">
          <!-- USN -->
          <div class="field">
            <div class="control has-icons-left">
              <input class="input" type="text" name="USN" placeholder="USN">
              <span class="icon is-small is-left">
                <i class="far fa-user"></i>
              </span>
            </div>
          </div>
          <!-- Password -->
          <div class="field">
            <div class="control has-icons-left">
              <input class="input" type="password" name="password" placeholder="password">
              <span class="icon is-small is-left">
                <i class="fas fa-lock-open"></i>
              </span>
            </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" type="submit" name="btnsubmit">Login</button>
            </div>
            <div class="control">
              <a class="button is-text"href="signup.php">Signup</a>
            </div>
          </div>

        </form>
      </section>
    </level>


  </body>
</html>
