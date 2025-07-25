<nav class="navbar navbar-light bg-light navbar-expand-md">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">
            <img src="./public/logo.png" width="130" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Latest Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <?php
                if ($username = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : null) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./server/requests.php?logout=true">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ask=true">Ask a Question</a>
                    </li>
                <?php } ?>

                <?php
                if (!$username = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : null) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?login=true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?signup=true">Signup</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>