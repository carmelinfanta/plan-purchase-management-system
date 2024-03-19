<?php $count = 0; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Transaction Details</title>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

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






    <div style="padding:220px;" class="container  d-flex justify-content-center align-items-center w-100 vh-100 ">
        <div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Reference Id:</th>
                </tr>
                @foreach($transactions as $index => $transaction)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->email}}</td>
                    <td>${{$transaction->price}}.00</td>
                    <td>USD</td>
                    <td>{{$transaction->reference_id}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>





    <footer style="margin-top:90px; background-color:black; color: white; height:80px; display:flex;justify-content:center; align-items:center;">
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