<div class="container py-5">
    <h1 class="signup-heading">Login</h1>
    <form action="./server/requests.php" method="post">
        <div class="col-6 offset-sm-3 my-4">
            <label for="email" class="form-label">Enter Email Address</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email Address">
        </div>
        <div class="col-6 offset-sm-3 my-4">
            <label for="password" class="form-label">Enter Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" name="login" class="btn btn-primary col-6 offset-sm-3 my-2">Login</button>
    </form>
</div>