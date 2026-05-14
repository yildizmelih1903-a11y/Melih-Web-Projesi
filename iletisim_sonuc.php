<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaj Gönderildi - Melih'in Portfolyosu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="container">
    <div class="result-container">
        <div class="text-center mb-4">
            <h2 class="text-success fw-bold">Mesajınız Başarıyla İletildi!</h2>
            <p class="text-muted">Aşağıdaki bilgiler sistemimize kaydedilmiştir.</p>
        </div>

        <?php
        // Form gönderildiğinde (POST işlemi) bu blok çalışır
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Güvenlik için verileri temizleyerek alıyoruz
            $adSoyad = htmlspecialchars($_POST['adSoyad'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $telefon = htmlspecialchars($_POST['telefon'] ?? '');
            $konu = htmlspecialchars($_POST['konu'] ?? '');
            
            // Radio buton seçili gelmemişse
            $cinsiyet = isset($_POST['cinsiyet']) ? htmlspecialchars($_POST['cinsiyet']) : "Belirtilmedi";
            
            $mesaj = htmlspecialchars($_POST['mesaj'] ?? '');
            
            // Checkbox onay kontrolü
            $kvkk = isset($_POST['kvkk']) ? "Evet, Onaylandı" : "Hayır";

            // Verileri ekrana düzenli (Bootstrap tablosu) ile yazdırıyoruz
            // style="" yerine tablo-baslik class'ı kullanıldı
            echo "<table class='table table-bordered table-striped'>";
            echo "<tbody>";
            echo "<tr><th class='tablo-baslik'>Ad Soyad:</th><td>" . $adSoyad . "</td></tr>";
            echo "<tr><th>E-posta:</th><td>" . $email . "</td></tr>";
            echo "<tr><th>Telefon:</th><td>" . $telefon . "</td></tr>";
            echo "<tr><th>Konu:</th><td>" . $konu . "</td></tr>";
            echo "<tr><th>Cinsiyet:</th><td>" . $cinsiyet . "</td></tr>";
            echo "<tr><th>KVKK Onayı:</th><td><span class='badge bg-info'>" . $kvkk . "</span></td></tr>";
            echo "<tr><th>Mesaj:</th><td>" . nl2br($mesaj) . "</td></tr>";
            echo "</tbody>";
            echo "</table>";

        } else {
            // Eğer sayfaya doğrudan girmeye çalışılırsa hata mesajı ver
            echo "<div class='alert alert-danger text-center'>Lütfen formu doldurarak gelin!</div>";
        }
        ?>

        <div class="text-center mt-4">
            <a href="index.html" class="btn btn-primary px-4">Ana Sayfaya Dön</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>