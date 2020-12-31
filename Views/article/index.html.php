<h2>Welcome to article Controller</h2>
<hr/>
<?php
    foreach($articles as $article){
        echo $article->getTitre();
    }
?>