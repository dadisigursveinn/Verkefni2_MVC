<?php  
//https://blog.udemy.com/php-mvc-framework-tutorial/ :D
//http://php-html.net/tutorials/model-view-controller-in-php/
/*class Book {
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
    sækja bókalista og bókalýsingu.

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
}*/
/*
class View {
    /*Tekur við input frá notanda ( request) 
    bregst við og uppfærir model eftir þörfum og
    sendir tilbaka viðeigandi view

    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function output() {
        return '<h1>' . $this->model->text .'</h1>';
    }
}*/



class Controller {
    /*Inniheldur alla “display logic” við 
    framsetningu gagna (myndun HTML). Hefur
    beinan aðgang að Model (get data). View 
    getur búið til callback (t.d. smellur)
    til Controller*/

    private $model;

    public function __construct (Model $model){
        $this -> model = $model;
    }

    public function invoke (){
        if (!isset ($_GET['book'])){
            return $this -> model -> getBookList ();
        }

        else{
            return $this -> model -> getBook ($_GET['book']);
        }
    }

    public function output (){
        return'<h1>' . $this -> model -> text . '</h1>';
    }

}

//initiate the triad
/*
$model = new Model();

//It is important that the controller and the view share the model

$controller = new Controller($model);

$view = new View($model);

echo $view->output();*/

$model = new Model ();

$controller = new Controller ($model);

echo $controller -> output ();

$books= $controller -> invoke ();

if ($_SERVER['REQUEST_METHOD'] === "GET"){
    if (isset ($_GET['book'])){
        echo "You selected " . $books -> name . " Version: " . $books -> edition . " Release year: " . $books -> releaseYear ;
        exit;
    }

}
?>
 
<form method="GET" action="" >

    <select name="book" >

        <?php
        foreach ($books as $x => $x_value){
            echo '<option value="'.$x.'">'.$x.'</option>';
        }
        ?>

    </select>

    <input type="submit" value="Select">

</form>
