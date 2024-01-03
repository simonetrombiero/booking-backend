<?php
global $azienda;
?>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->


            <form action="index.php" id="gestioneCalendario" name="gestioneCalendario" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="id" name="id">
            </form>      



            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        SCHEDA AZIENDA
                    </h2>

                    <div style=" text-align: right; padding: 10px 15px;">
                        <?php
                        if (isset($azienda)) {
                            ?>
                            <a href="index.php?action=modificaAzienda&amp;id=<?php echo $azienda->id; ?>" class="btn btn-green">Modifica</a>
                        <?php } else { ?>
                            <a href="index.php?action=nuovaAzienda" class="btn btn-green">Registra Azienda</a>
                        <?php } ?>
                    </div>


                </div></div>
            <!--</div>-->
            <!--</div>-->

            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div style="padding: 10px;">




                <!--<link rel="stylesheet" href="style/jquery-ui-1.10.4.custom.css" media="all">-->
                <div class="sheet clearfix">
                    <div class="layout-wrapper">
                        <div class="content-layout">
                            <div class="content-layout-row">
                                <div class="layout-cell content">
                                    <article class="post article">                            
                                        <div class="postcontent postcontent-0 clearfix">
                                            <div class="content-layout">
                                                <div class="content-layout-row">
                                                    <div class="layout-cell layout-item-0" style="width: 100%" >

                                                        <?php if (isset($azienda)) { ?>
                                                            <div style="margin: 20px auto; width: 530px">
                                                                <div style="display: table">
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Ragione Sociale: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->ragioneSociale;
                                                                            }
                                                                            ?> 
                                                                        </div>
                                                                    </div>
                                                                    <!--                                                    <div style="display: table-row; height: 35px">
                                                                                                                            <div  style="display: table-cell; width: 150px">
                                                                                                                                Denominazione: 
                                                                                                                            </div>
                                                                                                                            <div  style="display: table-cell">
                                                                    <?php
//                                                            if (isset($azienda)) {
//                                                                echo $azienda->denominazione;
//                                                            }
                                                                    ?>
                                                                                                                            </div>
                                                                                                                        </div>-->
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Partita Iva: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->piva;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Codice Fiscale: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->codFisc;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Codice Univoco (SDI): 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->codiceUnivoco;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell">
                                                                            Indirizzo:
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->indirizzo;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell">
                                                                            Città:
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            $citta = null;
                                                                            if (isset($azienda)) {
                                                                                if (!isBlankOrNull($azienda->idCitta)) {
                                                                                    //$citta = DAOFactory::getComuniDAO()->loadById($azienda->idCitta);
                                                                                    $citta = DAOFactory::getComuniDAO()->load($azienda->idCitta);
                                                                                }
                                                                            }
                                                                            if ($citta != null) {
                                                                                echo $citta->comune;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell">
                                                                            Cap:
                                                                        </div>
                                                                        <div  style="display: table"> 
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->cap;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Telefono: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->telefono;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Telefono: 
                                                                        </div>
                                                                        <div  style="display: table-cell">

                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->telefono2;
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Fax: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->fax;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Fax: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->fax;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Cellulare: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->cellulare;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Email: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->email;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            PEC: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->pec;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Sito Web: 
                                                                        </div>
                                                                        <div  style="display: table-cell">
                                                                            <?php
                                                                            if (isset($azienda)) {
                                                                                echo $azienda->sitoWeb;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: table-row; height: 35px">
                                                                        <div  style="display: table-cell; width: 150px">
                                                                            Logo: 
                                                                        </div>
                                                                        <div  style="display: table-cell">

                                                                            <?php
                                                                            if (isset($azienda->logo)) {
                                                                                ?>

                                                                                <img src="applicazione/test.php" alt="logo" style="width: 200px">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                            <div style="float: right">
                                                                <?php
                                                                if (isset($azienda)) {
                                                                    ?>
                                                                    <!--                                                    <div style="margin-top: 15px; text-align: right; float: left">
                                                                                                                            <a href="index.php?action=modificaAzienda&amp;id=<?php echo $azienda->id; ?>" class="button">Modifica</a>
                                                                                                                        </div>-->
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--FINE--->




            </div>
        </div>
        <div style="clear:left;">&nbsp;</div>

