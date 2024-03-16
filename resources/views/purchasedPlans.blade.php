<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Purchased Plans</title>


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


  <header class="">
    <nav class="navbar navbar-expand-lg bg-grey">
      <div class="container ">
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

  <div style="padding:100px;" class="row">
    <div class="col-lg">

      <div class="container">

        <div class="row">
          <h1 class="text-grey">Checkout</h1>
          @foreach($purchasedPlans as $purchasedPlan)
          <div class="col-md-5">

            <div class="product-item">
              <div class="down-content">
                <a href="#">
                  <h4>{{$purchasedPlan->plan_name}}</h4>
                </a>
                <p><b>Price: ${{$purchasedPlan->plan_price}}.00</b></p>
                <p>{{$purchasedPlan->plan_description}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div style="margin-right:120px;" class="col-sm-4 h-50 p-3 me-5 rounded bg-white border">
      <form action="/purchase-info" method="post">
        @csrf
        <div class="form-group mb-3">
          <label for="name">Name</label>
          <input type="name" class="form-control" style="height:20px;" name="name" value="{{$data->name}}" disabled>

        </div>
        <div class="form-group mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" style="height:20px;" name="email" value="{{$data->email}}" disabled>
        </div>
        <div class="form-group mb-3">
          <label for="address" style="height:30px;">Address</label>
          <textarea type="address" class="form-control" style="height:50px;" name="address" value="{{old('address')}}"></textarea>
          <span class="text-danger">@error('address'){{$message}} @enderror</span>

        </div>
        <div class="form-group mb-3">
          <label for="city" style="height:20px;">City</label>
          <input type="city" class="form-control" style="height:20px;" name="city" value="{{old('city')}}">
          <span class="text-danger">@error('city'){{$message}} @enderror</span>

        </div>
        <div class="form-group mb-3">
          <label for="country" style="height:20px;">Country</label>
          <input type="country" class="form-control" style="height:20px;" name="country" value="{{old('country')}}">
          <span class="text-danger">@error('country'){{$message}} @enderror</span>

        </div>
        <div class="form-group mb-3">
          <label for="postalCode" style="height:20px;">Postal Code</label>
          <input type="postalCode" class="form-control" style="height:20px;" name="postalCode" value="{{old('postalCode')}}">
          <span class="text-danger">@error('postalCode'){{$message}} @enderror</span>

        </div>



        <div class="form-group mb-3">
          <button class="btn btn-primary" type="submit">Submit Payment</button>
        </div>
      </form>
    </div>
  </div>


  <footer style="margin-top:-100px; background-color:black; color: white; height:80px; display:flex;justify-content:center; align-items:center;">
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