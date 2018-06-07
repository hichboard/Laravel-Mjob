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
            color: #c46b47;
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
        .border0 td{
            border-width: 0;
        }

    </style>




    <div class="login-candidat all-offers shtbl bd-article">


        <div style="font-size: 35px; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
            Toutes Les Offres D'emploi
        </div>
        <table style="margin-top: 20px;display: none">
            <tr>
                <th>Société</th>
                <th>Publiée</th>
                <th>Offre d'emploi</th>
                <th>Raison sociale</th>
                <th>Lieu</th>
                <th></th>
            </tr>
  @foreach( $offers as $offer)
            <tr uk-tooltip="Visualiser {{$offer->offer_title}}">
                <td><img style="height: 50px!important;width: 65px;"  src="http://localhost:8000/img/{{$offer->offer_pic}}" alt=""></td>
                <td>{{$offer->created_at}}</td>
                <td><a href="{{ url('show_offer/'.$offer->id) }}">{{$offer->offer_title}}</a></td>
                <td><a href=""><?= 12 ;?></a></td>
                <td><?= 12 ;?></td>
                <td><a href="" uk-icon="check"></a></td>
            </tr>

   @endforeach
        </table>

        @foreach( $offers as $offer)
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
            @foreach( $loffers as $offer)

                <a href="{{url('show_offer/'.$offer->id)}}" uk-tooltip="Visualiser cette offre">

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
                            <td style="padding: 0 0 5px 10px"><b>Localisation : </b>{{ $offer->offer_city }}</td>
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

        $(document).ready(function() {

            $("#allof").addClass("nav-active");
            $("#about").removeClass("nav-active");
            $("#contact").removeClass("nav-active");
            $("#home").removeClass("nav-active");
            $("#find").removeClass("nav-active");


        });
    </script>


    @endsection