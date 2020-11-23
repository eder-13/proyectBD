<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project6 | Cover</title>
    <link rel="stylesheet" href="styles/bootstrap.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="styles/cover.css">
</head>


<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Project6</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link" href="signin.php">Sign In</a>
                    <a class="nav-link" href="contact.php">Contact</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Control your staff and more.</h1>
            <p class="lead">Project6 is an application that allows you to have fully control over your staff and make
                better and faster the payment's proccess. Forget about calculators using Project6!</p>
            <p class="lead">
                <a href="signin.php" class="btn btn-lg btn-secondary">Sign In</a>
            </p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>&copy; Proyect6 - 2020</p>
                <p>Author: <span class="text-secondary">Ernesto D. Escariz Ramos</span></p>
            </div>
        </footer>
    </div>



    <?php include("footer.php")?>
</body>

</html>