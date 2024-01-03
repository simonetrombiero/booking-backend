<style>
    .box_schedaMorfologia {
        height: 450px;
        width: 450px;
        <?php if ($cliente->sesso == 'M') { ?>
            background-image: url(img/bg_schedaMorfologicaM.jpg);

        <?php } else { ?>
            background-image: url(img/bg_schedaMorfologica.jpg);
        <?php } ?>
        background-size:100% 100%;
        -o-background-size: 100% 100%;
        -webkit-background-size: 100% 100%;
        background-size:cover;

    }

</style>

<div class="box_schedaMorfologia" id="pallino">
    <!--<img src="">-->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">

        <style>
            .static {
                cursor: not-allowed;
            }
            .draggable {
                cursor: move;
            }
        </style>

        

        <rect x="0" y="0" width="30" height="30" fill-opacity="0.1"/> ?>
        
        <?php if($pianoTrattamento->zonaTrattata!=''){ ?>
            <ellipse class="static" fill="#ff00af" cx="1" cy="1" rx="0.4" ry="0.4" transform="translate(<?php echo $pianoTrattamento->zonaTrattata; ?>)"/>
        <?php }else{ ?>
        <ellipse class="static" fill="#ff00af" cx="1" cy="1" rx="0.4" ry="0.4" transform="translate(0, 0)"/>
        
         <?php } ?>
    </svg>
   

</div>
<input type="hidden" id="coordinatepallino_x" name="coordinatepallino_x">
<input type="hidden" id="coordinatepallino_y" name="coordinatepallino_y">    
