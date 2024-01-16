<?php
function caesarCipher($text, $shift, $action)
{
    $result = '';

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char);
            $asciiStart = $isUpperCase ? ord('A') : ord('a');
            $ascii = ord($char);
            $offset = $isUpperCase ? 26 : 26;

            if ($action === 'encrypt') {
                $newChar = chr(($ascii - $asciiStart + $shift) % $offset + $asciiStart);
            } else { // Change this block for decryption
                $newChar = chr(($ascii - $asciiStart - $shift + $offset * 2) % $offset + $asciiStart);
            }

            $result .= $newChar;
        } else {
            $result .= $char;
        }
    }

    return $result;
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$pageTitle = ($action === 'encrypt') ? 'Encryption' : 'Decryption';

// Check for the specific action from the form
$formAction = isset($_POST['formAction']) ? $_POST['formAction'] : $action;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Enkripsi Caesar Cipher - <?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
                body {
            font-family: 'Arial', sans-serif;
            background-color: #e6a4b4;
            margin: 0;
            padding: 0;
            color: black;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color:  #f3d7ca;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color:black;
        }

        .menu {
            text-align: center;
            margin-bottom: 20px;
        }

        .menu a {
            margin: 0 10px;
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 16px; /* Ukuran font menu */
        }

        .menu a:hover {
            color: #503c3c;
        }

        .cipher-form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color:  black;
        }

        textarea, input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button-container {
            text-align: center;
        }

        input[type="submit"] {
            background-color: #FF9BD2; ; /* Warna tombol */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9; /* Warna tombol saat dihover */
        }

        .result-container {
            margin-top: 20px;
            text-align: center;
        }

        textarea[readonly] {
            background-color: #ecf0f1; /* Warna latar belakang textarea readonly */
        }

        .encrypt-result {
            color: black; /* Warna teks hasil enkripsi */
        }

        .result-container {
            margin-top: 20px;
            text-align: center;
            color: black; /* Warna teks kontainer hasil */
        }

        .result-container .result-heading {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .encrypt-result {
            color: #2ecc71;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Enkripsi Caesar Cipher - Encryption</h1>
        
        <!-- Menu -->
        <div class="menu">
            <a href="home.php">Home</a>
            <a href="encrypted.php?action=encrypt">Encrypt</a>
            <a href="decrypted.php?action=decrypt">Decrypt</a>
        </div>

        <!-- Content for encryption/decryption page -->
        <form action="<?php echo ($formAction === 'encrypt') ? 'encrypted.php' : 'decrypted.php'; ?>" method="post" class="cipher-form">
            <input type="hidden" name="formAction" value="<?php echo $formAction; ?>">
            <label for="inputText">Enter Text:</label>
            <textarea name="inputText" rows="4" cols="50"><?php echo isset($_POST['inputText']) ? htmlspecialchars($_POST['inputText']) : ''; ?></textarea>

            <label for="shift">Enter Shift:</label>
            <input type="number" name="shift" min="1" max="25" value="<?php echo isset($_POST['shift']) ? $_POST['shift'] : '3'; ?>">

            <div class="button-container">
                <input type="submit" value="Encrypt" name="encrypt">
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputText = isset($_POST['inputText']) ? $_POST['inputText'] : '';
            $shift = isset($_POST['shift']) ? (int)$_POST['shift'] : 3;

            $result = caesarCipher($inputText, $shift, $formAction);

            echo '<div class="result-container ' . $formAction . '-result">';
            echo '<div class="result-heading">' . ucfirst($formAction) . ' Result:</div>';
            echo '<textarea id="outputText" rows="4" cols="50" readonly>' . htmlspecialchars($result) . '</textarea>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
