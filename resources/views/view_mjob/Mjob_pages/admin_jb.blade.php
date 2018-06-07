@extends('view_mjob.template.yourjob_template')

@section('content')


<style>
    .img_cand{
        background-image: url("");
        background-size: cover;
        width: 45px;
        height: 45px!important;
        border-radius: 40px 40px;
        box-shadow: 0 8px 10px 0 rgba(17, 8, 6, 0.5);
        padding: 0;
        margin: 0;

    }

    #settings_admin,#all-cand,#all-empl,#settings-form-admin{
        display: none;
    }
    /*-------------------------*/


    .side{
        width: 260px;
        position: relative;
        display: inline-table;
        top: 4px;

    }
    .side-b{
        text-align: left;
        font-size: 13px;
        margin-top: 20px;
    }
    .side-b  th, td{
        border-bottom: 1px solid #d8d8d8;
    }
    .bd-article{
        position: relative;
        display: inline-table;
        top: 0;
        width: 900px;
        margin: 0 20px 30px 90px;
    }
    /*-------------------------*/
    .a:hover{
        opacity: 0.9;
        box-shadow:0 0 10px rgba(0, 0, 0, 0.4);
        text-decoration: none;
    }

</style>


<div  class="login-candidat profile bd-article" id="men" style="background-color: rgba(25,53,80,0.01)">



    <div class="menu-profile">
        <a id="comptes" class="activate" href="#men">Messages reçus</a>
        <a id="ca" href="#men">Gérer l'espace candidats</a>
        <a id="em" href="#men">Gérer l'espace employeurs</a>
        <a id="pa" href="#men">Paramètres</a>
    </div>
    <hr>
    <div class="header-profile">
        <form action="" method="post" enctype="multipart/form-data">
            <table>


                <tr>
                    <th class="image-profile">
                        <a href="#men" uk-tooltip="Photo de profil"><img   src="" alt=""></a>
                    </th>
                    <th style="position: absolute; font-size: 20px">Admin</th>
                    <th><p>Administrateur de MoroccoJob</p></th>
                </tr>


                <tr>
                    <th style="display: inline"><button type="submit" name="btn_ph" value="tr" style="width: 70px;" >changer</button>
                        <input style="width: 70px;" uk-tooltip="Choisi une photo de profil" name="photo_admin" type="file">
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>
        </form>

        <hr id="adm">

    </div>
    <!-- -------------------Paramètres--Admin--------------------------- -->
    <div id="settings_admin">

        <div class="title-profile">
            <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                Paramètres
            </div>
            <table>
                <tr>
                    <th></th>
                    <th style="float: right"><a href="#adm" id="btn-upadte-settings" class="btn-jb link-btn"
                                                type="button" uk-tooltip="Modifier vos paramètres">Modifier</a></th>
                </tr>
            </table>

        </div>
        <p style="font-size: 14px">Vos paramètres du profil</p>
        <table class="settings-prof" style="font-size: 13px !important;">

            <tr>
                <th>Email:</th>
                <td><p></p></td>

            </tr>
            <tr>
                <th>Mot de passe :</th>
                <td><p>******</p></td>
            </tr>

        </table>
        <div id="settings-form-admin">
            <hr>
            <div class="title-profile" >
                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                    Modifier vos paramètres de confidentialité
                </div>

            </div>

            <form action="#men" method="post">
                <table class="register-tbl" >

                    <tr>
                        <th><label class="label-jb" for="email">Email :</label></th>
                        <th><label class="label-jb" for="password">Nouveau mot de passe :</label></th>
                    </tr>

                    <tr>
                        <th><input value="" class="input-jb" id="email" name="admin_email" type="email" required></th>
                        <th><input  class="input-jb" id="password" name="admin_password" type="password" required  autocomplete="off"></th>
                    </tr>

                    <tr>
                        <th></th>
                        <th><input onclick="tpadmin()" id="box-pass-register" name="box-pass-register" type="checkbox">
                            <label class="label-jb" for="box-pass-register">Afficher le mot de passe</label></th>

                    </tr>

                    <tr>
                        <th></th>
                        <th style="float: right;">
                            <a href="#men" id="btn-hide-formsett"  class="btn-red-jb link-btn" style="font-size: 16px" >Annuler</a>
                            <button  class="btn-jb" name="btn-admin" value="tr" type="submit">Enregistrer</button>
                        </th>
                    </tr>

                </table>
            </form>

        </div>

    </div>
    <!-- ----------------------Gérer-espace-employeurs-------------------------- -->

    <!-- -------------------------tous les employeurs-------------------------------- -->
    <div class="all-offers" id="all-empl">

        <a href="#men" class="a">
            <div    id="empl_tog" style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white"
                    uk-tooltip="Afficher ou cacher le contenu">
                Tous les employeurs
            </div>
        </a>

        <div class="shtbl" id="panel-empl">
            <table>
                <tr>
                    <th>Employeur</th>
                    <th>Raison social</th>
                    <th>Secteur d'activité</th>
                    <th>Lieu</th>
                    <th>Date d'inscription</th>
                    <th>Validité</th>
                    <th width="80">Action</th>
                </tr>


                <tr>
                    <td><img style="border-radius: 40px 40px;height: 50px!important;width: 50px;"  src="/projet_recrute/public/img_employers/" alt=""></td>
                    <td><a href="#pf-empl"></a></td>
                    <td><a href="#"></a></td>
                    <td></td>
                    <td></td>
                    <td><button id="validitye"
                                uk-tooltip="Cliquez pour désactivé activé ce compte" style="float: right"></button></td>
                    <td>
                        <a uk-tooltip="Consulter le profile de cet employeur" href="#pf-empl"><img src="/projet_recrute/public/img/eye-small.png" alt=""></a>
                        <a id="dempl" uk-tooltip="Supprimer cet employeur" style="margin-left: 5px"><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                    </td>
                </tr>

            </table>
        </div>



        <!-- ----------------------show-employer-profile------------------------- -->

        <div id="pf-empl">

            <div class="header-profile" >
                <div class="a"  style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                    Profile de
                </div>
                <table>
                    <tr>
                        <th class="image-profile">
                            <img  style="height: 150px;width: 150px"  src="/projet_recrute/public/img_employers/" alt="">
                        </th>
                        <td>
                            <table>
                                <tr>
                                    <th>Raison sociale de l'entreprise :</th>
                                    <td></td>

                                    <th>Secteur activité :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Adresse</th>
                                    <td>15 Rue du Curé
                                        L-1368</td>

                                    <th>Site web : </th>
                                    <td class=""><a rel="nofollow" href="#" uk-tooltip="name" target="_blank">www.Rs.com</a></td>

                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>


            </div>

        </div>

    </div>
    <!-- ------------------------listes de toutes offres----------------------- -->

    <div class="all-offers" id="offers_lists">
        <a href="#empl_tog" class="a">
            <div  id="flip" style="margin-top: 20px;font-size: 25px; background-color: rgba(41,50,67,0.9);color: white"
                  uk-tooltip="Afficher ou cacher le contenu">
                Tous les offres
            </div>
        </a>

        <div class="shtbl" id="panel-offer">
            <table>
                <tr>
                    <th>Titre de l'offre</th>
                    <th>Secteur d'activité</th>
                    <th>Lieu</th>
                    <th>Date de creation</th>
                    <th width="90">Validité</th>
                    <th width="80">Action</th>
                </tr>

                <tr>
                    <td>offer_title </td>
                    <td>offer_sector </td>
                    <td>offer_city </td>
                    <td>offer_start_date </td>
                    <td><a uk-tooltip="Cliquer pour valider l'offre" href="#" style="color: #ee705a">Non validé</a></td>
                    <td>
                        <a uk-tooltip="Consulter l'offre" href="#pf-empl"><img src="/projet_recrute/public/img/eye-small.png" alt=""></a>
                        <a uk-tooltip="Supprimer l'offre" style="margin-left: 5px"><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <!-- --------------------Messages reçus------------------------ -->


    <div class="all-offers shtbl" id="all-msg"   >

        <a href="#men" class="a" >
            <div  style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white"
                  id="msgs_list">
                Tous les messages reçus
            </div>
        </a>

        <div  id="msg_tble">
            <table>
                <tr>
                    <th>Nom & Prénom</th>
                    <th>Sujet</th>
                    <th width="200">Message</th>
                    <th>Email</th>
                    <th width="200">Date d'envoie</th>
                    <th width="130">Action</th>
                </tr>

                <tr>
                    <td width="150">name</td>
                    <td width="100"><?= substr('name',0,10) ;?></td>
                    <td><div><?=  substr('message',0,25).'...' ;?></div></td>
                    <td><a uk-toggle="target: #replya" uk-tooltip="Répondre à cet email">email </a></td>
                    <td></td>
                    <td>
                        <a id="delta" uk-tooltip="Supprimer ce message" uk-icon="trash"  style="float: right"></a>
                        <a  uk-toggle="target: #replya"    uk-icon="mail"  uk-tooltip="Répondre à ce message" style="float: right;margin:0 5px 0 5px"></a>
                        <a uk-toggle="target: #showa"  uk-tooltip="Afficher ce message"  style="float: right;" ><img src="/projet_recrute/public/img/eye-small.png" alt=""></a>
                    </td>

                </tr>
            </table>
        </div>



        <!-- ----------------------------Modal  send msg------------------ -->
        <div id="replya" uk-modal >

            <div class="uk-modal-dialog" style="width: 550px">
                <form action="" method="post">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h3 class="uk-modal-title">Envoyer un nouveau message</h3>
                    </div>

                    <div class="uk-modal-body" style="height: 170px;margin-top: -30px">
                        <table>
                            <tr><th style="float: left"><label class="label-jb" for="e_f">À</label></th></tr>
                            <tr><th><input value="" class="input-jb" style="width: 490px;" name="email_msg" id="e_f" type="email"  required></th></tr>
                            <tr><th style="float: left"><label class="label-jb" for="message_msg">Message</label></th></tr>
                            <tr><th><textarea class="input-jb" style="height: 70px;width: 490px" name="message_msg" id="message_msg" cols="30" rows="10" required></textarea></th></tr>
                        </table>
                    </div>
                    <div class="uk-modal-footer">
                        <button class="btn-blue-jb"  style="width: 100px;height: 25px;float: right" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>

        </div>
    <!-- ---------------------------- Modal  show msg------------------ -->
        <div id="showa" uk-modal >

            <div class="uk-modal-dialog" style="width:600px">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">

                    <h3 class="uk-modal-title">Message de </h3>
                </div>

                <div class="uk-modal-body" style="height: 170px;margin-top: -30px;">
                    <table>
                        <tr>
                            <th style="float: left">Sujet :</th><td style="font-size: 13px;">subject</td>
                        </tr>
                        <tr>
                            <th style="float: left">Message :</th>
                            <td><div style="font-size: 13px;overflow: auto;height: 150px ;width: 400px;">message </div></td>
                        </tr>


                    </table>

                </div>
                <div class="uk-modal-footer">
                </div>
            </div>

        </div>



    </div>
    <!-- ----------------------Gérer-espace-candidats-------------------------- -->
    <div class="all-offers " id="all-cand"  >

        <!-- ----------------------lists-candidats-------------------------- -->
        <div class="shtbl">

            <a href="#men" class="a">
                <div   style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white" id="cand_list">
                    Tous les candidats
                </div>
            </a>

            <div id="cand_tble">
                <table>
                    <tr>
                        <th>Candidat</th>
                        <th>Nom Complet</th>
                        <th>Email</th>
                        <th>Lieu</th>
                        <th>Date d'inscription</th>
                        <th>Validité</th>
                        <th width="80px">Action</th>
                    </tr>

                    <tr>
                        <td><div class="img_cand"><img style="border-radius: 40px 40px;height: 45px!important;width: 45px;"  src="/projet_recrute/public/img_candidats/" alt=""></div></td>
                        <td><a id="nm" href="#pf"></a></td>
                        <td><a id="eml" href="#pf"></a></td>
                        <td></td>
                        <td></td>
                        <td><button id="validity"
                                    uk-tooltip="Cliquez pour désactivé acitivé ce compte" style="float: right">
                            </button></td>
                        <td>
                            <a uk-tooltip="Consulter le profile de" href="#cand_tble"><img src="/projet_recrute/public/img/eye-small.png" alt=""></a>
                            <a id="dcand" type="submit" uk-tooltip="Supprimer ce candidat"><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                        </td>
                    </tr>
                    <tr id="data_cds">

                    </tr>
                </table>
            </div>

        </div>

        <!-- ----------------------show-candidat-profile------------------------- -->
        <div id="profile_candidat">

            <a href="#cand_tble" class="a" >
                <div id="profile_tog" style="margin-top: 20px;font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                    Profile de
                </div>
            </a>

            <div id="profile_cnt">

                <div class="header-profile" id="pf">

                    <table>
                        <tr>
                            <td class="image-profile image-google" style="width: 135px" >
                                <img  style="border-radius: 5px 5px;height: 150px; width: 140px;margin: 0 0 -5px -6px;"  src="/projet_recrute/public/img_candidats/" alt="">
                            </td>
                            <td style="max-width: 250px;padding-left: 10px;font-size: 13px;"><h3></h3>
                                <br>
                                <b>GSM :</b><br>
                                <b>Email :</b><br>
                                <b>Date de naissance :</b><br>
                                <b>Adresse :</b> <br>
                            </td>

                            <td style="width: 400px;"></td>

                        </tr>
                    </table>

                </div>


                <div class="all-offers shtbl" >
                    <table>
                        <tr>
                            <th style="font-size: 18px">Experience</th>
                        </tr>
                    </table>
                    <table>

                        <tr>
                            <td width="200">
                                Date début :<br>
                                Date Fin :<br>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th style="font-size: 18px">Education</th>
                        </tr>
                    </table>
                    <table>

                        <tr>
                            <td width="200">
                                Date début :<br>
                                Date Fin :<br>
                            </td>
                            <td width="200"></td>
                            <td></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th style="font-size: 18px">Competence</th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td width="200"></td>
                            <td></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th style="font-size: 18px">Langue</th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td width="80">:</td>
                            <td></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th style="font-size: 18px">Loisirs et centres d'intérêt</th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td><td></td><td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>


        </div>

    </div>

