<?php
include_once("class/User.php");
include_once("config/appconfig.php");

session_start();
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Login - <?php echo APP_NAME ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include("./style.php"); ?>

        <script>
            function refreshDiary()
            {
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("diary-content").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET", "diary_fetch.php?u=" + <?php echo $_SESSION['activeUser']->getId() ?>, true);
                xmlhttp.send();
            }

            function addDiaryEntry()
            {
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        refreshDiary();
                    }
                };

                xmlhttp.open("GET", "diary_add.php?q=" + document.getElementById("diary-add-content").value, true);
                xmlhttp.send();
            }

            refreshDiary();
        </script>
    </head>

    <body>
        <?php include("./navbar.php"); ?>

        <header class="header">
            <h2 class="text-overline">Progress tracking</h2>
            <h1 class="text-h1" style="padding: 0;">My daily routine</h1>
        </header>

        <main class="main-content" id="about">
            <section class="main-content__section home-shortcut-list">
                <a class="home-shortcut-list__item" href="./journal.php">Journal</a>
                <a class="home-shortcut-list__item" href="./schedule.php">Schedule</a>
            </section>
        </main>
    </body>
</html>