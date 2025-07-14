 <select name="category_id" id="category" class="form-select text-capitalize">
     <option value="">Select a Category</option>
     <?php
        include("./common/db.php");
        $query = "select * from category";
        $result = $conn->query($query);
        foreach ($result as $row) {
            $name = $row["name"];
            $id = $row["id"];
            echo "<option value=$id>$name</option>";
        }
        ?>
 </select>