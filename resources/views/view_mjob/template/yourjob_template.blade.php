<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('ui_kit/assets/css/uikit.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/yourjob_style.css')}}">
     <script src="{{asset('ui_kit/assets/js/uikit.min.js')}}"></script>
    <script src="{{asset('ui_kit/assets/js/uikit-icons.min.js')}}"></script>

    <script src="{{asset('js/jquery.min.js')}}"></script>


    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/axios.map.js')}}"></script>
    <script src="{{asset('js/vue.min.js')}}"></script>
    <script src="{{asset('js/vuejs.js')}}"></script>


    <style>
        .header{
            background-image: url("@guest {{asset('img/header_pic.jpg')}} @else @if(Auth::User()->user_type=='admin') {{asset('img/admin.jpg')}} @elseif(Auth::User()->user_type=='employer') {{asset('img/empl.jpg')}} @elseif(Auth::User()->user_type=='candidat') {{asset('img/cand.jpg')}} @endif  @endguest ");
            background-repeat: no-repeat;
            background-size: 100% 380px;
            height: 380px;
            width: 100%;
            left: 0;
            top: 0;
            position: absolute;
        }
        .img-fb{
            /*background-image: url("<php foreach ($cand_datas as $cds):?><= $cds->picture_fb ;><php endforeach;>");*/
            background-size: cover;
            width: 23px;
            height: 23px!important;
            border-radius: 40px 40px;
            box-shadow: 0 8px 10px 0 rgba(13, 151, 255, 0.5);
            padding: 0;
            margin: 0;

        }
        .footer{
            background-image: url("{{asset('img/footer_img.jpg')}}");
            background-repeat: no-repeat;
            background-size: 100% 400px;
            position: relative;
            margin-bottom: 0;
        }
    </style>


    <title>MoroccoJob</title>
</head>
<body>


<div class="header">
    <div class="header-logo">
        <a href="{{url('/')}}">Morocco<span>Job</span></a>
    </div>

    <div class="header-top">



        @guest

            <span><table><tr><th>Ou <a href="{{url('/register')}}#drg">S'inscrire </a></th></tr></table></span>
            <span><table><tr><th><a href="{{url('/login')}}#drg">Se Connecter</a></th></tr></table></span>



        @else
            <span><table>
                    <tr>
                    <th><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"> Déconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                    </form>
                    </th>
                    </tr>
                </table>
            </span>
            <span><table><tr><th><a href="{{url('/mjobs')}}"> {{ Auth::User()->first_name.'.'.Auth::User()->last_name }}</a></th></tr></table></span>
            <span><table ><tr ><th>Profile :</th><th class="img-profile">
                            @if(Auth::User()->users_candidat)
                            <img style="border-radius: 40px 40px;width: 35px;height: 25px!important;"
                                 src="{{asset('/storage/'.Auth::User()->users_candidat->pic_profile)}}"  alt="">
                            @elseif(Auth::User()->users_employer)
                            <img style="border-radius: 40px 40px;width: 35px;height: 25px!important;"
                                 src="{{asset('/storage/'.Auth::User()->users_employer->company_logo)}}"  alt="">
                            @endif
                        </th></tr></table></span>

        @endguest

            <div class="lg">
                <span><table><tr><th>LANGUE <a  href="{{url('/')}}#drg">Français</a></th></tr></table></span>

                <div class="menu-langue">
                    <a href="">Arabe</a>
                    <a href="">Français</a>
                    <a href="">Englais</a>

                </div>
            </div>
    </div>



    <div  class="nav">
        <ul>

            <li><a  id="home" href="{{url('/')}}">Accueil</a></li>
            <li><a id="about" href="{{url('/about_us')}}">A propos</a></li>
            <li><a id="contact" href="{{url('/contact_us')}}">Contactez-nous</a></li>
            <li><a id="allof"   href="{{url('/all_offers')}}">Offres d'emplois</a></li>
            <li><a id="s"    href="{{url('/employer')}}">Publier une annance</a></li>
            @auth('web')
            @if(Auth::User()->user_type=='admin')
                <li><a id="find"    href="{{url('/admin_jb')}}">Espace admin</a></li>
            @elseif(Auth::User()->user_type=='employer')

                <li><a id="find"    href="{{url('/employer')}}">Espace employeur</a></li>

            @elseif(Auth::User()->user_type=='candidat')
                <li><a id="find"    href="{{url('/candidat')}}">Espace candidat</a></li>
            @endif
            @endauth


        </ul>

    </div>

    <!---------------BARE DE RECHERCHE-------------------->
    <div  class="bar-search" id="drg">
        <form action="{{ url('/search') }}" method="post">
            @csrf
            <input id="searchbutton" name="searchbutton" value="true" type="hidden">
            <fieldset class="acc-panel">
                <h3 class="acc-handle">Lancer <strong>la recherche</strong></h3>

                <div class="select-style categories">
                    <select class="input-jb" id="s_sector" name="s_sector" style="width: 350px;height: 45px;" >
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
                </div>
                <div class="select-style city">
                    <select class="input-jb" style="color: black;height: 45px;width: 350px;" name="s_city" id="s_city">
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
                </div>
                <input  class="input-jb" style="height: 40px;width: 200px;" id="s_key" name="s_key" placeholder="Mots clés (par ex. Commerce, Nom de l'entreprise)"  type="text">

                <!--button class="search-btn" type="submit" name="job-search" value="true"></button-->
                <button style="height: 43px" class="alt-search-btn" id="s_search" type="submit">Recherche</button>
                <input type="hidden"  name="valid_search" value="search">
            </fieldset>
        </form>
    </div>

