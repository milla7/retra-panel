<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Retrateria - Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="index.php"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>
        <div>
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                <div class="col-lg-4">
                    &nbsp;
                </div>
                <div class="col-lg-4">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div>
                                                <a href="#" class="logo"><img src="/assets/images/logo.png"></a>
                                            </div>
                                        </div>

                                        <div class="p-2 mt-5">
                                            <form class="form-horizontal" method="post" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                    <label for="username">Email</label>
                                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                    <label for="userpassword">Contraseña</label>
                                                    <input type="password" class="form-control @error('email') is-invalid @enderror" id="password" name="password">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-dark w-md waves-effect waves-light" type="submit">Iniciar Sesión</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <a href="recuperar.php" class="text-muted"><i class="mdi mdi-lock mr-1"></i> ¿Olvido su contraseña?</a>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">

                                            <p>© 2020 Retrateria</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    &nbsp;
                </div>
                </div>
            </div>
        </div>



        <!-- JAVASCRIPT -->
        <script src="//libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>

        <script src="/assets/js/app.js"></script>

    </body>
</html>
