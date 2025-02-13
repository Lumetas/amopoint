<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файла</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Загрузка файла</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".txt" required>
        <input type="submit" value="Загрузить">
    </form>

    <?php
	$allowedMimeTypes = ['text/plain'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file']['name'])) {
        $uploadDir = __DIR__ . '/files/';
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile) && in_array($_FILES['file']['type'], $allowedMimeTypes)) {
            echo '<div class="status success"></div>';
            $content = file_get_contents($uploadFile);
			$content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
            $delimiter = "\n"; // Заданный символ для разбиения
            $lines = explode($delimiter, $content);

            echo '<div class="result">';
            foreach ($lines as $line) {
                $digitCount = preg_match_all('/\d/', $line);
                echo "<p>$line <green>= $digitCount</green></p>";
            }
            echo '</div>';
        } else {
            echo '<div class="status error"></div>';
        }
    }
    ?>
</body>
</html>
