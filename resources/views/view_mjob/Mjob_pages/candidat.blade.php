@extends('view_mjob.template.yourjob_template')

@section('content')


<style>

    .image-fb{
        background-size: cover;
        width: 150px;
        height: 150px!important;
        box-shadow: 0 8px 10px 0 rgba(17, 8, 6, 0.5);
        padding: 0;
        margin: 0;

    }
    .image-profile{

        background-size: cover;
        width: 150px;
        height: 150px!important;
        box-shadow: 0 8px 10px 0 rgba(17, 8, 6, 0.5);
        padding: 0;
        margin: 0;
    }
    .all-offers table{
        background-color: rgba(244, 238, 249, 0.5);
        box-shadow: 0 2px 8px 2px rgba(36, 36, 36, 0.2);
    }
    .all-offers table th{
        font-size: 14px;
        background-color: rgba(111, 119, 123, 0.2);
    }
    .all-offers table td{
        font-size: 13px;
    }

    .all-offers table th:last-child{
        width: 100px;
        text-align: center;
    }
    .all-offers table th:first-child{
        width: 250px;
    }

    .login-candidat a{
        text-decoration: none;
        text-align: center;
    }
    p{
        font-size: 13px;
    }
    .title-profile table{
        margin-left: 20px;
        width: 96%;
    }
    /*-------------------------*/

    .side{
        width: 250px;
        position: relative;
        display: inline-table;
        top: 4px;

    }
    .side-b{
        text-align: left;
        font-size: 13px;
        margin-bottom: 30px;
    }
    .side-b  th, td{
        border-bottom: 1px solid #d8d8d8;
    }
    .bd-article{
        display: inline-table;
        top: 0;
        width: 860px;
        min-height: 700px;
        margin: 0 20px 30px 90px;
    }
    /*-------------------------*/


