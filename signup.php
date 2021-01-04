<?php

require 'connect/DB.php';

 if( isset($_POST['first-name']) && !empty($_POST('first-name'))){
     
 }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>XDA</title>

    <!--CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="./assets/js/jquery.js"></script>

</head>

<body>
    <div class="header">
        <!--This div is for Login-->
    </div>
    <div class="main">
        <!--This div is for Signup-->
        <div class="left-side">
            <img src="./assets/image/fb_signup.png" alt="XDA">
        </div>
        <div class="right-side">
            <div class="error"></div>
            <h1>Create an account</h1>
            <div class="small">Its free and always will be</div>
            <form action="signup.php" method="POST" name="user-sign-up">
                <div class="sign-up-form">
                    <div class="sign-up-name">
                        <input type="text" name="first-name" id="first-name" class="text-field" placeholder="First Name">
                        <input type="text" name="last-name" id="last-name" class="text-field" placeholder="Last Name">
                    </div>
                    <div class="sign-wrap-mobile">
                        <input type="text" name="email-mobile" id="up-email" class="text-input" placeholder="Mobile Number of Email Address">
                    </div>
                    <div class="sign-up-password">
                        <input type="password" name="up-password" id="up-password" class="text-input" placeholder="Password">
                    </div>
                    <div class="sig-up-birthday">
                        <div class="bday">Birthday</div>
                        <div class="form-birthday">
                            <select name="bith-day" id="days" class="select-body"></select>
                            <select name="bith-month" id="months" class="select-body"></select>
                            <select name="bith-year" id="years" class="select-body"></select>
                        </div>
                    </div>
                    <div class="gender-wrap">
                        <input type="radio" name="gen" id="fem" class="m0" value="Female">
                        <label for="fem" class="gender">Female</label>
                        <input type="radio" name="gen" id="mal" class="m0" value="Male">
                        <label for="mal" class="gener">Male</label>
                    </div>
                    <div class="term">
                        By clicking Sign-up, you agree to our Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time.
                    </div>
                    <input type="submit" class="sign-up" value="Sign Up">
                </div>
            </form>
        </div>
    </div>


    <script>
        for (i = new Date().getFullYear(); i > 1900; i--) {
            //2021, 2020, 2019...1901
            $("#years").append($('<option />').val(i).html(i));
        }

        for (i = 1; i < 13; i++) {
            //1,2,3...12
            $("#months").append($('<option />').val(i).html(i));
        }

        updateNumberOfDays();

        function updateNumberOfDays() {
            $('#days').html('');
            month = $('#months').val();
            year = $('#years').val();
            days = daysInMonth(month, year);
            for (i = 1; i <= days; i++) {
                $('#days').append($('<option />').val(i).html(i));
            }
        }

        $('#years, #months').on('change', function() {
            updateNumberOfDays();
        })

        function daysInMonth(month, year) {
            //To get the day from year-month-day
            return new Date(year, month, 0).getDate();
            //Returns 31
        }

    </script>
</body>

</html>
