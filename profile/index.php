<?php
// Check if the user is already logged in, if no then redirect him to index page (login)
session_start();
if (!isset($_SESSION["is_logged_in"])) {
    header("location: ../index.php");
    exit;
}

$username = $_SESSION['username'];
$kelas = $_SESSION['kelas'];
$umur = $_SESSION['umur'];
$tanggalLahir = $_SESSION['tanggalLahir'];
$tanggalTes = $_SESSION['tanggalTes'];
$fullName = $_SESSION['fullName'];
$orangTua = $_SESSION['orangTua'];

// echo "Tanggal Lahir from Session: " . $tanggalLahir;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../main_pages/assets/css/styles.css">

    <title>Monitoring Kepribadian Anak</title>

    <style>
        /* Additional spacing between list items */
        .profile-details li {
            margin-bottom: 30px;
            /* Adjust the value as needed */
        }
    </style>
</head>

<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="/fingerprint-php-native/main_pages/#home" class="nav__logo">Monitoring Kepribadian Anak</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="/fingerprint-php-native/main_pages/#home" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="/fingerprint-php-native/main_pages/#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="/fingerprint-php-native/main_pages/#services" class="nav__link">Info</a></li>
                    <li class="nav__item"><a href="/fingerprint-php-native/main_pages/#menu" class="nav__link">Hasil</a></li>
                    <li class="nav__item"><a href="../../fingerprint-php-native/main_pages/logout.php" class="nav__link">Logout</a></li>
                    <li class="nav__item">Halo <a href="#menu"><?php echo $username ?></a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">

        <!--========== MENU ==========-->
        <section class="menu section bd-container" id="menu">
            <!-- <span class="section-subtitle">Profile Detail</span> -->
            <h2 class="section-title">Profile Details</h2>
            <ul class="profile-details">
                <li><strong>Username:</strong> <?php echo $username ?></li>
                <li><strong>Tanggal Lahir:</strong> <?php echo date('Y-m-d', strtotime($tanggalLahir)) ?></li>
                <li><strong>Tanggal Tes:</strong> <?php echo ($tanggalTes === NULL) ? '-' : $tanggalTes; ?></li>
                <li><strong>Orang Tua:</strong> <?php echo $orangTua ?></li>
                <li><strong>Umur:</strong> <?php echo $umur ?></li>
                <li><strong>Kelas:</strong> <?php echo $kelas ?></li>
            </ul>
        </section>
    </main>


    </main>


    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
</body>

</html>