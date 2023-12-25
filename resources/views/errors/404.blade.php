<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Page not found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background: #E5E5E5;
            font-family: 'Open Sans', sans-serif;
        }

        h1 {
            font-style: normal;
            font-weight: bold;
            font-size: 144px;
            line-height: 196px;
            color: #3FA4D0;
        }

        h2 {
            font-style: normal;
            font-weight: bold;
            font-size: 36px;
            line-height: 49px;
            color: #000000;
        }

        p {
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 33px;
            color: #828282;
        }

        .d-flex {
            padding-left: 20%;
            padding-right: 20%;
        }

        .content {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 40px;
            text-align: center;
        }

        .btn-blue {
            background: #3FA4D0;
            border: 1px solid #3FA4D0;
            border-radius: 4px;
            font-weight: 400;
            font-size: 16px;
            line-height: 22px;
            color: #F2F2F2;
            width: 200px;
        }

        .btn-blue:hover {
            color: #F2F2F2;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="content">
            <h1>404</h1>
            <h2>Oops! Page Not Found</h2>
            <p>
                Sorry, the page you are looking for doesn’t exist.
                If you think something is broken, report a problem.
            </p>
            <a href="{{ url('/') }}" class="btn btn-blue">Return to Homepage</a>
        </div>
    </div>
</body>

</html>
