<?php
// HOCA KURALI: Şifre ve kullanıcı adı değişkenleri 
// DİKKAT: Aşağıdaki "b251210560" yazan yere KENDİ GERÇEK ÖĞRENCİ NUMARANI YAZ!
$ogrenci_no = "b251210560"; 
$dogru_mail = $ogrenci_no . "@sakarya.edu.tr";
$dogru_sifre = $ogrenci_no;

$hata_mesaji = "";
$giris_basarili = false;

// Form gönderildiğinde (POST işlemi) bu blok çalışır [cite: 19]
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gelen_mail = $_POST['email'] ?? '';
    $gelen_sifre = $_POST['sifre'] ?? '';

    // Boş alan kontrolü (JS geçilirse diye PHP önlemi) [cite: 19]
    if (empty($gelen_mail) || empty($gelen_sifre)) {
        $hata_mesaji = "Lütfen tüm alanları doldurun!";
    } 
    // Bilgiler doğruysa [cite: 19]
    elseif ($gelen_mail === $dogru_mail && $gelen_sifre === $dogru_sifre) {
        $giris_basarili = true;
    } 
    // Bilgiler hatalıysa [cite: 25]
    else {
        $hata_mesaji = "Kullanıcı adı veya şifre hatalı! Lütfen tekrar deneyin.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - Melih'in Portfolyosu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Melih'in Portfolyosu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="target" aria-controls="navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto flex-row gap-3">
                    <li class="nav-item"><a class="nav-link text-secondary" href="index.html">Hakkında</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="ozgecmis.html">Özgeçmiş (CV)</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="sehrim.html">Şehrim</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="mirasimiz.html">Mirasımız</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="vitrin.html">Vitrin</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="iletisim.html">İletişim</a></li>
                    <li class="nav-item ms-lg-3"><a class="btn btn-info btn-sm mt-1 fw-bold text-white" href="login.php">Giriş Yap</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <?php if ($giris_basarili): ?>
                    <div class="card shadow-lg border-0 rounded p-5 text-center bg-white">
                        <div class="mb-3">
                            <span style="font-size: 4rem;">✅</span>
                        </div>
                        <h2 class="text-success fw-bold mb-3">Giriş Başarılı!</h2>
                        <h4 class="text-dark">Hoşgeldiniz <?php echo htmlspecialchars($ogrenci_no); ?></h4>
                        <a href="index.html" class="btn btn-primary mt-4 px-4 py-2">Ana Sayfaya Dön</a>
                    </div>
                <?php else: ?>
                    <div class="card shadow-sm border-0 rounded p-4 bg-white">
                        <h3 class="text-center text-primary fw-bold mb-4">Öğrenci Girişi</h3>
                        
                        <?php if ($hata_mesaji): ?>
                            <div class="alert alert-danger text-center fw-bold"><?php echo $hata_mesaji; ?></div>
                        <?php endif; ?>

                        <form id="loginForm" method="POST" action="login.php" onsubmit="return formKontrol()">
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Kullanıcı Adı (Öğrenci Maili)</label>
                                <input type="text" class="form-control p-3 bg-light border-0" id="email" name="email" placeholder="Örn: b24... @sakarya.edu.tr">
                            </div>
                            <div class="mb-4">
                                <label for="sifre" class="form-label fw-bold">Şifre (Sadece Öğrenci No)</label>
                                <input type="password" class="form-control p-3 bg-light border-0" id="sifre" name="sifre" placeholder="Şifreniz">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Giriş Yap</button>
                        </form>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function formKontrol() {
            const email = document.getElementById('email').value.trim();
            const sifre = document.getElementById('sifre').value.trim();
            
            // 1. Boş Alan Kontrolü 
            if (email === "" || sifre === "") {
                alert("JavaScript Diyor ki: Lütfen kullanıcı adı ve şifre alanlarını boş bırakmayınız!");
                return false; // Formun PHP'ye gitmesini engeller
            }
            
            // 2. Mail Formatı Kontrolü (@ işareti var mı?) 
            if (!email.includes("@")) {
                alert("JavaScript Diyor ki: Lütfen geçerli bir mail adresi giriniz (Örn: b123...@sakarya.edu.tr)!");
                return false;
            }
            
            return true; // Hata yoksa PHP'ye gönder
        }
    </script>
</body>
</html>