<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/todak.ico')}}">
        <title>Parking Reservation System</title>
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/pages/authentication.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class="main-wrapper">
            <div class="preloader">
                <div class="loader">
                    <div class="loader__figure"></div>
                    <p class="loader__label">PRS</p>
                </div>
            </div>

            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('images/big/auth-bg2.jpg')}}) no-repeat left center;">
                <div class="container">
                    <div class="row">
                        <div class="col s12 l8 m6 demo-text">
                            <img src="{{asset('images/todak.png')}}" alt="logo" width="30%" />
                            <h1 class="font-light m-t-40"><span class="font-medium black-text">Parking Reservation System</span></h1>
                            {{-- <p>This is just a demo text which you can change as per your requeirment, so change once you get chance. this is default text.</p>
                            <a class="btn btn-round red m-t-5">Know more</a> --}}
                        </div>
                    </div>

                    <div class="auth-box auth-sidebar">
                        <div id="loginform">
                            <div class="p-l-10">
                                <h5 class="font-medium m-b-0 m-t-40">Login</h5>
                                <small>Just login to your account</small>
                            </div>
                            <!-- Form -->
                            <div class="row">
                                <form class="col s12" method="POST" action="{{route('login')}}">
                                    @csrf
                                    <!-- email -->
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" name="email" type="text" class="validate"
                                            @if(Cookie::has('username')) value="{{Cookie::get('email')}}" @endif 
                                            required>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>

                                    <!-- pwd -->
                                    <div class="row">
                                        <div class="input-field col s12 l11">
                                            <input id="password" type="password" name="password" class="validate"
                                            @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif 
                                            required>
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="input-field col s12 l1 bottom">
                                            <br>
                                            <i class="fas fa-eye-slash" id="toggle-password"></i>
                                        </div>
                                    </div>

                                    <!-- remember -->
                                    <div class="row m-t-5">
                                        <div class="col s7">
                                            <label>
                                                <input type="checkbox" 
                                                @if(Cookie::has('username')) value="{{Cookie::get('username')}}" checked @endif
                                                name="rememberme" id="rememberme">
                                                <span>Remember Me</span>
                                            </label>
                                        </div>
                                        <div class="col s5 right-align"><a href="#" class="link" id="to-recover">Go to Register </a></div>
                                    </div>

                                    <!-- pwd -->
                                    <div class="row m-t-40">
                                        <div class="col s12">
                                            <button type="submit" class="btn-large w100 blue accent-4">Login</button>
                                        </div>
                                    </div>

                                    @if(session('username'))
                                        <script>
                                            alert('Wrong Email / Password', 'TEST');
                                        </script>
                                    @endif
                                </form>
                            </div>

                            {{-- <div class="center-align m-t-20 db">
                                Don't have an account? <a href="{{route('register')}}">Sign Up!</a>
                            </div> --}}
                        </div>

                        <div id="recoverform">
                            <div class="p-l-10">
                                <h5 class="font-medium m-b-0 m-t-40">Register Account</h5>
                                <small>Fill the form</small>
                            </div>
                            <div class="row">
                                <form class="col s12" action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" class="validate" name="name" required>
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email1" type="email" class="validate" name="email1" required>
                                            <label for="email1">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="password1" type="password" class="validate" name="password1" required>
                                            <label for="password1">Password</label>
                                        </div>
                                    </div>

                                    <!-- pwd -->
                                    <div class="row m-t-20">
                                        <div class="col s12">
                                            <button type="submit" class="btn-large w100 red" name="action">Submit</button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="right-align"><a href="#" class="link" id="to-login">Back to Login </a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('js/materialize.min.js')}}"></script>
        <script>
            $('.tooltipped').tooltip();

            $('#to-recover').on("click", function() {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });

            $('#to-login').on("click", function() {
                $("#loginform").slideDown();
                $("#recoverform").fadeOut();
            });

            $(function() {
                $(".preloader").fadeOut();
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('password');
                const togglePasswordIcon = document.getElementById('toggle-password');
        
                togglePasswordIcon.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        togglePasswordIcon.classList.remove('fa-eye-slash');
                        togglePasswordIcon.classList.add('fa-eye');
                    } else {
                        passwordInput.type = 'password';
                        togglePasswordIcon.classList.remove('fa-eye');
                        togglePasswordIcon.classList.add('fa-eye-slash');
                    }
                });
            });
        </script>
    </body>
</html>