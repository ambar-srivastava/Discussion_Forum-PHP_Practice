<div class="container px-4">
    <div class="row">
        <div class="col-md-8">
            <h1 class="signup-heading my-5">Questions</h1>
            <?php
            include('./common/db.php');
            if (isset($_GET['c-id'])) {
                $query = "SELECT * FROM questions WHERE category_id = $cid";
            } else {
                $query = "SELECT * FROM questions";
            }
            $result = $conn->query($query);
            foreach ($result as $row) {
                $id = $row["id"];
                $title = htmlspecialchars($row["title"]);
                $description = htmlspecialchars($row["description"]);
                echo "<a href='?q-id=$id'>
            <div class='question-box mb-4 p-3 border rounded shadow-sm'>
                <h4 class='mb-2'>$title</h4>
              </div>
        </a>";
            }
            ?>
        </div>
        <div class="col-md-4">
            <?php
            include('category-list.php')
            ?>
        </div>
    </div>
</div>