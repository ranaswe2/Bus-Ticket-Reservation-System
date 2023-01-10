<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <title>www.btrs.com</title>
   <style type="text/css">
    .btn-circle.btn-xl {
        width: 50px;
        height: 50px;
        padding: 3px 8px;
        border-radius: 60px;
        font-size: 10px;
    }
    a.button1{
display:inline-block;
padding:0.35em 1.2em;
border:0.1em solid #FFFFFF;
margin:0 0.3em 0.3em 0;
border-radius:0.12em;
box-sizing: border-box;
text-decoration:none;
font-family:'Roboto',sans-serif;
font-weight:300;
color:#FFFFFF;
text-align:center;
transition: all 0.2s;
}
a.button1:hover{
color:#000000;
background-color:#FFFFFF;
}
@media all and (max-width:30em){
a.button1{
display:block;
margin:0.4em auto;
}
}
</style>
</head>
<body> 
   <div class="text-center" style="padding-top: 50px;">
   <h1>{{$companyName}}</h1>
   <p>Seat Arrangement: {{$from}} হইতে {{$to}}</p>
   <h5>Schedule: {{$time}} &nbsp;&nbsp;&nbsp;&nbsp; Date: {{$date}}</h5>
   <h4>আসন প্রতি ভাড়া: {{$ticketPrice}} টাকা</h4>

   </div> 

   <div  class="container" style="overflow-x:auto;">
    <table class="table table-striped">

<tbody>
    
        <?php
$btnStyle="btn-success btn-circle btn-xl button1";
$driver="btn-circle btn-xl button1";
        ?>
    
<tr>
    <td colspan="5" align="right"><button class="{{$driver}}">O</button></td>
</tr>
<tr>
    <td colspan="4" align="left">E N T R Y     G A T E</td>
    <td align="right">DRIVER</td>
    <td></td>
</tr>

<form method="POST" action="{{route('selectSeat')}}">
@csrf
<input type="text" name="companyName" hidden value="{{$companyName}}">
<input type="text" name="from" hidden value="{{$from}}">
<input type="text" name="to" hidden value="{{$to}}">
<input type="text" name="time" hidden value="{{$time}}">
<input type="text" name="date" hidden value="{{$date}}">
<input type="text" name="ticketPrice" hidden value="{{$ticketPrice}}">
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="A1">A1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="A2">A2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="A3">A3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="A4">A4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="B1">B1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="B2">B2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="B3">B3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="B4">B4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="C1">C1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="C2">C2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="C3">C3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="C4">C4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="D1">D1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="D2">D2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="D3">D3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="D4">D4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="E1">E1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="E2">E2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="E3">E3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="E4">E4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="F1">F1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="F2">F2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="F3">F3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="F4">F4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="G1">G1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="G2">G2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="G3">G3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="G4">G4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="H1">H1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="H2">H2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="H3">H3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="H4">H4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="I1">I1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="I2">I2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="I3">I3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="I4">I4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="J1">J1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="J2">J2</button></td>
    <td align="center"></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="J3">J3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="J4">J4</button></td>
 </tr>
 <tr>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="K1">K1</button></td>
    <td align="left"><button class="{{$btnStyle}}" name="seatNo" value="K2">K2</button></td>
    <td align="center"><button class="{{$btnStyle}}" name="seatNo" value="K3">K3</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="K4">K4</button></td>
    <td align="right"><button class="{{$btnStyle}}" name="seatNo" value="K5">K5</button></td>
 </tr>
 
</form>

</tbody>

    </table>

   </div>
</body>
</html>