


@extends('view_mjob.template.yourjob_template')

@section('content')


    <style>
        .d{
            font-size: 18px;
        }
        .form-log table{
            display: inline-block;
            width: 400px;
            font-size: 13px;

        }
    </style>

    <div class="login-candidat" style="width: 70%;">

        @if(session('success'))
            <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{session('success')}}</p>
            </div>
        @endif


        <p style="font-size: 24px;font-weight: bolder;color: black">Se connecter à votre compte</p>
        <p style="font-size: 15px;margin: 0"> Il y a bien plus de possibilités en vous connectant. Découvrez-les.</p>
        <form action="{{route('login')}}" method="post" id="login_forms" >
            {{ csrf_field() }}

            <div class="form-log">
                <table style="padding-top: 30px">

                    <tr><th><label class="label-jb" for="email">Email</label></th></tr>
                    <tr>
                        <th>
                            <input class="input-jb is-invalid" id="email" name="email" type="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </th>
                    </tr>
                    <tr><th><label class="label-jb" for="password">Mot de passe</label></th></tr>
                    <tr>
                        <th>
                            <input class="input-jb" id="password" name="password" type="password" required>
                            @if ($errors->has('password'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </th>
                    </tr>
                    <tr><th><input onclick="tp()" id="box-pass-login" name="box-pass-login" type="checkbox">
                            <label class="label-jb" for="box-pass-login">Afficher le mot de passe</label></th></tr>
                    <tr><th style="width: 400px; padding-right: 100px"><button class="btn-jb" name="login" type="submit" value="login">Se Connecter</button></th>


                    </tr>
                    <tr>
                        <th style="font-size: 13px">
                            <p class="content-panel">Pas encore enregistré ? <br>
                                <a style="display: inline;font-size: 13px ;" href="{{url('/register')}}#drg">Créez votre compte gratuitement</a> </p>
                        </th>
                    </tr>
                </table>


                <table id="btn_fg_ggl" style="height: 260px">
                    <tr style="height: 150px">
                        <th style="border-left: 1px solid #255279;padding-left: 40px">
                            <button style="width: 350px;height: 30px" class="btn-red-jb-rev"
                                    onclick="window.location='';" type="button"><div uk-icon="google" style="float: left"></div>Se Connecter avec Google+</button>
                            <button style="width: 350px;height: 30px" class="btn-blue-jb-rev"
                                    onclick="logIn()" type="button"   ><div uk-icon="facebook" style="float: left"></div>Se Connecter avec Facebook</button>
                        </th>
                    </tr>
                </table>
            </div>

        </form>

        <!--fb:login-buttons
                scope="public_profile,email"
                onlogin="checkLoginState();">
            Se Connecter avec Facebook
        </fb:login-buttons-->



    </div>



    <script>

        function tp() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


    </script>


    <script>
        // $(document).ready(function(){

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1915353498538136',
                cookie     : true,
                xfbml      : true,
                version    : 'v2.12'
            });

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


        function logIn() {
            FB.login(function (response) {
                if (response.status === 'connected') {
                    //console.log('logged in');
                    //console.log(response);
                    if (response && !response.error) {
                        FB.api('/me?fields=id,first_name,last_name,email,gender,age_range,picture.type(large)',
                            function (response) {
                                var user_data = {
                                    id: response.id,
                                    first_name: response.first_name,
                                    last_name: response.last_name,
                                    email: response.email,
                                    age_range: response.age_range,
                                    picture: response.picture.data.url,
                                    gender: response.gender
                                };

                                $.ajax({
                                    url: "",
                                    method: "POST",
                                    data: user_data,
                                    dataType: "text",
                                    success: function (serverResponse) {
                                        window.location="";
                                    }
                                });

                            });

                    }
                }
            },{ scope: 'public_profile, email'});
        }




    </script>


@endsection
