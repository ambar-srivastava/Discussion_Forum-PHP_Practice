    <div>
        <h5>Answers: </h5>
        <div class="container">
            <?php
            $query = "SELECT * FROM answers WHERE question_id = $qid";
            $result = $conn->query($query);
            foreach ($result as $row) {
                $answer = $row["answer"];
                echo "<div class='row'>
            <p class='answer-wrapper'>$answer</p>
        </div>";
            }
            ?>
        </div>
    </div>