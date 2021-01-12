<?php

////require 'connect/DB.php';
////require 'core/database/connection.php';
//require 'core/load.php';
////C:/xampp/htdocs/1541012386/XDA/core/load.php
//
// if( isset($_POST['first-name']) && !empty($_POST['first-name'])){
//     $upFirst = $_POST['first-name'];
//     $upLast = $_POST['last-name'];
//     $upEmailMobile = $_POST['email-mobile'];
//     $upPassword = $_POST['up-password'];
//     $birthDay = $_POST['birth-day'];
//     $birthMonth = $_POST['birth-month'];
//     $birthYear = $_POST['birth-year'];
//     if(!empty($_POST['gen'])){
//    $upgen = $_POST['gen'];
//    }
//     $birth = ''.$birthYear.'-'.$birthMonth.'-'.$birthDay.'';
//     
//     if(empty($upFirst) or empty($upLast) or empty($upEmailMobile) or empty($upgen)){
//         $error = 'All feilds are required';
//     }else{
//         $first_name = $loadFromUser->checkInput($upFirst);
//         $last_name = $loadFromUser->checkInput($upLast);
//         $email_mobile = $loadFromUser->checkInput($upEmailMobile);
//         $password = $loadFromUser->checkInput($upPassword);
//         $screenName = ''.$first_name.'_'.$last_name.'';
//         if(DB::query('SELECT screenName FROM users WHERE screenName = :screenName', array(':screenName' => $screenName ))){
//             //:screenName is acting just like a value in a variable.
//             $screenRand = rand();  //Generates random number
//             
//             $userLink = ''.$screenName.''.$screenRand.'';  
//             //We append screen name and random numbers generated which will maintain the uniqueness of usernames if there are more than one person with same name
//         }else{
//            $userLink = $screenName;
//         }
//         
//         //Now to check for Mobile number or EmailID
//         //For EmailID
//         if(!preg_match("^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9]+)*(\.[a-z0-9]{2,3})$^", $email_mobile)){
//             if(!preg_match("^[0-9]{10}^", $email_mobile)){
//                 $error = "EmailID or Mobile Number is not correct. Please try again!";
//             }else{
//                 $mob = strlen((string)$email_mobile);
//                 
//                 if($mob > 10 || $mob < 10){
//                     $error = 'Mobile number is not valid';
//                 }else if(strlen($password) < 5 && strlen($password) > 60){
//                     $error = "The password is either too short or too long.";
//                     
//                 }else{
//                     if(DB::query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$email_mobile))){
//                         $error = 'Mobile number is already in use.';
//                     }else{
//                         $user_id = $loadFromUser->create('users', array('first_name'=>$first_name,'last_name'=>$last_name, 'mobile'=>$email_mobile, 'password'=>password_hash($password, PASSWORD_BCRYPT), 'screenName'=>$screenName,'userLink'=>$userLink,'birthday'=>$birth, 'gender'=>$upgen));
//                         
//                         $tstrong = true;
//                         $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
//                         $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));
//                     
//                        //Set Cookie. FBID is Cookie ID, 60*60*24*7 represents seconds in a min,mins in an hour,hours in a day and days in a week for expiration date. '/' is used for PATH. Next NULL is for DOMAIN, it is optional, next NULL is for security for secured connection. true is important as it will be accessible only through http protocol not by any scripting language.
//                        setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
//                     
//                        header('location: index.php');
//                     }
//                 }
//             }
//         }else{
//             if(!filter_var($email_mobile)){
//                 //filter_var is used to check email id, we will throw an error about the invalid email format
//                 $error = 'Invalid EmailID Format';
//             }else if(strlen($first_name) > 20 ){
//                 $error = "Name must be between 20 characters.";
//             }else if(strlen($password) < 5 && strlen($password) > 60){
//                 $error = "The password is either too short or too long.";
//             }else{
//                 if((filter_var($email_mobile,FILTER_VALIDATE_EMAIL)) && $loadFromUser->checkEmail($email_mobile) === true){
//                     $error = "Email is already in use";
//                }else{
//                     //Insert data in database using create(tableName, array);
//                     $user_id= $loadFromUser->create('users', array('first_name'=>$first_name,'last_name'=>$last_name, 'email'=>$email_mobile, 'password'=>password_hash($password, PASSWORD_BCRYPT), 'screenName'=>$screenName,'userLink'=>$userLink,'birthday'=>$birth, 'gender'=>$upgen));
//                     
//                     $tstrong = true;
//                     $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
//                     $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));
//                     
//                     //Set Cookie. FBID is Cookie ID, 60*60*24*7 represents seconds in a min,mins in an hour,hours in a day and days in a week for expiration date. '/' is used for PATH. Next NULL is for DOMAIN, it is optional, next NULL is for security for secured connection. true is important as it will be accessible only through http protocol not by any scripting language.
//                     setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
//                     
//                     header('location: index.php');
//                 }
//             }
//         }
//     }
// }
//
//
////Login Procedure
//if(isset($_POST['in-email-mobile']) && !empty($_POST['in-email-mobile'])){
//    $email_mobile = $_POST['in-email-mobile'];
//    $in_pass = $_POST['in-pass'];
//
//    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email_mobile)){
//        if(!preg_match("^[0-9]{10}^", $email_mobile)){
//            $error = 'Email or Phone is not correct. Please try again';
//        }else{
//
//        if(DB::query("SELECT mobile FROM users WHERE mobile = :mobile", array(':mobile'=>$email_mobile))){
//            if(password_verify($in_pass, DB::query('SELECT password FROM users WHERE mobile=:mobile', array(':mobile'=>$email_mobile))[0]['password'])){
//
//                $user_id=DB::query('SELECT user_id FROM users WHERE mobile=:mobile', array(':mobile'=>$email_mobile))[0]['user_id'];
//               $tstrong = true;
//$token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
//          $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));
//
//          setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
//
//          header('Location: index.php');
//            }else{
//                $error="Password is not correct";
//            }
//
//        }else{
//            $error="User hasn't found.";
//        }
//
//        }
//    }else{
//        if(DB::query("SELECT email FROM users WHERE email = :email", array(':email'=>$email_mobile))){
//            if(password_verify($in_pass, DB::query('SELECT password FROM users WHERE email=:email', array(':email'=>$email_mobile))[0]['password'])){
//
//                $user_id=DB::query('SELECT user_id FROM users WHERE email=:email', array(':email'=>$email_mobile))[0]['user_id'];
//               $tstrong = true;
//$token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
//          $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));
//
//          setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
//
//          header('Location: index.php');
//            }else{
//                $error="Password is not correct";
//            }
//
//        }else{
//            $error="User hasn't found.";
//        }
//    }
//}
//

