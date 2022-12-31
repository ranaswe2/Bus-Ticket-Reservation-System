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

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/BTRS_LOGO.png" alt="logo"></figure>

                        <div class="form-group">
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>A 6-digit code has sent to your given phone number.</label>
                        </div>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Verify Your Account</h2>

                        <form method="POST" action="{{route('userverification')}}" class="register-form" id="login-form">
                           @csrf
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="tel" name="phone" id="phone" placeholder="Phone Number" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="number" name="userCode" id="your_pass" placeholder="6 Digit Code" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Verify"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>
</html>