</div>

<!--------------------Content---------------------->

<style>
    .social-m-top {
        position: fixed;
        z-index: 1;
    }

    .social-m-top a{
        display: block;
        margin:0 0 10px 10px;
        transition: 0.5s;
    }

    .social-m-top a:hover{
        padding-left: 20px;
        opacity: 0.8;
    }
</style>
<div  class="content" style="min-height: 200px;">
    <div class="social-m-top">
        <a target="_blank"  href="https://www.facebook.com/"><img src="{{asset('img/fb1.png')}}" alt=""></a>
        <a target="_blank"  href="https://www.twitter.com/"><img src="{{asset('img/tw.png')}}" alt=""></a>
        <a  target="_blank" href="https://www.youtube.com/"><img src="{{asset('img/yt.png')}}" alt=""></a>

    </div>

    @yield('content')


</div>





<!--------------------Footer------------------------>
<div class="footer" style="margin: 30px 0 -50px 0;" >
    <table style="width: 100%">
        <tr>

            <th>
                <div class="f-logo">
                    <a href="{{url('/')}}">Morocco<span>Job</span></a>
                </div>
            </th>
        </tr>
        <tr>
            <th>  <hr style="margin: 0 50px 0 50px"></th>
        </tr>
        <tr>
            <th style="text-align: left;padding-left: 60px;"> <div class="row">
                    <div class="footer-column accordion">
                        <h2 class="f-handle">Recherche avancée</h2>
                        <ul class="bullet-list" style="width: 300px;">
                            <li><a href="{{url('/all_offers')}}#drg">Toutes les offres d'emploi</a></li>
                            <li><a href="{{url('/')}}#drg">Catégorie</a></li>
                            <li><a href="{{url('/list_company')}}#drg">Entreprise</a></li>
                            <li><a href="{{url('/all_offers')}}#drg">Secteur</a></li>
                            <li><a href="{{url('/all_offers')}}#drg">Lieu</a></li>
                        </ul>
                    </div>
                    <div class="footer-column accordion">
                        <h2 class="f-handle">A propos  MoroccoJob</h2>
                        <ul class="bullet-list">
                            <li><a href="{{url('/login')}}#drg">Votre espace</a></li>
                            <li><a href="{{url('/all_offers')}}#drg">Trouver un emploi</a></li>
                            <li><a href="{{url('/about_us')}}#drg">Qui sommes-nous</a></li>
                        </ul>
                    </div>
                    <div class="footer-column accordion">
                        <h2 class="f-handle">MoroccoJob</h2>
                        <ul class="bullet-list">
                            <li><a href="{{url('/')}}#drg">Politique de confidentialité</a></li>
                            <li><a href="{{url('/')}}#drg">Informations légales</a></li>
                            <li><a href="{{url('/')}}#drg">Conditions Générales</a></li>
                            <li><a href="{{url('/')}}#drg">Plan du site</a></li>

                        </ul>
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>  <hr style="margin: 0 50px 0 50px"></th>
        </tr>
        <tr>
            <th>
                <p style="font-size: 12px;color: #d8d8d8;margin-top: 5px;">Copyright © 2018 MoroccoJob info@MoroccoJob.com</p>
            </th>
        </tr>
    </table>




</div>







@yield('Vjs')

<script>


    $(document).ready(function(){

        $(document).on('click','a[href^="#"]',function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $($.attr(this,'href')).offset().top},'slow');
        });



        $("#s_search").click(function(){
            var   valid=$("#valid_search").val();
            var   s_sector=$("#s_sector").val();
            var  s_city=$("#s_city").val();
            var  s_key=$("#s_key").val();

            $.post("",
                {
                    valid_search:valid,
                    s_sector:s_sector,
                    s_city:s_city,
                    s_key:s_key

                },
                function(data){
                    console.log(data);
                    console.log("hello");
                });
        });


    });

</script>



</body>
</html>


