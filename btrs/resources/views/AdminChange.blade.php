<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>www.btrs.com</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>Bus Ticket Reservation Systems Ltd</h2>
        <h4>Admin Panel</h4>
     
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
           
            <form method="POST" action="{{route('changeAdmin')}}">
                @csrf

            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Admin Name</h6> 
                    </div>
                    <span class="text-muted"><input type="text" name="admin" required></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Phone Number</h6> 
                    </div>
                    <span class="text-muted"><input type="text" name="phone" required></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Password</h6> 
                    </div>
                    <span class="text-muted"><input type="password" name="pass" id="" required></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Re-type Password</h6> 
                    </div>
                    <span class="text-muted"><input type="password" name="repass" id="" required></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"></h6> 
                    </div>
                    <span class="text-muted"> <button class="btn btn-success">Change Admin</button></span>
                </li>
            </ul>
            
        </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Operator Information</h4>
                <div class="row">
                    <div class="col-md-12 mb-3">

                        <table class="table table-striped">
                            @foreach ($admin as $admin)
                            <tr>
                                <td>Registration No.</td><td>10{{session('companyId')}}</td>
                            </tr>
                            <tr>
                                <td>Company</td><td>{{$admin->name}}</td>
                            </tr>
                            <tr>
                                <td>Admin</td><td>{{$admin->admin }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td><td>{{$admin->phone}}</td>
                            </tr>
                                
                            @endforeach
                        </table>
                    </div>
                </div>


        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2023 Bus Ticket Reservation Systems Ltd</p>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</html>
