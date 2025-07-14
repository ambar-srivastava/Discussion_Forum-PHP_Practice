<div class="container py-5">
    <h1 class="signup-heading">Signup</h1>
    <form method="post" action="./server/requests.php">
        <div class="col-6 offset-sm-3 my-4">
            <label for="username" class="form-label">Enter your username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
        </div>
        <div class="col-6 offset-sm-3 my-4">
            <label for="email" class="form-label">Enter Email Address</label>
            <input type="text" class="form-control" id="email" placeholder="Email Address" name="email">
        </div>
        <div class="col-6 offset-sm-3 my-4">
            <label for="password" class="form-label">Enter Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="col-6 offset-sm-3 my-4">
            <label for="address" class="form-label">Enter Your Address</label>
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
        </div>
        <button type="submit" name="signup" class="btn btn-primary col-6 offset-sm-3 my-2">Signup</button>
    </form>
</div>