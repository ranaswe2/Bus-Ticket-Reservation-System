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
        <h4>User Dashboard</h4>
     
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your Tickets</span>
                <span class="badge badge-secondary badge-pill">{{count($booked)}}</span>
            </h4>
            <ul class="list-group mb-3">

                @foreach ($booked as $booked)
                <form action="{{route('generate-pdf')}}" method="post">
                    @csrf

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$booked->name}}</h6>
                        <small class="text-muted">{{$booked->from}}-{{$booked->to}} {{$booked->time}} {{$booked->journeyDate}}</small>
                    </div>
                    <span class="text-muted"><button  class="btn btn-success" name="txn" value="{{$booked->txn}}">Download</button></span>
                </li>

                </form>
                @endforeach
               
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">User Information</h4>
                <div class="row">
                    <div class="col-md-12 mb-3">

                        <table class="table table-striped">
                            @foreach ($user as $user)
                            <tr>
                                <td>ID</td><td>100{{$user->userId}}</td>
                            </tr>
                            <tr>
                                <td>User Name</td><td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td><td>{{$user->phone}}</td>
                            </tr>
                            <tr>
                                <td>Joined</td><td>{{$user->created_at}}</td>
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
