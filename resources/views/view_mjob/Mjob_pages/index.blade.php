
@extends('view_mjob.template.yourjob_template')

@section('content')


    <style>

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
        .side-b th, td{
            /*border-bottom: 1px solid #d8d8d8;*/
        }
        .side-b table{
            font-size: 11px;
            width: 250px;
            transition: 0.5s;
            line-height: 1.3;
        }
        .side-b a{
            text-decoration: none;
            color: #3d3d3d;
            transition: 0.5s;
        }
        .side-b table:hover{
            background-color: rgba(37, 95, 121, 0.3);
        }
        .bd-article{
            position: relative;
            display: inline-table;
            top: 0;
            width: 880px;
            margin: 0 20px 30px 90px;
            min-height: 700px;
        }
        /*-------------------------*/
        .tbl-list td{
            border-width: 0;
        }
        .border0 td{
            border-width: 0;
        }

    </style>
    <!-------------------SECTEUR------------------->


    <!-------------------SECTEUR------------------->
    <div class="login-candidat all-offers bd-article shtbl" >


        @if(!empty($soffers) && $soffers->count() > 0)
            <div style="font-size: 35px; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
                liste de vous recherche
            </div>

            @foreach( $soffers as $offer)
                <a href="{{ url('show_offer/'.$offer->id) }}" style="text-decoration: none;color: gray;"  >
                    <table  class="border0" style="margin-bottom: 10px"  uk-tooltip="{{$offer->offer_title}}">
                        <tr>
                            <td style="text-align: center;"><img class="img_prof"  style="height: 150px;width: 300px!important;"  src="http://localhost:8000/img/{{$offer->offer_pic}}" alt="">
                            </td>
                            <td style="width: 570px;">
                                <table >
                                    <tr>

                                        <td style="padding-bottom: 10px;font-size: 20px;font-weight: bolder;color: #2e3744 ">{{$offer->offer_title}}</td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Publiée le : </b>{{$offer->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Localisation : </b>{{ $offer->offer_city }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Société : </b> {{$offer->user->users_employer->company_name}}</td>
                                    </tr>
                                    <tr>

                                        <td style="padding: 0 0 5px 20px;">{{substr( $offer->offer_qualities ,0,150).'...' }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>
                    <hr>
                </a>
            @endforeach

        @elseif(!empty($soffers))

            <h2 style="margin: 50px 0 50px 0">Recherche non trouvé!</h2>

        @endif


    @if(!empty($sroffers) && $sroffers->count() > 0)

        <div style="font-size: 30px; background-color: rgba(41,50,67,0.9);color: white">
            Toutes les offres de: <b>{{ $key }}</b>
        </div>

   @foreach( $sroffers as $offer)

        <a href="{{ url('show_offer/'.$offer->id ) }}"
           uk-tooltip="Visualiser {{ $offer->offer_title }}" style="text-decoration: none;color: gray;">
            <table class="tbl-list" style="margin-bottom: 10px">
                <tr>
                    <td style="text-align: center;"><img class="img_prof"  style="height: 150px;width: 300px"  src="http://localhost:8000/img/{{ $offer->offer_pic }}" alt="">
                    </td>
                    <td style="width: 570px;">
                        <table>
                            <tr>

                                <td style="padding-bottom: 10px;font-size: 20px;font-weight: bolder;color: #2e3744 ">
                                    {{ $offer->offer_title }}</td>
                            </tr>

                            <tr>
                                <td style="padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Publiée le : </b>{{ $offer->created_at }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Localisation : </b>
                                    {{ $offer->offer_city }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 0 0 5px 20px"><b style="color:#3e4d5e;">Société : </b></td>
                            </tr>
                            <tr>

                                <td style="padding: 0 0 5px 20px">{{ $offer->offer_qualities }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
            <hr>
        </a>
    @endforeach

   @elseif(!empty($sroffers))
            <h2>Aucun offre appartient à <br> <b> {{ $key }}</b>!</h2>
 @else
        <table style="display: none;margin-top: 20px">
            <tr>
                <th>Société</th>
                <th>Publiée</th>
                <th>Offre d'emploi</th>
                <th>Raison sociale</th>
                <th>Lieu</th>
            </tr>

            <tr>
                <td><img style="height: 45px!important;width: 55px;"  src="/projet_recrute/public/img_employers/<?=566 ;?>" alt=""></td>
                <td><?= 566 ;?></td>
                <td><a href=""><?= 566 ;?></a></td>
                <td><a href=""><?=566 ;?></a></td>
                <td><?= 566 ;?></td>
            </tr>
        </table>



        <section class="jobs-by-category">
            <header>
                <div style="font-size: 34px; background-color: rgba(41,50,67,0.9);color: white">
                    Choisissez un secteur
                </div>

                <div class="">Trouvez votre secteur ou téléchargez en si besoin</div>
            </header>
            <nav class="content-panel" style="text-align: left;padding: 30px 50px 0 50px">
                <div class="first column"
                     style="width:33%; float: left;">
                    <a href="{{ url('sector_sr/Achat') }}">Achat</a>
                    <a href="{{ url('sector_sr/"Analyse & Gestion de Projet"') }}">Analyse & Gestion de Projet</a>
                    <a href="{{ url('sector_sr/Architecture & Design') }}">Architecture & Design</a>
                    <a href="{{ url('sector_sr/Assurances') }}">Assurances</a>
                    <a href="{{ url('sector_sr/Aviation') }}">Aviation</a>
                    <a href="{{ url('sector_sr/Banque') }}">Banque</a>
                    <a href="{{ url('sector_sr/BTP & Artisanat') }}">BTP & Artisanat</a>
                    <a href="{{ url('sector_sr/Centres d\'appel & Service clients') }}">Centres d'appel & Service clients</a>
                    <a href="{{ url('sector_sr/Comptabilité & Finance') }}">Comptabilité & Finance</a>
                    <a href="{{ url('sector_sr/Conseil & Audit & Fiscalité') }}">Conseil & Audit & Fiscalité</a>
                    <a href="{{ url('sector_sr/Direction & Cadres') }}">Direction & Cadres</a>
                    <a href="{{ url('sector_sr/Divers') }}">Divers</a>
                    <a href="{{ url('sector_sr/Droit') }}">Droit</a>
                    <a href="{{ url('sector_sr/Enseignement & Formation') }}">Enseignement & Formation</a>
                </div>
                <div class="column" style="width:33%; float: left;">

                    <a href="{{ url('sector_sr/Entreposage & Logistique & Expédition') }}" class="split">Entreposage & Logistique & Expédition</a>
                    <a href="{{ url('sector_sr/Environnement & Energies Renouvelables') }}">Environnement & Energies Renouvelables</a>
                    <a href="{{ url('sector_sr/Expérience professionnelle & Stage') }}">Expérience professionnelle & Stage</a>
                    <a href="{{ url('sector_sr/Fonds d’Investissement') }}">Fonds d’Investissement</a>
                    <a href="{{ url('sector_sr/Freelance') }}">Freelance</a>
                    <a href="{{ url('sector_sr/Immobilier & Ventes aux enchères') }}">Immobilier & Ventes aux enchères</a>
                    <a href="{{ url('sector_sr/Industrie') }}">Industrie</a>
                    <a href="{{ url('sector_sr/IT & Programmation') }}">IT & Programmation</a>
                    <a href="{{ url('sector_sr/Jeunes diplômés') }}">Jeunes diplômés</a>
                    <a href="{{ url('sector_sr/Langues Étrangères & Services Linguistiques') }}">Langues Étrangères & Services Linguistiques</a>
                    <a href="{{ url('sector_sr/Manœuvre & Travaux manuels & Ouvrier') }}">Manœuvre & Travaux manuels & Ouvrier</a>
                    <a href="{{ url('sector_sr/Marketing & Étude de marché') }}">Marketing & Étude de marché</a>
                    <a href="{{ url('sector_sr/Médias & Nouveaux médias') }}">Médias & Nouveaux médias</a>
                    <a href="{{ url('sector_sr/Pharmaceutique & Sciences') }}">Pharmaceutique & Sciences</a>
                    <a href="{{ url('sector_sr/Production & Ingénierie') }}">Production & Ingénierie</a>
                </div>
                <div class="last column" style="width:33%; float: left;">
                    <a href="{{ url('sector_sr/Ressources humaines & Recrutement') }} ">Ressources humaines & Recrutement</a>
                    <a href="{{ url('sector_sr/Restauration & Hôtellerie') }} ">Restauration & Hôtellerie</a>
                    <a href="{{ url('sector_sr/Santé & Enfance & Soins') }} ">Santé & Enfance & Soins</a>
                    <a href="{{ url('sector_sr/Secrétariat & Administration & Bureau') }} ">Secrétariat & Administration & Bureau</a>
                    <a href="{{ url('sector_sr/Sécurité') }} ">Sécurité</a>
                    <a href="{{ url('sector_sr/Services financiers') }} ">Services financiers</a>
                    <a href="{{ url('sector_sr/Sport et loisirs') }} ">Sport et loisirs</a>
                    <a href="{{ url('sector_sr/Support technique') }} ">Support technique</a>
                    <a href="{{ url('sector_sr/Télécommunication') }} ">Télécommunication</a>
                    <a href="{{ url('sector_sr/Vente') }} ">Vente</a>
                    <a href="{{ url('sector_sr/Vente & Direction commerciale') }} ">Vente & Direction commerciale</a>
                    <a href="{{ url('sector_sr/Voyage & Tourisme') }} ">Voyage & Tourisme</a>
                </div><br style="clear:both;">
            </nav>
        </section>

        <br><br>
        <br clear="all">


        <section class="jobs-by-location">
            <header>
                <div style="font-size: 34px; background-color: rgba(41,50,67,0.9);color: white">
                    Sélectionnez un lieu
                </div>
                <div class="">Voir toutes les offres d'emploi dans votre ville</div>
            </header>
            <nav class="content-panel" style="text-align: left;padding: 30px">
                <div class="first column" style="width:33%; float: left;">
                    <a href="{{ url('city_search/TANGER') }}">TANGER</a>
                    <a href="{{ url('city_search/RABAT AGDAL') }}">RABAT AGDAL</a></div><div class=" column" style="width:33%; float: left;">
                    <a href="{{ url('city_search/CASABLANCA') }}">CASABLANCA</a>
                    <a href="{{ url('city_search/AGADIR') }}">AGADIR</a></div><div class="last  column" style="width:33%; float: left;">
                    <a href="{{ url('city_search/KENITRA') }}">KENITRA</a>
                    <a href="{{ url('city_search/MOHAMMEDIA') }}">MOHAMMEDIA</a>
                    <a href="{{ url('city_search/AL-HOCEIMA') }}">AL-HOCEIMA</a>
                    <a href="{{ url('city_search/AZILAL') }}">AZILAL</a>
                </div><br style="clear:both;">
            </nav>
        </section>

        <br clear="all">
@endif
    </div>

    <!----------------------------------aside--------------------------------------->
    <aside class="login-candidat side">
        <header>
            <h3 style=" background-color: rgba(41,50,67,0.9);color: white;width: 100%;font-size: 30px;text-align: center;
        padding: 7px 10px;margin-left: -10px;text-transform: uppercase">Offres à la une </h3>

            <div class=""></div>


        </header>


        <div class="side-b">
            <hr>
        @foreach( $offers as $offer)

            <a href="{{url('show_offer/'.$offer->id)}}" uk-tooltip="Visualiser {{ $offer->offer_title }}">

                <table>
                    <tr>
                        <th style="text-align: center;"><img class="img_prof"  style="height: 55px;width: 180px;"  src="http://localhost:8000/img/{{$offer->offer_pic}}" alt="">
                        </th>
                    </tr>
                    <tr>
                        <td style="text-align: center;padding-bottom: 10px;font-size: 17px;font-weight: bolder;color: #2f3946 ">{{ $offer->offer_title }}</td>
                    </tr>

                    <tr>
                        <td style="padding: 0 0 5px 10px"><b>Publiée le : </b>{{ $offer->created_at }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 0 0 5px 10px"><b>localisation : </b>{{ $offer->offer_city }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 0 0 5px 10px"><b>Société : </b>{{ $offer->user->users_employer->company_name }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 0 0 5px 10px">{{ substr($offer->offer_qualities,0,100).'...' }}</td>
                    </tr>
                </table>

            </a>
            <hr>
    @endforeach

        </div>
    </aside>
    <script>

        $(document).ready(function(){

            $("#home").addClass("nav-active");
            $("#about").removeClass("nav-active");
            $("#contact").removeClass("nav-active");
            $("#allof").removeClass("nav-active");
            $("#find").removeClass("nav-active");
        });

    </script>






@endsection

