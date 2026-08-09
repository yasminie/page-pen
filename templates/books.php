<?php
require 'index.php';
$showSignIn = true;
if (isset($_SESSION['user_id'])) {
    $showSignIn = false;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LookaBook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .light {
            --bs-btn-color: #000;
            --bs-btn-bg: #dddfe0;
            --bs-btn-border-color: #dddfe0;
            --bs-btn-hover-color: #000;
            --bs-btn-hover-bg: #d3d4d5;
            --bs-btn-hover-border-color: #c6c7c8;
            --bs-btn-focus-shadow-rgb: 211, 212, 213;
            --bs-btn-active-color: #000;
            --bs-btn-active-bg: #c6c7c8;
            --bs-btn-active-border-color: #babbbc;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #000;
            --bs-btn-disabled-bg: #f8f9fa;
            --bs-btn-disabled-border-color: #f8f9fa;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .text-decoration-none {
            text-decoration: none !important;
        }

        .link-body-emphasis {
            color: RGBA(var(--bs-emphasis-color-rgb), var(--bs-link-opacity, 1)) !important;
            text-decoration-color: RGBA(var(--bs-emphasis-color-rgb), var(--bs-link-underline-opacity, 1)) !important;
        }

        .me-3 {
            margin-right: 1rem !important;
        }

        .py-2 {
            padding-top: .5rem !important;
            padding-bottom: .5rem !important;
        }

        .cover {
            object-fit: cover;
            width: 343px;
            height: 400px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .icon-square {
            width: 3rem;
            height: 3rem;
            border-radius: .75rem;
        }

        .d-grid {
            display: grid !important;
        }

        .gap-3 {
            gap: 1rem !important;
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar border-bottom">
            <a class="d-flex align-items-center link-body-emphasis text-decoration-none" href="home.php"><img
                    src="img/LookABook.png" width=250></a>
            <div class="d-flex d-flex flex-column justify-content-center">
                <nav class="px-3">
                    <a class="me-3 link-body-emphasis text-decoration-none" href="home.php">Books</a>
                    <a role="button" class="me-3 btn btn-light" href="#">Genre</a>
                    <a class="me-3 link-body-emphasis text-decoration-none" href="#">About Us</a>
                    <a class="me-3 link-body-emphasis text-decoration-none" href="#">Contact</a>
                    <?php if ($showSignIn) {
                    ?>
                        <a role="button" class="btn btn-outline-secondary me-3" style="border-radius: 8px;"
                            href="sign_in.html">Sign
                            In</a>
                        <a role="button" class="btn btn-dark me-3" style="border-radius: 8px;"
                            href="register.html">Register</a>

                    <?php
                    } else {
                    ?>
                        <a role="button" class="btn btn-outline-secondary me-3" style="border-radius: 8px;"
                            href="sign_in.html"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg></a>
                    <?php } ?>

                </nav>
            </div>
        </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="d-flex justify-content-center mt-5">
                <form method="post" action="books.php" class="w-100">
                <input class="form-control"
                    style="width: 100%; border-radius: 8px;" type="search"
                    name="keywords" id="user_input" placeholder="Search..." aria-label="Search">
                </form>
                <a href="books.php" role="button" class="btn btn-dark" id="search_btn" type="submit"
                    style="border-radius: 8px;">Search</a>
            </div>
        </div>
        <div class="container-fluid pb-3">
            <div class="d-grid gap-3" style="grid-template-columns: 1fr 3fr;">
                <div class="list-group bg-body-tertiary" style="width: 100%; border-radius: 8px; margin-top: 15%;">
                    <label class="list-group-item d-flex gap-2" style="border: none">
                        <h6 class="mt-3">Genre</h6>
                    </label>
                    <?php
                    $genre_query = "SELECT `genre`, count(*) FROM `Books` GROUP BY `genre`";
                    $genre_result = mysqli_query($con, $genre_query) or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($genre_result)) {
                    ?>
                        <label class="list-group-item d-flex gap-2" style="border: none">
                            <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked="">
                            <span>
                                &nbsp <?php echo $row['genre'] ?> &nbsp;
                            </span>
                            <span style="color: gray; text-align: right;">
                                (<?php echo $row['count(*)'] ?>)
                            </span>
                        </label>
                    <?php
                    }
                    ?>
                    <label class="list-group-item d-flex gap-2" style="border: none">
                        <h6 class="mt-3">Rating</h6>
                    </label>
                    <label class="list-group-item d-flex gap-2" style="border: none">
                        <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked="">
                        <span>
                            &nbsp 5 Stars
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2" style="border: none">
                        <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked="">
                        <span>
                            &nbsp 4 Stars
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2" style="border: none">
                        <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked="">
                        <span>
                            &nbsp 3 Stars
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2" style="border: none">
                        <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked="">
                        <span>
                            &nbsp 2 Stars
                        </span>
                    </label>
                    <label class="list-group-item d-flex gap-2" style="border: none">
                        <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked="">
                        <span>
                            &nbsp 1 Star
                        </span>
                    </label>
                </div>
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">
                        <div id="library" class="row row-cols-1 row-cols-2 row-cols-3 g-3">
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $keywords = $_POST['keywords'];
                                $books_query = "SELECT * FROM `Books` WHERE `title` LIKE '%$keywords%'";
                            } else {
                                $books_query = "SELECT * FROM `Books`";
                            }
                            $books_result = mysqli_query($con, $books_query) or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($books_result)) {
                            ?>
                                <div class="col">
                                    <div class="card shadow-sm" style="border-radius: 8px;">
                                        <a href="book_info.php?id=<?php echo $row['book_id']?>">
                                            <img class="bd-placeholder-img card-img-top cover"
                                                src="img/<?php echo $row['image_url'] ?>">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text" style="font-size: 24px;"><?php echo $row['title'] ?></p>
                                            <p class="card-text" style="font-size: 16px;"><?php echo $row['description_hash'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>