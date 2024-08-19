<?php
include 'procesar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>

        <h1>Obten tu ISBN</h1>

        <form method="post" action="index.php">
            <label for="prefix">Prefix:</label><br>
            <input type="number" id="prefix" name="prefix" min="978" max="979" step="1" required><br><br>

            <label for="prefix">Area Identifier:</label><br>
            <input type="number" id="areaIdentifier" name="areaIdentifier" min="0" max="99999" step="1" required><br><br>

            <label for="prefix">Editor Identifier:</label><br>
            <input type="number" id="editorIdentifier" name="editorIdentifier" min="1" max="9999999" step="1" required><br><br>

            <label for="prefix">Title Number:</label><br>
            <input type="number" id="titleNumber" name="titleNumber" min="1" max="999999" step="1" required><br><br>

            <input type="submit" value="Obtener ISBN">
            
        </form>
    
       

        <div>
            <p>Tu ISBN es: <?php if(isset($newIsbn)) echo $newIsbn ?></p>
        </div>





    </main>
    
</body>
</html>