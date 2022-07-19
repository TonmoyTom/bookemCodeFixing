<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .main-mail {
            border: 1px solid #ddd;
            max-width: 500px;
            margin: 0 auto;
            border-radius: 5px;
            font-family: sans-serif;
        }

        .me-info {
            text-align: center;
            padding: 20px;
            padding-bottom: 0;
        }

        .contact-details .title {
            margin: 0;
            margin-top: 25px;
            font-size: 16px;
            border-top: 1px solid #f1f1f1;
            border-bottom: 1px solid #f1f1f1;
            padding: 7px;
            margin-bottom: 15px;
            color: #202124;
            text-align: center;
        }

        .contact-details {
            padding: 20px;
            padding-top: 5px;
        }

        .logo {
            width: 120px;
        }

        .contact-details span {
            font-size: 14px;
            color: #555;
        }

        .contact-details p {
            margin-top: 6px;
            margin-bottom: 15px;
            font-size: 15px;
            color: #3c4043;
        }

    </style>
</head>

<body>
    <div class="mail-template">
        <div class="main-mail">
            <div class="me-info">
                <img class="logo" src="https://www.ajkal.fastrider.co/uploaded/logo/1627575190_6102d3961192d.png" alt="logo" />
            </div>
            <div class="contact-details">
                <h5 class="title">New news has been uploaded, click on the link below to see</h5>
                <h5><a target="_blank" href="{{route('news.details',$slug)}}">{{$news_title}}</a></h5>
                <p><strong>Thank You</strong></p>
            </div>
        </div>
    </div>
</body>

</html>
