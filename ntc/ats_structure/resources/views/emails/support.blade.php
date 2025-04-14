<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NTC Support</title>
    <style>
        .user_concerns {
            width: 80%;
            border : 1px solid #000000;
            padding : 20px;
            margin : 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <p>Hi <strong>{{$details['contents']['full_name']}}<strong></p>
    <p>Thank you for sending your concern. We'll get back to you as soon as possible.</p>
    <p>From<br />NTC Support Team</p>
    <hr width="100%" />
    <h3>Your Concerns</h3>
    <div class="user_concerns">
        <p>{{$details['contents']['email_body']}}</p>
    </div>
    <hr width="100%" />
</body>
</html>