require 'connect/DB.php';
require 'core/load.php';


if( isset($_POST['first-name']) && !empty($_POST['first-name'])){
$upFirst = $_POST['first-name'];
    $upLast = $_POST['last-name'];
    $upEmailMobile = $_POST['email-mobile'];
    $upPassword = $_POST['up-password'];
    $birthDay = $_POST['birth-day'];
    $birthMonth = $_POST['birth-month'];
    $birthYear = $_POST['birth-year'];
    if(!empty($_POST['gen'])){
    $upgen = $_POST['gen'];
    }
    $birth = ''.$birthYear.'-'.$birthMonth.'-'.$birthDay.'';

    if(empty($upFirst) or empty($upLast) or empty($upEmailMobile) or empty($upgen)){
        $error = 'All feilds are required';
    }else{
$first_name = $loadFromUser->checkInput($upFirst);
$last_name = $loadFromUser->checkInput($upLast);
$email_mobile = $loadFromUser->checkInput($upEmailMobile);
$password = $loadFromUser->checkInput($upPassword);
$screenName = ''.$first_name.'_'.$last_name.'';
        if(DB::query('SELECT screenName FROM users WHERE screenName = :screenName', array(':screenName' => $screenName ))){
$screenRand = rand();
            $userLink = ''.$screenName.''.$screenRand.'';
        }else{
            $userLink = $screenName;
        }
if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email_mobile)){
   if(!preg_match("^[0-9]{10}^", $email_mobile)){
       $error = 'Email id or Mobile number is not correct. Please try again.';
   }else{
     $mob = strlen((string)$email_mobile);

       if($mob > 10 || $mob < 10){
           $error = 'Mobile number is not valid';
       }else if(strlen($password) <5 || strlen($password) >= 60){
           $error = 'Password is not correct';
       }else{
           if(DB::query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$email_mobile))){
               $error = 'Mobile number is already in use.';
           }else{
               $user_id=$loadFromUser->create('users', array('first_name'=>$first_name,'last_name'=>$last_name, 'mobile' => $email_mobile, 'password'=>password_hash($password, PASSWORD_BCRYPT),'screenName'=>$screenName,'userLink'=>$userLink, 'birthday'=>$birth, 'gender'=>$upgen));

                $loadFromUser->create('profile', array('userId'=>$user_id, 'birthday'=> $birth, 'firstName' => $first_name, 'lastName'=>$last_name, 'profilePic'=>'assets/image/defaultProfile.png','coverPic'=>'assets/image/defaultCover.png', 'gender'=>$upgen, 'verified'=>'0'));

               $tstrong = true;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
          $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));

          setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);

          header('Location: index.php');


           }
}
   }
}else{
  if(!filter_var($email_mobile)){
      $error = "Invalid Email Format";
  }else if(strlen($first_name) > 20){
      $error = "Name must be between 2-20 character";
  }else if(strlen($password) <5 && strlen($password) >= 60){
      $error = "The password is either too shor or too long";
  }else{
      if((filter_var($email_mobile,FILTER_VALIDATE_EMAIL)) && $loadFromUser->checkEmail($email_mobile) === true){
          $error = "Email is already in use";
      }else{

         $user_id = $loadFromUser->create('users', array('first_name'=>$first_name,'last_name'=>$last_name, 'email' => $email_mobile, 'password'=>password_hash($password, PASSWORD_BCRYPT),'screenName'=>$screenName,'userLink'=>$userLink, 'birthday'=>$birth, 'gender'=>$upgen));

          $loadFromUser->create('profile', array('userId'=>$user_id, 'birthday'=>$birth, 'firstName' => $first_name, 'lastName'=>$last_name, 'profilePic'=>'assets/image/defaultProfile.png','coverPic'=>'assets/image/defaultCover.png', 'gender'=>$upgen));


$tstrong = true;
$token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
          $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));

          setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);

          header('Location: index.php');

      }
  }
}



    }
}

