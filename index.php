<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bókaverzlun</title>
</head>
<body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<div class="text-center">
<?php
/*class View {
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
include("../model/model.php");
include("../controller/controller.php");
$model = new Model ();

$controller = new Controller ($model);

echo $controller -> output ();

$books= $controller -> invoke ();

if ($_SERVER['REQUEST_METHOD'] === "GET"){
    if (isset ($_GET['book'])){
        echo "You selected " . $books -> name . " Version: " . $books -> edition . " Release year: " . $books -> releaseYear ;
        echo "<br><button type=\"button\" onclick=\"history.back();\">Back</button>";
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
<br>
<a href="https://github.com/dadisigursveinn/Verkefni2_MVC">Kóði</a>
</div>
</body>

</html>