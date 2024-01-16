<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Enkripsi Caesar Cipher - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e6a4b4; 
            color: black; 
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f3d7ca;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: black; 
        }
        h6 {
            text-align: center;
            color: #FF9BD2; 
        }
        .menu {
            text-align: center;
            margin-bottom: 20px;
        }

        .menu a {
            margin: 0 15px;
            text-decoration: none;
            color:  #d63484; 
            font-weight: bold;
            font-size: 18px;
        }

        .menu a:hover {
            color: #503c3c;
            text-decoration: underline; 
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Enkripsi Caesar Cipher</h1>
        <h6>- Rahmayani -<h5>
        
        <!-- Menu -->
        <div class="menu"> 
            <a href="home.php">Home</a>
            <a href="encrypted.php?action=encrypt">Encrypt</a>
            <a href="decrypted.php?action=decrypt">Decrypt</a>
        </div>

        <!-- Konten untuk halaman home -->
        <p>Welcome To  Sistem Enkripsi/Dekripsi Caesar Cipher.</p>
        <p>Caesar Cipher adalah metode enkripsi sederhana yang melibatkan penggeseran karakter dalam alfabet dengan kunci tertentu, digunakan untuk menyembunyikan informasi dengan menggeser huruf-huruf dalam teks. Meskipun mudah diimplementasikan, Caesar Cipher rentan terhadap serangan kriptanalisis karena pola penggeseran huruf yang dapat dengan mudah ditemukan.</p>
        <p>Caesar Cipher mengenkripsi teks dengan menggeser setiap huruf sesuai dengan kunci penggeseran yang dipilih, memberikan keamanan sederhana tetapi rentan terhadap serangan kriptanalisis karena pola penggeseran yang dapat dengan mudah ditemukan. Proses dekripsi melibatkan penggeseran balik untuk mengembalikan teks asli.</p>
    </div>
</body>
</html>