</style>
<div id="app">

    <div id="he" class="login-candidat bd-article">
        <!---------------------------Espace candidat-Menu------------------------------>
        <div  class="menu-profile">
            <a class="activate" id="profile">Mon Profile</a>
            <a  id="msgCandidat">Messages reçus</a>
            <a  id="cvProfile">Cv & Lettre</a>
            <a id="postulated">Offres postulé</a>
            <a  id="settingsCand">Paramètres</a>

        </div>

        <!---------------------------espace candidat-header------------------------------>
        <div class="header-profile">
            <hr>
            <form action="#he" method="post" enctype="multipart/form-data">
                <table>
                    <tr>

                        <th ><img  class="image-profile" src="{{asset('storage/'.$cands->pic_profile )}}"  alt=""></th>
                        <th><h2 style="position: absolute; top: 60px;"> @{{userc.first_name+'.'+userc.last_name}}</h2></th>
                        <th><p>@{{userc.email}}</p></th>

                        <th >
                            <div style="font-size: 34px;color: #276e8f">Votre Espace Candidat</div>
                        </th>
                    </tr>
                    <!--tr>
                        <th style="display: inline"><button type="submit"  name="btn_ph" value="tr" style="width: 70px;" >changer</button>
                            <input style="width: 70px;" uk-tooltip="Choisi une photo de profil"  name="photo_candidat" type="file">
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr-->
                </table>
            </form>

        </div>

        <!--------------------------Profile candidat------------------------------>
        <div id="prof">
            <div class="title-profile samuray">
                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                    Mon Profile
                </div>
                <table>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </div>
            <!-------------------------summary candidats--------->
            <!-------------------------summary candidats--------->

            <div id="smry">
                <div class="title-profile samuray">
                    <table>
                        <tr>
                            <th>Mon résumé</th>
                            <th><a style="font-size: 13px;width: 80px;height: 20px;" href="#prof" id="btn-add-resume" class="btn-jb btn-add-profile"
                                   uk-tooltip="Modifier votre résumé">Modifier</a></th>
                        </tr>
                    </table>
                </div>



                <p style="margin: 0">Imaginez que vous avez 2 minutes pour vous vendre à un recruteur. Utilisez cet espace pour les convaincre.</p>

                <p  style="margin: 0"><?=48484;?></p>


                <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=smr';?>#prof" method="post">
                    <table id="resume2">
                        <tr><th><label class="label-jb" for="summary_description">Description :</label></th></tr>
                        <tr><th><textarea class="input-jb" id="summary_description" name="summary_description"
                                          style="height: 100px;width: 700px ; font-size: 16px;" cols="30" rows="40" required></textarea></th></tr>
                        <tr>
                            <th style="float: right;">
                                <input style="font-size: 15px;width: 80px;height: 24px;" id="btn-hide-formres" class="btn-red-jb"  type="button" value="Annuler">
                                <button id="btn_sv_smr" class="btn-jb" type="submit">Enregistrer</button>
                                <input type="hidden" id="validc" name="validc" value="smr">

                            </th>
                        </tr>
                    </table>
                </form>
            </div>

            <!----------------Experience candidats------------------------->
            <!----------------Experience candidats------------------------->
            <div id="ex">
                <hr>
                <div class="title-profile experience">
                    <table style="font-size: 15px">
                        <tr>
                            <th>Expérience</th>
                            <th></th>
                        </tr>
                        <tr><td>Assurez-vous de mettre en avant vos qualités pour le poste</td>
                            <td><a style="font-size: 13px;width: 80px;height: 20px;" href="#ex" id="btn-add-exper" class="btn-jb btn-add-profile"
                                   uk-tooltip="Ajouter une expérience" >Ajouter</a></td>
                        </tr>
                    </table>
                </div>



                <div class="all-offers shtbl">

                    <table>
                        <tr>
                            <th>Date D'experience</th>
                            <th>Experience</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        <tr>
                            <td>
                                Date début :<?=484 ;?><br>
                                Date Fin :<?=484 ;?><br>
                            </td>
                            <td><?=484 ;?></td>
                            <td><?=484 ;?></td>
                            <td>
                                <a uk-tooltip="Modifier" href="<?='index.php?p=yourjobs.candidat&s=cand&etat=updexp&idexp=&tle=&srtd=&endd=&dese=';?>#ex">
                                    <img src="/projet_recrute/public/img/modifier-icon.png" alt="">
                                </a>
                                <a uk-tooltip="Supprimer" href="<?='index.php?p=yourjobs.candidat&s=cand&etat=dltexp&idexp=' ;?>#ex"><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                            </td>
                        </tr>

                    </table>
                </div>

                <div id="experience2" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=addexp'; ?>#ex" method="post">
                        <table>
                            <tr><th><label class="label-jb" for="title_experience">Titre de l'experience :</label></th></tr>
                            <tr><th><input type="text" class="input-jb" name="title_experience" id="title_experience" required></th></tr>

                            <tr><th><label class="label-jb" for="description_exp">Description :</label></th></tr>
                            <tr>
                                <th><textarea class="input-jb" id="description_exp" name="description_exp"
                                              style="height: 100px;" cols="30" rows="40" required></textarea></th>
                            </tr>

                        </table>
                        <table>
                            <tr><th><label class="label-jb" for="start_date_exp">Date de début :</label></th></tr>
                            <tr><th><input type="date" class="input-jb" name="start_date_exp" id="start_date_exp" required></th></tr>
                            <tr><th><label class="label-jb" for="end_date_exp">Date de fin :</label></th></tr>
                            <tr><th><input type="date" class="input-jb" name="end_date_exp" id="end_date_exp" required></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a href="#ex" id="btn-hide-exper" class="btn-red-jb" type="button" >Annuler</a>
                                    <button  id="btn_sv_exp" class="btn-jb" type="submit">Enregistrer</button>
                                    <input type="hidden" id="validexp" name="validexp" value="exp">
                                </th>
                            </tr>
                        </table>
                    </form>

                </div>

                <div id="experienceUpd" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=updexp&idexp='; ?>#ex" method="post">
                        <table>
                            <tr><th><label class="label-jb" for="title_experienceu">Titre de l'experience :</label></th></tr>
                            <tr><th><input type="text" class="input-jb" name="title_experience" id="title_experienceu"  required></th></tr>

                            <tr><th><label class="label-jb" for="description_expu">Description :</label></th></tr>
                            <tr>
                                <th><textarea class="input-jb" id="description_expu" name="description_exp"
                                              style="height: 100px;" cols="30" rows="40" required><?=4545 ;?></textarea></th>
                            </tr>

                        </table>
                        <table>
                            <tr><th><label class="label-jb" for="start_date_expu">Date de début :</label></th></tr>
                            <tr><th><input type="date" class="input-jb" name="start_date_exp" id="start_date_expu"  required></th></tr>
                            <tr><th><label class="label-jb" for="end_date_expu">Date de fin :</label></th></tr>
                            <tr><th><input type="date" class="input-jb" name="end_date_exp" id="end_date_expu"  required></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a style="font-size: 15px;width: 80px;height: 24px;" href="#ex" id="btn_hide_upd_exp" class="btn-red-jb"  type="button" >Annuler</a>
                                    <button id="btn_upd_exp" class="btn-jb" type="submit">Enregistrer la modification</button>
                                    <input type="hidden" id="udp_exp" name="udp_exp" value="udpexp">
                                </th>
                            </tr>
                        </table>
                    </form>

                </div>

            </div>

            <!---------Education candidats--------->
            <!---------Education candidats--------->
            <!---------Education candidats--------->
            <div id="ed">
                <hr>
                <div class="title-profile education">
                    <table style="font-size: 15px">
                        <tr>
                            <th>Education</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Indiquez-nous quelques mots sur votre parcours académique </td>
                            <td><a style="font-size: 13px;width: 80px;height: 20px;" href="#ed" id="btn-add-educa"  class="btn-jb btn-add-profile" type="button"
                                   uk-tooltip="Ajouter une formation">Ajouter</a></td>
                        </tr>

                    </table>
                </div>
                <div class="all-offers shtbl">
                    <table>
                        <tr>
                            <th>Date de Formation</th>
                            <th>Formation</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        <tr>
                            <td>
                                Date début :<?=455 ;?><br>
                                Date Fin :<?=455 ;?><br>
                            </td>
                            <td><?=455 ;?></td>
                            <td><?=455 ;?></td>
                            <td>
                                <a uk-tooltip="Modifier" href="<?='index.php?p=yourjobs.candidat&s=cand&etat=upded&ided=&dplm=&disc=&srtd=&endd=' ;?>#ed" ><img src="/projet_recrute/public/img/modifier-icon.png" alt=""></a>
                                <a uk-tooltip="Supprimer" href="<?='index.php?p=yourjobs.candidat&s=cand&etat=dlted&ided=' ;?>#ed" ><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                            </td>
                        </tr>

                    </table>
                </div>

                <div id="education2" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=added'; ?>#ed" method="post">
                        <table>
                            <tr><th><label class="label-jb" for="diploma">Diplome & formation :</label></th></tr>
                            <tr><th><input type="text" class="input-jb" name="diploma" id="diploma" required></th></tr>

                            <tr><th><label class="label-jb" for="description_diploma">Description :</label></th></tr>
                            <tr>
                                <th><textarea class="input-jb" id="description_diploma" name="description_diploma"
                                              style="height: 100px;" cols="30" rows="40" required></textarea></th>
                            </tr>

                        </table>
                        <table>
                            <tr><th><label class="label-jb" for="start_date_diploma">Date de début :</label></th></tr>
                            <tr><th><input type="date" class="input-jb" name="start_date_diploma" id="start_date_diploma" required></th></tr>
                            <tr><th><label class="label-jb" for="end_date_diploma">Date de fin :</label></th></tr>
                            <tr><th><input type="date" class="input-jb" name="end_date_diploma" id="end_date_diploma" required></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a style="font-size: 15px;width: 80px;height: 24px;" href="#ed" id="btn-hide-educa" class="btn-red-jb"  type="button">Annuler</a>
                                    <button id="btn-add-ed"  class="btn-jb" type="submit">Enregistrer</button>
                                    <input type="hidden" id="valideduc" name="valideduc" value="educ">

                                </th>
                            </tr>
                        </table>
                    </form>

                </div>


                <div id="educationUpd" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=upded&ided='; ?>#ed" method="post">
                        <table>
                            <tr><th><label class="label-jb" for="diploma_ed">Diplome & formation :</label></th></tr>
                            <tr><th><input type="text" class="input-jb" name="diploma" id="diploma_ed"  required></th></tr>

                            <tr><th><label class="label-jb" for="description_diploma_ed">Description :</label></th></tr>
                            <tr>
                                <th><textarea class="input-jb" id="description_diploma_ed" name="description_diploma"
                                              style="height: 100px;" cols="30" rows="40" required></textarea></th>
                            </tr>

                        </table>
                        <table>
                            <tr><th><label class="label-jb" for="start_date_diploma_ed">Date de début :</label></th></tr>
                            <tr><th><input  type="date" class="input-jb" name="start_date_diploma" id="start_date_diploma_ed" required></th></tr>
                            <tr><th><label class="label-jb" for="end_date_diploma_ed">Date de fin :</label></th></tr>
                            <tr><th><input  type="date" class="input-jb" name="end_date_diploma" id="end_date_diploma_ed" required></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a style="font-size: 15px;width: 80px;height: 24px;" href="#ed" id="btn-hide-educa-upd" class="btn-red-jb"  type="button">Annuler</a>
                                    <button id="btn_upd_ed"  class="btn-jb" type="submit">Enregistrer</button>
                                    <!--input type="hidden" id="udp_ed" name="udp_ed" value="upded"-->
                                </th>
                            </tr>
                        </table>
                    </form>

                </div>

            </div>

            <!---------Competence candidats--------->
            <!---------Competence candidats--------->
            <!---------Competence candidats--------->

            <div id="cmp">
                <hr>
                <div class="title-profile competence">
                    <table style="font-size: 15px">
                        <tr>
                            <th>Compétences</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Quelles sont les compétences qui vous différencient ?</td>
                            <td><a style="font-size: 13px;width: 80px;height: 20px;" href="#cmp" id="btn-add-compet"  class="btn-jb btn-add-profile" type="button"
                                   uk-tooltip="ajouter une compétence">Ajouter</a></td>
                        </tr>
                    </table>
                </div>
                <div class="all-offers shtbl">
                    <table>
                        <tr>
                            <th>Competence</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>


                    </table>
                </div>

                <div id="competence2" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=addcomp'; ?>#cmp" method="post">
                        <table>
                            <tr><th><label class="label-jb" for="title_competence">Competence :</label></th></tr>
                            <tr><th><input type="text" class="input-jb" name="title_competence" id="title_competence" required></th></tr>
                            <tr><th><label class="label-jb" for="description_competence">Description :</label></th></tr>
                            <tr><th><textarea class="input-jb" id="description_competence" name="description_competence"
                                              style="height: 100px;" cols="30" rows="40" required></textarea></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a href="#cmp" style="font-size: 15px;width: 80px;height: 24px;" id="btn-hide-compet"
                                       class="btn-red-jb"  type="button">Annuler</a>
                                    <button class="btn-jb" type="submit">Enregistrer</button>
                                    <input type="hidden" id="validcomp" name="validcomp" value="comp">

                                </th>
                            </tr>

                        </table>
                    </form>
                </div>
                <hr>


                <div id="competenceUpd" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=updcomp&idcomp='; ?>#cmp" method="post">
                        <table>
                            <tr><th><label class="label-jb" for="title_competence_com">Competence :</label></th></tr>
                            <tr><th><input  type="text" class="input-jb" name="title_competence" id="title_competence_com" required></th></tr>
                            <tr><th><label class="label-jb" for="description_competence_com">Description :</label></th></tr>
                            <tr><th><textarea class="input-jb" id="description_competence_com" name="description_competence"
                                              style="height: 100px;" cols="30" rows="40" required></textarea></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a href="#cmp" style="font-size: 15px;width: 80px;height: 24px;" id="btn-hide-updcomp"
                                       class="btn-red-jb"  type="button" >Annuler</a>
                                    <button class="btn-jb" type="submit">Enregistrer</button>
                                    <!--input type="hidden" id="upd_comp" name="upd_comp" value="udpcomp"-->

                                </th>
                            </tr>

                        </table>
                    </form>
                </div>


            </div>

            <!-----------------------------Langues candidats--------->
            <!-----------------------------Langues candidats--------->
            <!-----------------------------Langues candidats--------->

            <div id="lg">
                <div  class="title-profile language">
                    <table style="font-size: 15px">
                        <tr>
                            <th>Langues</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Quelles sont vous compétences linguistiques?</td>
                            <td><a style="font-size: 13px;width: 80px;height: 20px;" href="#lg" id="btn-add-lang"  class="btn-jb btn-add-profile" type="button"
                                   uk-tooltip="Ajouter une langue">Ajouter</a></td>
                        </tr>
                    </table>
                </div>

                <div class="all-offers shtbl">
                    <table>
                        <tr>
                            <th>Langue parlé</th>
                            <th>Niveau linguistique</th>
                            <th>Action</th>
                        </tr>

                    </table>
                </div>

                <div id="language2">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=addlang'; ?>#lg" method="post">
                        <table class="register-tbl">
                            <tr>
                                <th><label class="label-jb" for="language">Langue parlé :</label></th>
                                <th><label class="label-jb" for="level_language">Votre niveau :</label></th>
                            </tr>

                            <tr>
                                <th>
                                    <select class="input-jb" name="language" id="language" required>
                                        <option value="Arabe">Arabe</option>
                                        <option value="Français">Français</option>
                                        <option value="Englais">Englais</option>
                                        <option value="Espagnol">Espagnol</option>
                                        <option value="Allmande">Allmande</option>
                                        <option value="Italienne">Italienne</option>
                                    </select>
                                </th>
                                <th>
                                    <select class="input-jb" name="level_language" id="level_language" required>
                                        <option value="Langue maternelle">Langue maternelle</option>
                                        <option value="Bon">Bon</option>
                                        <option value="Moyenne">Moyenne</option>
                                        <option value="Notion de base">Notion de base</option>
                                    </select>
                                </th>
                            </tr>

                            <tr>
                                <th></th>
                                <th style="float: right;">
                                    <a href="#lg" style="font-size: 15px;width: 80px;height: 24px;"
                                       id="btn-hide-lang" class="btn-red-jb"  type="button">Annuler</a>
                                    <button class="btn-jb" type="submit">Enregistrer</button>
                                    <input type="hidden" id="validlang" name="validlang" value="lang">
                                </th>
                            </tr>

                        </table>

                    </form>
                </div>


                <div id="languageUpd">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=updlang&idlang='; ?>#lg" method="post">
                        <table class="register-tbl">
                            <tr>
                                <th><label class="label-jb" for="language_lg">Langue parlé :</label></th>
                                <th><label class="label-jb" for="level_language_lg">Votre niveau :</label></th>
                            </tr>

                            <tr>
                                <th>
                                    <select class="input-jb" name="language" id="language_lg" >
                                        <option value=""><?=48 ;?></option>
                                        <option value="Arabe">Arabe</option>
                                        <option value="Français">Français</option>
                                        <option value="Englais">Englais</option>
                                        <option value="Espagnol">Espagnol</option>
                                        <option value="Allmande">Allmande</option>
                                        <option value="Italienne">Italienne</option>
                                    </select>
                                </th>
                                <th>
                                    <select class="input-jb" name="level_language" id="level_language_lg">
                                        <option value=""><?=48 ;?></option>
                                        <option value="Langue maternelle">Langue maternelle</option>
                                        <option value="Bon">Bon</option>
                                        <option value="Moyenne">Moyenne</option>
                                        <option value="Notion de base">Notion de base</option>
                                    </select>
                                </th>
                            </tr>

                            <tr>
                                <th></th>
                                <th style="float: right;">
                                    <a href="#lg" style="font-size: 15px;width: 80px;height: 24px;" id="btn-hide-updlang"
                                       class="btn-red-jb"  type="button" >Annuler</a>
                                    <button class="btn-jb" type="submit">Enregistrer</button>
                                    <!--input type="hidden" id="updlang" name="updlang" value="updlang"-->
                                </th>
                            </tr>

                        </table>

                    </form>
                </div>
                <hr>

            </div>

            <!-----------------------------Hobbies candidats--------->
            <!-----------------------------Hobbies candidats--------->
            <!-----------------------------Hobbies candidats--------->

            <div id="hb">
                <hr>
                <div class="title-profile hobbies">
                    <table style="font-size: 15px">
                        <tr>
                            <th>Loisirs et centres d'intérêt</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Décrit vos loisirs et centres d'intérêt
                            <td><a style="font-size: 13px;width: 80px;height: 20px;" href="#hb"
                                   id="btn-add-hobbies"  class="btn-jb btn-add-profile" type="button"
                                   uk-tooltip="Ajouter une loisir">Ajouter</a></td>
                        </tr>
                    </table>
                </div>
                <div class="all-offers shtbl">
                    <table>
                        <tr>
                            <th style="width: 450px;">Vos loisirs</th>
                            <th></th>
                            <th>Action</th>
                        </tr>

                        <tr>
                            <td><?=455 ;?></td>
                            <td></td>
                            <td>
                                <a uk-tooltip="Modifier"  href="<?='index.php?p=yourjobs.candidat&s=cand&etat=updhobb&idhobb=';?>#hb"><img src="/projet_recrute/public/img/modifier-icon.png" alt=""></a>
                                <a uk-tooltip="Supprimer" href="<?='index.php?p=yourjobs.candidat&s=cand&etat=dlthobb&idhobb=';?>#hb"><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                            </td>
                        </tr>
                    </table>
                </div>

                <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=addhobb'; ?>#hb" method="post">
                    <table id="hobbies2">
                        <tr>
                            <th><label class="label-jb" for="hobbie">Vos loisirs :</label></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th><input  type="text" class="input-jb" name="hobbie" id="hobbie" required></th>
                            <th style="float: right;padding-left: 30px">
                                <a href="#hb" style="font-size: 15px;width: 80px;height: 24px;"
                                   id="btn-hide-hobbies" class="btn-red-jb"  type="button" >Annuler</a>
                                <button  class="btn-jb" type="submit">Enregistrer</button>
                                <input type="hidden" id="validhobb" name="validhobb" value="hobb">

                            </th>
                        </tr>
                    </table>
                </form>



            </div>


        </div>

        <!-----------------------cv-candidat---------------------------------->

        <div id="cv_candidat">
            <hr id="cvdrg">
            <div class="title-profile">
                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                    Votre CV & Lettre de motivation
                </div>
                <table>
                    <tr>
                        <th></th>
                        <th style="float: right"><a href="#cvdrg" id="btn-addcv" type="button" style="font-size: 14px;text-decoration: none"
                                                    uk-tooltip="Téléchrger votre Cv & lettre de motivation"
                                                    class="btn-jb link-btn" >Télécharger</a></th>
                    </tr>
                </table>
            </div>
            <?php if (!empty($cvs)) :?>
            <p>Voici votre CV et lettre de motivation que vous avez téléchargés ou créés :</p>

            <div class="all-offers shtbl">

                <table>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Documment</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ( $cvs as $cv): ;?>
                    <tr>
                        <td><?=$cv->cv_title ;?><?php $cvt=$cv->cv_title ;?></td>
                        <td><?=$cv->cv_description ;?><?php $cvd=$cv->cv_description ;?></td>
                        <td><?=$cv->cv_file ;?><?php $cvf=$cv->cv_file ;?></td>
                        <td>
                            <a uk-tooltip="Ajouter" id="btn_mdf_cv" href="#cvdrg"><img src="/projet_recrute/public/img/add.png" alt=""></a>
                            <a uk-tooltip="Supprimer" href="<?='index.php?p=yourjobs.candidat&s=cand&etat=dltcv' ;?>#cvdrg"><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                        </td>
                    </tr>
                    <?php endforeach; ;?>
                    <?php foreach ( $letters as $letter): ;?>
                    <tr>
                        <td><?=$letter->letter_title ;?><?php $lett=$letter->letter_title ;?></td>
                        <td><?=$letter->letter_description ;?><?php $letd=$letter->letter_description ;?></td>
                        <td><?=$letter->letter_file ;?><?php $letf=$letter->letter_file ;?></td>
                        <td>
                            <a  uk-tooltip="Ajouter" id="btn_mdf_lt" href="#cvdrg"><img src="/projet_recrute/public/img/add.png" alt=""></a>
                            <a uk-tooltip="Supprimer" href="<?='index.php?p=yourjobs.candidat&s=cand&etat=dltlt' ;?>#cvdrg"><img src="/projet_recrute/public/img/dustbin.png" alt=""></a>
                        </td>
                    </tr>
                    <?php endforeach; ;?>
                </table>
            </div>
            <?php endif;?>


            <div id="addcv">
                <div class="title-profile ">
                    <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                        Ajouter un CV ou un lettre de motivation
                    </div>
                    <table>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <th  style="padding: 10px 0 15px 0; float: right;">
                                <label class="label-jb">Type de documment :</label>
                                <input  type="radio" id="cv"  name="doc" value="cv" checked required>
                                <label  for="cv" class="label-jb">Cv</label>
                                <input  type="radio" id="letter" name="doc" value="letter" required>
                                <label  for="letter" class="label-jb">Lettre de motivation</label>
                            </th>
                        </tr>
                    </table>
                </div>
                <!------------------Form cv------------------------>
                <div id="cvForm" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=updcv';?>#cvdrg" method="post" enctype="multipart/form-data">
                        <table>
                            <tr><th><label class="label-jb" for="cv_title">Titre de Cv :</label></th></tr>
                            <tr><th><input value="<?php if (!empty($cvt)){ echo $cvt;}  ?>" type="text" class="input-jb" id="cv_title" name="cv_title"  required></th></tr>

                            <tr><th><label class="label-jb" for="cv_description">Description :</label></th></tr>
                            <tr><th><textarea class="input-jb" id="cv_description" name="cv_description"
                                              style="height: 100px;" cols="30" rows="40" required><?php if (!empty($cvd)){ echo $cvd;}  ?></textarea></th></tr>

                        </table>
                        <table>
                            <tr><th><label class="label-jb" for="cv_file">Selectionner votre Cv :</label></th></tr>
                            <tr><th><input value="<?php if (!empty($cvf)){ echo $cvf;}  ?>" class="input-jb" id="cv_file" name="cv_file" type="file" required></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a href="#he" id="btn-hide-formcv" class="btn-red-jb link-btn" style="font-size: 16px" >Annuler</a>
                                    <button id="add-cv-s" class="btn-jb" type="submit">Enregistrer</button>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>


                <!------------------Form lettre motivation------------------------>
                <div id="letterForm" class="FormCandidats">
                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=updlt';?>#cvdrg" method="post" enctype="multipart/form-data">

                        <table>
                            <tr><th><label class="label-jb" for="letter_title">Titre lettre de motivation :</label></th></tr>
                            <tr><th><input value="<?php if (!empty($lett)){ echo $lett;}  ?>" type="text" class="input-jb" id="letter_title" name="letter_title" required></th></tr>
                            <tr><th><label class="label-jb" for="letter_description">Description :</label></th></tr>
                            <tr><th><textarea class="input-jb" id="letter_description" name="letter_description"
                                              style="height: 100px;" cols="30" rows="40" required><?php if (!empty($letd)){ echo $letd;}  ?></textarea></th></tr>
                        </table>
                        <table>
                            <tr><th><label class="label-jb" for="letter_file">Selectionner votre lettre de motivation :</label></th></tr>
                            <tr><th><input value="<?php if (!empty($letf)){ echo $letf;}  ?>" class="input-jb" name="letter_file" id="letter_file" type="file" required></th></tr>
                            <tr>
                                <th style="float: right;">
                                    <a id="btn-hide-formlett" class="btn-red-jb link-btn" style="font-size: 16px">Annuler</a>
                                    <button id="add-letter-s" class="btn-jb" type="submit">Enregistrer</button>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>


            </div>

        </div>

        <!---------------------Paramètres--candidat----------------------------->
        <div id="pr_cand">
            <div>
                <hr id="pr">
                <div class="title-profile">
                    <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                        Paramètres
                    </div>
                    <table>
                        <tr>
                            <th>Vos paramètres du profil</th>
                            <th style="float: right"><a  @click="editSettc(userc,cand)"  href="#pr" id="btn-upadte-settingsold" class="btn-jb link-btn"
                                            type="button" uk-tooltip="Modifier vos paramètres">Modifier</a></th>
                        </tr>
                    </table>

                </div>

                <table class="settings-prof" style="font-size: 13px">


                    <tr>
                        <th>Nom :</th>
                        <td><div  v-if="updtsettc">
                                <input  minlength="4" class="input-jb" name="last_name" type="text"
                                        v-model="updateSettc.last_name"  style="width: 180px;height: 25px">
                            </div>
                            <div v-if="updtsettc2">@{{  userc.last_name }}</div>
                        </td>
                        <th style="padding-left: 100px;">Prénom :</th>
                        <td>
                            <div  v-if="updtsettc">
                                <input  minlength="4" class="input-jb" name="first_name" type="text"
                                        v-model="updateSettc.first_name"  style="width: 180px;height: 25px"><br>
                            </div>
                            <div v-if="updtsettc2">@{{ userc.first_name }}</div>
                        </td>
                    </tr>

                    <tr>
                        <th>Date de naissance :</th>
                        <td>
                            <div  v-if="updtsettc">
                                <input  class="input-jb" name="birthday" type="date"
                                        v-model="updateSettc.birthday"  style="width: 180px;height: 25px"><br>
                            </div>
                            <div v-if="updtsettc2">@{{cand.birthday}}</div>
                        </td>
                        <th style="padding-left: 100px;">Email :</th>
                        <td>
                            <div  v-if="updtsettc">
                                <input class="input-jb" name="email" type="email"
                                        v-model="updateSettc.email"  style="width: 180px;height: 25px"><br>
                            </div>
                            <div v-if="updtsettc2">@{{ userc.email }}</div>
                        </td>
                    </tr>

                    <tr>
                        <th>Adresse :</th>
                        <td>
                            <div  v-if="updtsettc">
                                <input  minlength="100" class="input-jb" name="address" type="text"
                                        v-model="updateSettc.address"  style="width: 180px;height: 25px"><br>
                            </div>
                            <div v-if="updtsettc2">@{{ userc.address }}</div>
                        </td>
                        <th style="padding-left: 100px;">Mot de passe :</th>
                        <td>
                            <div  v-if="updtsettc">
                                <input   class="input-jb" name="password" type="password"
                                        v-model="updateSettc.password"  style="width: 180px;height: 25px"><br>
                            </div>
                            <div v-if="updtsettc2">*********</div>

                        </td>
                    </tr>
                    <tr>
                        <th>Sexe :</th>
                        <td>
                            <div v-if="updtsettc"><select  style="width: 190px;height: 30px" class="input-select input-jb"
                                                          v-model="updateSettc.gender"  name="city" >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>

                                </select></div>
                            <div v-if="updtsettc2">@{{ userc.gender }}</div>
                        </td>
                        <th style="padding-left: 100px;">Lieu :</th>
                        <td>
                            <div v-if="updtsettc"><select  style="width: 190px;height: 30px" class="input-select input-jb"
                                                          v-model="updateSettc.city"  name="city" >
                                    <option value="AGADIR">AGADIR</option>
                                    <option value="AL-HAOUZ">AL HAOUZ</option>
                                    <option value="AL-HOCEIMA">AL HOCEIMA</option>
                                    <option value="AL-ISMAILIA">AL ISMAILIA</option>
                                    <option value="AOUSSERED">AOUSSERED</option>
                                    <option value="ASSILAH">ASSILAH</option>
                                    <option value="AZILAL">AZILAL</option>
                                    <option value="BEN-SLIMANE">BEN SLIMANE</option>
                                    <option value="BENI-MELLAL">BENI MELLAL</option>
                                    <option value="BERRECHID">BERRECHID</option>
                                    <option value="BOUJDOUR">BOUJDOUR</option>
                                    <option value="BOUKNADEL">BOUKNADEL</option>
                                    <option value="BOULEMANE">BOULEMANE</option>
                                    <option value="CASABLANCA">CASABLANCA</option>
                                    <option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
                                    <option value="CHICHAOUA">CHICHAOUA</option>
                                    <option value="EL-JADIDA">EL JADIDA</option>
                                    <option value="ERRACHIDIA">ERRACHIDIA</option>
                                    <option value="ES-SEMARA">ES-SEMARA</option>
                                    <option value="ESSAOUIRA">ESSAOUIRA</option>
                                    <option value="FES">FES</option>
                                    <option value="FIGUIG">FIGUIG</option>
                                    <option value="GUELMIM">GUELMIM</option>
                                    <option value="GUERCIF">GUERCIF</option>
                                    <option value="IFRANE">IFRANE</option>
                                    <option value="JERADA">JERADA</option>
                                    <option value="KENITRA">KENITRA</option>
                                    <option value="KHEMISSET">KHEMISSET</option>
                                    <option value="KHENIFRA">KHENIFRA</option>
                                    <option value="KHOURIBGA">KHOURIBGA</option>
                                    <option value="LAAYOUNE">LAAYOUNE</option>
                                    <option value="LARACHE">LARACHE</option>
                                    <option value="MARRAKECH-MENARA">MARRAKECH - MENARA</option>
                                    <option value="MARRAKECH-GUELIZ-ENNAKHIL">MARRAKECH GUELIZ-ENNAKHIL</option>
                                    <option value="MDIQ">MDIQ</option>
                                    <option value="MEDIOUNA">MEDIOUNA</option>
                                    <option value="MEKNES">MEKNES</option>
                                    <option value="MIDELT">MIDELT</option>
                                    <option value="MOHAMMEDIA">MOHAMMEDIA</option>
                                    <option value="NADOR">NADOR</option>
                                    <option value="OUARZAZATE">OUARZAZATE </option>
                                    <option value="OUEZZANE">OUEZZANE</option>
                                    <option value="OUJDA">OUJDA</option>
                                    <option value="PLUSIEURS-VILLES">PLUSIEURS VILLES</option>
                                    <option value="RABAT-AGDAL">RABAT AGDAL</option>
                                    <option value="RABAT-CENTRE">RABAT CENTRE</option>
                                    <option value="RHAMNA">RHAMNA</option>
                                    <option value="SAFI">SAFI</option>
                                    <option value="SALE">SALE</option>
                                    <option value="SEFROU">SEFROU</option>
                                    <option value="SETTAT">SETTAT</option>
                                    <option value="SIDI-IFNI">SIDI IFNI</option>
                                    <option value="SIDI-KACEM">SIDI KACEM  </option>
                                    <option value="SIDI-SLIMANE">SIDI SLIMANE</option>
                                    <option value="SIDI-YAHYA-(M)">SIDI YAHYA (M)</option>
                                    <option value="SIDI-YOUSSEF-BEN-ALI">SIDI YOUSSEF BEN ALI</option>
                                    <option value="SKHIRATE-TEMARA">SKHIRATE TEMARA</option>
                                    <option value="TAN-TAN">TAN-TAN</option>
                                    <option value="TANGER">TANGER</option>
                                    <option value="TAROUDANT">TAROUDANT</option>
                                    <option value="TAZA">TAZA</option>
                                    <option value="TETOUAN">TETOUAN</option>
                                    <option value="TINGHIR">TINGHIR</option>
                                    <option value="TIZNIT">TIZNIT</option>
                                    <option value="ZAGORA">ZAGORA</option>
                                </select></div>
                            <div v-if="updtsettc2">@{{ userc.city }}</div>
                        </td>
                    </tr>
                    <tr>
                        <th>GSM :</th>
                        <td>
                            <div v-if="updtsettc"><input  v-model="updateSettc.phone" minlength="10" maxlength="10" style="width: 180px;height: 25px" class="input-jb"  name="phone" type="tel"></div>
                            <div v-if="updtsettc2">@{{ userc.phone }}</div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="float: right;">
                            <a v-if="updtsettc" href="#pr" @click="updtsettc=false,updtsettc2=true" class="btn-red-jb link-btn" type="button">Annuler</a>
                            <a v-if="updtsettc" href="#pr" @click="updtsettc=false,updtsettc2=true,UpdateSettc()" class="btn-jb link-btn" type="button">Enregister</a>
                        </th>
                    </tr>


                </table>
                <div id="settings-candida">
                    <hr>
                    <div class="title-profile ">
                        <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                            Modifier vos paramètres du profil
                        </div>

                    </div>

                    <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=updUserC';?>#pr" method="post">
                        <table class="register-tbl" >
                            <tr>
                                <th><label class="label-jb" for="lastName">Nom :</label></th>
                                <th><label class="label-jb" for="firstName">Prénom :</label></th>
                            </tr>
                            <tr>
                                <th><input minlength="3" class="input-jb" id="lastName" name="last_name" type="text" required></th>
                                <th><input minlength="3"  class="input-jb" id="firstName" name="first_name" type="text" required></th>
                            </tr>

                            <tr>
                                <th><label class="label-jb" for="birthday">Date de naissance :</label></th>
                                <th><label class="label-jb" for="email">Email :</label></th>
                            </tr>

                            <tr>
                                <th><input class="input-jb" id="birthday" name="birthday" type="date" required></th>
                                <th><input  class="input-jb" id="email" name="email_candidat" type="email" required></th>
                            </tr>
                            <tr>
                                <th><label class="label-jb" for="address_cand">Adresse :</label></th>
                                <th><label class="label-jb" for="city_candidat">Ville :</label></th>
                            </tr>

                            <tr>
                                <th><input  class="input-jb" id="address_cand" name="address_cand" type="text" required></th>
                                <th>
                                    <select class="input-select input-jb"  name="city_candidat" id="city_candidat" required>
                                        <option selected="selected""><?= 454;?></option>
                                        <option value="AGADIR">AGADIR</option>
                                        <option value="AL-HAOUZ">AL HAOUZ</option>
                                        <option value="AL-HOCEIMA">AL HOCEIMA</option>
                                        <option value="AL-ISMAILIA">AL ISMAILIA</option>
                                        <option value="AOUSSERED">AOUSSERED</option>
                                        <option value="ASSILAH">ASSILAH</option>
                                        <option value="AZILAL">AZILAL</option>
                                        <option value="BEN-SLIMANE">BEN SLIMANE</option>
                                        <option value="BENI-MELLAL">BENI MELLAL</option>
                                        <option value="BERRECHID">BERRECHID</option>
                                        <option value="BOUJDOUR">BOUJDOUR</option>
                                        <option value="BOUKNADEL">BOUKNADEL</option>
                                        <option value="BOULEMANE">BOULEMANE</option>
                                        <option value="CASABLANCA">CASABLANCA</option>
                                        <option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
                                        <option value="CHICHAOUA">CHICHAOUA</option>
                                        <option value="EL-JADIDA">EL JADIDA</option>
                                        <option value="ERRACHIDIA">ERRACHIDIA</option>
                                        <option value="ES-SEMARA">ES-SEMARA</option>
                                        <option value="ESSAOUIRA">ESSAOUIRA</option>
                                        <option value="FES">FES</option>
                                        <option value="FIGUIG">FIGUIG</option>
                                        <option value="GUELMIM">GUELMIM</option>
                                        <option value="GUERCIF">GUERCIF</option>
                                        <option value="IFRANE">IFRANE</option>
                                        <option value="JERADA">JERADA</option>
                                        <option value="KENITRA">KENITRA</option>
                                        <option value="KHEMISSET">KHEMISSET</option>
                                        <option value="KHENIFRA">KHENIFRA</option>
                                        <option value="KHOURIBGA">KHOURIBGA</option>
                                        <option value="LAAYOUNE">LAAYOUNE</option>
                                        <option value="LARACHE">LARACHE</option>
                                        <option value="MARRAKECH-MENARA">MARRAKECH - MENARA</option>
                                        <option value="MARRAKECH-GUELIZ-ENNAKHIL">MARRAKECH GUELIZ-ENNAKHIL</option>
                                        <option value="MDIQ">MDIQ</option>
                                        <option value="MEDIOUNA">MEDIOUNA</option>
                                        <option value="MEKNES">MEKNES</option>
                                        <option value="MIDELT">MIDELT</option>
                                        <option value="MOHAMMEDIA">MOHAMMEDIA</option>
                                        <option value="NADOR">NADOR</option>
                                        <option value="OUARZAZATE">OUARZAZATE </option>
                                        <option value="OUEZZANE">OUEZZANE</option>
                                        <option value="OUJDA">OUJDA</option>
                                        <option value="PLUSIEURS-VILLES">PLUSIEURS VILLES</option>
                                        <option value="RABAT-AGDAL">RABAT AGDAL</option>
                                        <option value="RABAT-CENTRE" selected>RABAT CENTRE</option>
                                        <option value="RHAMNA">RHAMNA</option>
                                        <option value="SAFI">SAFI</option>
                                        <option value="SALE">SALE</option>
                                        <option value="SEFROU">SEFROU</option>
                                        <option value="SETTAT">SETTAT</option>
                                        <option value="SIDI-IFNI">SIDI IFNI</option>
                                        <option value="SIDI-KACEM">SIDI KACEM  </option>
                                        <option value="SIDI-SLIMANE">SIDI SLIMANE</option>
                                        <option value="SIDI-YAHYA-(M)">SIDI YAHYA (M)</option>
                                        <option value="SIDI-YOUSSEF-BEN-ALI">SIDI YOUSSEF BEN ALI</option>
                                        <option value="SKHIRATE-TEMARA">SKHIRATE TEMARA</option>
                                        <option value="TAN-TAN">TAN-TAN</option>
                                        <option value="TANGER">TANGER</option>
                                        <option value="TAROUDANT">TAROUDANT</option>
                                        <option value="TAZA">TAZA</option>
                                        <option value="TETOUAN">TETOUAN</option>
                                        <option value="TINGHIR">TINGHIR</option>
                                        <option value="TIZNIT">TIZNIT</option>
                                        <option value="ZAGORA">ZAGORA</option>
                                    </select>
                                </th>
                            </tr>


                            <tr>
                                <th><label class="label-jb" for="password">Nouveau mot de passe :</label></th>
                                <th><label class="label-jb" for="gsm">GSM :</label></th>
                            </tr>
                            <tr>
                                <th><input class="input-jb" id="password" name="password_candidat" type="password" required></th>
                                <th><input minlength="10" maxlength="10" class="input-jb" id="gsm" name="gsm" type="tel" required></th>
                            </tr>
                            <tr>
                                <th><input onclick="tpcp()" id="box-pass-register" name="box-pass-register" type="checkbox">
                                    <label class="label-jb" for="box-pass-register">Afficher le mot de passe</label></th>
                                <th  style="padding: 10px 0 10px 0;">
                                    <label class="label-jb">Sexe :</label>
                                    <input  type="radio" id="male"  name="gender" value="male" checked><label for="male" class="label-jb">Homme</label>
                                    <input  type="radio" id="female" name="gender" value="female"><label for="female" class="label-jb">Femme</label>
                                </th>
                            </tr>

                            <tr>
                                <th></th>
                                <th style="float: right;">
                                    <a href="#he" id="btn-hide-formsett"  class="btn-red-jb lik-btn">Annuler</a>
                                    <button  class="btn-jb" type="submit">Enregistrer</button>
                                </th>
                            </tr>

                        </table>
                    </form>

                </div>

                <hr>
                <div class="title-profile">
                    <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                        Supprimer mon compte
                    </div>
                    <table>
                        <tr>
                            <th><p>Cela supprimera de manière définitive vos informations enregistrées et l'historique de vos candidatures </p></th>
                            <th><a href="#pr" id="js-modal-confirm" class="btn-red-jb link-btn"
                                   uk-tooltip="Supprimer votre compte" style="font-size: 15px">Supprimer</a></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!------------------------------Message-table------------------------------------->
        <div id="msgC-tbl" class="all-offers  shtbl" style="display: none">
            <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                Tous les messages reçus
            </div>

            <table>
                <tr>
                    <th  style="width: 100px;">Expéditeur</th>
                    <th width="120">Nom Complet</th>
                    <th>Message</th>
                    <th width="170">Date d'envoi</th>
                    <th width="120">Email</th>
                    <th width="50">Action</th>
                </tr>


            </table>
            <!------------------------------ Modal  show msg-------------------->


            <!------------------------------ This is the modal  send msg-------------------->

        </div>

        <!---------------------offres-postulé-candidat----------------------------->

        <div id="offer_postulate">


            <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                Aucun offre postulé</div>
            <p>Nous vous invitent de chercher des offres d'emploi pour démarrez votre candidature</p>


            <div class="title-profile ">
                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                    Offres d'emploi Postulé
                </div>
            </div>
            <p>Bonne chance avec vos candidatures. Mettez toutes les chances de votre côté</p>

            <div class="all-offers shtbl">

                <table>
                    <tr>
                        <th style="width: 100px">Date</th>
                        <th width="200">Offre d'emploi</th>
                        <th width="150">Lieu</th>
                        <th width="150">Postulé le</th>
                        <th style="width: 100px">Entreprise</th>
                        <th>Action</th>
                    </tr>

                </table>

            </div>

        </div>

    </div> <!---end-bd-article-->

    <!--------------aside-------------------->
    <aside class="login-candidat side">
        <header>
            <h3 style="    background-color: rgba(19, 42, 62, 0.8);
