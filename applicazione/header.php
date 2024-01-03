<body>
        
<!--        <div style="background-color: #366c88; width: 100%;">  
            <div class="grid grid-pad" style="padding-left: 5px;">
            <div class="col-1-1 mobile-col-1-1">
                <div class="logo textCenter"><img class="center" src="img/logo.png"></div>
                
            </div>
          
        </div>
        </div>-->
    <div style="background-color: #366c88; width: 100%;">  
    <div class="grid grid-pad" style="padding-left: 5px;">
            <div class="col-8-12 mobile-col-8-12">
                <div class="logo"><a href="index.php?action=applicazione"><img src="img/logo.png"></a>

                </div>
                
            </div>
           <div class="col-4-12 mobile-col-4-12">
               <div class="flag">
                   Benvenuto: <?php echo  $_SESSION['profilo']->nome; ?> | <a href="index.php?action=logout">Esci</a> 

                </div>
                
            </div>
        </div>
    

<div style="background-color: #175e4c; width: 100%;">  
<div class="container-menu" style="float: left;">
                <a class="toggleMenu" href="#">Menu</a>
                <ul class="nav">
                     <?php if(isAdmin()) { ?>
                    <li  class="test"><a href="index.php?action=cassa">Cassa</a></li>
                     <?php } ?>
                    
                    <li><a href="#">Archivio</a>
                        <ul>
                            <li>
                                <a href="#">Voce 1</a>
                                <ul>
                                    <li><a href="#">Voce 1.1</a></li>
                                    <li><a href="#">Voce 1.2</a></li>
                                    <li><a href="#">Voce 1.3</a></li>
				</ul>
                            </li>
                            <li><a href="#">Voce 2</a>
                                <ul>
                                    <li><a href="#">Voce 2.1</a></li>
                                    <li><a href="#">Voce 2.1</a></li>
                                    <li><a href="#">Voce 2.1</a></li>
                                    <li><a href="#">Voce 2.1</a></li>
				</ul>
                            </li>
                                
                                
                           
		</ul>
	</li>
        <?php if(isAdmin()){ ?>
        <li><a href="index.php?action=impostazioni">Impostazioni</a>
            <ul>
                <li><a href="index.php?action=visualizzaAzienda">Azienda</a></li>
                <li><a href="index.php?action=aliquoteList">Aliquote IVA</a></li>
                <!--<li><a href="index.php?action=trattamentiList">Gestione Trattamenti</a></li>-->
                
                
            </ul>
                            
	</li>
        <?php } ?>
	
</ul>
</div>
    <div style="text-align: right; padding: 20px 35px;"><a href="index.php?action=notifiche" style="color: #fff; font-weight: bold;">Notifiche</a></div>
</div>
</div>
<script type="text/javascript" src="applicazione/js/menu.js"></script>

<div style="clear:left;">&nbsp;</div> 