<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Todo List  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page"><i class="bi bi-person-check "></i> <?php echo $_SESSION['username'] . ' ' . $_SESSION['user_id']; ?></a>
                </li>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"> <i class="bi bi-house"></i> Home</a>

                </li>

                


                <li class="nav-item">
                    <a class="nav-link  text-danger" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>