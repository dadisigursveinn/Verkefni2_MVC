<?php
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
?>