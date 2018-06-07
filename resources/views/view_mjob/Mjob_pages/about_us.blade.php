@extends('view_mjob.template.yourjob_template')

@section('content')



    <div class="login-candidat">
    <h1>A propos de Morocco<span>Job</span></h1>
    <h3> Parlons rapidement de Morocco<span>Job</span></h3>
    <p style="text-align: justify; padding: 0 200px 0 200px;">Notre mission est de permettre aux entreprises locales de trouver les bons
        candidats au bon moment et d’aider les chercheurs d’emploi à trouver leur
        job idéal. Pour cette raison, notre équipe locale d’experts et multilingue
        s’investit tous les jours afin d’offrir un service clients
        de haute qualité en s’appuyant sur des technologies de pointe. Aujourd’hui,
        MoroccoJob est la référence au Maroc en matière de recrutement en ligne
        et nous continuons à nous développer afin de rester fidèle à notre engagement.
    </p>

</div>

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