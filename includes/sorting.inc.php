<?php
    if($_POST['rating'] == 'lowest'){
        usort($reviews, function($a, $b){
            return $a->rating < $b->rating ? -1 : 1;
        });
    }
    if($_POST['rating'] == 'highest'){
        usort($reviews, function($a, $b){
            return $a->rating > $b->rating ? -1 : 1;
        });
    }
    if($_POST['date'] == 'oldest'){
        usort($reviews, function($a, $b){
            return (strtotime($a->reviewCreatedOnDate) < strtotime($b->reviewCreatedOnDate) ? -1 :1 );
        });
    }
    if($_POST['date'] == 'newest'){
        usort($reviews, function($a, $b){
            return (strtotime($a->reviewCreatedOnDate) > strtotime($b->reviewCreatedOnDate) ? -1 :1 );
        });
    }

    ?>
