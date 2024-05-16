<?php

// Supponiamo di avere una piattaforma web per la gestione di prodotti e abbiamo bisogno di gestire diversi tipi di prodotti come libri, elettronica 
// e abbigliamento. Possiamo utilizzare l'ereditarietà per gestire questi diversi tipi di prodotti in modo più efficiente.

// Classe padre: Prodotto
class Prodotto
{
    protected $nome;
    protected $prezzo;

    public function __construct($nome, $prezzo)
    {
        $this->nome = $nome;
        $this->prezzo = $prezzo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getPrezzo()
    {
        return $this->prezzo;
    }

    public function getInfo()
    {
        return "Nome: " . $this->nome . ", Prezzo: $" . $this->prezzo;
    }
}

// Classe figlia: Libro
class Libro extends Prodotto
{
    protected $autore;

    public function __construct($nome, $prezzo, $autore)
    {
        parent::__construct($nome, $prezzo);
        $this->autore = $autore;
    }

    public function getAutore()
    {
        return $this->autore;
    }

    public function getInfo()
    {
        return parent::getInfo() . ", Autore: " . $this->autore;
    }
}

// Classe figlia: Elettronica
class Elettronica extends Prodotto
{
    protected $marca;

    public function __construct($nome, $prezzo, $marca)
    {
        parent::__construct($nome, $prezzo);
        $this->marca = $marca;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getInfo()
    {
        return parent::getInfo() . ", Marca: " . $this->marca;
    }
}

// Classe figlia: Abbigliamento
class Abbigliamento extends Prodotto
{
    protected $taglia;

    public function __construct($nome, $prezzo, $taglia)
    {
        parent::__construct($nome, $prezzo);
        $this->taglia = $taglia;
    }

    public function getTaglia()
    {
        return $this->taglia;
    }

    public function getInfo()
    {
        return parent::getInfo() . ", Taglia: " . $this->taglia;
    }
}

// Classe figlia: Computer
class Computer extends Prodotto
{
    private $os;

    public function __construct($nome, $prezzo){
        parent::__construct($nome, $prezzo);
    }

    //setter
    public function setOS($os){
        if(strlen($os)>2){
            $this->os = $os;
        } else {
            throw new Exception("Il sistema operativo non può essere vuoto");
        }
    }

    public function getInfo()
    {
        return parent::getInfo() . ", OS: " . $this->os;
    }
}

//Prodotto è padre delle istanze sotto, posso sfruttarlo per creare un metodo 
//che stampi le diverse entità (ereditarietà)
function getInfoProdotto(Prodotto $prodotto){
    echo $prodotto->getInfo() . "<br>";
}

// Utilizzo delle classi
$libro = new Libro("Il signore degli anelli", 20, "J.R.R. Tolkien");
getInfoProdotto($libro);
// $libro->getInfo()  . "<br>";

$elettronica = new Elettronica("Smartphone", 500, "Samsung");
getInfoProdotto($elettronica);
// $elettronica->getInfo()  . "<br>";

$abbigliamento = new Abbigliamento("Maglietta", 30, "L");
getInfoProdotto($abbigliamento);
// $abbigliamento->getInfo()  . "<br>";

//Richiamo metodo d'istanza
$libro->getInfo();

//setting private instance variable from outside the class
$pc = new Computer('Acer', '1299');
//this will be an error because of setter logic
$pc->setOS('ac');
//this will be good
// $pc->setOS('Windows');

getInfoProdotto($pc);

