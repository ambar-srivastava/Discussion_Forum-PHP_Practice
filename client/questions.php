<div class="container">
    <h1 class="signup-heading my-5">Questions</h1>
    <div class="col-8">
        <?php
        include('./common/db.php');
        $query = "select * from questions";
        $result = $conn->query($query);
        foreach ($result as $row) {
            $title = $row["title"];
            $description = $row["description"];
            // $title = htmlspecialchars($row["title"]);
            // $description = htmlspecialchars($row["description"]);
            echo "<a href='#'>
            <div class='row question-box mb-4 p-3 border rounded shadow-sm'>
                <h4 class='mb-2'>$title</h4>
                <p class='mb-0 text-muted'>$description</p>
              </div>
        </a>";
        }
        ?>
    </div>
</div>