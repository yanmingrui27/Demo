<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="js/app.js"></script>


    <title>Student Management System</title>
  </head>
  <body>
    @include("navigation")


    <div id="example">
      

      
    </div>
    @if($layout == 'student')
    <div class="row header-container justify-content-center">
       <div class="header">
          <h1>Welcome to Online System</h1>
       </div>
    </div>
    @else
    <div class="row header-container justify-content-center">
       <div class="header">
          <h1>Student Management System</h1>
       </div>
    </div>
    @endif

    @if($layout == 'index')
      <div class="container-fluid mt-4">
        <div class="row">
          <section class="col-md-7">
            @include("studentlist")
          </section>
          <section class="col-md-5"></section>
        </div>
      </div>
    @elseif($layout == 'create')
      <div class="container-fluid mt-4">
        <div class="row">
          <section class="col-md-7">
            @include("studentlist")
          </section>
          <section class="col-md-5">
            <div class="card mb-3">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWbk-gs6GSHEzTfTEraAIBOij7Bce8wid98g&usqp=CAU" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Enter Student Information.</p>

                 <form action="{{ url('/api/store') }}" method="post">
                  @csrf
                 <div class="form-group">
                   <label>CNE</label>
                   <input name="cne" type="text" class="form-control" placeholder="Enter CNE">
                 </div>
                 <div class="form-group">
                   <label>First Name</label>
                   <input name="firstName" type="text" class="form-control" placeholder="First Name">
                 </div>
                 <div class="form-group">
                   <label>Last Name</label>
                   <input name="lastName" type="text" class="form-control" placeholder="Last Name">
                 </div>
                 <div class="form-group">
                   <label>Age</label>
                   <input name="age" type="text" class="form-control" placeholder="Age">
                 </div>
                 <div class="form-group">
                   <label>Email</label>
                   <input name="email" type="text" class="form-control" placeholder="Email">
                 </div>
                 <div class="form-group">
                   <label>Specialty</label>
                   <input name="specialty" type="text" class="form-control" placeholder="Specialty">
                 </div>
                 <div class="form-group">
                   <label>Balance</label>
                   <input name="balance" type="text" class="form-control" placeholder="Balance">
                 </div>
                 <input type="Submit" class="btn btn-info" value="Save">
                 <input type="Reset" class="btn btn-warning" value="Reset">
               </form>

              </div>
            </div>
          </section>
        </div>
      </div>
    @elseif($layout == 'show')
      <div class="container-fluid mt-4">
        <div class="row">
          <section class="col">
            @include("studentlist")
          </section>
          <section class="col"></section>
        </div>
      </div>
    @elseif($layout == 'edit')
      <div class="container-fluid mt-4">
        <div class="row">
          <section class="col-md-7">
            @include("studentlist")
          </section>
          <section class="col-md-5">
            <div class="card mb-3">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWbk-gs6GSHEzTfTEraAIBOij7Bce8wid98g&usqp=CAU" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Update the Information of the Student.</p>
                  <form action="{{ url('/update/'.$student->id) }}" method="post">
                     @csrf
                    <div class="form-group">
                      <label>CNE</label>
                      <input value="{{ $student->cne }}" name="cne" type="text" class="form-control" placeholder="Enter CNE">
                    </div>
                    <div class="form-group">
                      <label>First Name</label>
                      <input value="{{ $student->FirstName }}" name="firstName" type="text" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input value="{{ $student->LastName }}" name="lastName" type="text" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input value="{{ $student->age }}" name="age" type="text" class="form-control" placeholder="Age">
                    </div>
                    <div class="form-group">
                      <label>Specialty</label>
                      <input value="{{ $student->specialty }}" name="specialty" type="text" class="form-control" placeholder="Specialty">
                    </div>
                    <div class="form-group">
                      <label>Balance</label>
                      <input value="{{ $student->balance }}" name="balance" type="text" class="form-control" placeholder="Balance">
                    </div>
                    <input type="submit" class="btn btn-info" value="Update">
                    <input type="reset" class="btn btn-warning" value="Reset">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                  </form>
                  <div class="modal fade" id="myModal" data-backdrop="false">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        
                        <div class="modal-header">
                          <h4 class="modal-title">Are you sure?</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>

                        <div class="modal-body row header-container justify-content-center">
                           <form  action="{{ url('/destroy/'.$student->id) }}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-sm btn-warning" value="Yes" name="NoButs">
                           </form>
                          <button type="button" class="btn btn-sm btn-danger" name="NoBut" data-dismiss="modal">No</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
               </div>
          </section>
        </div>
      </div> 
    @elseif(Auth::user()->email != 'admin@admin.com')
      <div class="container-fluid mt-4">
        <div class="row">
          <section class="col-md-7">
            <div class="card mb-3">
            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWbk-gs6GSHEzTfTEraAIBOij7Bce8wid98g&usqp=CAU" class="card-img-top" alt="..."> -->
              <div class="card-body">
                <div class="charge-error" id="charge-error"></div>
                <p class="card-text"><h4>Your Current balance is <strong>P{{ $student }}</strong></h4></p>
                  <form action="{{ url('/checkout/') }}" method="post" id="checkout-form">
                     @csrf
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="Marcelino" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" id="email" type="text" class="form-control" placeholder="Email" value="yanmingrui27@gmail.com" required>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input name="address" id="address" type="text" class="form-control" placeholder="Address" value="Carmen" required>
                    </div>
                    <div class="form-group">
                      <label>Card Holder Name</label>
                      <input name="card-name" id="card-name" type="text" class="form-control" placeholder="Card Holder Name" value="Marcelino" required>
                    </div>
                    <div class="form-group">
                      <label>Creadit Card Number</label>
                      <input name="card-number" id="card-number" type="text" class="form-control" placeholder="Card Holder Number" value="4242-4242-4242-4242" required>
                    </div>
                    <div class="form-group">
                      <label>Expiration Month</label>
                      <input name="exp-mon" id="exp-mon" type="text" class="form-control" placeholder="Expiration Month" value="10" required>
                    </div>
                    <div class="form-group">
                      <label>Expiration Year</label>
                      <input name="exp-year" id="exp-year" type="text" class="form-control" placeholder="Expiration Year" value="2022" required>
                    </div>
                    <div class="form-group">
                      <label>CVC</label>
                      <input name="cvc" id="exp-year" type="text" class="form-control" placeholder="CVC" value="123" required>
                    </div>
                    <div class="form-group">  
                      <label>Amount</label>
                      <input name="amount" id="amount" type="text" class="form-control" placeholder="Amount" required>
                    </div>
                    <input type="submit" class="btn btn-info" value="Submit">
                  </form>
                </div>
          </section>
        </div>
      </div>
    @endif

<footer>
    <div class="container"> 
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
          <p><u><a href="{{ url('/') }}">University Online System</a></u> is an online platform for the online transaction of the University</p>
          <p class="h6">© All right Reversed.<a class="text-green ml-2" href="{{ url('/') }}" target="_blank">Universtiy</a></p>
        </div>
        <hr>
      </div>  
    </div>
</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('js/checkout.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>