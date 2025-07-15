<div>
    <h1 class="signup-heading my-5">Categories</h1>
    <?php
    include('./common/db.php');
    $query = "SELECT * from category";
    $result = $conn->query($query);
    foreach ($result as $row) {
        $id = $row["id"];
        $name = htmlspecialchars($row["name"]);
        echo "
            <div class='question-box mb-4 p-3 border rounded shadow-sm'>
            <a href='?c-id=$id'>
                <h4>$name</h4>
            </a>
            </div>
        ";
    }
    ?>
</div>