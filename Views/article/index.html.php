<h2>Welcome to article Controller</h2>
<hr/>
<?php
$buttonlabel = "Créer";
include "form.html.php";
?>
<?php
    foreach($articles as $article){
        echo $article->getTitre();
    }
?>