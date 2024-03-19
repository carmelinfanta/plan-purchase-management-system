<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Payment Success</title>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>


    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <header>
        <nav class="navbar navbar-expand-lg bg-grey">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <h2>SOCXO</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/dashboard">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/transaction">Transaction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" href="/signout">Signout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div style="padding:210px;" class="container d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="p-5 w-100 rounded bg-white border">
            <h1 class="mb-3">Payment Successful</h1>
            <p class="mb-3">Thankyou for your payment</p>
            <p class="mb-3">Reference Id : {{$ref_id}}</p>
            <a href="/dashboard" class="mb-3 btn btn-primary">Return to Dashboard</a>
        </div>
    </div>



    <footer style=" background-color:black; color: white; height:80px; display:flex;justify-content:center; align-items:center;">
        <div>
            <p class="text-white">&copy; 2024 SOCXO Solutions Private Limited.All rights reserved</p>
        </div>
    </footer>



    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0;

        function clearField(t) {
            if (!cleared[t.id]) {
                cleared[t.id] = 1;
                t.value = '';
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>