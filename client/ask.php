<div class="container py-5">
    <h1 class="signup-heading">Ask Your Question</h1>
    <form action="./server/requests.php" method="post" name="ask">
        <div class="col-md-6 offset-md-3 my-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter question">
        </div>
        <div class="col-md-6 offset-md-3 my-4">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Enter description"></textarea>
        </div>
        <div class="col-md-6 offset-md-3 my-4">
            <label for="category" class="form-label">Category</label>
            <?php 
                include('category.php')
            ?>
        </div>
        <button type="submit" name="ask" class="btn btn-primary offset-md-3 my-2 col-md-6">Ask Question</button>
    </form>
</div>