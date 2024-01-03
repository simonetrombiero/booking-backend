<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
	<style type="text/css">
		#div_signcontract{ width: 99%; }
		.popupHeader{ margin: 10px; }
	</style>
	<script type="text/javascript">
		var isSign = false;
		var leftMButtonDown = false;
		
		jQuery(function(){
			//Initialize sign pad
			init_Sign_Canvas();
		});
		
		function fun_submit() {
			if(isSign) {
				var canvas = $("#canvas").get(0);
				var imgData = canvas.toDataURL();
				jQuery('#page').find('p').remove();
				jQuery('#page').find('img').remove();
				jQuery('#page').append(jQuery('<p>Your Sign:</p>'));
				jQuery('#page').append($('<img/>').attr('src',imgData));
				
				closePopUp();
			} else {
				alert('Please sign');
			}
		}
		
		function closePopUp() {
			jQuery('#divPopUpSignContract').popup('close');
			jQuery('#divPopUpSignContract').popup('close');
		}
		
		function init_Sign_Canvas() {
			isSign = false;
			leftMButtonDown = false;
			
			//Set Canvas width
			var sizedWindowWidth = $(window).width();
			if(sizedWindowWidth > 700)
				sizedWindowWidth = $(window).width() / 2;
			else if(sizedWindowWidth > 400)
				sizedWindowWidth = sizedWindowWidth - 100;
			else
				sizedWindowWidth = sizedWindowWidth - 50;
			 
			 $("#canvas").width(sizedWindowWidth);
			 $("#canvas").height(200);
			 $("#canvas").css("border","1px solid #000");
			
			 var canvas = $("#canvas").get(0);
			
			 canvasContext = canvas.getContext('2d');

			 if(canvasContext)
			 {
				 canvasContext.canvas.width  = sizedWindowWidth;
				 canvasContext.canvas.height = 200;

				 canvasContext.fillStyle = "#fff";
				 canvasContext.fillRect(0,0,sizedWindowWidth,200);
				 
				 canvasContext.moveTo(50,150);
				 canvasContext.lineTo(sizedWindowWidth-50,150);
				 canvasContext.stroke();
				
				 canvasContext.fillStyle = "#000";
				 canvasContext.font="20px Arial";
				 canvasContext.fillText("x",40,155);
			 }
			 // Bind Mouse events
			 $(canvas).on('mousedown', function (e) {
				 if(e.which === 1) { 
					 leftMButtonDown = true;
					 canvasContext.fillStyle = "#000";
					 var x = e.pageX - $(e.target).offset().left;
					 var y = e.pageY - $(e.target).offset().top;
					 canvasContext.moveTo(x, y);
				 }
				 e.preventDefault();
				 return false;
			 });
			
			 $(canvas).on('mouseup', function (e) {
				 if(leftMButtonDown && e.which === 1) {
					 leftMButtonDown = false;
					 isSign = true;
				 }
				 e.preventDefault();
				 return false;
			 });
			
			 // draw a line from the last point to this one
			 $(canvas).on('mousemove', function (e) {
				 if(leftMButtonDown == true) {
					 canvasContext.fillStyle = "#000";
					 var x = e.pageX - $(e.target).offset().left;
					 var y = e.pageY - $(e.target).offset().top;
					 canvasContext.lineTo(x,y);
					 canvasContext.stroke();
				 }
				 e.preventDefault();
				 return false;
			 });
			 
			 //bind touch events
			 $(canvas).on('touchstart', function (e) {
				leftMButtonDown = true;
				canvasContext.fillStyle = "#000";
				var t = e.originalEvent.touches[0];
				var x = t.pageX - $(e.target).offset().left;
				var y = t.pageY - $(e.target).offset().top;
				canvasContext.moveTo(x, y);
				
				e.preventDefault();
				return false;
			 });
			 
			 $(canvas).on('touchmove', function (e) {
				canvasContext.fillStyle = "#000";
				var t = e.originalEvent.touches[0];
				var x = t.pageX - $(e.target).offset().left;
				var y = t.pageY - $(e.target).offset().top;
				canvasContext.lineTo(x,y);
				canvasContext.stroke();
				
				e.preventDefault();
				return false;
			 });
			 
			 $(canvas).on('touchend', function (e) {
				if(leftMButtonDown) {
					leftMButtonDown = false;
					isSign = true;
				}
			 
			 });
		}
	</script>
    <p>&nbsp;</p>


        <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
<!--            <thead>
                <tr>
                    <th style="height: 40px; line-height: 40px; background: #66AACC; text-align: left; padding: 0px 5px; color: #FFF;">Dati Paziente</th>

                </tr>
               
            </thead>-->
            <tbody>
                
                 <tr>
                     <td>Dichiaro di esser stato correttamente informato circa il piano di trattamento proposto, il preventivo di spese e modalità di pagamento, i rischi connessi alla terapia e quelli da mancata terapia.<br>
                         In particolare mi è stato spiegato che eventuali modifiche in corso d'esecuzione mi verranno sottoposte, di volta in volta, per approvazione.<br>
                         Ho chiaramente compreso le finalità del trattamento cui verrò sottoposto/a, le eventuali scelte terapeutiche percorribili nel mio caso i rischi impliciti nel trattamento, le principali caratteristiche funzionali ed estetiche dei manufatti che mi verranno applicati.<br>
                         Sono stato altresì informato/a che per la conservazione nel tempo di una buona salute dentale sono opporture sedute periodiche di controllo clinico/igiene <br>
                         (secondo le istruzioni che ho ricevuto).<br>
                         Pertanto, avendo discusso e compreso il tutto, accetto e autorizzo la Dott.ssa DE LUNA PAOLA al trattamento proposto.
                     </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>Data: <?php echo date("d/m/Y"); ?></td>
                </tr>   
                <tr>
                    <td style="text-align: right">Firma del paziente <a href="#divPopUpSignContract" data-rel="popup" data-position-to="window" data-role="button" data-inline="true">Open Sign Pad</a></td>
                </tr>   
            

            </tbody>
        </table>
<div data-role="popup" id="divPopUpSignContract">
			<div data-role="header" data-theme="b">
				<a data-role="button" data-rel="back" data-transition="slide" class="ui-btn-right" onclick="closePopUp()"> Close </a>
				<p class="popupHeader">Sign Pad</p>
			</div>
			<div class="ui-content popUpHeight">
				<div id="div_signcontract">
					<canvas id="canvas">Canvas is not supported</canvas>
					<div>
						<input id="btnSubmitSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Submit Sign" onclick="fun_submit()" />
						<input id="btnClearSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Clear" onclick="init_Sign_Canvas()" />
					</div>
				</div>	
			</div>
		</div>