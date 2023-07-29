<?php
// Check if the user is already logged in, if no then redirect him to index page (login)
session_start();
if (!isset($_SESSION["is_logged_in"])) {
    header("location: ../index.php");
    exit;
}

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Monitoring Kepribadian Anak</title>
</head>

<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">Monitoring Kepribadian Anak</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#services" class="nav__link">Info</a></li>
                    <li class="nav__item"><a href="#menu" class="nav__link">Hasil</a></li>
                    <!-- <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li> -->
                    <li class="nav__item"><a href="logout.php" class="nav__link">Logout</a></li>
                    <li class="nav__item">Halo <a href="../profile/"><?php echo $username ?></a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">Monitoring Kepribadian Anak</h1>
                    <!-- <a href="#" class="button">Masukkan Sidik Jari
                        <a href="http://localhost/website/">
                            <input type="submit" />
                        </a> -->
                    </a>
                </div>

                <img src="assets/img/home.png" alt="" class="home__img">
            </div>
        </section>

        <!--========== ABOUT ==========-->
        <section class="about section bd-container" id="about">
            <div class="about__container  bd-grid">
                <div class="about__data">
                    <span class="section-subtitle about__initial"></span>
                    <h2 class="section-title about__initial">Hubungan Sidik Jari dengan<br> Kepribadian Anak</h2>
                    <p class="about__description">Sidik jari merupakan bagian dari tubuh manusia yang menarik untuk diteliti sejak dulu. Berbagai macam informasi seperti dominan otak, kepribadian, serta potensi terkandung pada sidik jari. Dengan mengetahui dominan otak, kepribadian, serta potensi, individu dapat mengembangkan dan mengasah diri menjadi lebih baik. Dalam proses mengembangkan dan mengasah kemampuan anak, orang tua dapat mengarahkan, membimbing, serta mendidik sesuai dengan potensi dan kepribadian si anak</p>
                </div>

                <img src="assets/img/1831793875.jpg" alt="" class="about__img">
            </div>
        </section>

        <!--========== SERVICES ==========-->
        <section class="services section bd-container" id="services">
            <span class="section-subtitle">Info</span>
            <h2 class="section-title">Tumbuh dan Kembang Anak</h2>

            <div class="services__container  bd-grid">
                <div class="services__content">
                    <h3 class="services__title">Aspek Fisik</h3>
                    <p class="services__description">Di masa usia sekolah, anak-anak biasanya telah siap menerima pelajaran keterampilan yang berhubungan dengan motorik, misalnya menggambar, melukis, menulis, mengetik komputer, melakukan berbagai olahraga seperti bermain bola, berenang, dan masih banyak lagi</p>
                </div>

                <div class="services__content">
                    <h3 class="services__title">Aspek Bahasa</h3>
                    <p class="services__description">Dengan semakin majunya tingkat berpikir anak, anak lebih banyak bertanya tentang waktu dan sebab akibat. Apalagi ditambah dengan adanya pelajaran bahasa Indonesia di sekolah, maka diharapkan anak dapat memiliki keterampilan mengolah informasi yang Ia terima dan berpikir serta menyatakan pendapatnya</p>
                </div>

                <div class="services__content">
                    <h3 class="services__title">Aspek Kognitif</h3>
                    <p class="services__description">Tahapan ini ditandai dengan tiga kemampuan baru yang dikuasai oleh anak, yakni kemampuan menyusun, mengelompokkan, serta menghubungkan atau menghitung angka</p>
                </div>
            </div>
        </section>

        <!-- ========== RESULT DESCRIPTION =========== -->

        <section class="services section bd-container" id="services">
            <span class="section-subtitle"> Result Desciption </span>
            <h2 class="section-title">Tipe Sidik Jari</h2>
            <div class="services__container  bd-grid">
                <div class="services__content">
                    <div class="w-10">
                        <img src="../img/arch.png" width="80px" />
                    </div>
                    <div style="margin-top: 55px;">
                        <h3 class="services__title">Arch (Accidental)</h3>
                        <p class="services__description">Cenderung bersifat memegang nilai - nilai tradisional dan akhlak yang tinggi, tetap berpandangan tradisional mengenai ambisis, karier, dan kepemimpinan</p>
                    </div>
                </div>
                <div class="services__content">
                    <div class="w-10">
                        <img src="../img/left_loop.png" width="80px" />
                    </div>
                    <div style="margin-top: 40px;">
                        <h3 class="services__title">Left Loop</h3>
                        <p class="services__description">Cenderung bersifat serius dan mempunyai ingatan yang tinggi</p>
                    </div>
                </div>
            </div>
            <div class="services__container  bd-grid">
                <div class="services__content">
                    <div class="w-10">
                        <img src="../img/loop.png" width="80px" />
                    </div>
                    <div style="margin-top: 40px;">
                        <h3 class="services__title">Right Loop</h3>
                        <p class="services__description">Cenderung bersifat hati-hati, waspada, dan observatif. Tipe ini merupakan gabungan dari whorl dan loop</p>
                    </div>
                </div>
                <div class="services__content">
                    <div>
                        <img src="../img/whorl.png" width="80px" />
                    </div>
                    <div style="margin-top: 55px;">
                        <h3 class="services__title">Whorl (Plain Whorl)</h3>
                        <p class="services__description">Cenderung bersifat jujur, kritis, perfeksionis, kompetitif, komunikatif, dan berkemauan keras</p>
                    </div>
                </div>
                <div class="services__content">
                    <div>
                        <img src="../img/tented_arch.jpg" width="100px" />
                    </div>
                    <div style="margin-top: 40px;">
                        <h3 class="services__title">Tented Arch</h3>
                        <p class="services__description">Cenderung menunjukan antusiasme dan gairah, impulsif, dan terlibat secara mendalam dengan segala sesuatu yang ditanganinya</p>
                    </div>
                </div>
            </div>

        </section>

        <!--========== MENU ==========-->
        <section class="menu section bd-container" id="menu">
            <span class="section-subtitle">Monitoring</span>
            <h2 class="section-title">Result</h2>

            <div class="menu__container bd-grid">
                <div class="menu__content">
                    <img src="assets/img/plate1.png" alt="" class="menu__img">
                    <h3 class="menu__name">Chart 1</h3>
                    <span class="menu__detail">Pendiam</span>
                    <span class="menu__preci">belum ada isinya</span>
                    <a href="#" class="button menu__button"></i></a>
                </div>

                <div class="menu__content">
                    <img src="assets/img/plate2.png" alt="" class="menu__img">
                    <h3 class="menu__name">Chart 2</h3>
                    <span class="menu__detail">Aktif</span>
                    <span class="menu__preci">belum ada isinya</span>
                    <a href="#" class="button menu__button"></i></a>
                </div>

                <div class="menu__content">
                    <img src="assets/img/plate3.png" alt="" class="menu__img">
                    <h3 class="menu__name">Chart 3</h3>
                    <span class="menu__detail">Aktif</span>
                    <span class="menu__preci">belum ada isinya</span>
                    <a href="#" class="button menu__button"></i></a>
                </div>
            </div>
        </section>

        <!--===== APP =======-->
        <section class="app section bd-container">
            <div class="app__container bd-grid">
                <div class="app__data">
                    <span class="section-subtitle app__initial">Hasil</span>
                    <h2 class="section-title app__initial">Kepribadian anak</h2>
                    <p class="app__description">Belum ada isinya</p>
                    <div class="app__stores">

                    </div>
                </div>

                <img src="assets/img/movil-app.png" alt="" class="app__img">
            </div>
        </section>

        <!--========== CONTACT US ==========-->
        <!-- <section class="contact section bd-container" id="contact">
            <div class="contact__container bd-grid">
                <div class="contact__data">
                    <span class="section-subtitle contact__initial">Mari Diskusi</span>
                    <h2 class="section-title contact__initial">Contact us</h2>
                    <p class="contact__description">belum ada isinya</p>
                </div>

                <div class="contact__button">
                    <a href="#" class="button">Contact us now</a>
                </div>
            </div>
        </section> -->
    </main>

    <!--========== Logout ==========-->
    <!-- <section class="contact section bd-container" id="contact">
        <div class="contact__container bd-grid">
            <div class="contact__data">
                <span class="section-subtitle contact__initial">User 1</span>
            </div>

            <div class="contact__button">
                <a href="#" class="button">Logout</a>

            </div>
        </div>
    </section> -->

    </main>


    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
        <!-- <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">Monitoring Kepribadian Anak</a>
                <span class="footer__description">Teknik Komputer</span>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Services</h3>
                <ul>
                    <li><a href="#" class="footer__link">Deployment Website</a></li>
                    <li><a href="#" class="footer__link">Deployment Algorithm</a></li>
                    <li><a href="#" class="footer__link">Deployment Hardware</a></li>
                    <li><a href="#" class="footer__link">Maping</a></li>
                </ul>
            </div>

        <div class="footer__content">
            <h3 class="footer__title">Information</h3>
            <ul>
                <li><a href="#" class="footer__link">About us</a></li>
                <li><a href="#" class="footer__link">Contact us</a></li>
                <li><a href="#" class="footer__link">Privacy policy</a></li>
                <li><a href="#" class="footer__link">Terms of services</a></li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Adress</h3>
            <ul>
                <li>Bandung - Buahbatu</li>
                <li>Telkom University</li>
                <li>0852-8764-xxx</li>
                <li>monitoringKepribadian@email.com</li>
            </ul>
        </div>
        </div> -->

        <!-- <p class="footer__copy">&#169; 2023 Team Capstone Design. All right reserved</p> -->
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
</body>

</html>