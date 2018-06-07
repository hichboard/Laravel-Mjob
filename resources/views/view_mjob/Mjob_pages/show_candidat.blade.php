<?php
if ($empl_datas!==null && $cand_datas===null){
    $s='&s=empl';
}elseif ($empl_datas===null && $cand_datas!==null){
    $s='&s=cand';
}elseif ($admin_ds!==null){
    $s='&s=admin';
}else{
    $s='';
}

;?>

<style>
    .side{
        width: 300px !important;
        top:0 ;
        right: 90px;
        position: relative;


    }
    .side-b{
        text-align: left;
        font-size: 15px;
    }
    .img-company img{
        width: 250px;
        margin: 20px 0 20px 0;
    }
    .bd-article{
        width: 800px!important;
        position: relative;

        margin: 0 20px 30px 90px !important;
    }

</style>

<div class="login-candidat  bd-article">

    <div class="header-profile"><!-----------Header Profile employer---------->

        <?php foreach ($allDataC[0] as $smr):?>
            <div class="title-profile">
                <table style="padding: 20px 0 40px 0;">
                    <tr>
                    </tr>
                </table>
                <table style="font-size: 14px !important;">

                    <tr>


                    </tr>
                    <tr>

                    </tr>

                </table>
            </div>
        <?php endforeach ;?>


    </div>
    <div id="a"></div>
    <?php foreach ($allDataC[0] as $smr):?>
        <div id="detail_offers">

            <div class="all-offers">
                <table class="settings-prof">
                    <tr>
                        <th style="padding-bottom: 30px">Description de poste :</th>
                        <td><p><?=$smr->summary_description;?><br>
                                un(e) Technicien de Maintenance - Electromécanicien<br>
                                Salair 4000 dh/5000 dh<br>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-bottom: 90px">Votre profile :</th>
                        <td><p><br>
                                - Vous êtes titulaire d’un BAC + 3 ou d’un BTS en électromécanique ou équivalent avec des connaissances en pneumatique et hydraulique.<br>
                                - Vous avez des connaissance en informatique (GMAO).<br>
                                - Vous disposez d’une expérience significative dans le secteur de la Maintenance Industrielle.<br>
                                - Vous acceptez de travailler en horaires rotatifs (4*8).<br>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-bottom: 60px">Vos qualités:</th>
                        <td><p><br>
                                - Vous aimez le travail d’équipe.<br>
                                - Vous avez le sens de l’organisation et faites preuve d’autonomie.<br>
                                - Vous êtes flexible.<br>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-bottom: 90px">Votre mission :</th>
                        <td><p><br>
                                - Vous assurez la maintenance curative et préventive des presses à injecter,  des périphériques et de l’ingénierie  de production.<br>
                                - Vous réalisez les interventions dans le respect des consignes d’hygiène et de sécurité ainsi que dans le respect des normes ISO 14001.<br>
                                - Vous enregistrez  la réalisation des opérations et des contrôles journaliers dans la GMAO.<br>
                            </p>
                        </td>
                    </tr>


                </table>
            </div>



        </div>
    <?php endforeach;?>


</div>



<aside class="login-candidat side">
    <header>
        <h3 style="background-color: #276e8f;color: white;width: 100%;">A propos de ce candidat</h3>

        <div class="">Ce que vous devez savoir</div>
        <hr>
        <span class="img-company">
            <img src="/projet_recrute/public/img/"
                 class="image-employer" alt="">
            </span>
    </header>
    <div class="side-b">

    </div>
</aside>

