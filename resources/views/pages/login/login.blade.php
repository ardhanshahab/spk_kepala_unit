<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPK - Topsis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(255, 255, 255)
        }

        .card {
            border: none;
            border-radius: 5;
            width: 420px !important;
            margin: 0 auto;
            /* margin-top: 40%; */
        }

        .signup {
            display: flex;
            flex-flow: column;
            justify-content: center;
            padding: 10px 50px
        }

        a {
            text-decoration: none !important
        }

        h5 {
            color: #186301;
            margin-bottom: 3px;
            font-weight: bold
        }

        small {
            color: rgba(0, 0, 0, 0.3)
        }

        input {
            width: 100%;
            display: block;
            margin-bottom: 7px
        }

        .form-control {
            border: 1px solid #186301;
            border-radius: 30px;
            background-color: rgba(0, 0, 0, .075);
            letter-spacing: 1px
        }

        .form-control:focus {
            border: 0.5px solid #186301;
            border-radius: 30px;
            box-shadow: none;
            background-color: rgba(0, 0, 0, .075);
            color: #000;
            letter-spacing: 1px
        }

        .btn {
            display: block;
            width: 100%;
            border-radius: 30px;
            border: none;
            background: linear-gradient(to right, rgba(24, 99, 1) 0%, rgba(73, 161, 65) 100%);
            background: -webkit-linear-gradient(left, rgba(24, 99, 1) 0%, rgba(73, 161, 65) 100%)
        }

        .text-left {
            color: rgba(0, 0, 0, 0.3);
            font-weight: 400
        }

        .text-right {
            color: #ff0147;
            font-weight: bold
        }

        span.text-center {
            color: rgba(0, 0, 0, 0.3)
        }

        .fab {
            padding: 15px;
            font-size: 23px
        }

        .fa-facebook {
            color: #0303d9bf
        }

        .fa-twitter {
            color: #0078fade
        }

        .fa-linkedin {
            color: #18b1c0
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mx-auto py-4 px-0">
                <div class="card p-0">
                    <div class="card-title text-center">
                        <img src="{{ url('backend/dist/img/Logo.png') }}" width="200">
                        <h5 class="         mt-2">SELAMAT DATANG</h5> <small class="para">Sistem Pendukung
                            Keputusan Pemilihan Menu Makanan Bagi Balita Yang Mengalami Kekurangan Gizi</small>
                    </div>
                    <form class="signup" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group"><input value="{{ old('email') }}" name="email" type="email"
                                class="form-control" placeholder="email">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group"><input type="password" name="password" class="form-control"
                                placeholder="password">
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Login</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
