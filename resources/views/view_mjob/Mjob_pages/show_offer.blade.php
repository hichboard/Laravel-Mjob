

@extends('view_mjob.template.yourjob_template')

@section('content')


<style>

    .settings-prof  th{
        width: 250px;
        border-bottom: 0 ;
        border-top: 1px solid grey;
        font-size: 18px;
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
    /*----------------------*/
    .side{
        width: 260px;
        position: relative;
        display: inline-table;
        top: 8px;
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
    .img-company img{
        width: 250px;
        margin: 20px 0 20px 0;
    }

</style>

<div class="login-candidat  bd-article">

    <div class="header-profile"><!-----------Header Profile employer---------->

        <div style="font-size: 30px; text-transform: uppercase; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
            {{ $offer->offer_title }}
        </div>

       <div>
           <table class="tbl-list" style="margin-bottom: 10px;width: 830px" >
               <tr>
                   <td style="text-align: center;"><img class="img_prof"  style="height: 170px;width: 300px!important;"  src="http://localhost:8000/img/{{$offer->offer_pic}}" alt="">
                   </td>
                   <td style="width: 570px;">
                       <table>
                           <tr>

                               <td style="padding-bottom: 10px;font-size: 35px;font-weight: bolder;color: #2e3744 ">{{ $offer->offer_title }}</td>
                           </tr>

                           <tr>
                               <td style="font-size: 12px;padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Publiée le : </b>{{ $offer->created_at }}</td>
                           </tr>
                           <tr>
                               <td style="font-size: 12px;padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Localisation : </b>
                                   {{ $offer->offer_city }}</td>
                           </tr>
                           <tr>
                               <td style="font-size: 12px;padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Société : </b>{{ $offer->user->users_employer->company_name }}</td>
                           </tr>
                           <tr>
                               <td style="font-size: 12px;padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Type de contrat : </b>{{ $offer->offer_contract_type }}</td>
                           </tr>
                           <tr>
                               <td style="font-size: 12px;padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Salaire : </b>{{ $offer->offer_salary }}</td>
                           </tr>

                       </table>
                   </td>
               </tr>

           </table>
           <hr>

       </div>



             <div class="title-profile">
                 <table style="padding: 10px 0 10px 0;">
                     <tr>
                         <th style="font-size: 35px"></th>
                         <th style="float: right;text-decoration: none">
                   @guest
                             <a href="{{route('login')}}#drg" style="font-size: 15px">Se Connecter pour postuler</a>
                   @else
                       @auth('web')
                         @if(Auth::User()->user_type=='candidat')
                                     <a href="" class="btn-sml btn-jb" style="padding:3px 4px;text-decoration: none"
                                        uk-tooltip="Postuler à cette annonce">Postuler</a>

                                     <a href="" class="btn-sml btn-red-jb" style="padding:3px 4px;text-decoration: none"
                                        uk-tooltip="Annuler votre postulation à cette annonce">Annuler la postulation</a>


                         @elseif(Auth::User()->user_type=='employer')
                                         <a href="" class="btn-sml btn-jb" style="padding:3px 4px;text-decoration: none"
                                            uk-tooltip="Modifier votre annonce">Modifier</a>
                         @endif

                       @endauth
                   @endguest

                         </th>
                     </tr>
                 </table>

                  <table style="font-size: 12px;display: none;">
                      <tr>
                          <th style="width: 130px">Localisation</th>
                          <th>:</th>
                          <td style="border: 0;"><?=512;?></td>
                          <th style="width: 130px">Date de l'offre</th>
                          <th>:</th>
                          <td style="border: 0;">{{ $offer->created_at }}</td>

                      </tr>

                       <tr>
                           <th>Type de contrat</th>
                           <th>:</th>
                           <td style="border: 0;">{{ $offer->offer_contract_type }}</td>
                           <th>Salaire</th>
                           <th>:</th>
                           <td style="border: 0;">{{ $offer->offer_salary }} dh</td>
                       </tr>
                   </table>

             </div>



    </div>
    <div id="a" style="text-transform: uppercase;font-size: 30px; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
            Description de poste 
    </div>
            <div id="detail_offers">

                <div class="all-offers">
                    <hr style="margin-top: 10px">
                    <table class="settings-prof" style="font-size: 14px;">
                        <tr>
                            <th style="padding-bottom: 30px">Description de poste :</th>
                            <td>
                                un(e) {{ $offer->offer_title }}<br>
                                 Salair {{ $offer->offer_salary }} dh<br>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding-bottom: 90px">Votre profile :</th>
                            <td>
                                {{ $offer->offer_required_training }}<br>
                                - Vous acceptez de travailler en horaires rotatifs (4*8).<br>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding-bottom: 60px">Vos qualités:</th>
                            <td>{{ $offer->offer_qualities }}</td>
                        </tr>
                        <tr>
                            <th style="padding-bottom: 90px">Votre mission :</th>
                            <td>{{ $offer->offer_missions }}</td>
                        </tr>
                        <tr>
                            <th style="padding-bottom: 90px">Langues requise :</th>
                            <td>{{ $offer->offer_languages }}</td>
                        </tr>


                    </table>
                </div>



            </div>
 


</div>


<aside class="login-candidat side">
    <header>
        <h3 style="text-transform: uppercase;background-color: rgba(19, 42, 62, 0.8);
;color: white;width: 100%;font-size: 24px;text-align: center;padding: 15px 10px;margin-left: -10px">A propos de cette entreprise</h3>

        <div class="">Ce que vous devez savoir</div>
        <hr>
        <span class="img-profile">

            <img style="width: 200px!important;" src="{{asset('storage/'.$offer->user->users_employer->company_logo)  }}"
                 class="image-profile" alt="">
            </span>
    </header>
    <div class="side-b">
        <hr>
        <table style="font-size: 12px">
            <tr>
                <th>Raison sociale de l'entreprise :</th>
                <td>{{ $offer->user->users_employer->company_name }}</td>
            </tr>
            <tr>
                <th>Secteur activité :</th>
                <td>{{ $offer->user->users_employer->company_sector }}</td>
            </tr>
            <tr>
                <th>Adresse :</th>
                <td>{{ $offer->user->address .' '. $offer->user->city}}</td>
            </tr>
            <tr>
                <th>Téléphone :</th>
                <td>{{ $offer->user->phone }}</td>
            </tr>
            <tr>
                <th>Email :</th>
                <td>{{ $offer->user->email }}</td>
            </tr>
            <tr>
                <th>Site web : </th>
                <td><a rel="nofollow" href="#" uk-tooltip="{{ $offer->user->users_employer->company_name }}" target="_blank">www.{{ $offer->user->users_employer->company_name }}.com</a></td>
            </tr>
        </table>
        <table style="font-size: 12px;margin-top: 20px;">
            <tr>
                <th>Profile entreprise</th>
            </tr>
            <tr>
                <td style="width: 250px">{{ $offer->user->users_employer->company_name }} is an international recruitment consulting company specialized in placing financial professionals.
                    <p class="tt" style="display: none;">is an international recruitment consulting company specialized in placing financial professionals.is an international recruitment consulting company specialized in placing financial professionals.</p>
                    <br>
                    <a href="#" class="cl-effect-1 liz"> Lisez le profil complet</a>
                </td>
            </tr>
        </table>
    

    </div>
</aside>

<script type="text/javascript">
    $(document).ready(function(){
    $(".liz").click(function(){
        $(this).hide();
        $(".tt").fadeIn();
    });
    
    });
</script>




 @endsection

