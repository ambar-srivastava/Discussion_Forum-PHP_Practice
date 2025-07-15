<div class="container">

    <div class="row">
        <div class="col-md-8">
            <h1 class="signup-heading my-5">Question and Answers</h1>
            <?php
            include('./common/db.php');
            $query = "SELECT * FROM questions WHERE id = $qid";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $cid = $row["category_id"];
            echo "<div class='mb-4'>
                <h4 class='mb-3 text-dark fw-semibold'>Question: " . htmlspecialchars($row['title']) . "</h4>
                <p class='text-secondary'>Description: " . nl2br(htmlspecialchars($row['description'])) . "</p>
              </div>";
            include("answers.php");
            ?>
            <br>
            <form action="./server/requests.php" method="post">
                <div class="mb-3"> <input type="hidden" name="question_id" value="<?php echo $qid; ?>">
                    <label for="answer" class="form-label fw-semibold">Your Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4"
                        placeholder="Type your answer here..."></textarea>
                </div>
                <button type="submit" class="btn btn-success px-4">Submit Answer</button>
            </form>
        </div>
        <div class="col-md-4">
            <?php
            $catQuery = "SELECT name FROM category WHERE id = $cid";
            $catResult = $conn->query($catQuery);
            $categoryName = "Unknown Category";
            if ($catResult && $catRow = $catResult->fetch_assoc()) {
                $categoryName = ucfirst($catRow['name']);
            }
            echo "<h1 class='signup-heading my-5'>$categoryName</h1>";
            $query = "SELECT * FROM questions WHERE category_id=$cid and id!=$qid";
            $result = $conn->query($query);
            foreach ($result as $row) {
                $id = $row["id"];
                $title = $row["title"];
                echo "<div class='question-box'>
                    <h4><a href='?q-id=$id'>$title</a></h4>
                </div>";
            }
            ?>
        </div>
    </div>
</div>