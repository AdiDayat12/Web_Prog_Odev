<?php
session_start();
require 'config.php';

if (isset($_POST['appointment'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        die();
    } else {
        $user_id = $_SESSION['user_id'];
        $ad_soyad = $_POST['ad_soyad'];
        $eposta = $_POST['eposta'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];

        $sql = "INSERT INTO appointments (user_id, ad_soyad, eposta, phone, appointment_date) VALUES ( '$user_id', '$ad_soyad', '$eposta', '$phone', '$date')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Randevu Alındı');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Dental Care</title>
        <link rel="stylesheet" href="index_style.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin"/>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,800;1,700&family=Roboto:wght@100;400&display=swap"
            rel="stylesheet"/>
    </head>
    <body>
        <!-- navigation start -->
        <nav class="navigation">
    <div class="logo">
        <a href="#" style="color: #000000">Dental<span style="color: #00ccad">Care.</span></a>
    </div>
    <div class="menu">
        <a href="#" class="menuLink" data-target="homeToTag">Anasayfa</a>
        <a href="#" class="menuLink" data-target="aboutToTag">Hakkinda</a>
        <a href="#" class="menuLink" data-target="hizmetToTag">Hizmetlerimiz</a>
        <a href="#" class="menuLink" data-target="yorumToTag">Yorumlar</a>
        <a href="#" class="menuLink" data-target="iletisimToTag">Iletisim</a>
    </div>
    <div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <button class="randevu-button menuLink" data-target="formToTag">Randevu Al</button>
        <?php endif; ?>
    </div>
    <div class="menu-container" onclick="myFunction(this)">
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="side-menu">
            <a href="#" class="menuLink" data-target="homeToTag">Anasayfa</a>
            <a href="#" class="menuLink" data-target="aboutToTag">Hakkinda</a>
            <a href="#" class="menuLink" data-target="hizmetToTag">Hizmetlerimiz</a>
            <a href="#" class="menuLink" data-target="yorumToTag">Yorumlar</a>
            <a href="#" class="menuLink" data-target="iletisimToTag">Iletisim</a>
            <?php if (isset($_SESSION['user_id'])): ?>
            <a href="my_app.php" class="randevu-button" class="menuLink">My Appointments</a>
            <a href="logout.php" class="randevu-button" class="menuLink">Logout</a>
        <?php else: ?>
            <a href="login.php" class="randevu-button" class="menuLink">Login</a>
            <a href="register.php" class="randevu-button" class="menuLink">Register</a>
        <?php endif; ?>
        </div>
    </div>
    <div class="auth-buttons">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="randevu.php" class="randevu-button">Randevularım</a>
            <a href="logout.php" class="randevu-button">Çıkış Yap</a>
        <?php else: ?>
            <a href="login.php" class="randevu-button">Giriş</a>
            <a href="register.php" class="randevu-button">Kayıt Ol</a>
        <?php endif; ?>
    </div>
</nav>


        <!-- navigation end -->

        <!-- home start -->
        <div id="homeToTag" class="menuDiv"></div>
        <div class="home">
            <div class="text">
                <p class="main-text">
                    Gülüşünüzü aydınlatmamıza izin<br/>verin
                </p>

                <p style="letter-spacing: 1px">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.
                </p>
                <br>
                <br>
                <!-- button -->
                <!-- <button class="randevu-button">Randevu Al</button> -->
                <button class="randevu-button menuLink" data-target="formToTag">Randevu Al</button>
            </div>

        </div>
        <!-- home end -->

        <!-- about start -->
        <div id="aboutToTag" class="menuDiv"></div>
        <br><br>
        <div class="about">
            <div>
                <img src="../images/about-img.jpg" alt=""/>
            </div>
            <div class="about-acklma">
                <p style="color: #00ccad;">Hakkinda</p>
                <p class="about-title">
                    Aileniz İçin Gerçek Sağlık Hizmeti
                </p>
                <p >
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi saepe nam
                    repellat dolorum, unde ratione ad facilis accusamus minus eum cupiditate
                    praesentium sed minima. Architecto, ullam! Nam, ducimus reiciendis. Iusto?
                </p>
                <br><br>
                <!-- button -->
                <button class="randevu-button menuLink" data-target="formToTag">Randevu Al</button>
            </div>
        </div>
        <!-- about end -->

        <!-- Hizmet start -->
        <div id="hizmetToTag" class="menuDiv"></div>
        <br>
        <br>
        <br>
        <div class="hizmet">
            <h1>Hizmetlerimiz</h1>
            <div class="hizmet-card">
                <div>
                    <img src="../images/icon1.png" alt="" class="icon1">
                    <h3>Alignment Specialist</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div>
                    <img src="../images/icon2.png" alt="" class="icon2">
                    <h3>Kozmetik Diş Hekimliği</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div >
                    <img src="../images/icon3.png" alt="" class="icon3">
                    <h3>Ağız Hijyeni Uzmanlığı</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div >
                    <img src="../images/icon1.png" alt="" class="icon4">
                    <h3>Kanal Tedavisi Uzmanı</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div >
                    <img src="../images/icon1.png" alt="" class="icon5">
                    <h3>Canlı Diş Hekimliği Danışmanlığı</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div >
                    <img src="../images/icon6.png" alt="" class="icon6">
                    <h3>Çürük Muayenesi</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

            </div>
        </div>
        <!-- hizmet end -->

        <!-- is sureci start -->
        <div class="sure">
            <div class="text-sure">
                <h1>İŞ SÜRECI</h1>
            </div>
            <div class="sure-wrap">
                <div>
                    <img src="../images/process-1.png" alt="" class="img-sure"/><br/>
                    <h2>Kozmetik Diş Hekimliği</h2><br>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit quaerat id
                        placeat rem at autem, vero commodi distinctio iste sit dignissimos facilis
                        asperiores perferendis ad, soluta ullam, sunt officiis aperiam?
                    </p>
                </div>
                <div>
                    <img src="../images/process-2.png" alt="" class="img-sure"/><br/>
                    <h2>Çocuk Diş Hekimliği</h2><br>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit quaerat id
                        placeat rem at autem, vero commodi distinctio iste sit dignissimos facilis
                        asperiores perferendis ad, soluta ullam, sunt officiis aperiam?
                    </p>
                </div>
                <div>
                    <img src="../images/process-3.png" alt="" class="img-sure"/><br/>

                    <h2>Diş İmplantları</h2><br>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit quaerat id
                        placeat rem at autem, vero commodi distinctio iste sit dignissimos facilis
                        asperiores perferendis ad, soluta ullam, sunt officiis aperiam?
                    </p>
                </div>
            </div>
        </div>
        <!-- is sureci end -->
        <!-- yorum start -->
        <div id="yorumToTag" class="menuDiv"></div>
        <br><br>
        <div class="yorum">
            <h1>Musteriler memnuniyeti</h1>

            <div class="yorum-block">
                <div><img src="../images/pic-1.png" alt="" class="img-yorum">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div><img src="../images/pic-1.png" alt="" class="img-yorum">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div><img src="../images/pic-1.png" alt="" class="img-yorum">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div><img src="../images/pic-1.png" alt="" class="img-yorum">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

            </div>
        </div>
        <!-- yorum end -->


         <!-- Randevu formu start -->
    <div id="formToTag" class="menuDiv"></div>
    <div class="form" id="form">
        <h1 id="text">Randevu Al</h1>
        <br/><br/>
        <form id="registrationForm" method="post">
            <label for="name">Adi Soyadi:</label>
            <input type="text" id="name" name="ad_soyad" required="required"  value="<?php echo $_SESSION['ad_soyad'] ?? ''; ?>"/>

            <label for="email">E-posta:</label>
            <input type="email" id="email" name="eposta" required="required"  value="<?php echo $_SESSION['email'] ?? ''; ?>"/>

            <label for="phone">Telepon Numarasi:</label>
            <input type="tel" id="phone" name="phone" required="required"/>

            <label for="date">Tarih:</label>
            <input type="date" id="date" name="date" required="required"/>

            <button type="submit" name="appointment" class="randevu-button">Randevu Al</button>
        </form>
    </div>
    <!-- randevu formu end -->



        <!-- footer -->
        <div id="iletisimToTag" class="menuDiv"></div>
        <div class="info">
            <div class="info-items">
                <div class="contact">
                    <p class="text-info">Telefon Numarasi</p>
                    <br>
                    <button class="info-button">0 555 555 55 55</button>
                    <button class="info-button">0 555 555 55 55</button>
                </div>
                <div class="address">
                    <p class="text-info">&nbsp;&nbsp;Address</p>

                </div>
                <div class="calisma-saati">
                    <p class="text-info">Calisma Saat</p>
                    <div class="schedule">
                        <p>Monday&nbsp;&nbsp; 08:00 - 17:00</p>
                        <p>Tuesday&nbsp;&nbsp; 08:00 - 17:00</p>
                        <p>Wednesday&nbsp;&nbsp; 08:05 - 16:00</p>
                        <p>Thursday&nbsp;&nbsp; 08:05 - 17:00</p>
                        <p>Friday&nbsp;&nbsp; 08:05 - 16:00</p>
                    </div>

                </div>
                <div class="email">
                    <p class="text-info">Email</p>
                </div>
            </div>

        </div>
        <hr>
        <footer>
            <p>Developed by :</p>
            <p>Adi Hidayat</p>
            <p>Emir Han Yilmaz</p>
            <p>Serhat</p>
            <p>Muhammad</p>
        </footer>
        <script src="script.js"></script>
    </body>
</html>