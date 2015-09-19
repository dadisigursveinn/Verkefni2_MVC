<?php
class Book {
    public $name;
    public $edition;
    public $releaseYear;

    public function __construct($name, $edition, $releaseYear)
    {
        $this->name = $name;
        $this->edition = $edition;
        $this->releaseYear = $releaseYear;
    }
}
class Model {
    /*Halda þarf utan um nafn bókar, 
    útgáfu og útgáfuár. Aðferðir sem sjá um að
    sækja bókalista og bókalýsingu.*/

    public $text;

    public function __construct() {
        $this->text = 'Bókaverzlun Daða Sigursveins';
    }        

    public function getBookList(){
        return array(
            'The Hobbit' => new Book ('The Hobbit, or There and Back Again', '1', '1937'),
            'The Fellowship of the Ring' => new Book ('Lord of the Rings: The Fellowship of the Ring', '1', '1954'),
            'The Two Towers' => new Book ('Lord of the Rings: The Two Towers', '1', '1954'),
            'The Return of the King' => new Book ('Lord of the Rings: The Return of the King', '1', '1955')
            );
    }

    public function getBook ($name){
        $allBooks = $this -> getBookList ();
        return $allBooks [$name];
    }
}
?>