<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['bbdmsdid']) == 0) {
    header('location:logout.php');
} else {
    $donorId = $_SESSION['bbdmsdid'];

    // Fetch blood requests sent by the donor
    $sql = "SELECT * FROM tblbloodrequirer WHERE BloodDonarID = :donorId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':donorId', $donorId, PDO::PARAM_INT);
    $query->execute();
    $requests = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donor Management System | Requests Sent</title>
    
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //Web-Fonts -->

</head>

<body>
    <?php include('includes/header.php');?>

    <!-- banner 2 -->
    <div class="inner-banner-w3ls">
        <div class="container">

        </div>
        <!-- //banner 2 -->
    </div>
    <!-- page details -->
    <div class="breadcrumb-agile">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Requests Sent</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- contact -->
    <div class="appointment py-5">
        <div class="py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Requests Sent</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
            <div class="d-flex">
                
                <div class="contact-right-w3l appoint-form" style="width:100% !important;">
                    <h5 class="title-w3 text-center mb-5">List of Blood Requests Sent</h5>
                    <table border="1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Blood Require For</th>
                                <th>Message</th>
                                <th>Apply Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($requests)) {
                                $cnt = 1;
                                foreach ($requests as $request) { ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($request['name']); ?></td>
                                        <td><?php echo htmlentities($request['ContactNumber']); ?></td>
                                        <td><?php echo htmlentities($request['EmailId']); ?></td>
                                        <td><?php echo htmlentities($request['BloodRequirefor']); ?></td>
                                        <td><?php echo htmlentities($request['Message']); ?></td>
                                        <td><?php echo htmlentities($request['ApplyDate']); ?></td>
                                        <td><?php echo htmlentities($request['Status']); ?></td>
                                    </tr>
                            <?php
                                $cnt++;
                            }
                        } else { ?>
                            <tr>
                                <th colspan="8" style="color:red;">No Blood Requests Sent</th>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="clerafix"></div>
            </div>
        </div>
    </div>
    <!-- //contact -->

    <?php include('includes/footer.php');?>

    <!-- Js files -->
    <!-- JavaScript -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- Default-JavaScript-File -->

    <!--start-date-piker-->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker,#datepicker1").datepicker();
        });
    </script>
    <!-- //End-date-piker -->

    <!-- fixed navigation -->
    <script src="js/fixed-nav.js"></script>
    <!-- //fixed navigation -->

    <!-- smooth scrolling -->
    <script src="js/SmoothScroll.min.js"></script>
    <!-- move-top -->
    <script src="js/move-top.js"></script>
    <!-- easing -->
    <script src="js/easing.js"></script>
    <!--  necessary snippets for few javascript files -->
    <script src="js/medic.js"></script>

    <script src="js/bootstrap.js"></script>
    <!-- Necessary-JavaScript-File-For-Bootstrap -->

    <!-- //Js files -->

</body>

</html>
<?php } ?>
