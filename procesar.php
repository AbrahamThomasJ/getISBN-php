<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $prefix = (int) $_POST['prefix'];
    $areaIdentifier = (int) $_POST['areaIdentifier'];
    $editorIdentifier = (int) $_POST['editorIdentifier'];
    $titleNumber = (int) $_POST['titleNumber'];


    include 'isbn.php';

    try {
        
        $miIsbn = new ISBN();
    
   
       
        $miIsbn->setPrefix($prefix);
        

       
        $miIsbn->setAreaIdentifier($areaIdentifier);
    

        $miIsbn->setEditorIdentifier($editorIdentifier);
    

        $miIsbn->setTitleNumber($titleNumber);
    
        $newIsbn = $miIsbn->generateISBN();
    
      
    
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

?>