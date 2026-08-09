<?php
require 'index.php';
$showSignIn = true;
if (isset($_SESSION['user_id'])) {
    $showSignIn = false;
}
$user_id = $_SESSION['user_id'];

$book_id = $_GET['id'];
$query = "SELECT * FROM `Books` WHERE `book_id` = '$book_id'";
$result = mysqli_query($con, $query);
$book = mysqli_fetch_row($result);

$review_query = "SELECT * FROM `SurveyResults` WHERE `user_id` = '$user_id' AND `book_id` = '$book_id'";
$review_result = mysqli_query($con, $review_query) or die(mysqli_error($con));

$avg_query = "SELECT * FROM `SurveyResults` WHERE `book_id` = '$book_id'";
$avg_result = mysqli_query($con, $avg_query) or die(mysqli_error($con));

$num = 0;
if (mysqli_num_rows($review_result)) {
    $review = mysqli_fetch_row($review_result);
    $num = $review[3];
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
            width: 406px;
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
                    <a class="me-3 link-body-emphasis text-decoration-none" href="books.php">Genre</a>
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
        <div class="container-fluid pb-3 mt-5" style="width: 80%;">
            <div class="d-grid gap-3" style="grid-template-columns: 1fr 3fr;">
                <div class="bg-body-tertiary rounded-3">
                    <img src="img/<?php echo $book[7] ?>" style="border-radius: 8px; height: 500px">
                </div>
                <div class="bg-body-tertiary rounded-3" >
                    <div class="container">
                        <h1><?php echo $book[2] ?></h1>
                        <h2><?php echo $book[3] ?></h2>
                        <div>
                            <?php if ($num < 1) { ?>
                                <a style="color: black;" href="rating.php?star=1&id=<?php echo $book_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                    </svg></a>
                            <?php } else { ?>
                                <a style="color: black;" href="rating.php?star=1&id=<?php echo $book_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg></a>
                            <?php } ?>
                            <?php if ($num < 2) { ?>
                                <a style="color: black" href="rating.php?star=2&id=<?php echo $book_id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                    </svg></a>
                            <?php } else { ?>
                                <a style="color: black" href="rating.php?star=2&id=<?php echo $book_id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg></a>
                            <?php } ?>
                            <?php if ($num < 3) { ?>
                                <a style="color: black" href="rating.php?star=3&id=<?php echo $book_id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                    </svg></a>
                            <?php } else { ?>
                                <a style="color: black" href="rating.php?star=3&id=<?php echo $book_id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg></a>
                            <?php } ?>
                            <?php if ($num < 4) { ?>
                                <a style="color: black" href="rating.php?star=4&id=<?php echo $book_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                    </svg></a>
                            <?php } else { ?>
                                <a style="color: black" href="rating.php?star=4&id=<?php echo $book_id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg></a>
                            <?php } ?>
                            <?php if ($num < 5) { ?>
                                <a style="color: black" href="rating.php?star=5&id=<?php echo $book_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                    </svg></a>
                            <?php } else { ?>
                                <a style="color: black" href="rating.php?star=5&id=<?php echo $book_id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg></a>
                            <?php } ?>
                            <?php 
                            
                            $sum = 0;
                            $count = 0;
                            while ($curr_row = mysqli_fetch_array($avg_result)) {
                                $sum = $sum + $curr_row['rating'];
                                $count = $count + 1;
                            }
                            if ($count == 0) {
                                echo "No ratings yet";
                            } else {
                                $avg = $sum / $count;
                                echo $avg;
                            }
                            ?>
                        </div>
                        <h5 style="color: gray">Published: <?php echo $book[6] ?></h5>
                        <h5 style="color: gray">Genre: <?php echo $book[5] ?></h5>
                        <h5><?php echo $book[4] ?></h5>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>