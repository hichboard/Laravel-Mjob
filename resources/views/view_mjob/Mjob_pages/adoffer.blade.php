@extends('view_mjob.template.yourjob_template')

@section('content')



    <div class="login-candidat" id="app">


            <!-----------------------------------offers-table list---------------------:-->
            <div id="offers-tbl">
                <div class="title-profile">
                    <table>
                        <tr><div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white">
                                Liste de vos offres d’emploi {{$usere->id}}
                            </div>
                        </tr>
                        <tr>
                            <th></th>
                            <th style="float: right">
                                <a href="#add_offer"  class="link-btn btn-jb" id="form_add_offer" uk-tooltip="Ajouter un offre"
                                   type="button">Publier une annance</a>
                            </th>
                        </tr>
                    </table>

                </div>

                <div class="all-offers shtbl">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <th>Date</th>
                                <th>Offre d'emploi</th>
                                <th>Entreprise</th>
                                <th>Lieu</th>                    
                                <th>Postulation</th>
                                <th>Action</th>

                            </tr>

                            <tr v-for="offer in offers">
                                <td>@{{offer.created_at}}</td>
                                <td><a  uk-tooltip="Consulter cette offre" href="#offers-tbl">@{{offer.offer_title }} @{{offer.id}}</a></td>
                                <td><a href="">
                                        {{$empls->company_name}}
                                    </a>
                                </td>
                                <td>{{$usere->city}}</td>
                                <td>
                                    <a uk-tooltip="<?=121 ;?> Candidatures postulé a cet offre" href="<?='index.php?p=yourjobs.employer&s=empl&etat=pst&idf=' ;?>#offers-tbl">
                                        (<?= 12;?>) Candidats </a>
                                </td>
                                <td>
                                    <a @click="editOffer(offer)" uk-tooltip="Modifier" href="#offers-tbl" :uk-icon="'file-edit'"></a>
                                    <a @click="deleteOffer(offer)" uk-tooltip="Supprimer"  :uk-icon="'trash'"></a>
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>




        <!-----------------------Add offers------------------------------------------>

        <div id="add_offer" style="display: block;">
            <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white;text-align: center" >
                Créer votre offre d'emploi
            </div>

            <p> On facilite votre recherche de candidatures.</p>
            <form action="" method="POST">
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
                        <th><label class="label-jb" for="offer_languages">Langues requise :</label></th>
                    </tr>
                    <tr>
                        <th><input class="input-jb" id="offer_languages" name="offer_languages" type="text"
                                   v-model="addOffer.offer_languages" >
                            @if ($errors->has('offer_languages'))
                                <div class="uk-alert-danger">
                                    <strong>{{ $errors->first('offer_languages') }}</strong>
                                </div>
                            @endif
                        </th>

                        <th style="float: right;">
                            <a style="width: 110px" id="close_form_addofr" class="btn-red-jb link-btn uk-button" type="button" href="#om">Annuler</a></a>
                            <button @click="saveOffer"  class="btn-jb link-btn uk-button" id="sv_addofr" type="button">Enregistrer</button>
                        </th>
                        <th>
                              <button @click="updateOffer()"  class="btn-jb link-btn uk-button"  type="button">Modifier</button>
                        </th>
                    </tr>


                </table>
            </form>
        </div>


</div>


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
                    addOffer:{
                        id:0,
                        user_id:window.Laravel.user_id,
                        offer_title:'',
                        offer_contract_type:'',
                        offer_required_training:'',
                        offer_qualities:'',
                        offer_missions:'',
                        offer_languages:'',
                        offer_salary:''
                    },
                },
                methods: {
                    //-------posts------
                    getOffer: function (offer) {
                        var self = this; // pour que les data enregistrer sur experiences [] au dessus
                        axios.get(window.Laravel.url +'/getOffer/'+window.Laravel.user_id) //recuperer url
                            .then(function (response) {
                                self.offers = response.data;
                                console.log('data :', response.data);
                                  console.log('offerByid :', offer);
                            })
                            .catch(function (error) {
                                console.log('error :', error);
                            })
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
                                        offer_salary:''
                                    };
                                    self.getOffer();
                                }

                            })
                            .catch(function (error) {
                                console.log('Error :', error);
                            })
                    },
                    editOffer :function (offer) {
                        var self = this;
                        self.openAdd=true;
                        self.openEdit=true;
                        self.addOffer=offer;
                        self.getOffer();

                    },
                    updateOffer:function () {
                        var self = this;
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
                                        offer_salary:''
                                    };
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
                    }


                },

                created: function () {
                     this.getOffer();  // afficher data sur la console
                }
            });
       // }


    </script>

@endsection



<script>

    $(document).ready(function(){

        $("#about").addClass("nav-active");
        $("#home").removeClass("nav-active");
        $("#contact").removeClass("nav-active");
        $("#allof").removeClass("nav-active");
        $("#find").removeClass("nav-active");
    });

</script>

    @endsection