</div>





<!--------------aside-------------------->
<aside class="login-candidat side" style="background-color: rgba(25,53,80,0.01)">
    <header>
        <h3 style="    background-color: rgba(19, 42, 62, 0.7);
;color: white;width: 100%;font-size: 24px;text-align: center;padding: 15px 10px;margin-left: -10px">Votre Espace Admin</h3>

        <div class="">Ce que vous devez savoir</div>
        <hr>
        <span class="img-profile">
            <img style="width: 150px!important;" src="/projet_recrute/public/img_admins/"
                 class="image-profile" alt="">
            </span>
    </header>
    <hr>

    <!-----------------send msg-to-candidat---------------- ---:-->

    <button class="btn-blue-jb-rev" uk-toggle="target: #my-id" type="button" style="font-size: 15px;width:auto;">Envoyer un message</button>

    <!-- This is the modal -->

    <div id="my-id" uk-modal >

        <div class="uk-modal-dialog" style="width: 550px">
            <form action="<?='index.php?p=yourjobs.admin_jb&s=admin&etat=send-msg';?>" method="post">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Envoyer un nouveau message</h3>
                </div>

                <div class="uk-modal-body" style="height: 170px;margin-top: -30px">
                    <table>
                        <tr><th style="float: left"><label class="label-jb" for="e_s">À</label></th></tr>
                        <tr><th><input value="" class="input-jb" style="width: 490px;" name="email_msg" id="e_s" type="email"  required></th></tr>
                        <tr><th style="float: left"><label class="label-jb" for="message_msg">Message</label></th></tr>
                        <tr><th><textarea class="input-jb" style="height: 70px;width: 490px" name="message_msg" id="message_msg" cols="30" rows="10" required></textarea></th></tr>
                    </table>
                </div>
                <div class="uk-modal-footer">
                    <button class="btn-blue-jb"  style="width: 100px;height: 25px;float: right" type="submit">Envoyer</button>
                </div>
            </form>
        </div>

    </div>


    <div class="side-b">
        <dl>
            <hr>

            <dt>Adresse Email :</dt>
            <dd></dd>

            <dt>Adresse</dt>
            <dd>15 Rue du Curé
                L-1368</dd>

            <dt>Site web : </dt>
            <dd class=""><a rel="nofollow" href="#" uk-tooltip="" target="_blank">www..com</a></dd>


        </dl>
        <hr>

        <dl>
            <dt>Profile</dt>
            <dd>is an international recruitment consulting company specialized in placing financial professionals.</dd>
            <dd class="cl-effect-1"><a href="#" class="cl-effect-1"> Lisez le profil complet</a></dd>
        </dl>

    </div>
