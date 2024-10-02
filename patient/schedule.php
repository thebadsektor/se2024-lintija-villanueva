<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Sessions</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" || $_SESSION['usertype'] != 'p') {
            header("location: ../login.php");
        } else {
            $useremail = $_SESSION["user"];
        }
    } else {
        header("location: ../login.php");
    }
    
    // Import database
    include("../connection.php");
    $sqlmain = "SELECT * FROM patient WHERE pemail = ?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();
    $userfetch = $result->fetch_assoc();
    $userid = $userfetch["pid"];
    $username = $userfetch["pname"];

    date_default_timezone_set('Asia/Kolkata');
    $today = date('Y-m-d');
    ?>

    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username, 0, 13) ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail, 0, 22) ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php">
                                        <input type="button" value="Log out" class="logout-btn btn-primary-soft btn">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-home">
                        <a href="index.php" class="non-style-link-menu">
                            <div><p class="menu-text">Home</p></a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="doctors.php" class="non-style-link-menu">
                            <div><p class="menu-text">All Doctors</p></a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-session menu-active menu-icon-session-active">
                        <a href="schedule.php" class="non-style-link-menu non-style-link-menu-active">
                            <div><p class="menu-text">Scheduled Sessions</p></div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu">
                            <div><p class="menu-text">My Bookings</p></a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu">
                            <div><p class="menu-text">Settings</p></a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <?php
        // Default SQL for all upcoming sessions
        $sqlmain = "SELECT * FROM schedule 
                    INNER JOIN doctor ON schedule.docid = doctor.docid 
                    WHERE schedule.scheduledate >= '$today' 
                    ORDER BY schedule.scheduledate ASC";
        $insertkey = "";
        $searchtype = "All";

        // Handle POST request for search
        if ($_POST) {
            if (!empty($_POST["search"])) {
                $keyword = $_POST["search"];
                
                // Check if the input is a valid date in YYYY-MM-DD format
                if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $keyword)) {
                    // If it's a valid date, only search for date matches
                    $sqlmain = "SELECT * FROM schedule 
                                INNER JOIN doctor ON schedule.docid = doctor.docid 
                                WHERE schedule.scheduledate = '$keyword' 
                                ORDER BY schedule.scheduledate ASC";
                } else {
                    // If it's not a date, search for doctor name or session title
                    $sqlmain = "SELECT * FROM schedule 
                                INNER JOIN doctor ON schedule.docid = doctor.docid 
                                WHERE schedule.scheduledate >= '$today' 
                                AND (doctor.docname LIKE '%$keyword%' 
                                OR schedule.title LIKE '%$keyword%') 
                                ORDER BY schedule.scheduledate ASC";
                }
                
                $insertkey = $keyword;
                $searchtype = "Search Result: ";
            }
        }

        // Execute the query and handle errors
        $result = $database->query($sqlmain);

        if (!$result) {
            // Output the SQL error
            echo "Error executing query: " . $database->error;
        } else {
            ?>
            <div class="dash-body">
                <table border="0" width="100%" style="margin-top:25px;">
                    <tr>
                        <td width="13%">
                            <a href="schedule.php">
                                <button class="login-btn btn-primary-soft btn btn-icon-back" style="padding:11px;margin-left:20px;width:125px">
                                    <font class="tn-in-text">Back</font>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="" method="post" class="header-search">
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email or Date (YYYY-MM-DD)" list="doctors" value="<?php echo $insertkey ?>">&nbsp;&nbsp;
                                <datalist id="doctors">
                                    <?php
                                    $list11 = $database->query("SELECT DISTINCT docname FROM doctor");
                                    $list12 = $database->query("SELECT DISTINCT title FROM schedule GROUP BY title");

                                    while ($row = $list11->fetch_assoc()) {
                                        echo "<option value='" . $row['docname'] . "'>";
                                    }
                                    while ($row = $list12->fetch_assoc()) {
                                        echo "<option value='" . $row['title'] . "'>";
                                    }
                                    ?>
                                </datalist>
                                <input type="submit" value="Search" class="login-btn btn-primary btn" style="padding:10px 25px;">
                            </form>
                        </td>
                        <td width="15%">
                            <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">Today's Date</p>
                            <p class="heading-sub12" style="padding: 0;margin: 0;"><?php echo $today; ?></p>
                        </td>
                        <td width="10%">
                            <button class="btn-label" style="display: flex;justify-content: center;align-items: center;">
                                <img src="../img/calendar.svg" width="100%">
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-top:10px;">
                            <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">
                                <?php echo $searchtype . " Sessions (" . $result->num_rows . ")"; ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <center>
                                <div class="abc scroll">
                                    <table width="100%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none">
                                        <tbody>
                                            <?php
                                            if ($result->num_rows == 0) {
                                                echo '<tr>
                                                        <td colspan="4">
                                                            <br><br><br><br>
                                                            <center>
                                                            <img src="../img/notfound.svg" width="25%">
                                                            <br>
                                                            <p class="heading-main12" style="font-size:20px;color:rgb(49, 49, 49)">We couldn\'t find anything related to your keywords!</p>
                                                            <a class="non-style-link" href="schedule.php">
                                                                <button class="login-btn btn-primary-soft btn" style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</button>
                                                            </a>
                                                            </center>
                                                            <br><br><br><br>
                                                        </td>
                                                      </tr>';
                                            } else {
                                                for ($x = 0; $x < $result->num_rows; $x++) {
                                                    echo "<tr>";
                                                    for ($q = 0; $q < 3; $q++) {
                                                        $row = $result->fetch_assoc();
                                                        if (!isset($row)) {
                                                            break;
                                                        }
                                                        $scheduleid = $row["scheduleid"];
                                                        $title = $row["title"];
                                                        $docname = $row["docname"];
                                                        $scheduledate = $row["scheduledate"];
                                                        $scheduletime = $row["scheduletime"];

                                                        if ($scheduleid == "") {
                                                            break;
                                                        }

                                                        echo '
                                                        <td style="width: 25%;">
                                                            <div class="dashboard-items search-items">
                                                                <div style="width:100%">
                                                                    <div class="h1-search">
                                                                        ' . substr($title, 0, 21) . '
                                                                    </div><br>
                                                                    <div class="h3-search">
                                                                        ' . substr($docname, 0, 30) . '
                                                                    </div>
                                                                    <div class="h4-search">
                                                                        ' . $scheduledate . '<br>Starts: <b>@' . substr($scheduletime, 0, 5) . '</b> (24h)
                                                                    </div>
                                                                    <br>
                                                                    <a href="booking.php?id=' . $scheduleid . '">
                                                                        <button class="login-btn btn-primary-soft btn" style="padding-top:11px;padding-bottom:11px;width:100%">
                                                                            <font class="tn-in-text">Book Now</font>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>';
                                                    }
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>
