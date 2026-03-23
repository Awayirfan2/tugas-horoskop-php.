<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Horoskop Sederhana - Anwar</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; max-width: 600px; margin: 40px auto; }
        form { margin: 30px 0; }
        input, button { padding: 10px; font-size: 16px; }
        .hasil { background: #e0f7fa; padding: 20px; border-radius: 10px; margin-top: 30px; }
    </style>
</head>
<body>
<h1>Cek Zodiakmu Sekarang!</h1>
<form method="POST">
    <label>Masukkan Tanggal Lahir:</label><br><br>
    <input type="date" name="tgl_lahir" required><br><br>
    <button type="submit">Cek Zodiak</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['tgl_lahir'])) {
    $date = new DateTime($_POST['tgl_lahir']);
    $day = (int)$date->format('d');
    $month = (int)$date->format('m');

    function getZodiak($d, $m) {
        if (($m == 3 && $d >= 21) || ($m == 4 && $d <= 19)) return ["Aries", "Berani, energik, suka memimpin, impulsif."];
        if (($m == 4 && $d >= 20) || ($m == 5 && $d <= 20)) return ["Taurus", "Setia, sabar, suka kenyamanan, keras kepala."];
        if (($m == 5 && $d >= 21) || ($m == 6 && $d <= 20)) return ["Gemini", "Cerdas, komunikatif, adaptable, gampang bosan."];
        if (($m == 6 && $d >= 21) || ($m == 7 && $d <= 22)) return ["Cancer", "Perhatian, emosional, protektif, moody."];
        if (($m == 7 && $d >= 23) || ($m == 8 && $d <= 22)) return ["Leo", "Percaya diri, dermawan, karismatik."];
        if (($m == 8 && $d >= 23) || ($m == 9 && $d <= 22)) return ["Virgo", "Detail, praktis, analitis, perfeksionis."];
        if (($m == 9 && $d >= 23) || ($m == 10 && $d <= 22)) return ["Libra", "Adil, sosial, harmonis, susah memutuskan."];
        if (($m == 10 && $d >= 23) || ($m == 11 && $d <= 21)) return ["Scorpio", "Intens, misterius, penuh gairah."];
        if (($m == 11 && $d >= 22) || ($m == 12 && $d <= 21)) return ["Sagittarius", "Petualang, optimis, jujur."];
        if (($m == 12 && $d >= 22) || ($m == 1 && $d <= 19)) return ["Capricorn", "Disiplin, ambisius, bertanggung jawab."];
        if (($m == 1 && $d >= 20) || ($m == 2 && $d <= 18)) return ["Aquarius", "Inovatif, independen, humanis."];
        if (($m == 2 && $d >= 19) || ($m == 3 && $d <= 20)) return ["Pisces", "Imajinatif, empati tinggi, romantis."];
        return ["Error", "Tanggal tidak valid."];
    }

    list($zodiak, $sifat) = getZodiak($day, $month);
    echo "<div class='hasil'>";
    echo "<h2>Zodiak: " . $zodiak . "</h2>";
    echo "<p>Sifat dasar: " . $sifat . "</p>";
    echo "<p>Tanggal lahir: " . $date->format('d F Y') . "</p>";
    echo "</div>";
}
?>
</body>
</html>