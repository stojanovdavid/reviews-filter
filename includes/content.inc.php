<div class="container px-3">
        <form action="" method="POST" class="p-3">
            <div class="form-group">
                <label for="rating">Order by rating</label> <br>
                <select name="rating" id="rating" class="form-control">
                    <option value=""></option>
                    <option value="highest">Highest First</option>
                    <option value="lowest">Lowest First</option>
                </select> <br>
            </div>
            <div class="form-group">
                <label for="date">Order by date:</label> <br>
                <select name="date" id="date" class="form-control">
                    <option value=""></option>
                    <option value="oldest">Oldest First</option>
                    <option value="newest">Newest First</option>
                </select> <br>
            </div>
            <div class="form-group">
            <label for="">Minimum rating</label>
                <select name="rating_min" id="rating_min" class="form-control">
                    <option value=""></option>
                    <?php foreach($ratings as $key => $rating): ?>
                        <option value="<?= $rating  ?>"><?= $rating  ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
            <label for="">Prioritize by text</label> <br>
                <select name="prioritize" id="prioritize" class="form-control">
                    <option value=""></option>
                    <option value="Yes" name="prioritize">Yes</option>
                    <option value="No" name="prioritize">No</option>
                </select>
            </div>
            <input type="submit" name="Submit">
        </form>

        <?php include('sorting.inc.php') ?>

        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Review ID</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Date</th>
                    <th scope="col">Text</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($reviews as $review) :?>
                    <?php if($_POST['prioritize'] == "Yes") :?>
                        <?php if($review->reviewFullText !== ""): ?>
                            <?php if($_POST['rating_min'] <= $review->rating) : ?>
                                <tr>
                                    <td><?= $review->reviewId ?></td>
                                    <td><?= $review->rating ?></td>
                                    <td><?= date('Y-m-d h:i:s', strtotime($review->reviewCreatedOnDate)) ?></td>
                                    <td><?= $review->reviewFullText ?></td>
                                </tr>
                            <?php endif ?>
                        <?php endif ?>
                    <?php else : ?>
                        <?php if($_POST['rating_min'] <= $review->rating) : ?>
                            <tr>
                                <td><?= $review->reviewId ?></td>
                                <td><?= $review->rating ?></td>
                                <td><?= date('Y-m-d h:i:s', strtotime($review->reviewCreatedOnDate)) ?></td>
                                <td><?= $review->reviewFullText ?></td>
                            </tr>
                        <?php endif ?>
                    <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>