<?php
    ### JSON_ENCODE vs JSON_DECODE
    
    $data = array("name" => "John", "age" => 30);
    echo '<div>';
    print_r($data);
    echo '</div>';

    //Serialization: json_encode() serializes PHP data structures into JSON strings, making it suitable for 
    // transmission or storage.


    // Encode PHP array to JSON string
    $jsonString = json_encode($data);
    echo '<div>' . $jsonString . '</div>'; // Output: {"name":"John","age":30}


    //Deserialization: json_decode() deserializes JSON strings, converting them back into PHP data structures for manipulation within the application.
    // json_decode( $json, $assoc = FALSE);
    //$json => the json string to be decoded
    //$assoc => boolean to choose if object will be converted into associative arrays

    // Decode JSON string to PHP array
    $decodedData = json_decode($jsonString, true);
    print_r($decodedData) . PHP_EOL; // Output: Array ( [name] => John [age] => 30 )
    
    ### END JSON_ENCODE vs JSON_DECODE

    ### $_SESSION

    //$_SESSION è una variabile globale utilizzata per mantenere "in sessione" delle variabili, es. per lingua, utente loggato ecc

    /*session is started if you don't write this line can't use $_Session  global variable*/
    session_start();

    $_SESSION["lang"]='it';

    echo '<div>';
    echo $_SESSION["lang"];
    echo '</div>';

    ### END $_SESSION
    

    ### SCOPE VARIABILI E ARROW FUNCTION

    //scope delle variabili
    function printJson($str){
        echo '<div>' . $str . '</div>';
    }

    printJson($jsonString);

    $apiUrl = "http://www.boredapi.com/api/activity";
    //arrow function
    $getApiData = fn() => json_decode(file_get_contents($apiUrl), true);

    //standard function
    // function getApiData(){
    //     return json_decode(file_get_contents($apiUrl), true);
    // }

    $apiData = $getApiData();

    print_r($apiData);

    ### END SCOPE VARIABILI E ARROW FUNCTION

    ### INCLUDE_ONCE E REQUIRE_ONCE

    // Quando dovrei usare require rispetto a include?

    // La funzione require() è identica a include(), tranne per quanto riguarda la gestione degli errori. Se si verifica un errore, 
    // la funzione include() genera un warning, ma lo script continuerà l'esecuzione. 
    // Il require() genera un errore fatale e lo script si interromperà.

    // Quando dovrei usare require_once rispetto a require?

    // L'istruzione require_once() è identica a require() eccetto per il fatto che PHP controlla se il file è già stato incluso e, in tal caso, 
    // non lo includerà (richiederà) nuovamente.

    // include_once fa la stessa cosa di include, ma controlla se il file è già stato caricato o meno per essere eseguito.

    ### END INCLUDE_ONCE E REQUIRE_ONCE

    ### VARIABLE ENCAPSULATION

    // public - the property or method can be accessed from everywhere. This is default
    // protected - the property or method can be accessed within the class and by classes derived from that class
    // private - the property or method can ONLY be accessed within the class

    ### END VARIABLE ENCAPSULATION

?>