
<p>&nbsp;</p>

<table style="width: 100%;">
    <tr><td colspan="2">Stato iniziale del dente: 
            <select id="statoIniziale" name="statoIniziale">
                <option value="0">Nessuno trattamento</option>
                <option value="1">Curato</option>
                <option value="2">Da Curare</option>
                <option value="3">Da Estrarre</option>
                <option value="4">Mancante</option>
            </select>
        </td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td style="width: 50%">
            <svg id="Livello_1" data-name="Livello 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 600">
                <script>

                    //let dentiSelezionatiTMP = [];
                    //var dentiSelezionatiTMP = new Array();
                    var dentiSelezionatiTMP = {};
                    let arrayDenti = ["D11", "D12", "D13", "D14", "D15", "D16", "D17", "D18", "D21", "D22", "D23", "D24", "D25", "D26", "D27", "D28", "D31", "D32", "D33", "D34", "D35", "D36", "D37", "D38", "D41", "D42", "D43", "D44", "D45", "D46", "D47", "D48"];




                    function changeClass(el) {


                        idRiga = $("#rigaEdit").val();

                        var select = document.getElementById('statoIniziale');
                        var value = select.options[select.selectedIndex].value;
                        //  alert(value);
                        var ciccio = el.id;
                        //dentiSelezionatiTMP.ciccio = value;
                        dentiSelezionatiTMP[ciccio] = value;

                        //let json = JSON.stringify(dentiSelezionatiTMP);
                        var json_string = JSON.stringify(dentiSelezionatiTMP);

                        switch (value) {
                            case "1":
                                el.classList.replace(el.classList, "cls-2-green");
                                break;
                            case "2":
                                el.classList.replace(el.classList, "cls-2-orange");
                                break;
                            case "3":
                                el.classList.replace(el.classList, "cls-2-red");
                                break;
                            case "4":
                                el.classList.replace(el.classList, "cls-2-black");
                                break;
                            default:
                                el.classList.replace(el.classList, "cls-2");
                        }


                        //console.log(dentiSelezionatiTMP);



                        $("#dentiSelezionati").val(json_string);
                        $("#paperino").val(json_string);
                        $("#dentiera").val(arrayDenti);
                    }

                </script>


                <defs>
                    <style>
                        .cls-1{fill:#c6c6c6;}
                        .cls-2,.cls-3,.cls-4{fill:#fff;stroke-miterlimit:10;}
                        .cls-2,.cls-3{stroke:#1d1d1b;}
                        .cls-2{stroke-width:0.97px;}
                        .cls-2-red{fill:red; stroke:#fff;}
                        .cls-2-green{fill:green; stroke:#fff;}
                        .cls-2-orange{fill:orange; stroke:#fff;}
                        .cls-2-black{fill:black; stroke:#fff;}
                        .cls-3,.cls-4{stroke-width:0.81px;}
                        .cls-4{stroke:#000;}
                        .cls-5{font-size:12.08px;fill:#1d1d1b;font-family:MyriadPro-Bold, Myriad Pro;font-weight:700;}
                        .cls-6{letter-spacing:0.01em;}
                        .cls-7{letter-spacing:0.01em;}
                        .cls-8{letter-spacing:0em;}
                        .cls-9{letter-spacing:0.01em;}
                        .cls-10{letter-spacing:0em;}
                        .cls-11{letter-spacing:-0.03em;}
                        .cls-12{letter-spacing:0.02em;}
                        .cls-13{letter-spacing:-0.03em;}
                    </style>
                </defs>
                <!--<title>denti_ridimensionato</title>-->

                <rect class="cls-1" width="500" height="600"/>
                <path id="D11" class="cls-2" d="M247.43,33.26l.23.13c-2.72-.6-5.51-1.94-8.13-1.66-5.48.58-10.86,2-16.29,3.11-12.6,2.52-14.42,8.41-7.62,16.44A75.11,75.11,0,0,0,226.4,62.14c11.7,9.12,16.33,7.74,22.08-6,1.09-6,2.5-12.06,3-18.16C251.64,36.57,248.87,34.86,247.43,33.26Z" onclick="changeClass(this);"/>
                <path id="D17" class="cls-2" d="M98.34,248.63l-.21-.15c10.58,6.24,21.4,4.69,32.29,1l3.62-1.56c1-2.2,2.71-4.34,2.92-6.61.61-6.61.81-13.27.78-19.91,0-2-1.3-3.92-2-5.88l-5-2.81c-8-1.28-15.93-3.07-24-3.68-5.71-.44-9.43,2.75-10.43,7.44-.92,4.37-1.39,8.83-2.06,13.25l-.92,1.8C90,239.72,91.72,245.62,98.34,248.63Z" onclick="changeClass(this);"/>
                <path id="D22" class="cls-2" d="M299.48,74.08c11.1,1.58,20-2.9,27.48-10.52,2.59-2.64,2.82-6.34-.53-8.91-3.79-2.91-7.57-6.31-11.94-7.84-5.69-2-12.14-4.31-17.49,1.47a31.31,31.31,0,0,0-1.58,21.92C295.86,71.75,298.08,72.8,299.48,74.08Z" onclick="changeClass(this);"/>
                <path id="D23" class="cls-2" d="M319.24,95.24c3.61,7.27,9.51,8,16.89,2l14.14-16.84c1.86-3.75,2.34-7.45-1.58-10.11C343.82,67,332.06,67.9,327,71.68c-8.75,1.07-13.4,5.54-12,12.39C315.71,87.93,317.77,91.53,319.24,95.24Z" onclick="changeClass(this);"/>
                <path id="D13" class="cls-2" d="M189.41,75.57c-1.08-1-2-2.6-3.26-2.94A151.85,151.85,0,0,0,168,68.44c-2.82-.41-6.09.48-8.8,1.63-4.45,1.89-4.86,7-1.27,10.82,4.26,5.18,7.93,11,12.91,15.38,8.49,7.44,13.93,5.91,19.22-4.26a37.27,37.27,0,0,0,2.45-5.75C193.86,82,193.26,78.31,189.41,75.57Z" onclick="changeClass(this);"/>
                <path id="D24" class="cls-2" d="M363.47,98.31c-7.69-4.35-20.12-3.55-26.67,1.86-1,.8-1.38,2.27-2.06,3.44-2.16,9,1.25,16.46,6.88,23,1.41,1.63,4.71,2.56,7,2.33,8.51-.88,15.66-4.59,20.51-11.94a13.94,13.94,0,0,0,1.16-3.12C372.83,106.56,368.21,102.41,363.47,98.31Z" onclick="changeClass(this);"/>
                <path id="D21" class="cls-2" d="M265.51,66.34c3,2.26,5.86,1.81,9,.14A53.37,53.37,0,0,0,294.1,48.31c2.3-3.48,2.55-6.86-.44-10.1-10.38-6.44-21.73-7.43-33.44-5.53-3.45.56-4.76,3.49-4.9,6.89A40.82,40.82,0,0,0,261,61.7C262.06,63.51,264,64.81,265.51,66.34Z" onclick="changeClass(this);"/>
                <path id="D26" class="cls-2" d="M393.89,203.53c2.78-2.55,6.87-4.61,8.07-7.76,2.65-7,.17-21.15-10.34-24.06-6.81-1.89-14.12-2.08-21.23-2.62-1.47-.11-3.07,1.59-4.61,2.46-4.48,2.49-4.23,6.36-3.08,10.51,1.42,5.1,2.71,10.23,4.25,15.29a51.64,51.64,0,0,0,2.71,6.08c3.64,4.57,9.56,5.43,16.69,2.44Z" onclick="changeClass(this);"/>
                <path id="D15" class="cls-2" d="M120.56,137.48c-3.56,7.49-2.88,14.59,2,21.3l3.58,3.44c8,6.56,18.91,6.56,25.82,0,11-11.67,11.06-20.29.17-30-9.08-2.73-18.11-3.87-26.91,1Z" onclick="changeClass(this);"/>
                <path id="D25" class="cls-2" d="M349.3,139.56c-3.5,11.84,1.78,22.24,13.59,26.8,7.6,2.93,20.16-3.42,24.22-12.26,2.41-6.41,3.39-12.66-2-18.23l-5.21-3.63c-8.25-3.49-16.69-2.73-24.76,0C352.69,133.11,351.24,137,349.3,139.56Z" onclick="changeClass(this);"/>
                <path id="D16" class="cls-2" d="M118.55,171.54c-10.45,2.17-13.75,10.9-13,21.61.24,3.61,2,6,5.24,8,7.95,4.91,16.12,7.12,25.27,4.28,1.57-1.74,4-3.24,4.56-5.26,1.79-5.93,2.87-12.08,4.23-18.14,1.84-4.25,1.22-8-2.39-11A25.14,25.14,0,0,0,118.55,171.54Z" onclick="changeClass(this);"/>
                <path id="D18" class="cls-2" d="M133.68,272.84c-.14-1.43-.64-2.93-.36-4.27,1.57-7.49-.49-11.58-10.48-13.12a100.26,100.26,0,0,0-19.15-.83c-2.84.11-5.61,2.08-8.41,3.2L92,260.13c-.6,1-1.66,2-1.72,3-.43,7.49-.79,15-.82,22.48,0,1.55,1.47,3.11,2.26,4.66L93,292.12c8.41,6.5,29.9,6.5,38.58,0,6.06-5.85,6.53-8.24,3.22-16.11C134.37,275,134,273.9,133.68,272.84Z" onclick="changeClass(this);"/>
                <path id="D12" class="cls-2" d="M212.85,60.77a74.91,74.91,0,0,0-.9-7.63c-1.6-7.33-4.92-10-12-7.94-6.34,1.85-12.39,5-18.15,8.35-3.44,2-4.49,6.37-1.32,9.12,4.62,4,9.78,7.89,15.39,10.14C208.17,77.76,212.65,74.22,212.85,60.77Z" onclick="changeClass(this);"/>
                <path id="D28" class="cls-2" d="M376.88,293.12l-4.72-5.74c-.21-2.42-1.32-5.23-.46-7.18,2.22-5,4-9.91,3.08-15.54-.22-1.42.71-3,1.1-4.54l1.33-1.83c2.78-.68,5.54-1.85,8.33-1.93,8.14-.24,16.29-.05,24.44,0l3.24,1.61c1,3.4,2.36,6.74,2.88,10.21.5,3.31-.47,6.89.28,10.1,1.4,6,.45,11-4.13,15.25l-1.71.58c-2.2.39-4.43,1.21-6.6,1.09C394.93,294.64,385.91,293.83,376.88,293.12Z" onclick="changeClass(this);"/>
                <path id="D27" class="cls-2" d="M412.29,245.89l-4.6,3.59a57.79,57.79,0,0,1-31.27-.49L372,245.72a36.33,36.33,0,0,1-.79-4.69c-.26-6.45-.6-12.92-.48-19.37,0-2.38,1.26-4.74,1.94-7.11l-.2.16c5.29-1.13,10.64-2,15.86-3.43,6.54-1.73,12.91-2.07,19.21.74l2.8,4.42c.68,4.42.84,9,2.17,13.23C414.3,235.24,415.43,240.52,412.29,245.89Z" onclick="changeClass(this);"/>
                <path id="D14" class="cls-2" d="M168,124.83c-5.6,5.28-11.63,5.31-18.13,1.71s-12.78-7.2-12.81-15.92c0-4.65,1.46-8.51,5.74-10.91,2.05-.83,4.06-1.81,6.17-2.45,7.51-2.28,14.35.48,21.21,3l1.23,1.85c.32,3.68,1.34,7.48.77,11C171.5,117.15,169.43,120.94,168,124.83Z" onclick="changeClass(this);"/>
                <path id="D46" class="cls-2" d="M161.66,431.71l-.18.18c4.09-2.91,2.76-6.54,1.55-10.31-1.35-4.24-2.35-8.58-3.61-12.85a39.2,39.2,0,0,0-1.79-4.24l-5.22-4.67c-6.59-2.69-15.06-1.59-19,2.47-4.7,1.08-8.15,3.63-9.69,8.36-2.35,7.27,1.62,17,8.61,21.1,6,1.3,12,3.35,18,3.63C154.05,435.55,157.88,433,161.66,431.71Z" onclick="changeClass(this);"/>
                <path id="D37" class="cls-2" d="M357.27,392c5.34,1.24,10.63,3,16,3.56,4.36.49,8.87-.37,13.32-.63,3.91-1,5.74-3.89,6.6-7.59,1.24-5.33,2.27-10.73,3.83-16A9.74,9.74,0,0,0,394,360.44c-2-1.76-4.61-2.85-6.95-4.25-10.18-3.43-20.16-1.94-30,1.38-1,.35-1.76,1.68-2.63,2.55l.17-.19c-.68,2.13-1.79,4.23-2,6.4-.49,5.81-.7,11.65-.81,17.48-.08,4,.48,7.84,5.73,8.29Z" onclick="changeClass(this);"/>
                <path id="D38" class="cls-2" d="M395.31,349.31l-.21.15c4.2-.91,4.27-4.35,4.48-7.56.37-5.75.82-11.5.78-17.25,0-2.77.51-6.34-3.61-7.32l-.54-.38c-.81-.85-1.46-2.14-2.45-2.49a45.46,45.46,0,0,0-35,1.14c-8.24,3.7-8.63,12.45-1.83,19.28.05,1.58.45,3.25.1,4.74-1.23,5.27.76,8.68,5.59,10.7,6.16.78,12.32,2.22,18.46,2.14C385.86,352.4,390.58,350.43,395.31,349.31Z" onclick="changeClass(this);"/>
                <path id="D47" class="cls-2" d="M152.92,391l-.2.17c1-2.12,2.69-4.22,2.75-6.36.17-6.17-.5-12.36-.51-18.55,0-4.76-2.32-7.68-6.59-8.93a53.44,53.44,0,0,0-27.17-1.06c-2.58.59-4.82,2.64-7.21,4l-2.81,3.08c-.45,2.55-1.6,5.21-1.22,7.63.87,5.5,2.57,10.87,3.78,16.32,1.53,6.91,4.12,9.82,11.17,9.38,8.42-.52,16.77-2.26,25.12-3.64C151.08,392.88,152,391.69,152.92,391Z" onclick="changeClass(this);"/>
                <path id="D42" class="cls-2" d="M225.51,540c1.61-6,3.44-11.92,4.66-18,.29-1.43-1.46-3.27-2.28-4.92-7.38,6-15.23,11.61-22,18.28-6.94,6.83-5.5,11.6,3.43,15.56,4.93,2.18,9.12,1.19,12.18-3.28A69.59,69.59,0,0,0,225.51,540Z" onclick="changeClass(this);"/>
                <path id="D41" class="cls-2" d="M242.92,526.21C235.43,533.8,230.66,543,227.45,553c-1.34,4.17-.09,8,4.65,9.7,2.56.92,5.15,1.75,7.66,2.8,3.64,1.51,6.56.59,9-2.3.77-3.88,2.27-7.77,2.17-11.63a168.92,168.92,0,0,0-2.16-23.83C248,523.26,245.9,523.05,242.92,526.21Z" onclick="changeClass(this);"/>
                <path id="D31" class="cls-2" d="M259,561.75c1.46,3.45,4.14,4.27,7.53,3.41a61.61,61.61,0,0,0,7.43-2.08c6.26-2.45,8.72-7.14,5.58-13.11-4.53-8.62-10.1-16.69-15.23-25-3.57-3.08-5.51-.68-5.92,2.44a202.93,202.93,0,0,0-1.94,23.31C256.45,554.38,258.14,558.07,259,561.75Z" onclick="changeClass(this);"/>
                <path id="D33" class="cls-2" d="M302.59,504.44c-1.82,2.6-4.19,5-5.32,7.85-1.39,3.54-2.47,7.58,1.36,10.7l5.31,3.77a38.38,38.38,0,0,0,23.19,3.8c1.82-.25,3.41-2.18,5.1-3.34,2.34-5.48,1.45-8-4.84-13.52-3.55-6.62-8.36-12-15.93-13.7-1.91-.43-4.31,1.27-6.48,2Z" onclick="changeClass(this);"/>
                <path id="D43" class="cls-2" d="M209,511.13c-5.72-10.75-11.44-12.48-18.85-7.22-5.48,3.9-9.82,9.59-14,15-2.61,3.32-3,7.46.8,10.79,7.73,4.23,15.16,1.53,22.6-1l2.69-.39C211.05,525.14,213.54,518.85,209,511.13Z" onclick="changeClass(this);"/>
                <path id="D44" class="cls-2" d="M161.5,479.75c-9.58,6.58-9.12,18,.8,23.15a21.53,21.53,0,0,0,14.4,2.14c2-.39,4.1-.65,6.15-1,10.33-4.33,12.23-11.21,5.82-21.06l-7.16-8.55C175,471.83,165.9,474.23,161.5,479.75Z" onclick="changeClass(this);"/>
                <path id="D34" class="cls-2" d="M340.5,475.44c-11.34-6.5-21.43-2-22.88,10.22-2.74,10-2.38,11.51,3.75,15.89,5.15,3.54,11,4,16.87,3.2,2.28-.32,4.4-1.79,6.59-2.74,8.7-3.67,11.31-11.88,5.46-19C347.74,479.92,343.81,477.94,340.5,475.44Z" onclick="changeClass(this);"/>
                <path id="D45" class="cls-2" d="M138.83,464.8,146,470c.63.53,1.26,1.52,1.9,1.53,6.64.06,13.28.14,19.9-.22,1.6-.09,3.11-1.8,4.67-2.76,6.91-9.24,7.36-15.9,1.32-22.38-2.18-2.34-4.65-4.4-7-6.59-6.31-3.94-13.9-3.74-18.88.48l-7.65,5.06C135.48,450.59,134.76,460.38,138.83,464.8Z" onclick="changeClass(this);"/>
                <path id="D35" class="cls-2" d="M362.43,469.55c9.85-2.35,11.05-17.74,4.18-25.67-5.69-6.56-19.54-8.84-26.19-4.41-10.4,6.92-12.66,15-7.3,26.09,1,1.31,1.78,3.36,3.09,3.81C344.87,472.3,353.66,473.25,362.43,469.55Z" onclick="changeClass(this);"/>
                <path id="D36" class="cls-2" d="M352.68,400.73c-1.39,1.7-3.44,3.2-4,5.14-1.36,4.51-2,9.24-2.93,13.88-1.44,4.1-3.23,8.21.72,12,5.85,5.1,12.84,3.39,19.24,2.41,4.55-.7,8.75-3.67,13.1-5.63.75-.84,1.56-1.63,2.25-2.52,4-5.1,5-15.16,1.9-19.13C377.47,399.8,361,396.47,352.68,400.73Z" onclick="changeClass(this);"/>
                <path id="D48" class="cls-2" d="M108.27,319.76a24,24,0,0,0-1,4.94c0,6,.15,12,.54,18,.1,1.62,1.27,3.18,2,4.77l3.16,2.82c8,4.53,16.68,3.32,25.12,2.33,3.88-.46,7.55-2.79,11.31-4.28l.56-.37c.44-1,1.32-2,1.24-2.94a30.51,30.51,0,0,1,3.49-16.83c.71-1.43-.83-4-1.34-6L151,318.59c-2.32-1.55-4.51-4.18-7-4.45-8-.86-16-.95-24-1.07-1.33,0-2.69,1.26-4,1.94Z" onclick="changeClass(this);"/>
                <path id="D32" class="cls-2" d="M292.5,551.92c3.78-1.43,7-2.16,9.66-3.76,4.39-2.63,5.45-7.22,2.18-10.5-6.58-6.61-13.54-12.86-20.53-19-1.06-.94-3.67-1.52-4.58-.87a5.17,5.17,0,0,0-1.44,4.61c2.6,8.42,5.3,16.84,8.6,25C287.2,549.34,290.36,550.39,292.5,551.92Z" onclick="changeClass(this);"/>
                <text class="cls-5" transform="translate(215.31 23.11)">11</text>
                <text class="cls-5" transform="translate(231.62 99.56)">SOPRA</text>
                <text class="cls-5" transform="translate(152.11 304.25)">DESTRA</text>
                <text class="cls-5" transform="translate(306.25 304.25)">SINISTRA</text>
                <text class="cls-5" transform="translate(237.04 506.81)">SOTTO</text>
                <text class="cls-5" transform="translate(274.02 23.11)">21</text>
                <text class="cls-5" transform="translate(325.33 38.67)">22</text>
                <text class="cls-5" transform="translate(363.47 69.42)">23</text>
                <text class="cls-5" transform="translate(381.94 108.32)">24</text>
                <text class="cls-5" transform="translate(401.66 148.13)">25</text>
                <text class="cls-5" transform="translate(417 187.36)">26</text>
                <text class="cls-5" transform="translate(425.58 231.51)">27</text>
                <text class="cls-5" transform="translate(434.71 278.94)">28</text>
                <text class="cls-5" transform="translate(417 339.58)">38</text>
                <text class="cls-5" transform="translate(405.25 382.52)">37</text>
                <text class="cls-5" transform="translate(396.21 424.38)">36</text>
                <text class="cls-5" transform="translate(381.94 464.8)">35</text>
                <text class="cls-5" transform="translate(363.47 506.81)">34</text>
                <text class="cls-5" transform="translate(340.5 539.95)">33</text>
                <text class="cls-5" transform="translate(306.25 561.75)">32</text>
                <text class="cls-5" transform="translate(264.36 583.98)">31</text>
                <text class="cls-5" transform="translate(233.77 583.98)">41</text>
                <text class="cls-5" transform="translate(192.67 568.42)">42</text>
                <text class="cls-5" transform="translate(151.94 539.95)">43</text>
                <text class="cls-5" transform="translate(130.42 505.1)">44</text>
                <text class="cls-5" transform="translate(108.5 464.8)">45</text>
                <text class="cls-5" transform="translate(91.99 428.5)">46</text>
                <text class="cls-5" transform="translate(74.43 380.05)">47</text>
                <text class="cls-5" transform="translate(64.77 339.58)">48</text>
                <text class="cls-5" transform="translate(174.16 38.67)">12</text>
                <text class="cls-5" transform="translate(131.59 69.42)">13</text>
                <text class="cls-5" transform="translate(108.5 108.32)">14</text>
                <text class="cls-5" transform="translate(89.46 149.26)">15</text>
                <text class="cls-5" transform="translate(74.43 186.31)">16</text>
                <text class="cls-5" transform="translate(61.55 231.71)">17</text>
                <text class="cls-5" transform="translate(51.89 278.94)">18</text>
            </svg>
        </td>
        <td style="width: 50%; height: 400px; vertical-align: top;">

<!--           <textarea style="width: 100%; height: 100%;" id="noteRigaPopup" name="noteRigaPopup" onfocusout="Focus_Out()"></textarea>-->
            <textarea style="width: 100%; height: 100%;" id="noteStatoIniziale" name="noteStatoIniziale" placeholder="Note Cartella Clinica"></textarea>
            <input type="hidden" name="dentiSelezionati[]" id="dentiSelezionati">
                <input type="hidden" name="paperino" id="paperino">

                    <input type="hidden" name="dentiera[]" id="dentiera">

                        </td>
                        </tr>
                        </table>