if(isset($_POST['in-email-mobile']) && !empty($_POST['in-email-mobile'])){
    $email_mobile = $_POST['in-email-mobile'];
    $in_pass = $_POST['in-pass'];

    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email_mobile)){
        if(!preg_match("^[0-9]{10}^", $email_mobile)){
            $error = 'Email or Phone is not correct. Please try again';
        }else{

        if(DB::query("SELECT mobile FROM users WHERE mobile = :mobile", array(':mobile'=>$email_mobile))){
            if(password_verify($in_pass, DB::query('SELECT password FROM users WHERE mobile=:mobile', array(':mobile'=>$email_mobile))[0]['password'])){

                $user_id=DB::query('SELECT user_id FROM users WHERE mobile=:mobile', array(':mobile'=>$email_mobile))[0]['user_id'];
               $tstrong = true;
$token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
          $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));

          setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);

          header('Location: index.php');
            }else{
                $error="Password is not correct";
            }

        }else{
            $error="User hasn't found.";
        }

        }
    }else{
        if(DB::query("SELECT email FROM users WHERE email = :email", array(':email'=>$email_mobile))){
            if(password_verify($in_pass, DB::query('SELECT password FROM users WHERE email=:email', array(':email'=>$email_mobile))[0]['password'])){

                $user_id=DB::query('SELECT user_id FROM users WHERE email=:email', array(':email'=>$email_mobile))[0]['user_id'];
               $tstrong = true;
$token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
          $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));

          setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);

          header('Location: index.php');
            }else{
                $error="Password is not correct";
            }

        }else{
            $error="User hasn't found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!--Meta-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XDA</title>

    <!--CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">


    <!--    <script src="./assets/js/jquery.js"></script>-->

</head>

<body>
    <div class="header">

    </div>
    <div class="main">
        <!--This div is for Signup-->
        <div class="left-side">
            <!--            <img src="./assets/image/fb_signup.png" alt="XDA">-->
            <h1 class="xda" style="font-size: 100px;font-family: 'Audiowide', cursive; color: #1877f2;">xda</h1><br>
            <div class="small">The group for Everyone</div>
        </div>
        <div class="right-side">
            <!--This div is for Login-->
            <!--            <div class="logo">XDA</div>-->
            <form action="signup.php" method="POST" id="signin-form">
                <!--                <h1>Login</h1>-->
                <div class="mobile-input">
                    <!--                    <div class="input-text">Email or Phone</div>-->
                    <input type="text" name="in-email-mobile" id="email-mobile" class="input-text sitext-field" placeholder="Email or Phone Number">
                </div>
                <div class="password-input">
                    <!--                    <div>Password</div>-->
                    <input type="password" name="in-pass" id="in-password" class="input-text-field sitext-field" placeholder="Password">
                </div>
                <div class="login-button">
                    <input type="submit" value="Log in" class="sign-in login">
                </div>
                <div class="forgotten-acc"><a href="#" class="forgotten" id="forgotten">Forgotten Password?</a></div>
                <br />
                <hr />
                <div class="login-button">
                    <button type="submit" id="myBtn" class="sign-up-button">
                        Create New Account
                    </button>
                </div>
            </form>

            <!--
            <h1>Sign Up</h1>
            <div class="small">It's quick and easy</div>
-->
            <div class="signup-form-whole">
                <div class="whole-block" id="whole-block">&nbsp;</div>
                <form action="signup.php" method="POST" name="user-sign-up" id="signup-form" class="">
                    <div class="error">
                        <?php if(!empty($error)){ echo $error; } ?>
                    </div>
                    <span class="closePop" id="closePop">&times;</span>
                    <div class="sign-up-form">
                        <h1>Sign Up</h1>
                        <span>It's quick and easy</span>
                        <hr />
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
                                <select name="birth-day" id="days" class="select-body"></select>
                                <select name="birth-month" id="months" class="select-body"></select>
                                <select name="birth-year" id="years" class="select-body"></select>
                            </div>
                        </div>
                        <div class="gender-wrap">
                            <input type="radio" name="gen" id="fem" class="m0" value="Female">
                            <label for="fem" class="gender">Female</label>
                            <input type="radio" name="gen" id="mal" class="m0" value="Male">
                            <label for="mal" class="gener">Male</label>
                        </div>
                        <hr />
                        <div class="term">
                            By clicking Sign-up, you agree to our Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time.
                        </div>
                        <input type="submit" class="sign-up" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./assets/js/jquery.js"></script>

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
    <script>
        $("#myBtn").click(function() {
            $("#signup-form").css({
                "display": "inline-block"
            });
        });
        $("#closePop").click(function() {
            $("#signup-form").css({
                "display": "none"
            });
            $("#whole-block").css({
                "display": "none"
            });
        });

        //        $(function() {
        //            $('.sign-up-button').on('click', function() {
        //                $('.signup-form-whole').toggle();
        //            })
        //        })

    </script>
    <!--    <script src="./assets/js/try.js"></script>-->
    <!--
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->

</body>

</html>
