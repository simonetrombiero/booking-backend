
        <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
                <div class="slider"><span class="titleTasti">Cerca Cliente:</span>&nbsp;<input type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">
                    <?php  //include "slider.php"; ?>

                </div>
            </div>
        </div>
        <div style="clear:left;">&nbsp;</div>

        <div class="grid grid-pad">
            <div class="col-1-3">
                <a href="index.php?action=clientiList">
                <div class="box textCenter">
                    
                    
                    <p><img src="img/cliente.png"></p>
                    <span class="titleTasti">GESTIONE CLIENTI</span>
                   

                </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=agenda">
                <div class="box textCenter">
                    <p><img src="img/agenda.png"></p>
                <span class="titleTasti">AGENDA</span>
                </div>
               </a> 
            </div>
            <div class="col-1-3">
                <a href="index.php?action=gestioneContabile">
                <div class="box textCenter">
                    <p><img src="img/contabile.png"></p>
                    <span class="titleTasti">GESTIONE CONTABILE</span>
                </div>
                </a>
            </div>
        </div>

        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            <div class="col-1-3">
                <div class="box textCenter">
                    <p><img src="img/prodotti.png"></p>
                    <span class="titleTasti">GESTIONE PRODOTTI</span>


                </div>
            </div>
            <div class="col-1-3">
                <div class="box textCenter">
                    <p><img src="img/card.png"></p>
                    <span class="titleTasti">FIDELITY CARD</span>

                </div>
            </div>
            <div class="col-1-3">
                <div class="box textCenter">
                    <p><img src="img/shop.png"></p>
                    <span class="titleTasti">MARKETING & SHOP</span>
                </div>
            </div>
        </div>
        
        <?php if(isAdmin()) { ?>
        
        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            <div class="col-1-3">
                <a href="index.php?action=dipendentiList">
                <div class="box textCenter">
                    <p><img src="img/cliente.png"></p>
                    <span class="titleTasti">GESTIONE DIPENDENTI</span>


                </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=incarichiList">
                <div class="box textCenter">
                    <p><img src="img/cliente.png"></p>
                    <span class="titleTasti">GESTIONE INCARICHI</span>

                </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=impostazioni">
                <div class="box textCenter">
                    <p><img src="img/shop.png"></p>
                    <span class="titleTasti">IMPOSTAZIONI</span>
                </div>
                </a>
            </div>
        </div>
        <?php }  ?>


        