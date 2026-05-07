<?php
// Sayfa açıldığında herhangi bir hata mesajı olmaması için değişkeni boş tanımlıyoruz
$mesaj = "";

// Eğer form gönderildiyse (POST işlemi yapıldıysa) bu blok çalışır
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici = $_POST['kullanici'];
    $sifre = $_POST['sifre'];

    // Basit bir şifre kontrolü simülasyonu (Veritabanı olmadan)
    if ($kullanici == "melih" && $sifre == "12345") {
        $mesaj = "<div class='alert alert-success mt-3'>Giriş Başarılı! Yönetim paneline yönlendiriliyorsunuz...</div>";
        // Gerçek bir projede burada session (oturum) başlatılıp admin paneline yönlendirme yapılır.
    } else {
        $mesaj = "<div class='alert alert-danger mt-3'>Hatalı kullanıcı adı veya şifre! Lütfen tekrar deneyin.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { max-width: 400px; width: 100%; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <div class="card login-card p-4 border-0 bg-white">
        <div class="card-body text-center">
            <h2 class="fw-bold text-primary mb-4">Admin Girişi</h2>
            
            <form action="login.php" method="POST">
                <div class="mb-3 text-start">
                    <label for="kullanici" class="form-label fw-bold">Kullanıcı Adı</label>
                    <input type="text" class="form-control bg-light" id="kullanici" name="kullanici" required placeholder="Kullanıcı adınızı girin">
                </div>
                <div class="mb-3 text-start">
                    <label for="sifre" class="form-label fw-bold">Şifre</label>
                    <input type="password" class="form-control bg-light" id="sifre" name="sifre" required placeholder="Şifrenizi girin">
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mt-2">Giriş Yap</button>
            </form>

            <?php echo $mesaj; ?>

            <div class="mt-4">
                <a href="index.html" class="text-secondary text-decoration-none small">← Portfolyoya Dön</a>
            </div>
        </div>
    </div>

</body>
</html>