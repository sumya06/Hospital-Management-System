<!DOCTYPE html>
<html>
  <head>
    <title>PHP MYSQL Search Demo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="x-dummy.css">
  </head>
  <body>
    <!-- (A) SEARCH FORM -->
    <form method="post" action="2-form.php">
      <input type="text" name="search" placeholder="Search..." required>
      <input type="submit" value="Search">
    </form>

    <div id="results"><?php
    // (B) PROCESS SEARCH WHEN FORM SUBMITTED
    if (isset($_POST["search"])) {
      // (B1) SEARCH FOR USERS
      require "3-search.php";

      // (B2) DISPLAY RESULTS
      if (count($results) > 0) { foreach ($results as $r) {
        printf("<div>%s - %s</div>", $r["name"], $r["email"]);
      }} else { echo "No results found"; }
    }
    ?></div>
  </body>
</html>