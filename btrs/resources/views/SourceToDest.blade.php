<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>www.btrs.com</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <h2 class="form-title" align="center">Bus Ticket Reservation Systems Ltd</h2>
        <!-- Sing in  Form -->
        <section>
            <div class="container">
                <div class="signin-content">
                    <div class="select">

                        <form action="{{route('schedulesearchresults')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <table align="center">
                                    <tr>
                                        <th align="left">From Where You Go?</th>
                                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th align="right">What is Your Destination?</th>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <select name="from" id="from" required>
                                                <option>Select</option>

                                                @foreach ($district as $dist)
                                                <option value="{{$dist->dst}}">{{$dist->dst}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td align="right">
                                            <select name="to" id="to" required>
                                                <option>Select</option>

                                                @foreach ($district as $dist)
                                                <option value="{{$dist->dst}}">{{$dist->dst}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    <tr> <td></td><td></td> </tr>
                                    <tr> <td></td><td></td> </tr>
                                    <tr>
                                        <td><b>Date of Journey:</b></td>
                                        <td align="right"><input type="date" data-date="" data-date-format="YYYY-MM-DD" name="date" id="" required></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Next >>"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong><a align="center" href="{{url('/dashboard')}}">Or Go to Dashboard</a></strong>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

</body>
</html>