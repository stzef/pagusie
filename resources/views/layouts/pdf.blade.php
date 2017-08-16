<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @yield('title')

    <style>
        .cuadrado {
            width: 45px;
            height: 20px;
            border: 1px solid #555;
        }
        @page { margin: 130px 50px; }
        #header { position: fixed; left: 0px; top: -120px;  right: 0px; height: 10;  text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -130px; right: 0px; height: 70px;  }
        #footer .page:after { content: counter(page, upper-roman); }
    </style>
    <link rel="stylesheet" href="layout/css/bootstrap-without-icons.min.css" >


    @yield('styles')

</head>
<body id="app-layout">

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-1">
                    <img src="img/logo.png" height="100px"></img>
                </div>
                <div class="text-center col-xs-10">
                    <p>
                        <font face="Comic Sans MS">
                            INSTITUCIÓN EDUCATIVA TÉCNICA SUMAPAZ<br>
                            PRIMERA INTEGRACION SEGÚN RESOLUCION No. 1211 DEL 3 DE OCTUBRE DE 2002<br> RECONOCIMIENTO DE ESTUDIOS HASTA EL AÑO 2013 SEGÚN RESOLUCION No. 1178  DEL 26 DE AGOSTO DE 2009 NIT: 800.029.382-7 CODIGO DANE 173449000732
                        </font>
                    </p>
                </div>
            </div>
        </div>
        @yield('header')
    </header>
    <footer id="footer">
        <div class="container">
            <p style="font-family: "Monotype Corsiva", Times, serif;">
               <div class="text-center">
                   <em>
                       UNA INSTITUCION EDUCATIVA COMPROMETIDA CON EXCELENCIA Y CALIDAD POR EL
                       DESARROLLO  DE  MELGAR.<br>
                   </em>
               </div>
               Cra.25 No.6-43 Sede principal - TEL: 2452305-2450966 Melgar Tol, E-mail: ricardomorales@yahoo.es
           </p>
       </div>
       @yield('footer')
   </footer>

   @yield('body')

   @yield('scripts')

</body>
</html>
