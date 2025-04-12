<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $faces = ["A","Q","K","J","10","9","8","7","6","5","4","3","2"];
    $cards = ['&spades;', '&hearts;', '&clubs;', '&diams;'];
    $allcards = [];
    //get all cards in an allcards array
    foreach($cards as $card){
        foreach($faces as $face){
            $allcards[] = $card.$face;
        }
    }
    shuffle($allcards);
    // print_r($allcards);
    foreach($allcards as $card){
        echo $card . " ";
    }
    ?>
</body>
</html>