<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <title>CRUD</title>
</head>
<body>
   <div class="text-center" style="padding-top: 50px;">
   <h1>বাস টিকেট রিজার্ভেশন সিস্টেমস</h1>
   <p>Search Results</p>
   </div> 

    

@if ($details!="")
   <div class="container">
    <table class="table table-striped">
<thead>
    <tr>
        <th scope="col">Company</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Deprature</th>
        <th scope="col">Service Type</th>
        <th scope="col">Seat Rent</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>

@foreach ($details as $details)

<form method="POST" action="{{route('seat')}}">
@csrf

<input type="text" name="companyName" hidden value="{{$details->name}}">
<input type="text" name="bussNo" hidden value="{{$details->bussNo}}">
<input type="text" name="ticketPrice" hidden value="{{$details->ticketPrice}}">
<input type="text" name="date" hidden value="{{$dateJourney}}">
<input type="text" name="time" hidden value="{{$details->time}}">
<input type="text" name="from" hidden value="{{$details->from}}">
<input type="text" name="to" hidden value="{{$details->to}}">



 <tr>
    <td>{{$details->name}}</td>
    <td>{{$details->from}}</td>
    <td>{{$details->to}}</td>
    <td>{{$details->time}}</td>
    <td>{{$details->serviceType}}</td>
    <td>{{$details->ticketPrice}} Tk</td>
    <td>
       <div class="btn-group">
         <button class="btn btn-md btn-success me-1 p1">Book Now</button>
       </div>
    </td>
 </tr>
</form>
@endforeach

    
</tbody>

    </table>

   </div>
   
   @else 
   {{ 'Route not found!' }}
   @endif
</body>
</html>