

@extends('view_mjob.template.yourjob_template')

@section('content')



    <style>
        .settings-prof  th{
            width: 250px;
            border-bottom: 0 ;
            border-top: 1px solid grey;
            font-size: 20px;
            font-weight: bolder;
            color: #276e8f;
            text-align: left;
            position: relative;
            display: inline-table;
            top: -1px;
        }
        .settings-prof td{
            text-align: left;
            padding-left: 0;
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
            width: 880px;
            margin: 0 20px 30px 90px;
        }
        /*-------------------------*/
        #offer-details,#update_offer_form,#prof-cand,#candidats_postulate{
            display: none;
        }

    </style>
<div id="app">
    <div class="login-candidat bd-article" id="om">


        <div class="menu-profile">
            <a href="#om" class="activate" id="menu-list-offers">Gérer vos offres d’emploi</a>
            <a href="#om" id="menu-msgEmpl">Messages reçus</a>
            <a href="#om" id="menu-add-offer">Publier un offre</a>
            <a href="#om" id="menu-settings-empl">Paramètres</a>
        </div>
        <hr>
        <div class="header-profile"><!-----------Header Profile employer--------:-->
            <form action="" method="post" enctype="multipart/form-data">
                <table>

                    <tr>
                        <th class="image-profile">

                            <img  src="{{asset('storage/'.$usere->users_employer->company_logo )}}"
                                  class="image-profile" alt="">
                        </th>
                        <th><h2 style="position: absolute; top: 60px;font-size: 25px"> {{ $usere->users_employer->company_name }}</h2></th>
                        <th><p style="font-size: 14px">{{ $usere->users_employer->company_sector }}</p></th>

                        <th style="font-size: 30px;width: 450px;padding: 0;color: #276e8f">
                            <p>Votre Espace Employeur</p>
                        </th>

                    </tr>
                    <tr>
                        <th style="display: inline"><button type="submit" name="btn_ph" value="tr" style="width: 70px;" >changer</button>
                            <input style="width: 70px;" uk-tooltip="Choisi une photo de profil" name="photo_empl" type="file">
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                </table>
            </form>


        </div>

        <!---------------------offres list employer----------------------------:-->

        <div id="list_offers">


             <!-----------------------------------offers-table list---------------------:-->
            <div id="offers-tbl">
                <div class="title-profile">
                    <table>
                        <tr><div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                                Liste de vos offres d’emploi
                            </div>
                        </tr>
                        <tr>
                            <th></th>
                            <th style="float: right">
                                <a @click="tgladdoffer(),offerwipe()" href="#add_offer"  class="link-btn btn-jb" id="form_add_offer" uk-tooltip="Ajouter un offre"
                                   type="button">Publier une annance</a>
                            </th>
                        </tr>
                    </table>

                </div>

                <div class="all-offers shtbl">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <th>logo</th>
                                <th>Date</th>
                                <th>Offre d'emploi</th>
                                <th>Secteur</th>
                                <th>Localisation</th>
                                <th width="120">Postulation</th>
                                <th width="60"></th>

                            </tr>

                            <tr v-for="offer in offers">
                                <td width="80"><a :uk-tooltip="offer.offer_title" :href="'http://localhost:8000/show_offer/'+offer.id">
                                        <img style="width: 70px;height: 50px" :src="'http://localhost:8000/img/'+offer.offer_pic" alt="">
                                    </a>
                                </td>
                                <td>@{{offer.created_at}}</td>
                                <td><a  uk-tooltip="Consulter cette offre" :href="'http://localhost:8000/show_offer/'+offer.id">@{{offer.offer_title }}</a></td>
                                <td>@{{offer.offer_sector}}</td>
                                <td>@{{offer.offer_city}}</td>
                                <td>
                                    <a uk-tooltip="<?=121 ;?> Candidatures postulé a cet offre" href="#offers-tbl">
                                        (@{{ offer.id }}) Candidats </a>
                                </td>
                                <td>
                                    <a @click="editOffer(offer),tgladdoffer()" uk-tooltip="Modifier" href="#add_offer"  :uk-icon="'file-edit'"></a>
                                    <a @click="deleteOffer(offer)" uk-tooltip="Supprimer"  :uk-icon="'trash'"></a>
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>



            </div>


        <!-----------------------Add offers------------------------------------------>

        <div id="add_offer" >
            <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white;text-align: center" >
                Créer votre offre d'emploi
            </div>

            <p> On facilite votre recherche de candidatures.</p>
            <form action="{{url('/mjobs')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="register-tbl">
                    <tr>
                        <th><label class="label-jb" for="offer_title">Titre de l'offre :</label></th>
                        <th><label  class="label-jb" for="offer_salary">Salaire de poste :</label></th>

                    </tr>
                    <tr>
                        <th>

                            <input minlength="4" class="input-jb" id="offer_title" name="offer_title"
                                   v-model="addOffer.offer_title"  type="text" required>
                            @if ($errors->has('offer_title'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_title') }}</strong>
                                </div>
                            @endif
                        </th>
                        <th><input minlength="4" maxlength="5" class="input-jb" name="offer_salary"
                                   v-model="addOffer.offer_salary"   id="offer_salary" type="text">
                            @if ($errors->has('offer_salary'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_salary') }}</strong>
                                </div>
                            @endif
                        </th>

                    </tr>

                    <tr>
                        <th><label class="label-jb" for="offer_contract_type">Type de contrat :</label></th>
                        <th><label class="label-jb" for="offer_required_training">Formation requise :</label></th>
                    </tr>

                    <tr>
                        <th>
                            <select  class="input-jb input-select" name="offer_contract_type"
                                     v-model="addOffer.offer_contract_type"  id="offer_contract_type" required>
                                <option value="CDI">CDI</option>
                                <option value="CDD">CDD</option>
                            </select>
                        </th>
                        <th><input class="input-jb" id="offer_required_training" v-model="addOffer.offer_required_training"
                                   name="offer_required_training"  type="text">
                            @if ($errors->has('offer_required_training'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_required_training') }}</strong>
                                </div>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th><label class="label-jb" for="offer_sector">Secteur :</label></th>
                        <th><label class="label-jb" for="offer_city">Localisation :</label></th>
                    </tr>

                    <tr>
                        <th>
                            <select  class="input-jb input-select" name="offer_sector"
                                     v-model="addOffer.offer_sector"  id="offer_sector" required>
                                <option selected="selected" value="value0">Veuillez sélectionner</option>
                                <option value="Achat">Achat</option>
                                <option value="Analyse &amp; Gestion de Projet">Analyse &amp; Gestion de Projet</option>
                                <option value="Architecture &amp; Design">Architecture &amp; Design</option>
                                <option value="Assurances">Assurances</option>
                                <option value="Aviation">Aviation</option>
                                <option value="Banque">Banque</option>
                                <option value="BTP &amp; Artisanat">BTP &amp; Artisanat</option>
                                <option value="Centres d\'appel &amp; Service clients">Centres d'appel &amp; Service clients</option>
                                <option value="Comptabilité &amp; Finance" selected>Comptabilité &amp; Finance</option>
                                <option value="Childcare">Childcare</option>
                                <option value="Construction &amp; Trades">Construction &amp; Trades</option>
                                <option value="Conseil &amp; Audit &amp; Fiscalité">Conseil &amp; Audit &amp; Fiscalité</option>
                                <option value="Direction &amp; Cadres">Direction &amp; Cadres</option>
                                <option value="Divers">Divers</option>
                                <option value="Droit">Droit</option>
                                <option value="Enseignement &amp; Formation">Enseignement &amp; Formation</option>
                                <option value="Entreposage &amp; Logistique &amp; Expédition">Entreposage &amp; Logistique &amp; Expédition</option>
                                <option value="Environnement &amp; Energies Renouvelables">Environnement &amp; Energies Renouvelables</option>
                                <option value="Expérience professionnelle &amp; Stage">Expérience professionnelle &amp; Stage</option>
                                <option value="Fonds d’Investissement">Fonds d’Investissement</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Immobilier &amp; Ventes aux enchères">Immobilier - Ventes aux enchères</option>
                                <option value="Industrie">Industrie</option>
                                <option value="IT &amp; Programmation">IT - Programmation</option>
                                <option value="Jeunes diplômés">Jeunes diplômés</option>
                                <option value="Langues Étrangères &amp; Services Linguistiques">Langues Étrangères &amp; Services Linguistiques</option>
                                <option value="Manœuvre &amp; Travaux manuels - Ouvrier">Manœuvre &amp; Travaux manuels &amp; Ouvrier</option>
                                <option value="Marketing &amp; Étude de marché">Marketing &amp; Étude de marché</option>
                                <option value="Médias &amp; Nouveaux médias">Médias &amp; Nouveaux médias</option>
                                <option value="Pharmaceutique &amp; Sciences">Pharmaceutique &amp; Sciences</option>
                                <option value="Production &amp; Ingénierie">Production &amp; Ingénierie</option>
                                <option value="Ressources humaines &amp; Recrutement">Ressources humaines &amp; Recrutement</option>
                                <option value="Restauration &amp; Hôtellerie">Restauration &amp; Hôtellerie</option>
                                <option value="Santé &amp; Enfance &amp; Soins">Santé &amp; Enfance &amp; Soins</option>
                                <option value="Secrétariat &amp; Administration &amp; Bureau">Secrétariat &amp; Administration &amp; Bureau</option>
                                <option value="Sécurité">Sécurité</option>
                                <option value="Sport et loisirs">Sport et loisirs</option>
                                <option value="Support technique">Support technique</option>
                                <option value="Télécommunication">Télécommunication</option>
                                <option value="Vente">Vente</option>
                                <option value="Vente &amp; Direction commerciale">Vente &amp; Direction commerciale</option>
                                <option value="Voyage &amp; Tourisme">Voyage &amp; Tourisme</option>
                            </select><br>
                            @if ($errors->has('offer_sector'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_sector') }}</strong>
                                </div>
                            @endif
                        </th>
                        <th><select class="input-jb input-select" id="offer_city" v-model="addOffer.offer_city"
                                   name="offer_city"  type="text">
                                <option value="">Tout</option>
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
                            </select><br>
                            @if ($errors->has('offer_city'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_city') }}</strong>
                                </div>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th><label class="label-jb" for="offer_pic">Logo de l'offre :</label></th>
                        <th><label class="label-jb" for="offer_languages">Langues requise :</label></th>
                    </tr>
                    <tr>
                        <th><input class="input-jb" id="offer_pic" name="offer_pic" type="file"
                                   @change="onFileChanged"  required>
                        </th>
                        <th>
                            <input class="input-jb" id="offer_languages" name="offer_languages" type="text"
                                   v-model="addOffer.offer_languages" >
                            @if ($errors->has('offer_languages'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_languages') }}</strong>
                                </div>
                            @endif
                        </th>
                   </tr>
                    <tr>
                        <th><label class="label-jb" for="offer_qualities">Qaulités requise :</label></th>
                        <th><label class="label-jb" for="offer_missions">Mission :</label></th>

                    </tr>
                    <tr>
                        <th><textarea style="height: 100px;" class="input-jb" name="offer_qualities"
                                      v-model="addOffer.offer_qualities"   id="offer_qualities"></textarea>
                            @if ($errors->has('offer_qualities'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_qualities') }}</strong>
                                </div>
                            @endif
                        </th>
                        <th><textarea style="height: 100px;" class="input-jb" name="offer_missions" id="offer_missions"
                                      v-model="addOffer.offer_missions"  ></textarea>
                            @if ($errors->has('offer_missions'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_missions') }}</strong>
                                </div>
                            @endif
                        </th>
                    </tr>




                    <tr>
                        <th>
                        </th>

                        <th style="float: right;">
                            <a style="width: 115px;" id="close_form_addofr" class="btn-red-jb link-btn uk-button" type="button" href="#om">Annuler</a></a>
                            <button @click="saveOffer"  class="btn-jb link-btn uk-button" id="sv_addofr" type="button" style="width: 115px;">Ajouter</button>
                            <button @click="updateOffer()"  class="btn-jb link-btn uk-button" id="sv_editofr" style="width: 115px" type="button">Enregistrer</button>

                        </th>

                    </tr>


                </table>
            </form>
        </div>


            <!----------------------show-offers-Details----------------------------------->

            <div id="offer-details">


                <div id="detail_offers">
                    <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                        Description de l'offre</div>
                    <hr>
                    <div class="title-profile ">
                        <table>
                            <tr>
                                <th style="font-size: 30px"><?=455;?></th>
                                <th style="float: right;text-decoration: none">
                                    <a href="<?='index.php?p=yourjobs.employer&s=empl&etat=upd&idf=' ;?>#offers-tbl" class="link-btn btn-jb" >Modifier</a>
                                    <a href="<?='index.php?p=yourjobs.employer&s=empl&etat=dlt&idf=' ;?>#om" class="link-btn btn-red-jb" style="font-size: 15px">Supprimer</a>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="all-offers">
                        <table class="settings-prof">
                            <tr>
                                <th class="tbl-of">Description de poste :</th>
                                <td><?=15151?><br/>
                                    un(e) Technicien de Maintenance - Electromécanicien<br/>
                                    <?=15151;?> Salair 4000 dh/5000 dh<br/>
                                </td>
                            </tr>
                            <tr>
                                <th class="tbl-of">Votre profile :</th>
                                <td><?=15151;?><br/>
                                    - Vous êtes titulaire d’un BAC + 3 ou d’un BTS en électromécanique ou équivalent avec des connaissances en pneumatique et hydraulique.<br/>
                                    - Vous avez des connaissance en informatique (GMAO).<br/>
                                    - Vous disposez d’une expérience significative dans le secteur de la Maintenance Industrielle.<br/>
                                    - Vous acceptez de travailler en horaires rotatifs (4*8).<br/>
                                </td>
                            </tr>
                            <tr>
                                <th class="tbl-of">Vos qualités:</th>
                                <td><?=15151;?><br/>
                                    - Vous aimez le travail d’équipe.<br/>
                                    - Vous avez le sens de l’organisation et faites preuve d’autonomie.<br/>
                                    - Vous êtes flexible.<br/>
                                </td>
                            </tr>
                            <tr>
                                <th class="tbl-of">Votre mission :</th>
                                <td><?=1515;?><br/>
                                    - Vous assurez la maintenance curative et préventive des presses à injecter,  des périphériques et de l’ingénierie  de production.<br/>
                                    - Vous réalisez les interventions dans le respect des consignes d’hygiène et de sécurité ainsi que dans le respect des normes ISO 14001.<br/>
                                    - Vous enregistrez  la réalisation des opérations et des contrôles journaliers dans la GMAO.<br/>
                                </td>
                            </tr>


                        </table>
                    </div>



                </div>

            </div>

        
            <!------------------------show-candidat-profile--------------------------->

            <div id="prof-cand">

                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">Profile de <?= 4554 ;?></div>

                <div class="header-profile">
                    <table>
                        <tr>
                            <th class="image-profile">
                                <img  style="height: 150px;width: 150px"  src="/projet_recrute/public/img_candidats/<?= 1515 ;?>" alt="">
                            </th>
                            <th style="width: 250px;padding: 0;font-size: 13px"><div style="font-size: 17px"><?= 1515 ;?></div>
                                <br>
                                GSM :<?= 1515 ;?><br>
                                Email :<?= 1515 ;?><br>
                                Date de naissance :<?=1515 ;?><br>
                                Adresse :<?= 1515 ;?><br>
                            </th>

                            <th><?= 455 ;?></th>


                        </tr>

                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>


                </div>
                <div class="all-offers shtbl">

                    <table>
                        <tr>
                            <th>Experience</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <tr>
                            <td width="200">
                                Date début :<?=4848 ;?><br>
                                Date Fin :<?=4848;?><br>
                            </td>
                            <td><?=4848 ;?></td>
                            <td><?=4848 ;?></td>
                        </tr>

                    </table>
                    <table>
                        <tr>
                            <th>Education</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <tr>
                            <td width="200">
                                Date début :<?=484 ;?><br>
                                Date Fin :<?=484 ;?><br>
                            </td>
                            <td width="200"><?=484 ;?></td>
                            <td><?=484 ;?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th>Competence</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td width="200"><?=118 ;?></td>
                            <td><?=118 ;?></td>
                        </tr>

                    </table>
                    <table>
                        <tr>
                            <th>Langues</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td width="80"><?=118 ;?> :</td>
                            <td><?=118 ;?></td>
                        </tr>

                    </table>
                    <table>
                        <tr>
                            <th>Loisirs et centres d'intérêt</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td><?=4848;?></td>
                            <td></td>
                        </tr>

                    </table>
                </div>


            </div>

        </div>
    
        <!------------------------------message-------------------------------------->

        <div id="msge-tbl" class="all-offers  shtbl" style="display:none;">
            <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                Tous les messages reçus
            </div>

            <table>
                <tr>
                    <th width="100">Expéditeur</th>
                    <th width="120">Nom Complet</th>
                    <th>Message</th>
                    <th width="170">Date d'envoi</th>
                    <th width="170">Email</th>
                    <th width="100"></th>
                </tr>
@foreach($msgse as $msge)
                    <tr>
                        <td><div><img style="border-radius: 40px 40px;height: 45px!important;width: 45px;"  src="" alt=""></div></td>
                        <td><a>{{ $msge->sender_fullname }}</a></td>
                        <td>  {{substr($msge->message,0,25).'...' }} </td>
                        <td>{{ $msge->created_at }}</td>
                        <td ><a uk-toggle="target: #repl"  uk-tooltip="Répondre à cet email">{{ $msge->sender_email }}</a></td>
                        <td>
                            <a id="dltt" uk-tooltip="Supprimer ce message" :uk-icon="'trash'"  style="float: right"></a>
                            <a  uk-toggle="target: #replnk"    :uk-icon="'mail'"  uk-tooltip="Répondre à ce message" style="float: right;margin:0 5px 0 5px"></a>
                            <a uk-toggle="target: #vienk"   uk-tooltip="Visualiser ce message" style="float: right;" ></a>
                        </td>
                    </tr>
@endforeach
            </table>


            <!------------------------------ This is the modal  send msg-------------------->

            <div id="reply<?= 151;?>" uk-modal >

                <div class="uk-modal-dialog" style="width: 550px">
                    <form action="<?='index.php?p=yourjobs.employer&s=empl&etat=send-msge';?>" method="post">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <div class="uk-modal-header">
                            <h3 class="uk-modal-title">Envoyer un nouveau message</h3>
                        </div>

                        <div class="uk-modal-body" style="height: 170px;margin-top: -30px">
                            <table>
                                <tr><th style="float: left"><label class="label-jb" for="email_msg">À</label></th></tr>
                                <tr><th><input value="<?=151;?>" class="input-jb" style="width: 490px;" name="email_msg" id="email_msg" type="email"  required></th></tr>
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



            <!------------------------------ Modal  show msg-------------------->


            <div id="view<?= 4848;?>" uk-modal >

                <div class="uk-modal-dialog" style="width: 700px">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">


                        <table>
                            <tr>
                                <th width="60"><div><img style="border-radius: 40px 40px;height: 55px!important;width: 55px;"  src="/projet_recrute/public/img_candidats/<?= 4848 ;?>" alt=""><img style="border-radius: 40px 40px;height: 55px!important;width: 55px;"  src="/projet_recrute/public/img_employers/<?= 4848 ;?>" alt=""><img style="border-radius: 40px 40px;height: 55px!important;width: 55px;"  src="/projet_recrute/public/img_admins/<?= 4848 ;?>" alt=""></div></th>
                                <th><h3 class="uk-modal-title">Message de <?= 4848 ;?></h3></th>
                            </tr>
                        </table>
                    </div>

                    <div class="uk-modal-body" style="height: 170px;margin-top: -30px">
                        <table>

                            <tr>
                                <th style="float: left;width: 150px">Message :</th>
                                <td><div style="font-size: 13px;overflow: auto;height: 150px ;width: 400px;"><?= 484 ;?></div></td>
                            </tr>

                        </table>

                    </div>
                    <div class="uk-modal-footer">
                    </div>
                </div>

            </div>


        </div>

        <!------------------------paramétres employeur------------------------------->

        <div id="settings_employer">
            <div id="dtl_settings">
                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
                    Paramètres de votre compte
                </div>
                <div class="title-profile">
                    <table>
                        <tr>
                            <td style="font-size: 15px">Vous-pouvez modifier vos paramètres profile.</td>
                            <th style="float: right"><a @click="editSetting(usere,empl)" href="#om" id="settings_updold" class="btn-jb link-btn" type="button"
                                                        uk-tooltip="Modifier paramètres de votre compte">Modifier</a></th>
                        </tr>
                    </table>

                </div>



                <table class="tbl-data" style="font-size: 13px;margin-left: 40px; text-align: left">
                    <tr>
                        <th>Nom de recruteur :</th>
                        <td><div  v-if="updtsett">
                                <input  minlength="4" class="input-jb" name="first_name" type="text"
                                       v-model="updateSetting.first_name"  style="width: 180px;height: 25px"><br>
                                <input  minlength="4" class="input-jb" name="last_name" type="text"
                                        v-model="updateSetting.last_name"  style="width: 180px;height: 25px">
                            </div>
                            <div v-if="updtsett2">@{{ usere.first_name+' '+usere.last_name }}</div>
                        </td>
                        <th style="padding-left: 50px;">Sexe :</th>
                        <td><div v-if="updtsett"><select  style="width: 190px;height: 30px" class="input-select input-jb"
                                         v-model="updateSetting.gender"  name="city" >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>

                                </select></div>
                            <div v-if="updtsett2">@{{ usere.gender }}</div>

                        </td>
                    </tr>
                    <tr>
                        <th>Raison sociale de l'entreprise :</th>
                        <td><div  v-if="updtsett">
                                <input  minlength="3" class="input-jb" name="company_name" type="text"
                                       v-model="updateSetting.company_name"  style="width: 180px;height: 25px">
                            </div>
                            <div v-if="updtsett2">@{{ empl.company_name }}</div>
                        </td>
                        <th style="padding-left: 50px;">Lieu :</th>
                        <td><div v-if="updtsett"><select  style="width: 190px;height: 30px" class="input-select input-jb"
                                         v-model="updateSetting.city"  name="city" >
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
                            <div v-if="updtsett2">@{{ usere.city }}</div>

                        </td>
                    </tr>
                    <tr>
                        <th>Secteur activité :</th>
                        <td><div v-if="updtsett"><select style="width: 190px;height: 30px" class="input-select input-jb"
                                    v-model="updateSetting.company_sector"  name="company_sector" >
                                    <option value="Achat">Achat</option>
                                    <option value="Analyse &amp; Gestion de Projet">Analyse &amp; Gestion de Projet</option>
                                    <option value="Architecture &amp; Design">Architecture &amp; Design</option>
                                    <option value="Assurances">Assurances</option>
                                    <option value="Aviation">Aviation</option>
                                    <option value="Banque">Banque</option>
                                    <option value="BTP &amp; Artisanat">BTP &amp; Artisanat</option>
                                    <option value="Centres d\'appel &amp; Service clients">Centres d'appel &amp; Service clients</option>
                                    <option value="Comptabilité &amp; Finance" selected>Comptabilité &amp; Finance</option>
                                    <option value="Childcare">Childcare</option>
                                    <option value="Construction &amp; Trades">Construction &amp; Trades</option>
                                    <option value="Conseil &amp; Audit &amp; Fiscalité">Conseil &amp; Audit &amp; Fiscalité</option>
                                    <option value="Direction &amp; Cadres">Direction &amp; Cadres</option>
                                    <option value="Divers">Divers</option>
                                    <option value="Droit">Droit</option>
                                    <option value="Enseignement &amp; Formation">Enseignement &amp; Formation</option>
                                    <option value="Entreposage &amp; Logistique &amp; Expédition">Entreposage &amp; Logistique &amp; Expédition</option>
                                    <option value="Environnement &amp; Energies Renouvelables">Environnement &amp; Energies Renouvelables</option>
                                    <option value="Expérience professionnelle &amp; Stage">Expérience professionnelle &amp; Stage</option>
                                    <option value="Fonds d’Investissement">Fonds d’Investissement</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Immobilier &amp; Ventes aux enchères">Immobilier - Ventes aux enchères</option>
                                    <option value="Industrie">Industrie</option>
                                    <option value="IT &amp; Programmation">IT - Programmation</option>
                                    <option value="Jeunes diplômés">Jeunes diplômés</option>
                                    <option value="Langues Étrangères &amp; Services Linguistiques">Langues Étrangères &amp; Services Linguistiques</option>
                                    <option value="Manœuvre &amp; Travaux manuels - Ouvrier">Manœuvre &amp; Travaux manuels &amp; Ouvrier</option>
                                    <option value="Marketing &amp; Étude de marché">Marketing &amp; Étude de marché</option>
                                    <option value="Médias &amp; Nouveaux médias">Médias &amp; Nouveaux médias</option>
                                    <option value="Pharmaceutique &amp; Sciences">Pharmaceutique &amp; Sciences</option>
                                    <option value="Production &amp; Ingénierie">Production &amp; Ingénierie</option>
                                    <option value="Ressources humaines &amp; Recrutement">Ressources humaines &amp; Recrutement</option>
                                    <option value="Restauration &amp; Hôtellerie">Restauration &amp; Hôtellerie</option>
                                    <option value="Santé &amp; Enfance &amp; Soins">Santé &amp; Enfance &amp; Soins</option>
                                    <option value="Secrétariat &amp; Administration &amp; Bureau">Secrétariat &amp; Administration &amp; Bureau</option>
                                    <option value="Sécurité">Sécurité</option>
                                    <option value="Sport et loisirs">Sport et loisirs</option>
                                    <option value="Support technique">Support technique</option>
                                    <option value="Télécommunication">Télécommunication</option>
                                    <option value="Vente">Vente</option>
                                    <option value="Vente &amp; Direction commerciale">Vente &amp; Direction commerciale</option>
                                    <option value="Voyage &amp; Tourisme">Voyage &amp; Tourisme</option>
                                </select></div>
                            <div v-if="updtsett2">@{{empl.company_sector }}</div>


                        </td>
                        <th style="padding-left: 50px;">Adresse :</th>
                        <td>
                            <div v-if="updtsett"><input v-if="updtsett"  v-model="updateSetting.address" class="input-jb"  name="address" type="text" style="width: 180px;height: 25px" required></div>
                            <div v-if="updtsett2">@{{ usere.address }}</div>


                        </td>

                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td>
                            <div v-if="updtsett"><input  v-model="updateSetting.email" style="width: 180px;height: 25px" class="input-jb"  name="email" type="email"></div>
                            <div v-if="updtsett2">@{{ usere.email }}</div>

                        </td>
                        <th style="padding-left: 50px;">Tél :</th>
                        <td>
                            <div v-if="updtsett"><input  v-model="updateSetting.phone" minlength="10" maxlength="10" style="width: 180px;height: 25px" class="input-jb"  name="phone" type="tel"></div>
                            <div v-if="updtsett2">@{{ usere.phone }}</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Mot de passe :</th>
                        <td>
                            <div v-if="updtsett"><input  style="width: 180px;height: 25px" class="input-jb"
                                  v-model="updateSetting.password" name="password" type="password">

                            </div>
                            <div v-if="updtsett2">**********</div>

                        </td>
                        <th style="padding-left: 50px;"><div v-if="updtsett">Confirmer le mot de passe :</div></th>
                        <td><div v-if="updtsett"><input  style="width: 180px;height: 25px" class="input-jb"
                               v-model="updateSetting.password" name="password-confirm" type="password"></div></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="float: right;">
                            <a v-if="updtsett" href="#om" @click="updtsett=false,updtsett2=true" class="btn-red-jb link-btn" type="button">Annuler</a>
                            <a v-if="updtsett" href="#om" @click="updtsett=false,updtsett2=true,UpdateSetting()" class="btn-jb link-btn" type="button">Enregister</a>
                        </th>
                    </tr>

                </table>


            </div>


            <!--------------modifier compte employer--------------->
            <hr id="md">
            <div id="update_form_employer">

                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
                    Modifier votre compte
                </div>

                <form action="" method="post" enctype="multipart/form-data">


                    <table class="register-tbl">
                        <tr>
                            <th><label class="label-jb" for="company_name">Raison sociale de l'entreprise :</label></th>
                            <th><label class="label-jb" for="company_sector">Secteur activité :</label></th>
                        </tr>
                        <tr>
                            <th><input minlength="3" value="<?= 484;?>" class="input-jb" id="company_name" name="company_name" type="text"></th>
                            <th>
                                <select  name="company_sector" id="company_sector"  class="input-select input-jb">
                                    <option selected="selected" value="value0">Veuillez sélectionner</option>
                                    <option value="Achat">Achat</option>
                                    <option value="Analyse &amp; Gestion de Projet">Analyse &amp; Gestion de Projet</option>
                                    <option value="Architecture &amp; Design">Architecture &amp; Design</option>
                                    <option value="Assurances">Assurances</option>
                                    <option value="Aviation">Aviation</option>
                                    <option value="Banque">Banque</option>
                                    <option value="BTP &amp; Artisanat">BTP &amp; Artisanat</option>
                                    <option value="Centres d\'appel &amp; Service clients">Centres d'appel &amp; Service clients</option>
                                    <option value="Comptabilité &amp; Finance" selected>Comptabilité &amp; Finance</option>
                                    <option value="Childcare">Childcare</option>
                                    <option value="Construction &amp; Trades">Construction &amp; Trades</option>
                                    <option value="Conseil &amp; Audit &amp; Fiscalité">Conseil &amp; Audit &amp; Fiscalité</option>
                                    <option value="Direction &amp; Cadres">Direction &amp; Cadres</option>
                                    <option value="Divers">Divers</option>
                                    <option value="Droit">Droit</option>
                                    <option value="Enseignement &amp; Formation">Enseignement &amp; Formation</option>
                                    <option value="Entreposage &amp; Logistique &amp; Expédition">Entreposage &amp; Logistique &amp; Expédition</option>
                                    <option value="Environnement &amp; Energies Renouvelables">Environnement &amp; Energies Renouvelables</option>
                                    <option value="Expérience professionnelle &amp; Stage">Expérience professionnelle &amp; Stage</option>
                                    <option value="Fonds d’Investissement">Fonds d’Investissement</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Immobilier &amp; Ventes aux enchères">Immobilier - Ventes aux enchères</option>
                                    <option value="Industrie">Industrie</option>
                                    <option value="IT &amp; Programmation">IT - Programmation</option>
                                    <option value="Jeunes diplômés">Jeunes diplômés</option>
                                    <option value="Langues Étrangères &amp; Services Linguistiques">Langues Étrangères &amp; Services Linguistiques</option>
                                    <option value="Manœuvre &amp; Travaux manuels - Ouvrier">Manœuvre &amp; Travaux manuels &amp; Ouvrier</option>
                                    <option value="Marketing &amp; Étude de marché">Marketing &amp; Étude de marché</option>
                                    <option value="Médias &amp; Nouveaux médias">Médias &amp; Nouveaux médias</option>
                                    <option value="Pharmaceutique &amp; Sciences">Pharmaceutique &amp; Sciences</option>
                                    <option value="Production &amp; Ingénierie">Production &amp; Ingénierie</option>
                                    <option value="Ressources humaines &amp; Recrutement">Ressources humaines &amp; Recrutement</option>
                                    <option value="Restauration &amp; Hôtellerie">Restauration &amp; Hôtellerie</option>
                                    <option value="Santé &amp; Enfance &amp; Soins">Santé &amp; Enfance &amp; Soins</option>
                                    <option value="Secrétariat &amp; Administration &amp; Bureau">Secrétariat &amp; Administration &amp; Bureau</option>
                                    <option value="Sécurité">Sécurité</option>
                                    <option value="Sport et loisirs">Sport et loisirs</option>
                                    <option value="Support technique">Support technique</option>
                                    <option value="Télécommunication">Télécommunication</option>
                                    <option value="Vente">Vente</option>
                                    <option value="Vente &amp; Direction commerciale">Vente &amp; Direction commerciale</option>
                                    <option value="Voyage &amp; Tourisme">Voyage &amp; Tourisme</option>
                                </select>

                            </th>
                        </tr>


                        <tr>
                            <th><label class="label-jb" for="company_phone">Tél :</label></th>
                            <th><label class="label-jb" for="address_empl">Adresse :</label></th>
                        </tr>

                        <tr>
                            <th><input minlength="10" maxlength="10" value="<?=4848;?>" class="input-jb" id="company_phone" name="company_phone" type="tel"></th>
                            <th><input value="<?=4848;?>" class="input-jb" id="address_empl" name="address_empl" type="text" required></th>
                        </tr>

                        <tr>
                            <th><label class="label-jb" for="creation_date">Date de création :</label></th>
                            <th><label class="label-jb" for="company_city">Ville :</label></th>
                        </tr>
                        <tr>
                            <th><input value="<?= 4848;?>" class="input-jb" id="creation_date" name="creation_date" type="date"></th>
                            <th>
                                <select class="input-select input-jb" name="company_city" id="company_city">
                                    <option selected="selected" value="<?= 4848 ;?>"><?=4848 ;?></option>
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
                            <th><label class="label-jb" for="company_email">Email :</label></th>
                            <th><label class="label-jb" for="company_password">Nouveau mot de passe :</label></th>
                        </tr>

                        <tr>
                            <th><input  value="<?= 454;?>" class="input-jb" id="company_email" name="company_email" type="email" required></th>
                            <th><input   class="input-jb" id="company_password" name="company_password" type="password"></th>
                        </tr>

                        <tr>
                            <th><label class="label-jb" for="company_logo">Logo de l'entreprise :</label></th>

                            <th><input onclick="tpep()" id="show_password_company" name="show_password_company" type="checkbox">
                                <label class="label-jb" for="show_password_company">Afficher le mot de passe</label></th>

                        </tr>

                        <tr>
                            <th><input value="<?= 454 ;?>" class="input-jb" id="company_logo" name="company_logo" type="file" required></th>
                            <th style="float: right">
                                <a href="#om"  style="font-size: 16px" id="hide_form_sett"  class="btn-red-jb link-btn" >Annuler</a>
                                <button id="btn_mdfsett" class="btn-jb link-btn" type="submit">Enregistrer</button>
                                <input type="hidden" id="valid" name="validate-sett" value="tro">
                            <th>
                        </tr>


                    </table>


                </form>
            </div>

            <!----------Supprimer compte employeur----------->
            <hr>

            <div class="title-profile">
                <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
                    Supprimer mon compte
                </div>
                <table>
                    <tr>
                        <td><p style="font-size: 14px">Cela supprimera de manière définitive votre compte et vos informations enregistrées et l'historique de votre compte </p></td>
                        <th style="float: right">
                            <a style="font-size: 15px" class="btn-red-jb link-btn" type="submit" id="js-modal-confirm">Supprimer</a>
                        </th>
                    </tr>
                </table>

            </div>



        </div>


    </div>

    <!----------------------------------aside--------------------------------------->
    <aside class="login-candidat side">
        <header>
            <h3 style="    background-color: rgba(19, 42, 62, 0.7);
;color: white;width: 100%;font-size: 24px;text-align: center;padding: 15px 10px;margin-left: -10px">Votre Espace Employeur</h3>

            <div class="">Ce que vous devez savoir</div>
            <hr>
            <span class="img-profile">

                <img style="width: 200px!important;" src="{{asset('storage/'.$empls->company_logo)}}"
                     class="image-profile" alt="">
            </span>
        </header>
        <hr>

        <!-----------------send msg---------------------->

        <button class="btn-blue-jb-rev" uk-toggle="target: #my-id" type="button" style="width: auto;font-size: 15px">Envoyer un message</button>
        <input  type="hidden" uk-toggle="target: #msg-failed" id="btn-auto">

        <!-- This is the modal -->

        <div id="my-id" uk-modal >

            <div class="uk-modal-dialog" style="width: 550px">
                <form action="" method="post">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h3 class="uk-modal-title">Envoyer un nouveau message</h3>
                    </div>

                    <div class="uk-modal-body" style="height: 170px;margin-top: -30px">
                        <table>
                            <tr><th style="float: left"><label class="label-jb" for="email_msg">À</label></th></tr>
                            <tr><th><input value="" class="input-jb" style="width: 490px;" name="email_msg" id="email_msg" type="email"  required></th></tr>
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

        <div id="msg-failed" uk-modal >

            <div class="uk-modal-dialog" style="width: 550px">

                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Erreur!</h3>
                </div>

                <div class="uk-modal-body" style="height: 100px;margin-top: -30px">
                    <div>Cet email n'est pas valide </div>
                </div>
                <div class="uk-modal-footer">
                </div>

            </div>

        </div>


        <div class="side-b">
            <hr>
            <table style="font-size: 12px">
                <tr>
                    <th>Raison sociale de l'entreprise :</th>
                    <td>@{{ empl.company_name }}</td>
                </tr>
                <tr>
                    <th>Secteur activité :</th>
                    <td>@{{empl.company_sector }}</td>
                </tr>
                <tr>
                    <th>Adresse :</th>
                    <td>@{{ usere.address+' '+usere.city }} </td>
                </tr>
                <tr>
                    <th>Téléphone :</th>
                    <td>@{{ usere.phone }}</td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td>@{{ usere.email }}</td>
                </tr>
                <tr>
                    <th>Site web : </th>
                    <td><a rel="nofollow" href="#" uk-tooltip="@{{ empl.company_name }}" target="_blank">www.@{{ empl.company_name }}.com</a></td>
                </tr>
            </table>
            <table style="font-size: 12px">
                <tr>
                    <th>Profile entreprise</th>
                </tr>
                <tr>
                    <td style="width: 250px">@{{ empl.company_name }} is an international recruitment consulting company specialized in placing financial professionals.
                        <br>
                        <a href="#" class="cl-effect-1"> Lisez le profil complet</a></td>
                </tr>
            </table>



        </div>
    </aside>


</div>







    <script>

        //---------------------show-password--------------
        function tpep() {
            var x = document.getElementById("company_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    
    </script>
    <script>

        $(document).ready(function(){


            $("#find").addClass("nav-active");
            $("#about").removeClass("nav-active");
            $("#contact").removeClass("nav-active");
            $("#allof").removeClass("nav-active");
            $("#home").removeClass("nav-active");


//-----------------Menu-Profile------------------------

            $("#menu-list-offers,#close_form_upd").click(function(){
                $(this).addClass("activate");
                $("#menu-msgEmpl").removeClass("activate");
                $("#menu-add-offer").removeClass("activate");
                $("#menu-settings-empl").removeClass("activate");

                $("#list_offers").fadeIn('slow');
                $("#msge-tbl").hide();
                $("#add_offer").hide();
                $("#settings_employer").hide();

                $("#candidats_postulate").hide();
                $("#offer-details").hide();
                $("#prof-cand").hide();
                $("#update_offer_form").hide();
                history.pushState({ path: this.path }, '', "#om");//change url without refresh
            });
            //----------------------------------------
            $("#close_form_addofr").click(function(){

                $("#add_offer").hide();

            });


            $("#menu-msgEmpl").click(function(){
                $(this).addClass("activate");
                $("#menu-list-offers").removeClass("activate");
                $("#menu-add-offer").removeClass("activate");
                $("#menu-settings-empl").removeClass("activate");

                $("#msge-tbl").fadeIn('slow');
                $("#list_offers").hide();
                $("#add_offer").hide();
                $("#settings_employer").hide();

                $("#candidats_postulate").hide();
                $("#offer-details").hide();
                $("#prof-cand").hide();
                $("#update_offer_form").hide();
                history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.employer&s=empl';?>#om");//change url without refresh

            });
        



            $("#menu-add-offer").click(function(){
                $(this).addClass("activate");
                $("#menu-list-offers").removeClass("activate");
                $("#menu-msgEmpl").removeClass("activate");
                $("#menu-settings-empl").removeClass("activate");

                $("#msge-tbl").hide();
                $("#list_offers").hide();
                $("#add_offer").fadeIn("slow");
                $("#settings_employer").hide();

                $("#candidats_postulate").hide();
                $("#offer-details").hide();
                $("#prof-cand").hide();
                $("#update_offer_form").hide();
                history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.employer&s=empl';?>#om");//change url without refresh

            });
            $("#menu-settings-empl").click(function(){
                $(this).addClass("activate");
                $("#menu-list-offers").removeClass("activate");
                $("#menu-msgEmpl").removeClass("activate");
                $("#menu-add-offer").removeClass("activate");

                $("#msge-tbl").hide();
                $("#list_offers").hide();
                $("#add_offer").hide();
                $("#settings_employer").fadeIn("slow");
                $("#dtl_settings").fadeIn('slow');

                $("#candidats_postulate").hide();
                $("#offer-details").hide();
                $("#prof-cand").hide();
                $("#update_offer_form").hide();
                $("#update_form_employer").hide();
                history.pushState({ path: this.path }, '', "<?='index.php?p=yourjobs.employer&s=empl';?>#om");//change url without refresh

            });



//-----------------liste des offres employer----------------------------

            /*    $("#show_list_ofr,#close_form_addofr,#close_form_upd").click(function () {
                    $("#list_offer").fadeIn('slow');
                    $("#update_offer").hide();
                    $("#add_offer").hide();
                    $("#update_offera").css("display","none")
                    $("#settings_employer").hide();
                    $("#detail_offers").css("display","none")

                });*/


//-----------------------settings_employeur------------------------>

            $("#show_settings_empl,#hide_form_sett").click(function () {
                $("#settings_employer").fadeIn('slow');
                $("#dtl_settings").fadeIn('slow');
                $("#update_form_employer").hide();
                $("#list_offer").hide();
                $("#add_offer").hide();
                $("#detail_offers").css("display","none")

            });
//----------------------update-settings_employeur------------------------>

            $("#settings_upd").click(function () {
                $("#update_form_employer").fadeIn('slow');
                $("#dtl_settings").hide();

            });
        });

    </script>

    @endsection



@section('Vjs')

    <script>
        window.Laravel={!! json_encode([
            "csrfToken" =>  csrf_token(),
            "user_id" => $usere->id,
            "url" => url(""),
        ]); !!}
    </script>

    <script>
        //window.onload = function () {

            let app;
            app = new Vue({
                el: '#app',
                data: {
                    offers: [],
                    usere: [],
                    empl: [],
                    addOffer:{
                        id:0,
                        user_id:window.Laravel.user_id,
                        offer_title:'',
                        offer_contract_type:'',
                        offer_required_training:'',
                        offer_qualities:'',
                        offer_missions:'',
                        offer_languages:'',
                        offer_salary:'',
                        offer_pic:'',
                        offer_sector:'',
                        offer_city:'',
                    },
                    updateSetting:{
                        id:window.Laravel.user_id,
                        first_name:'',
                        last_name:'',
                        email:'',
                        password:'',
                        gender:'',
                        address:'',
                        phone:'',
                        city:'',
                        company_name:'',
                        company_sector:'',
                    },
                    openAdd: false,
                    updtsett: false,
                    updtsett2: true,
                },
                methods: {
           //-----------------------Offers---------------------------

                    offerwipe:function () {
                        this.addOffer={
                            id:0,
                            user_id:window.Laravel.user_id,
                            offer_title:'',
                            offer_contract_type:'',
                            offer_required_training:'',
                            offer_qualities:'',
                            offer_missions:'',
                            offer_languages:'',
                            offer_salary:'',
                            offer_pic:'',
                            offer_sector:'',
                            offer_city:'',
                        };
                        this.getOffer();
                        $("#sv_addofr").show();
                        $("#sv_editofr").hide();

                    },
                    tgladdoffer: function () {
                        //--------------------Add offers---------------------

                     //   $(" #show_add_ofr,#form_add_offer").click(function () {
                            $("#add_offer").fadeIn('slow');
                            $("#settings_employer").hide();
                            $("#list_offer").hide();
                            $("#detail_offers").css("display","none");
                       // });
                    },
                    //-------Offers------
                    getOffer: function () {
                        openAdd= false;
                        openEdit= false;
                        let self = this; // pour que les data enregistrer sur experiences [] au dessus
                        axios.get(window.Laravel.url +'/getOffer/'+window.Laravel.user_id) //recuperer url
                            .then(function (response) {
                                self.offers = response.data;
                                console.log('data :', response.data);
                            })
                            .catch(function (error) {
                                console.log('error :', error);
                            })
                    },
                    onFileChanged: function(e) {

                       // console.log(e.target.files[0]);
                        let reader = new FileReader();
                        reader.readAsDataURL( e.target.files[0]);
                        reader.onload = (e) => { this.addOffer.offer_pic = e.target.result };
                       // console.log(this.addOffer);

                    },
                    saveOffer: function () {
                        let self = this;
                        axios.post(window.Laravel.url+'/addOffer',self.addOffer)
                            .then(function (response) {
                                console.log('data :', response.data);
                                if(response.data.etat=true){
                                    self.addOffer.id=response.data.id;
                                    self.offers.unshift(self.addOffer);
                                    self.addOffer={
                                        id:0,
                                        user_id:window.Laravel.user_id,
                                        offer_title:'',
                                        offer_contract_type:'',
                                        offer_required_training:'',
                                        offer_qualities:'',
                                        offer_missions:'',
                                        offer_languages:'',
                                        offer_salary:'',
                                        offer_pic:'',
                                        offer_sector:'',
                                        offer_city:'',
                                    };
                                    self.getOffer();
                                    $("#add_offer").hide();

                                }

                            })
                            .catch(function (error) {
                                console.log('Error :', error);
                            })
                    },
                    editOffer :function (offer) {
                        let self = this;
                        self.addOffer=offer;
                        self.getOffer();
                        $("#sv_addofr").hide();
                        $("#sv_editofr").show();

                    },
                    updateOffer:function () {
                        let self = this;
                        axios.put(window.Laravel.url+'/updateOffer',self.addOffer)
                            .then(function (response) {
                                console.log('data :', response.data);
                                if(response.data.etat=true){
                                    self.openAdd=false;
                                    self.addOffer={
                                        id:0,
                                         user_id:window.Laravel.user_id,
                                        offer_title:'',
                                        offer_contract_type:'',
                                        offer_required_training:'',
                                        offer_qualities:'',
                                        offer_missions:'',
                                        offer_languages:'',
                                        offer_salary:'',
                                        offer_pic:'',
                                        offer_sector:'',
                                        offer_city:'',
                                    };
                                    $("#add_offer").hide();
                                    self.getOffer();
                                    self.openEdit=false;
                                }

                            })
                            .catch(function (error) {
                                console.log('error :', error);
                            })
                    } ,
                    deleteOffer:function (offer) {
                        var self = this;
                        //  self.addExperience=experience;
                        axios.delete(window.Laravel.url+'/deleteOffer/'+offer.id)
                            .then(function (response) {
                                console.log('data :', response.data);
                                if(response.data.etat=true){
                                    var position= self.offers.indexOf(offer); //positon of experience
                                    self.offers.splice(position,1);//delete position 1
                                    self.getOffer();
                                }

                            })
                            .catch(function (error) {
                                console.log('error :', error);
                            })
                    },
       //-----------------------settings---------------------------
                    settingwipe:function () {
                        this.updateSetting={
                            id:window.Laravel.user_id,
                            first_name:'',
                            last_name:'',
                            email:'',
                            password:'',
                            gender:'',
                            address:'',
                            phone:'',
                            city:'',
                            company_name:'',
                            company_sector:'',
                        };
                        this.getSetting();
                    },

                    //-------get  Setting------
                    getSetting: function () {
                            let self = this; // pour que les data enregistrer sur experiences [] au dessus
                        axios.get(window.Laravel.url +'/getSetting/'+window.Laravel.user_id) //recuperer url
                            .then(function (response) {
                                self.usere = response.data[0];
                                self.empl = response.data[1];
                                console.log('data-usere :',response.data);
                            })
                            .catch(function (error) {
                                console.log('error :', error);
                            })
                    },
                    editSetting :function (usere,empl) {
                        let self = this;
                        let dt= Object.assign({}, usere, empl);  //combine btw two object
                        console.log(dt);
                        self.getSetting();
                        self.updateSetting=dt ;
                        self.updtsett=true;
                        self.updtsett2=false;
                    },
                    UpdateSetting:function () {
                        let self = this;
                        axios.put(window.Laravel.url+'/updateSetting',self.updateSetting)
                            .then(function (response) {
                                console.log('data :', response.data);
                                if(response.data.etat=true){
                                    self.updateSetting={
                                        id:window.Laravel.user_id,
                                        first_name:'',
                                        last_name:'',
                                        email:'',
                                        password:'',
                                        gender:'',
                                        address:'',
                                        phone:'',
                                        city:'',
                                        company_name:'',
                                        company_sector:'',
                                    };
                                    //$("#").hide();
                                    self.getSetting();
                                }

                            })
                            .catch(function (error) {
                                console.log('error :', error);
                            })
                    } ,
                },

                created: function () {
                     this.getOffer();
                     this.getSetting();  // afficher data sur la console
                }
            });
       // }


    </script>

@endsection