</aside>




<script>



</script>


<script>

    function tpadmin() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }


    $(document).ready(function() {

        $("#offers_lists").hide();
        $("#panel-offer").hide();

        $("#find").addClass("nav-active");
        $("#about").removeClass("nav-active");
        $("#contact").removeClass("nav-active");
        $("#home").removeClass("nav-active");
        $("#allof").removeClass("nav-active");

        //----------get data-------

        //--------------- toggle liste employer offers -----------------
        $("#msgs_list").click(function(){
            $("#msg_tble").slideToggle("slow");
        });
        $("#cand_list").click(function(){
            $("#cand_tble").slideToggle('slow');
        });

        $("#flip").click(function(){
            $("#panel-offer").slideToggle('slow');
        });
        $("#empl_tog").click(function(){
            $("#panel-empl").slideToggle('slow');
        });
        $("#profile_tog").click(function(){
            $("#profile_cnt").slideToggle('slow');
        });


        //-----------Admin-profil-----------

        $("#comptes").click(function(){
            $(this).addClass("activate");
            $("#ca").removeClass("activate");
            $("#em").removeClass("activate");
            $("#pa").removeClass("activate");
            //-----------show-&-hide--------
            $("#settings_admin").hide();
            $("#all-cand").hide();
            $("#all-empl").hide();
            $("#offers_lists").hide();
            $("#all-msg").fadeIn("slow");
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.admin_jb&s=admin';?>#men");//change url without refresh
        });


        $("#ca").click(function(){
            $(this).addClass("activate");
            $("#comptes").removeClass("activate");
            $("#em").removeClass("activate");
            $("#pa").removeClass("activate");
            //-----------show-&-hide--------
            $("#settings_admin").hide();
            $("#all-empl").hide();
            $("#all-cand").fadeIn("slow");
            $("#all-msg").hide();
            $("#profile_candidat").hide();
            $("#offers_lists").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.admin_jb&s=admin';?>#men");//change url without refresh
        });
        $("#em").click(function(){
            $(this).addClass("activate");
            $("#ca").removeClass("activate");
            $("#comptes").removeClass("activate");
            $("#pa").removeClass("activate");
            //-----------show-&-hide--------
            $("#settings_admin").hide();
            $("#all-cand").hide();
            $("#all-empl").fadeIn("slow");
            $("#offers_lists").fadeIn("slow");
            $("#all-msg").hide();
            $("#pf-empl").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.admin_jb&s=admin';?>#men");//change url without refresh
        });
        $("#pa,#btn-hide-formsett").click(function(){
            $(this).addClass("activate");
            $("#comptes").removeClass("activate");
            $("#ca").removeClass("activate");
            $("#em").removeClass("activate");
            //-----------show-&-hide--------
            $("#settings_admin").fadeIn("slow");
            $("#all-cand").hide();
            $("#all-empl").hide();
            $("#settings-form-admin").hide();
            $("#all-msg").hide();
            $("#offers_lists").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.admin_jb&s=admin';?>#men");//change url without refresh

        });
        $("#btn-upadte-settings").click(function(){
            $("#settings-form-admin").fadeIn("slow");
        });




    });
</script>
    @endsection


