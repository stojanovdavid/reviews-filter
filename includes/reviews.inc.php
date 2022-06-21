<?php


$data = file_get_contents('reviews.json');
$reviews = json_decode($data);
$ratings = [];
foreach($reviews as $key => $review){
    if(!in_array($review->rating, $ratings)){
        $ratings[] = $review->rating;
    }
}