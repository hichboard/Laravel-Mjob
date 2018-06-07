
@extends('view_mjob.template.yourjob_template')

@section('content')


    <div class="register-candidat">


        <div style="font-size: 24px;color: black;font-weight: bolder">Continuer votre inscription pour accéder à votre espace candidat </div>


        <!--------------------------register employer-------------------->
        <div id="space_employer">
            <form action="{{url('/cand')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="title-profile ">
                    <table>
                        <tr>
                            <th style="font-size: 20px">Etape 2</th>
                        </tr>
                        <tr>
                            <td style="font-size: 15px;text-align: center">On facilite votre recherche d'emploi.</td>
                        </tr>
                    </table>
                </div>
                <table class="register-tbl">
                    <tr>
                        <th><label class="label-jb" for="birthday">Date de naissance :</label></th>
                        <th><label class="label-jb" for="sector">Secteur activité :</label></th>
                    </tr>
                    <tr>
                        <th>
                            <input value="{{old('birthday')}}" class="input-jb large-b" id="birthday" name="birthday" type="date" required>
                            @if ($errors->has('birthday'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('birthday') }}</strong>
                                </div>
                            @endif
                        </th>
                        <th>
                            <select  id="sector" name="sector" class="input-select input-jb">
                                <option selected="selected" value="value0">Veuillez sélectionner</option>
                                <option value="Achat">Achat</option>
                                <option value="{{old('sector')}}">{{old('sector')}}</option>
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
                            @if ($errors->has('sector'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('sector') }}</strong>
                                </div>
                            @endif
                        </th>
                    </tr>


                    <tr>
                        <th><label  class="label-jb" for="full_name">Nom complet :</label></th>
                        <th><label class="label-jb" for="pic_profile">Photo de profile :</label></th>
                    </tr>

                    <tr>
                        <th>
                            <input class="input-jb" id="full_name" name="full_name" type="text" required>
                            @if ($errors->has('full_name'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </div>
                            @endif
                        </th>
                        <th>
                            <input value="{{old('pic_profile')}}" class="input-jb" id="pic_profile" name="pic_profile" type="file">
                            @if ($errors->has('pic_profile'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('pic_profile') }}</strong>
                                </div>
                            @endif
                        </th>
                    </tr>

                    <tr>
                        <th>

                        </th>
                        <th style="padding: 20px 100px;" >
                            <button class="uk-button uk-button-primary btn-jb"  type="submit">Enregistrer</button>
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
            var x = document.getElementById("password_candidat");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }



    </script>


@endsection