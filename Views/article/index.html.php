<h2>Welcome to article Controller</h2>

<?php
foreach($articles as $article){
    //var_dump($article);
    echo $article['titre'];
    echo"<hr/>";
}
?>
<hr/>
<?= $onearticle['titre'] ?>