;color: white;width: 100%;font-size: 24px;text-align: center;padding: 15px 10px;margin-left: -10px">Votre Espace Candidat</h3>

            <div class="">Ce que vous devez savoir</div>
            <hr>
            <div class="image-profile image-fb" style="margin: auto">

                <img style="width: 150px!important;" src="{{asset('storage/'.$cands->pic_profile )}}"
                     class="image-profile " alt="">
            </div>
        </header>
        <hr>

        <!-----------------send msg---------------------->

        <button class="btn-blue-jb-rev" uk-toggle="target: #my-id" type="button" style="width: auto;font-size: 15px">Envoyer un message</button>
        <input  type="hidden" uk-toggle="target: #msgc-failed" id="btn-auto">
        <!-- This is the modal -->

        <div id="my-id" uk-modal >

            <div class="uk-modal-dialog" style="width: 550px">
                <form action="<?='index.php?p=yourjobs.candidat&s=cand&etat=send-msg';?>" method="post">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h3 class="uk-modal-title">Envoyer un nouveau message</h3>
                    </div>

                    <div class="uk-modal-body" style="height: 170px;margin-top: -30px">
                        <table>
                            <tr><th style="float: left"><label class="label-jb" for="email_msg">À</label></th></tr>
                            <tr><th><input  class="input-jb" style="width: 490px;" name="email_msg" id="email_msg" type="email"  required></th></tr>
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

        <!----------------------------------Model-failed-msg--------------->

        <div id="msgc-failed" uk-modal >

            <div class="uk-modal-dialog" style="width: 550px">

                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Erreur!</h3>
                </div>

                <div class="uk-modal-body" style="height: 100px;margin-top: -30px;text-align: center">
                    <div style="margin-top: 30px;">Cet email n'est pas valide </div>
                </div>
                <div class="uk-modal-footer">
                </div>

            </div>

        </div>


        <div class="side-b">
            <hr>
            <h3 style="    background-color: rgba(25,53,80,0.8);
