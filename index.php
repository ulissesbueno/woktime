<?php
ini_set('short_open_tag','1');
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Progressbar - Default functionality</title>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <script src="bootstrap/js/bootstrap.js"></script>

  <script>
  $( function() {
    
    $( "#progressbar" ).progressbar({
      value: 0    
    });    
    
  });
  </script>

        <title>Contagem regressiva</title>

        <script type="text/javascript">

            var HH = 17;
            var MI = 48;
            var SS = 00;

            function atualizaContador() {

                var hoje = new Date();

                var todayd= hoje.getDate();

                var todaym= hoje.getMonth();

                var todayy= hoje.getFullYear();

                var futuro = new Date(todayy,todaym+1,todayd,HH,MI,SS);

                var ss = parseInt((futuro - hoje) / 1000);

                var mm = parseInt(ss / 60);

                var hh = parseInt(mm / 60);

                var dd = parseInt(hh / 24);

                ss = ss - (mm * 60);

                mm = mm - (hh * 60);

                hh = hh - (dd * 24);

                var faltam = '';

                faltam += (toString(hh).length) ? hh+' hr, ' : '';

                faltam += (toString(mm).length) ? mm+' min e ' : '';

                faltam += ss+' seg';

                if (dd+hh+mm+ss > 0) {

                    $('#contador').html(faltam);
                    setTimeout(atualizaContador,1000);
                    setTimeout(Horario,1000);

                } else {

                    $('#contador').html('CHEGOU!!!!');
                    setTimeout(atualizaContador,1000);
                    setTimeout(Horario,1000);

                }

            }

        function Horario(){  
            Elem = $("#Clock");
                    var Hoje = new Date(); 
                    var Horas = Hoje.getHours(); 
                    if(Horas < 10){ 
                        Horas = "0"+Horas; 
                    } 
                    var Minutos = Hoje.getMinutes(); 
                    if(Minutos < 10){ 
                        Minutos = "0"+Minutos; 
                    } 
                    var Segundos = Hoje.getSeconds(); 
                    if(Segundos < 10){ 
                        Segundos = "0"+Segundos; 
                    } 
                    Elem.html( Horas+":"+Minutos+":"+Segundos );
                    
                    pbar(Number(Horas),Number(Minutos));
                    //window.setInterval("Horario()",1000); 
                    
           }
           
           function pbar(h,m){
               
               var a2 = ((h * 60)-(17*60)+540) + m ;
               var b1 = 100;
               var a1 = 588;
               var p = (b1*a2)/a1;
               
               if(p > 100){
                   p = 100;
               }

               $('.progress-bar').removeClass('progress-bar-success')
               $('.progress-bar').removeClass('progress-bar-info');
               $('.progress-bar').removeClass('progress-bar-warning');
               $('.progress-bar').removeClass('progress-bar-danger');

               if( p >= 90 ){
                  $('.progress-bar').addClass('progress-bar-success');
               }
               if( p < 90 ){
                  $('.progress-bar').addClass('progress-bar-info');
               }
               if( p < 50 ){
                  $('.progress-bar').addClass('progress-bar-warning');
               } 
               if( p < 25 ){
                  $('.progress-bar').addClass('progress-bar-danger');
               }

               if( Math.round(p) == 100 ){
                  $('.progress-bar .icon').removeClass('working')
                  $('.progress-bar .icon').addClass('beer')
               }

               $('.list-group-item.porc').html(Math.round(p)+'% concluido');
              
               $('.progress-bar').css('width',p+'%')
           } 

        </script>

    </head>

    <style type="text/css">
      .main{
        width: 500px;
        margin: 50px;
        margin-left: auto;
        margin-right: auto;

        box-shadow: 2px 2px 20px #888888;
      }

      #Clock{
        font-weight: bold;
      }

      .progress{
        height: 50px;   
        margin-bottom: 0px;    
      }

      .progress-bar .icon{
        width: 40px;
        height: 40px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5px;        
      }

      .progress-bar .icon.working{
        background-image: url('men_at_work.gif');
      }

      .progress-bar .icon.beer{
        background-image: url('loading-beer_2.gif');
        background-position: -100px -70px;
        background-size: 240px ;
      }


      body{
        background: #ccc;
      }

    </style>

    <body onload="atualizaContador();Horario()">

        <div class="panel panel-primary main">
          <div class="panel-heading">Contagem regressiva</div>
          <div class="panel-body">

            <ul class="list-group">
              <li class="list-group-item">Fim do expediente: <b>17:48</b> </li>
              <li class="list-group-item">Hora atual: <span id="Clock">00:00:00</span></li>
              <li class="list-group-item">Faltam: <span id="contador"></span></li>
              <li class="list-group-item">

                <div class="progress">
                  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                    <div class='icon working'></div>
                  </div>
                </div>
              </li>
              <li class="list-group-item porc"></li>
            </ul>
            
          </div>
        </div>


    </body>

</html>

