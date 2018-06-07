
@extends('view_mjob.template.yourjob_template')

@section('content')


<div class="register-candidat">


    <div style="font-size: 24px;color: black;font-weight: bolder">Continuer votre inscription pour accéder à votre espace employeur </div>


   <!--------------------------register employer-------------------->
    <div id="space_employer">
        <form action="{{url('/empl')}}" method="post" enctype="multipart/form-data">
            @csrf
      

        <div class="title-profile ">
            <table>
                <tr>
                    <th style="font-size: 20px">Etape 2</th>
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
                        <input value="{{old('company_name')}}" minlength="4" class="input-jb large-b" id="company_name" name="company_name" type="text" required>
                        @if ($errors->has('company_name'))
                            <div class="uk-alert-danger">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </div>
                        @endif
                        </th>
                    <th>
                        <select  id="company_sector" name="company_sector" class="input-select input-jb">
                            <option selected="selected" value="value0">Veuillez sélectionner</option>
                            <option value="Achat">Achat</option>
                            <option value="{{old('company_sector')}}">{{old('company_sector')}}</option>
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
                     @if ($errors->has('company_sector'))
                            <div class="uk-alert-danger">
                                <strong>{{ $errors->first('company_sector') }}</strong>
                            </div>
                        @endif
                    </th>
                </tr>


                <tr>
                    <th><label  class="label-jb" for="rc">Numéro RC :</label></th>
                    <th><label class="label-jb" for="company_logo">Logo de l'entreprise :</label></th>
                </tr>

                <tr>
                    <th>
                        <input maxlength="11" minlength="11" class="input-jb" id="rc" name="rc" type="text" required>
                    </th>
                    <th>
                        <input value="{{old('company_logo')}}" class="input-jb" id="company_logo" name="company_logo" type="file">
                         @if ($errors->has('company_logo'))
                            <div class="uk-alert-danger">
                                <strong>{{ $errors->first('company_logo') }}</strong>
                            </div>
                        @endif
                    </th>
                </tr>

                <tr>
                    <th>
                    
                    </th>
                    <th style="padding: 20px 100px;" >
                    <button class="uk-button uk-button-primary"  type="submit">Enregistrer</button>
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