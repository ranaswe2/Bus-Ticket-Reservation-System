<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .container {
  font-family: arial;
  font-size: 24px;


  text-align:center;
  width: 300px;
  height: 300px;
  margin: 0 auto;
  outline: dashed 1px black;
}

.congo{
    color: orangered;
}




    </style>
</head>
<body>
    <div class="container">
        <div class="child">
            <p class="congo"><br>Congratulations!</p> <p>Your Payment has successfully done. Please, download your ticket from your dashboard.</p>
        <a href="{{url('/signin')}}">
            <button class="btn btn-success">Go to Dashboard</button>
        </a>
        </div>
    </div>
      
</body>
</html>