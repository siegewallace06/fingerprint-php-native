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


// Sample data array (you can make this dynamic)
$data = [
    [
        "model" => "Arch",
        "Desc" => "Cenderung bersifat memegang nilai-nilai tradisional dan akhlak yang tinggi, tetap berpandangan tradisional mengenai ambisi, karier, dan kepemimpinan."
    ],
    [
        "model" => "Left Loop",
        "Desc" => "Cenderung bersifat serius dan mempunyai ingatan visual yang tinggi"
    ],
    [
        "model" => "Right Loop",
        "Desc" => "Cenderung bersifat hati-hati, waspada, dan observatif. Tipe ini merupakan gabungan dari whorl dan loop"
    ],
    [
        "model" => "Tented Arch",
        "Desc" => "Cenderung menunjukkan antusiasme dan gairah, impulsif, dan terlibat secara mendalam dengan segala sesuatu yang ditanganinya"
    ],
    [
        "model" => "Whorl",
        "Desc" => "Cenderung bersifat jujur, kritis, perfeksionis, kompetitif, komunikatif, dan berkemauan keras."
    ],
    // You can have more data here...
];

// Function to find the dominant model from the data array
function findDominantModel($data)
{
    $modelCounts = array_count_values(array_column($data, 'model'));
    arsort($modelCounts);
    $dominantModel = key($modelCounts);
    return $dominantModel ? $dominantModel : $data[0]['model'];
}

// Find the dominant model or the first index if no dominant
$dominantModel = findDominantModel($data);

// Find the description of the dominant model
$dominantDesc = '';
foreach ($data as $item) {
    if ($item['model'] === $dominantModel) {
        $dominantDesc = $item['Desc'];
        break;
    }
}

function getMarginForModel($modelName)
{
    switch ($modelName) {
        case "Arch":
            return 65; // Set the margin value for Arch model
        case "Left Loop":
            return 55; // Set the margin value for Left Loop model
        case "Right Loop":
            return 55; // Set the margin value for Right Loop model
        case "Tented Arch":
            return 80; // Set the margin value for Tented Arch model
        case "Whorl":
            return 70; // Set the margin value for Whorl model
        default:
            return 0; // Set a default margin value
    }
}
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

    <style>
        .services__container__result {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            /* Adjust the gap as needed for spacing between grid items */
        }

        .services__content {
            text-align: center;
            /* Center content within each grid item */
        }

        .services__content img {
            width: 80px;
            /* Adjust the width of the images as needed */
        }

        /* Adjust spacing for the title within each grid item */
        .services__title {
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .result_content {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .profile-details {
            margin-left: 50px;
        }

        .description_model {
            display: flex;
            justify-content: center;
            margin-left: 500px;
            margin-right: 500px;
            text-align: center;
            margin-top: 50px;
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
                    <a href="#" class="button">Masukkan Sidik Jari
                        <a href="http://localhost/website/">
                            <input type="submit" />
                        </a>
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


        <section class="services section bd-container" id="services">
            <span class="section-subtitle">Result Description</span>
            <h2 class="section-title">Tipe Sidik Jari</h2>
            <div class="services__container__result bd-grid">
                <?php foreach ($data as $item) { ?>
                    <div class="services__content">
                        <div class="w-10">
                            <?php
                            // Replace the img element based on the data.model
                            switch ($item["model"]) {
                                case "Arch":
                                    echo '<img src="../img/arch.png" width="80px" />';
                                    break;
                                case "Left Loop":
                                    echo '<img src="../img/left_loop.png" width="80px" />';
                                    break;
                                case "Right Loop":
                                    echo '<img src="../img/loop.png" width="80px" />';
                                    break;
                                case "Tented Arch":
                                    echo '<img src="../img/tented_arch.jpg" width="100px" />';
                                    break;
                                case "Whorl":
                                    echo '<img src="../img/whorl.png" width="80px" />';
                                    break;
                                default:
                                    // You can add a default image here if needed
                                    break;
                            }
                            ?>
                        </div>
                        <div style="margin-top: <?php echo getMarginForModel($item["model"]); ?>px">
                            <h3 class="services__title"><?= $item["model"] ?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="services__container bd-grid">
            <div class="services__content">
                <div class="result_content">
                    <div class="w-10">
                        <img src="../img/arch.png" width="80px" />
                    </div>
                    <div>
                        <!-- <h3 class="services__title">Ibu Jari</h3> -->
                        <ul class="profile-details">
                            <li><strong>Username :</strong> <?php echo $username ?> </li>
                            <li><strong>Tanggal Lahir:</strong> <?php echo date('Y-m-d', strtotime($tanggalLahir)) ?> </li>
                            <li><strong>Umur :</strong> <?php echo $umur ?> </li>
                            <li><strong>Kelas :</strong> <?php echo $kelas ?> </li>
                        </ul>
                    </div>
                </div>
                <div class="description_model">
                    <span> Termasuk tipe sidik jari <strong><?php echo $dominantModel; ?></strong><br> <?php echo $dominantDesc; ?></span>
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