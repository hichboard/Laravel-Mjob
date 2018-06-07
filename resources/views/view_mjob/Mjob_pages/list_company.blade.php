



@extends('view_mjob.template.yourjob_template')

@section('content')

<style>
    div.gallery {
        margin: 5px;
        border: 1px solid #ccc;
        width: 180px;
        height: 300px;
        display: inline-grid;
        box-shadow: 0 2px 8px 2px rgba(23, 23, 23, 0.5);

    }
    div.gallery:hover {
        box-shadow: 0 2px 8px 2px rgba(23, 23, 23, 0.5);
        opacity: 0.7;
    }
    div.gallery img {

        width: 100%;
        height: 100%;
    }
    div.desc {
        text-align: center;
    }
</style>

<div class="login-candidat all-offers">

    <div style="font-size: 25px; background-color: rgba(41,50,67,0.9);color: white;text-align: center">
        Liste de toutes les entreprises
    </div>


            <div class="gallery">
                <a target="_blank" href="">
                    <img src="/projet_recrute/public/img_employers/"
                         alt="" width="150" height="150">
                </a>
                <div class="desc"><p></p></div>

                <div class="desc"></div>
            </div>



</div>

 @endsection