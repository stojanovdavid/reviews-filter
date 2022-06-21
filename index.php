<?php


$data = file_get_contents('reviews.json');
$reviews = json_decode($data);
$ratings = [];
foreach($reviews as $key => $review){
    if(!in_array($review->rating, $ratings)){
        $ratings[] = $review->rating;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="rating">Order by rating</label> <br>
        <select name="rating" id="rating">
            <option value="highest">Highest First</option>
            <option value="lowest">Lowest First</option>
        </select> <br>
        <label for="date">Order by date:</label> <br>
        <select name="date" id="date">
            <option value="">Oldest First</option>
            <option value="">Newest First</option>
        </select> <br>
        <label for="">Minimum rating</label>
        <select name="rating_min" id="rating_min">
            <?php foreach($ratings as $key => $rating): ?>
                <option value="<?= $rating  ?>"><?= $rating  ?></option>
            <?php endforeach ?>
        </select>
        <label for="">Prioritize by text</label> <br>
        <select name="prioritize" id="prioritize">
            <option value="Yes" name="prioritize">Yes</option>
            <option value="No" name="prioritize">No</option>
        </select>
        <input type="submit" name="Submit">
    </form>

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

    ?>

    <table>
        <tr>
            <th>Review Id</th>
            <th>Rating</th>
            <th></th>
        </tr>
        <?php foreach($reviews as $review) :?>
        <tr>
                <td><?= $review->reviewId ?></td>
                <td><?= $review->rating ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script src="index.js"></script>
</body>
</html>


