<?php

class ISBN {

    private $prefix;
    private $areaIdentifier;
    private $editorIdentifier;
    private $titleNumber;

    public function setPrefix($n) {
        if ($n !== 978 && $n !== 979) {
            throw new Exception("Error: El prefijo solo puede ser 978 o 979");
        }
        $this->prefix = $n;
    }

    public function getPrefix() {
        if ($this->prefix === null) {
            throw new Exception("Error: No prefix added.");
        }
        return $this->prefix;
    }

    public function setAreaIdentifier($n) {
        if (!is_int($n)) {
            throw new Exception("Error: solo dígitos numéricos");
        }
        if (strlen(strval($n)) > 5) {
            throw new Exception("Error: solo se manejan hasta 5 dígitos");
        }
        $areasId = [0, 1, 2, 3, 4, 5, 7, 80, 607, 950, 987, 956, 958, 980, 9974, 9972, 959];
        if (!in_array($n, $areasId, true)) {
            throw new Exception("Error: Dígito no asignado a ninguna área");
        }
        $this->areaIdentifier = $n;
    }

    public function getAreaIdentifier() {
        if ($this->areaIdentifier === null) {
            throw new Exception("Error: No area identifier added.");
        }
        return $this->areaIdentifier;
    }

    public function setEditorIdentifier($n) {
        if (!is_int($n)) {
            throw new Exception("Error: solo dígitos numéricos");
        }
        if (strlen(strval($n)) > 7) {
            throw new Exception("Error: solo se manejan hasta 7 dígitos");
        }
        $this->editorIdentifier = $n;
    }

    public function getEditorIdentifier() {
        if ($this->editorIdentifier === null) {
            throw new Exception("Error: No editor identifier added.");
        }
        return $this->editorIdentifier;
    }

    public function setTitleNumber($n) {
        if (!is_int($n)) {
            throw new Exception("Error: solo dígitos numéricos");
        }
        if (strlen(strval($n)) > 6) {
            throw new Exception("Error: solo se manejan hasta 6 dígitos");
        }
        $this->titleNumber = $n;
    }

    public function getTitleNumber() {
        if ($this->titleNumber === null) {
            throw new Exception("Error: No title number added.");
        }
        return $this->titleNumber;
    }

    public function calculateCheckDigit() {
        $isbn = $this->prefix . $this->areaIdentifier . $this->editorIdentifier . $this->titleNumber;
        $sum = 0;

        for ($i = 0; $i < strlen($isbn); $i++) {
            $sum += ($i % 2 === 0) ? $isbn[$i] * 1 : $isbn[$i] * 3;
        }

        return (10 - ($sum % 10)) % 10;
    }

    public function generateISBN() {
        return $this->prefix . '-' . $this->areaIdentifier . '-' . $this->editorIdentifier . '-' . $this->titleNumber . '-' . $this->calculateCheckDigit();
    }
}

// Uso de la clase/*
/*
try {
    echo "Hola. Ingresa los siguientes datos para obtener su ISBN.";
    $miIsbn = new ISBN();

    echo "Ingresa el prefijo ";
    $prefixNumber = intval(trim(fgets(STDIN)));
    $prefixNumber = 978;
    $miIsbn->setPrefix($prefixNumber);
    
    echo "Ingresa el identificador de area ";
    $areaIdentifierNumber = intval(trim(fgets(STDIN)));
    $miIsbn->setAreaIdentifier($areaIdentifierNumber);

    echo "Ingresa el identificador del editor ";
    $editorIdentifierNumber = intval(trim(fgets(STDIN)));
    $miIsbn->setEditorIdentifier($editorIdentifierNumber);

    echo "Ingresa el número del título ";    
    $titleNumber = intval(trim(fgets(STDIN)));
    $miIsbn->setTitleNumber($titleNumber);

    $newIsbn = $miIsbn->generateISBN();

    echo "Su ISBN es: $newIsbn";

} catch (Exception $e) {
    echo $e->getMessage();
}
*/
?>
