<?php
global $pianoTrattamento;
?>
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
    <svg xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 20 20"
         onload="makeDraggable(evt)">

        <style>
            .static {
                cursor: not-allowed;
            }
            .draggable {
                cursor: move;
            }
        </style>

        <script type="text/javascript"><![CDATA[
               function makeDraggable(evt) {
                    var svg = evt.target;
            svg.addEventListener('mousedown', startDrag);
            svg.addEventListener('mousemove', drag);
            svg.addEventListener('mouseup', endDrag);
            svg.addEventListener('mouseleave', endDrag);
            svg.addEventListener('touchstart', startDrag);
            svg.addEventListener('touchmove', drag);
            svg.addEventListener('touchend', endDrag);
            svg.addEventListener('touchleave', endDrag);
            svg.addEventListener('touchcancel', endDrag);
            function getMousePosition(evt) {
            var CTM = svg.getScreenCTM();
            if (evt.touches) { evt = evt.touches[0]; }
            return {
                    x: (evt.clientX - CTM.e) / CTM.a,
                    y: (evt.clientY - CTM.f) / CTM.d
            };
            }
        
            var selectedElement, offset, transform;
        
            function startDrag(evt) {
                    if (evt.target.classList.contains('draggable')) {
            selectedElement = evt.target;
            offset = getMousePosition(evt);
            // Make sure the first transform on the element is a translate transform
            var transforms = selectedElement.transform.baseVal;
            if (transforms.length === 0 || transforms.getItem(0).type !== SVGTransform.SVG_TRANSFORM_TRANSLATE) {
            // Create an transform that translates by (0, 0)
            var translate = svg.createSVGTransform();
            translate.setTranslate(0, 0);
            selectedElement.transform.baseVal.insertItemBefore(translate, 0);
            
            }
        
            // Get initial translation
            transform = transforms.getItem(0);
            offset.x -= transform.matrix.e;
            offset.y -= transform.matrix.f;
            }
            }
        
            function drag(evt) { 
                    if (selectedElement) {
            evt.preventDefault();
            var coord = getMousePosition(evt); 
            transform.setTranslate(coord.x - offset.x, coord.y - offset.y);
            console.log(coord);
            
            var x_coord = coord.x - offset.x;
            var y_coord = coord.y - offset.y;
            document.getElementById("coordinatepallino_x").value = (x_coord);
            document.getElementById("coordinatepallino_y").value = (y_coord);
            
            }
            }
        
            function endDrag(evt) {
                    selectedElement = false;
            }
            }
            ]]> 
        

        </script>

        <rect x="0" y="0" width="30" height="30" fill-opacity="0.1"/>
        <!--<rect class="static" fill="#888" x="2" y="4" width="6" height="2"/>-->
        <!--<rect class="draggable" fill="#007bff" x="2" y="4" width="6" height="2" transform="rotate(90, 5, 5) translate(10, 0)"/>-->
        <?php if(isset($pianoTrattamento->zonaTrattata)){  ?>
            <ellipse class="draggable" fill="#ff00af" cx="1" cy="1" rx="0.4" ry="0.4" transform="translate(<?php echo $pianoTrattamento->zonaTrattata; ?>)"/>
        <?php }else{ ?>
        <ellipse class="draggable" fill="#ff00af" cx="1" cy="1" rx="0.4" ry="0.4" transform="translate(0, 0)"/>
        
         <?php } ?>
       
        <!--<ellipse class="static" fill="#fffff" cx="1" cy="1" rx="0.4" ry="0.4" transform="translate(8.17, 9.35)"/>-->
        <!--<polygon class="draggable" fill="#ffa500" transform="rotate(15, 15, 15)" points="16.9 15.6 17.4 18.2 15 17 12.6 18.2 13.1 15.6 11.2 13.8 13.8 13.4 15 11 16.2 13.4 18.8 13.8"/>-->
        <!--<path class="draggable" stroke="#2bad7b" stroke-width="0.5" fill="none" d="M1 5C5 1 5 9 9 5" transform="translate(20)"/>-->
        <!--<text class="draggable" x="25" y="15" text-anchor="middle" font-size="3px" alignment-baseline="middle">Drag</text>-->
    </svg>
   

</div>
<?php 

//print_r($pianoTrattamento);
if(isset($pianoTrattamento->zonaTrattata)){ 
//if(!isBlankOrNull($pianoTrattamento->zonaTrattata)){ 
    $coord = explode(",", $pianoTrattamento->zonaTrattata);
        
    $coord_x = $coord[0];
    $coord_y = $coord[1];
    ?>
<input type="hidden" id="coordinatepallino_x" name="coordinatepallino_x" value="<?php echo $coord_x; ?>">
<input type="hidden" id="coordinatepallino_y" name="coordinatepallino_y" value="<?php echo $coord_y; ?>">    
<?php }else{ ?>
<input type="hidden" id="coordinatepallino_x" name="coordinatepallino_x">
<input type="hidden" id="coordinatepallino_y" name="coordinatepallino_y">    
<?php } ?>