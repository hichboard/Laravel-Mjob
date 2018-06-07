
@extends('view_mjob.template.yourjob_template')

@section('content')

<style>
    .register-employeur table{
     display: inline;
    }
    .register-employeur table th{
        margin: 0!important;
        padding: 0!important;
    }
    .ph-fb{
        background-image: url("");
        background-size: cover;
        width: 45px;
        height: 45px!important;
        border-radius: 40px 40px;
        box-shadow: 0 8px 10px 0 rgba(17, 8, 6, 0.5);
        padding: 0;
        margin: 0;
    }

</style>
<!-------------------Employeur-Cntact-us------------------>
<div class="register-employeur">


    <!-------------------------------------Content---------------------------->

    <h2>Contactez-nous</h2>
    <p style="font-size: 15px;">Nous somme disponible pour répondre à toutes les questions que vous pouvez avoir.</p>
    <p style="font-size: 15px;">Communiquez vos informations personnelles ci-dessous et nous vous contacterons dès que possible.</p>
    <form action="" method="post" >
        <table >


                    <!--tr>
                        <td><span class="ph-fb"><img style="border-radius: 40px 40px;height: 45px!important;width: 45px;"  src="/projet_recrute/public/img_candidats/" alt=""></span>

                                <span></span> <br>
                                <span style="font-size: 12px;"></span>
                        </td>
                    </tr>

                    <tr>
                        <td><img style="border-radius: 40px 40px;height: 45px!important;width: 45px;"  src="/projet_recrute/public/img_employers/" alt="">
                            <span></span> <br>
                            <span style="font-size: 12px;"></span>
                        </td>

                    </tr-->

            <tr>
                <th><label class="label-jb" for="full_name" >Nom & Prénom :</label></th>
            </tr>
            <tr>
                <th><input class="input-jb" id="full_name" name="full_name" type="text" required ></th>
            </tr>
            <tr>
                <th><label class="label-jb" for="email">Email :</label></th>
            </tr>
            <tr>
                <th><input class="input-jb" id="email" name="email" type="email" required ></th>
            </tr>


            <tr><th><label class="label-jb" for="subject">Sujet :</label></th></tr>
            <tr>
                <th><input class="input-jb" id="subject" name="subject" type="text" required ></th>
            </tr>

            <tr><th><label class="label-jb" for="message">Votre message :</label></th></tr>
            <tr><th><textarea class="input-jb" id="message" name="message"
                              style="height: 70px;" cols="30" rows="30" required></textarea></th></tr>

            <tr><th ><button class="btn-blue-jb" type="submit" name="msg-valid" value="tr"
                             style="float: right;font-size: 17px;width: 120px" >Envoyer</button></th></tr>
        </table>
    </form>

</div>


<script>

    $(document).ready(function(){

        $("#contact").addClass("nav-active");
        $("#home").removeClass("nav-active");
        $("#about").removeClass("nav-active");
        $("#allof").removeClass("nav-active");
        $("#find").removeClass("nav-active");
    });

</script>


    @endsection