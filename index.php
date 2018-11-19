<?php

//Check if user coming from A Request

if($_SERVER['REQUEST_METHOD']=='POST'){
    $user   = filter_var($_POST['userName'],FILTER_SANITIZE_STRING);
    $phone  = filter_var($_POST['userPhone'],FILTER_SANITIZE_EMAIL);
    $email  = filter_var($_POST['userEmail'],FILTER_SANITIZE_NUMBER_INT);
    $msg    = filter_var($_POST['userMessage'],FILTER_SANITIZE_STRING);


    $errors=array();
    $userError  ='';
    $msgError   ='';
    $phoneError ='';

    if(strlen($user)<15){
        $userError="Full Name must be more than 15 characters";
        $errors[]=$userError;
    }

    if(strlen($msg)<10){
        $msgError="Your message should more than 10 characters";
        $errors[]=$msgError;
    }
    if(strlen($phone)!=11){
        $phoneError="Phone number must be 11 numbers";
        $errors[]=$phoneError;
    }

    $headers='From : '.$email.'\r\n';

    // if no error send email   [mail(to,subject,message,headers,Parameters )]

    if(empty($errors)){
        mail('mostafamah50@outlook.com',"Contact Form php",$msg,$headers);
        $user   = '';
        $phone  = '';
        $email  = '';
        $msg    = '';
        $success='<div class="alert alert-success">Your message has sent successfully</div>';
    }
}



?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <title>Hello, world!</title>
</head>
<body>
<div class="container-fulid bg-dark " >
    <nav class="navbar navbar-dark bg-dark  container navbar-expand-sm">
        <a href="#" class="navbar-brand" > <img src="./img/php.svg" height="30"></a>
        <buttton class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu"><span class="navbar-toggler-icon"></span></buttton>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav  mr-auto "  >
                <li class="nav-item active"><a href="#" class="nav-link">Contact Me</a></li>
                <li class="nav-item"><a href="#" class="nav-link">OPP</a></li>
                <li class="nav-item"><a href="#" class="nav-link">MVC</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Database</a></li>

            </ul>
        </div>
    </nav>
</div>





<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-6">
            <?php if(isset($success)){echo $success;} ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Full Name</label>
                    <input
                        type="text"
                        required
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="userName"
                        placeholder="Full Name"
                        value="<?php if(isset($user)){echo $user;} ?>"

                    />
                    <?php if(isset($userError)){echo "<span class='invalid-feedback' style='display: inline-block'>".$userError."</span>";} ?>

                </div>


                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone Number</label>
                    <input
                        type="tel"
                        class="form-control"
                        id="exampleFormControlInput2"
                        required
                        name="userPhone"
                        placeholder="Phone Number"
                        value="<?php if(isset($phone)){echo $phone;} ?>"


                    />
                    <?php if(isset($phoneError)){echo "<span class='invalid-feedback' style='display: inline-block'>".$phoneError."</span>";} ?>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input
                        type="email"
                        required
                        class="form-control"
                        id="exampleFormControlInput3"
                        name="userEmail"
                        placeholder="name@example.com"
                        value="<?php if(isset($email)){echo $email;} ?>"

                    />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea4">Your Message</label>
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea4"
                        rows="3"
                        name="userMessage"
                        required
                        placeholder="enter your message"

                    ></textarea>
                    <?php if(isset($msgError)){echo "<span class='invalid-feedback' style='display: inline-block'>".$msgError."</span>";} ?>
                </div>

                <button type="submit" class="btn btn-primary mb-2"> <i class="far fa-envelope-open"></i> Contact Me </button>

            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>