;color: white;width: 100%;font-size: 20px;text-align: center;padding: 10px 10px;margin-left: -10px">Vos Coordonnées</h3>
            <table style="font-size: 12px;width: 250px;">
                <tr><th style="width: 98px;">Nom :</th><td>@{{userc.last_name}}</td></tr>
                <tr><th style="width: 98px;">Prénom :</th><td>@{{userc.first_name}}</td></tr>
                <tr><th>Email :</th><td>@{{userc.email}}</td></tr>
                <tr><th>GSM :</th><td>@{{userc.phone}}</td></tr>
                <tr><th style="text-align: left;position: absolute">Adresse :</th><td>@{{userc.address+' '+userc.city}}</td></tr>

            </table>



        </div>
    </aside>


</div>



<script>



//------------confirm-delete-msg----------
   
//------------show-password------------
    $(document).on('click','a[href^="#"]',function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $($.attr(this,'href')).offset().top},'slow');
    });
    function tpcp() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
//---------------------confirm-delete-account-------------------------

</script>

<script>


    //---------------Profile----------------------
    $(document).ready(function(){

        <?php if (isset($_GET['msgc'])&&$_GET['msgc']==='failed'):?>
        $("#btn-auto").click();
        history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh
        <?php endif;?>

     //-----------------------------------------

        $("#pr_cand").hide();
     //-----------------------------------------

        $("#find").addClass("nav-active");
        $("#about").removeClass("nav-active");
        $("#contact").removeClass("nav-active");
        $("#allof").removeClass("nav-active");
        $("#home").removeClass("nav-active");

//----------------Add-sammury-----------------------------
            $("#btn_sv_smr").click(function(){
                var   validc=$("#validc").val();
                var   desc=$("#summary_description").val();

                $.post("<?='index.php?p=yourjobs.candidat&s=cand&etat=smr'; ?>",
                    {
                        validc:validc,
                        summary_description:desc
                    },
                    function(data){
                        console.log(data);
                        console.log("hello");
                    });
            });


            //-------------------------------------------------------

        $("#profile,#btn-hide-updcomp,#btn-hide-updlang,#btn-hide-hobb,#btn-hide-educa-upd,#btn_hide_upd_exp,#btn-hide-educa,#btn-hide-compet,#btn-hide-exper,#btn-hide-formres,#btn-hide-hobbies,#btn-hide-lang").click(function(){
            $("#prof").fadeIn("slow");
            $("#resume2").hide();
            $("#experience2").hide();
            $("#education2").hide();
            $("#language2").hide();
            $("#hobbies2").hide();
            $("#competence2").hide();
            $("#pr_cand").hide();
            $("#cv_candidat").hide();
            $("#offer_postulate").hide();
            $("#experienceUpd").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh

        });
        //-----------------profile resume--------------------
        $("#btn-add-resume").click(function(){
            $("#resume2").fadeIn("slow");
            $("#experience2").hide();
            $("#education2").hide();
            $("#language2").hide();
            $("#hobbies2").hide();
            $("#competence2").hide();
            $("#experienceUpd").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh

        });
        $("#btn-add-exper").click(function(){
            $("#resume2").hide();
            $("#experienceUpd").hide();
            $("#experience2").fadeIn("slow");
            $("#education2").hide();
            $("#language2").hide();
            $("#hobbies2").hide();
            $("#competence2").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh

        });

        $("#btn_upd_exp,#modif-exp").click(function(){
            $("#resume2").hide();
            $("#experienceUpd").fadeIn("slow");
            $("#experience2").hide();
            $("#education2").hide();
            $("#language2").hide();
            $("#hobbies2").hide();
            $("#competence2").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh

        });
        $("#btn_upd_ed").click(function(){
            $("#resume2").hide();
            $("#experienceUpd").hide();
            $("#experience2").hide();
            $("#education2").hide();
            $("#language2").hide();
            $("#hobbies2").hide();
            $("#competence2").hide();
            $("#educationUpd").fadeIn("slow");
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh

        });
        $("#btn-add-educa").click(function(){
            $("#resume2").hide();
            $("#experience2").hide();
            $("#education2").fadeIn("slow");
            $("#language2").hide();
            $("#hobbies2").hide();
            $("#competence2").hide();
            $("#experienceUpd").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
              history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh


        });
        $("#btn-add-compet").click(function(){
            $("#resume2").hide();
            $("#experience2").hide();
            $("#education2").hide();
            $("#language2").hide();
            $("#hobbies2").hide();
            $("#competence2").fadeIn("slow");
            $("#experienceUpd").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
           history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh


        });
        $("#btn-add-lang").click(function(){
            $("#resume2").hide();
            $("#experience2").hide();
            $("#education2").hide();
            $("#language2").fadeIn("slow");

            $("#hobbies2").hide();
            $("#competence2").hide();
            $("#experienceUpd").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
          history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh

        });
        $("#btn-add-hobbies").click(function(){
            $("#resume2").hide();
            $("#experience2").hide();
            $("#education2").hide();
            $("#language2").hide();
            $("#hobbies2").fadeIn("slow");

            $("#competence2").hide();
            $("#experienceUpd").hide();
            $("#educationUpd").hide();
            $("#competenceUpd").hide();
            $("#languageUpd").hide();
            $("#hobbiesUpd").hide();
        history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh


        });


 //--------------------------Afficher  cv&letter----------------------------------
        $("#cvProfile,#btn-hide-formcv,#btn-hide-formlett").click(function(){
            $("#cv_candidat").fadeIn("slow");
            $("#cvForm").hide();
            $("#addcv").hide();
            $("#letterForm").hide();
            $("#prof").hide();
            $("#pr_cand").hide();
            $("#offer_postulate").hide();
        });
//------------------Menu-cand---------------------
        $("#profile").click(function(){
            $(this).addClass("activate");
            $("#msgCandidat").removeClass("activate");
            $("#cvProfile").removeClass("activate");
            $("#postulated").removeClass("activate");
            $("#settingsCand").removeClass("activate");
         $('html,body').animate({scrollTop: $("#he").offset().top}, 'slow' );
            $("#msgC-tbl").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh
        });
        $("#msgCandidat").click(function(){
            //----------sub-menu------
            $(this).addClass("activate");
            $("#profile").removeClass("activate");
            $("#cvProfile").removeClass("activate");
            $("#postulated").removeClass("activate");
            $("#settingsCand").removeClass("activate");
            $('html,body').animate({scrollTop: $("#he").offset().top}, 'slow' );
            //-------------tables----------
            $("#msgC-tbl").fadeIn("slow");
            $("#prof").hide();
            $("#offer_postulate").hide();
            $("#pr_cand").hide();  //hide settings
            $("#cv_candidat").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh
        });

        <?php if ((isset($_GET['dlt-msg'])&&$_GET['dlt-msg']==='tr')||(isset($_GET['etat'])&&$_GET['etat']==='send-msg')||(isset($_GET['msgc'])&&$_GET['msgc']==='tr')||(isset($_GET['msge'])&&$_GET['msge']==='tr')) :?>
        $("#msgCandidat").addClass("activate");
        $("#profile").removeClass("activate");
        $("#cvProfile").removeClass("activate");
        $("#postulated").removeClass("activate");
        $("#settingsCand").removeClass("activate");
        $('html,body').animate({scrollTop: $("#he").offset().top}, 'slow' );
        //-------------tables----------
        $("#msgC-tbl").fadeIn("slow");
        $("#prof").hide();
        $("#offer_postulate").hide();
        $("#pr_cand").hide();  //hide settings
        $("#cv_candidat").hide();
        //window.location="";
        history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh
        <?php endif;?>

        $("#cvProfile,#add-cv-s,#add-letter-s").click(function(){
            $("#cvProfile").addClass("activate");
            $("#profile").removeClass("activate");
            $("#msgCandidat").removeClass("activate");
            $("#postulated").removeClass("activate");
            $("#settingsCand").removeClass("activate");
           $('html,body').animate({scrollTop: $("#he").offset().top}, 'slow' );
            $("#msgC-tbl").hide();
            $("#prof").hide();
            $("#offer_postulate").hide();
            $("#pr_cand").hide();  //hide settings
            $("#cv_candidat").fadeIn("slow");
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh
        });
        <?php if ((isset($_GET['lt'])&&($_GET['lt']==='deleted'||$_GET['lt']==='add'||$_GET['lt']==='upd'))||(isset($_GET['cv'])&&($_GET['cv']==='deleted'||$_GET['cv']==='add'||$_GET['cv']==='upd'))) :?>
            $("#cvProfile").addClass("activate");
            $("#profile").removeClass("activate");
            $("#msgCandidat").removeClass("activate");
            $("#postulated").removeClass("activate");
            $("#settingsCand").removeClass("activate");
            $('html,body').animate({scrollTop: $("#he").offset().top}, 'slow' );
            $("#msgC-tbl").hide();
            $("#prof").hide();
            $("#offer_postulate").hide();
            $("#pr_cand").hide();  //hide settings
            $("#cv_candidat").fadeIn("slow");
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");
        <?php endif;?>


        $("#postulated").click(function(){
            $(this).addClass("activate");
            $("#msgCandidat").removeClass("activate");
            $("#cvProfile").removeClass("activate");
            $("#profile").removeClass("activate");
            $("#settingsCand").removeClass("activate");
           $('html,body').animate({scrollTop: $("#he").offset().top}, 'slow' );
            $("#msgC-tbl").hide();
            $("#prof").hide();
            $("#offer_postulate").fadeIn("slow");
            $("#pr_cand").hide();  //hide settings
            $("#cv_candidat").hide();
          history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh


        });
        $("#settingsCand").click(function(){
            $(this).addClass("activate");
            $("#msgCandidat").removeClass("activate");
            $("#cvProfile").removeClass("activate");
            $("#postulated").removeClass("activate");
            $("#profile").removeClass("activate");
            $('html,body').animate({scrollTop: $("#he").offset().top}, 'slow' );
            $("#msgC-tbl").hide();
            $("#prof").hide();
            $("#offer_postulate").hide();
            $("#pr_cand").fadeIn("slow");  //show settings
            $("#cv_candidat").hide();
            history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.candidat&s=cand';?>#he");//change url without refresh
        });

   //-----------------------Afficher form CV et lettre------------

            $("#btn-addcv,#btn_mdf_cv,#btn_mdf_lt").click(function(){
                $("#addcv").fadeIn("slow");
                $("#cvForm").fadeIn("slow");

            });
            $("#cv").click(function(){
                $("#cvForm").fadeIn("slow");
                $("#letterForm").hide();
            });
            $("#letter").click(function(){
                $("#letterForm").fadeIn("slow");
                $("#cvForm").hide();
            });

//-----------------------------------settings Candidats---------------------------------------


        $("#settingsCand,#btn-hide-formsett").click(function(){
            $("#pr_cand").fadeIn("slow");
            $("#settings-candida").hide();
            $("#prof").hide();
            $("#offer_postulate").hide();
            $("#cv_candidat").hide();
        });
        $("#btn-upadte-settings").click(function(){
            $("#settings-candida").fadeIn("slow");
        });
//-----------------------------------offres postulé---------------------------------------

        $("#postulated").click(function(){
            $("#offer_postulate").fadeIn("slow");
            $("#pr_cand").hide();
            $("#cv_candidat").hide();
            $("#prof").hide();

        });




//---------------------------------Redirection-------------------------------------------------------------



    });

