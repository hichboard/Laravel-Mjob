
@extends('view_mjob.template.yourjob_template')

@section('content')

    <div class="register-candidat">


        <div style="font-size: 24px;color: black;font-weight: bolder">Créer votre compte gratuitement et facilement</div>



        <!-------------------------register candida------------------>
        <div id="space_candida">
            <form action="{{ route('register') }}" method="post" >


                <div class="title-profile ">
                    <table>
                        <tr>
                            <th style="font-size: 20px;">Espace Candidat</th>
                        </tr>
                        <tr>
                            <td style="font-size: 15px;text-align: center">On facilite votre recherche d'emploi.</td>
                        </tr>
                    </table>
                </div>
                <table class="register-tbl">
                    <tr>
                        <th><label class="label-jb" for="name">Nom & Prénom :</label></th>
                        <th><label class="label-jb" for="user_type">Votre identification :</label></th>
                    </tr>
                    <tr>
                        <th>
                            <input value="{{old('name')}}" minlength="3" class="input-jb" id="name" name="name" type="text" required>
                            @if ($errors->has('name'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </th>
                        <th>
                            <select  class="input-jb input-select" name="user_type" id="user_type" required>
                                <option value="{{old('user_type')}}">{{old('user_type')}}</option>
                                <option value="Candidat" selected>Candidat</option>
                                <option value="Employeur">Employeur</option>
                            </select>
                            @if ($errors->has('user_type'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                            @endif

                        </th>
                    </tr>

                    <tr>
                        <th><label  class="label-jb" for="email">E-mail :</label></th>
                        <th><label  class="label-jb" for="address">Adresse :</label></th>

                    </tr>

                    <tr>
                        <th>
                            <input value="{{old('email')}}" class="input-jb" id="email" name="email" type="email" required>
                               @if ($errors->has('email'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </th>
                        <th>
                            <input value="{{old('address')}}" class="input-jb" id="address" name="address" type="text" required>
                               @if ($errors->has('address'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th><label  class="label-jb" for="password">Mot de passe :</label></th>
                        <th><label class="label-jb" for="city">Lieu :</label></th>
                    </tr>
                    <tr>
                        <th>
                            <input minlength="6" class="input-jb" id="password" name="password" type="password" required>
                               @if ($errors->has('password'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </th>
                        <th>
                            <select class="input-jb input-select" name="city" id="city">
                                <option value="{{old('city')}}">{{old('city')}}</option>
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
                            </select>
                               @if ($errors->has('city'))
                                <span class="uk-alert-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </th>

                    </tr>
                    <tr>
                        <th><input class="" id="box-pass-register" name="box-pass-register" type="checkbox">
                            <label class="label-jb" onclick="tpc()" for="box-pass-register">Afficher le mot de passe</label></th>
                        <th  style="padding: 10px 0 10px 0;">
                            <label class="label-jb">Sexe :</label>
                            <input  type="radio" id="male"  name="gender" value="male" checked><label for="male" class="label-jb">Homme</label>
                            <input  type="radio" id="female" name="gender" value="female"><label for="female" class="label-jb">Femme</label>
                        </th>
                    </tr>

                    <tr>
                        <th><button name="btn-cand-reg" class="btn-jb" value="vbtn-cand-reg" type="submit">Enregistrer</button>
                            <p class="content-panel"  >J'ai déjà un compte.
                                <a style="display: inline;font-size: 15px ;" href="{{url('/login')}}#drg">S'identifier</a>
                            </p>
                        </th>
                        <th>
                        </th>
                    </tr>

                </table>
            </form>
        </div>


        <!--------------------------register employer-------------------->
        <div id="space_employer" style="display: none;">
            <form action="{{url('mjobs')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table style="font-size: 17px;">
                    <tr>
                        <th>S'inscrire en tant que :</th>
                        <th>
                            <input type="radio" id="candida_register"  name="user_type" value="Candidat" ><label for="candida_register" class="label-jb">Condidat</label>
                            <input type="radio" id="employer_register" name="user_type" value="Employer" checked><label for="employer_register" class="label-jb">Employeur</label>
                        </th>
                    </tr>
                </table>

                <div class="title-profile ">
                    <table>
                        <tr>
                            <th style="font-size: 20px">Espace Employeur</th>
                        </tr>
                        <tr>
                            <td style="font-size: 15px;text-align: center">On facilite votre recherche de candidatures.</td>
                        </tr>
                    </table>
                </div>
                <table class="register-tbl">
                    <tr>
                        <th><label class="label-jb" for="company_name">Raison sociale de l'entreprise :</label></th>
                        <th><label class="label-jb" for="company_sector">Secteur activité :</label></th>
                    </tr>
                    <tr>
                        <th>
                            <input value="{{old('company_name')}}" minlength="3" class="input-jb" id="company_name" name="company_name" type="text" required></th>
                        <th>
                            <select value="{{old('company_sector')}}" id="company_sector" name="company_sector" class="input-select input-jb">
                                <option selected="selected" value="value0">Veuillez sélectionner</option>
                                <option value="Achat">Achat</option>
                                <option value="Analyse / Gestion de Projet">Analyse / Gestion de Projet</option>
                                <option value="Architecture / Design">Architecture / Design</option>
                                <option value="Assurances">Assurances</option>
                                <option value="Aviation">Aviation</option>
                                <option value="Banque">Banque</option>
                                <option value="BTP / Artisanat">BTP / Artisanat</option>
                                <option value="Centres d'appel / Service clients">Centres d'appel / Service clients</option>
                                <option value="Comptabilité / Finance">Comptabilité / Finance</option>
                                <option value="Childcare">Childcare</option>
                                <option value="Construction &amp; Trades">Construction &amp; Trades</option>
                                <option value="Conseil / Audit / Fiscalité">Conseil / Audit / Fiscalité</option>
                                <option value="Direction / Cadres">Direction / Cadres</option>
                                <option value="Divers">Divers</option>
                                <option value="Droit">Droit</option>
                                <option value="Enseignement / Formation">Enseignement / Formation</option>
                                <option value="Entreposage / Logistique / Expédition">Entreposage / Logistique / Expédition</option>
                                <option value="">Environnement / Energies Renouvelables</option>
                                <option value="Environnement / Energies Renouvelables">Expérience professionnelle / Stage</option>
                                <option value="Expérience professionnelle / Stage">Fonds d’Investissement</option>
                                <option value="Fonds d’Investissement">Freelance</option>
                                <option value="Freelance">Immobilier / Ventes aux enchères</option>
                                <option value="Immobilier / Ventes aux enchères">Industrie</option>
                                <option value="Industrie">IT / Programmation</option>
                                <option value="IT / Programmation">Jeunes diplômés</option>
                                <option value="Jeunes diplômés">Langues Étrangères / Services Linguistiques</option>
                                <option value="Langues Étrangères / Services Linguistiques">Manœuvre / Travaux manuels / Ouvrier</option>
                                <option value="Manœuvre / Travaux manuels / Ouvrier">Marketing / Étude de marché</option>
                                <option value="Marketing / Étude de marché">Médias / Nouveaux médias</option>
                                <option value="Médias / Nouveaux médias">Pharmaceutique / Sciences</option>
                                <option value="Pharmaceutique / Sciences">Production / Ingénierie</option>
                                <option value="Production / Ingénierie">Ressources humaines / Recrutement</option>
                                <option value="Ressources humaines / Recrutement">Restauration / Hôtellerie</option>
                                <option value="Santé / Enfance / Soins">Santé / Enfance / Soins</option>
                                <option value="Secrétariat / Administration / Bureau">Secrétariat / Administration / Bureau</option>
                                <option value="Sécurité">Sécurité</option>
                                <option value="Sport et loisirs">Sport et loisirs</option>
                                <option value="Support technique">Support technique</option>
                                <option value="Télécommunication">Télécommunication</option>
                                <option value="Vente">Vente</option>
                                <option value="Vente - Direction commerciale">Vente - Direction commerciale</option>
                                <option value="Voyage / Tourisme">Voyage / Tourisme</option>
                            </select>
                        </th>
                    </tr>


                    <tr>
                        <th><label  class="label-jb" for="company_phone">Tél :</label></th>
                        <th><label class="label-jb" for="company_logo">Logo de l'entreprise :</label></th>
                    </tr>

                    <tr>
                        <th>
                            <input value="{{old('company_phone')}}" maxlength="11" minlength="11" class="input-jb" id="company_phone" name="company_phone" type="tel" required>
                            @if ($errors->has('company_phone'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('company_phone') }}</strong>
                                </div>
                            @endif
                        </th>
                        <th>
                            <input value="{{old('company_logo')}}" class="input-jb" id="company_logo" name="company_logo" type="file">
                        </th>
                    </tr>

                    <tr>
                        <th><label class="label-jb" for="creation_date">Date de création :</label></th>
                        <th><label class="label-jb" for="company_city">Ville :</label></th>
                    </tr>
                    <tr>
                        <th>
                            <input value="{{old('creation_date')}}" class="input-jb" id="creation_date" name="creation_date" type="date" required></th>
                        <th>
                            <select value="{{old('company_city')}}" class="input-jb input-select" name="company_city" id="company_city" required>
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
                            </select>
                        </th>

                    </tr>
                    <tr>
                        <th><label class="label-jb" for="company_password">Mot de passe :</label></th>
                        <th><label class="label-jb" for="company_email">Email :</label></th>
                    </tr>

                    <tr>
                        <th>
                            <input  value="{{old('company_password')}}" minlength="6" class="input-jb" id="company_password" name="company_password" type="password" required>
                            @if ($errors->has('company_password'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('company_password') }}</strong>
                                </div>
                            @endif
                        </th>
                        <th>
                            <input value="{{old('company_email')}}"  class="input-jb" id="company_email" name="company_email" type="email" required>
                            @if ($errors->has('company_email'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('company_email') }}</strong>
                                </div>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th><input class="" id="show_password_company" name="show_password_company" type="checkbox">
                            <label class="label-jb" onclick="tpe()" for="show_password_company">Afficher le mot de passe</label></th>
                        <th></th>
                    </tr>

                    <tr>
                        <th><button name="brn-emp-reg" class="btn-jb"  type="submit">Enregistrer</button>
                            <p class="content-panel"  >J'ai déjà un compte.
                                <a style="display: inline;font-size: 15px ;" href="{{url('/login')}}#drg">S'identifier</a>
                            </p>
                        </th>
                        <th>
                        </th>
                    </tr>

                </table>
            </form>
        </div>


    </div>



    <script>
        function tpe() {
            var x = document.getElementById("company_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function tpc() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        //---------------Jquery---open-------------------
        $(document).ready(function(){

            //-------------Hide and show form settings candida------------------

            $("#candida_register").click(function(){
                $("#space_employer").hide();
                $("#space_candida").fadeIn('slow');
            });
            $("#employer_register").click(function(){
                $("#space_employer").fadeIn('slow');
                $("#space_candida").hide();

            });


        });

    </script>


@endsection