</script>


    @endsection

@section('Vjs')


        <script>
            window.Laravel={!! json_encode([
            "csrfToken" =>  csrf_token(),
            "user_id" => $userc->id,
            "url" => url("/"),
        ]); !!}
        </script>

    <script>

        let app;
        app = new Vue({
            el: '#app',
            data: {
                userc: [],
                cand: [],
                updateSettc:{
                    user_id:window.Laravel.user_id,
                    first_name:'',
                    last_name:'',
                    email:'',
                    password:'',
                    gender:'',
                    address:'',
                    phone:'',
                    city:'',
                    birthday:'',
                },
                updtsettc: false,
                updtsettc2: true,

            },
            methods: {
                //-------Settings Candidate------
                getSettc: function () {
                    let self = this; // pour que les data enregistrer sur experiences [] au dessus
                    axios.get(window.Laravel.url +'/getSettc/'+window.Laravel.user_id) //recuperer url
                        .then(function (response) {
                            self.userc = response.data[0];
                            self.cand = response.data[1];
                            console.log('data :', response.data);
                        })
                        .catch(function (error) {
                            console.log('error :', error);
                        })
                },
                editSettc :function (usere, cand) {
                    let self = this;
                    self.updateSettc = Object.assign({}, usere, cand);  //combine btw two object
                    self.getSettc();
                    self.updtsettc2= false;
                    self.updtsettc= true;

                },
                UpdateSettc:function () {
                    let self = this;
                    axios.put(window.Laravel.url+'/updateSettc',self.updateSettc)
                        .then(function (response) {
                            console.log('data :', response.data);
                            if(response.data.etat=true){
                                self.updateSettc={
                                    user_id:wind
                                    ow.Laravel.user_id,
                                    first_name:'',
                                    last_name:'',
                                    email:'',
                                    password:'',
                                    gender:'',
                                    address:'',
                                    phone:'',
                                    city:'',
                                    birthday:'',
                                };

                                self.getSettc();
                            }

                        })
                        .catch(function (error) {
                            console.log('error :', error);
                        })
                } ,



            },

            created: function () {
                this.getSettc();  // afficher data sur la console
            }
        });

    </script>

@endsection