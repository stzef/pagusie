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

    @page {
        margin-right: 1,5cm;
        margin-left: 1,8cm;
    }
    #header { position: fixed; left: 0px; top: -140px;  right: 0px; height: 10;  text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -150px; right: 0px; height: 130px;  }
    #footer .page:after { content: counter(page, upper-roman); }
</style>
<link rel="stylesheet" href="layout/css/bootstrap-without-icons.min.css" >


@yield('styles')

</head>
<body id="app-layout">

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <img src="img/header.jpg"  width="110%"></img>
                </div>
                <!--<div class="text-center col-xs-10">
                    <p>
                        <font face="Comic Sans MS">
                            INSTITUCIÓN EDUCATIVA TÉCNICA SUMAPAZ<br>
                            PRIMERA INTEGRACION SEGÚN RESOLUCION No. 1211 DEL 3 DE OCTUBRE DE 2002<br> RECONOCIMIENTO DE ESTUDIOS HASTA EL AÑO 2013 SEGÚN RESOLUCION No. 1178  DEL 26 DE AGOSTO DE 2009 NIT: 800.029.382-7 CODIGO DANE 173449000732
                        </font>
                    </p>
                </div>-->
            </div>
        </div>
        @yield('header')
    </header>
    <footer id="footer">
        <div class="container">
                    <img src="img/footer.jpg"  width="95%"></img>
                <p>
                    Cra.25 No.6-43 Sede principal - TEL: 2452305-2450966 Melgar Tol, E-mail: ricardomorales@yahoo.es
                </p>
            <!--<p>
              <center><em>UNA INSTITUCION EDUCATIVA COMPROMETIDA CON EXCELENCIA Y CALIDAD POR EL DESARROLLO  DE  MELGAR.<em></center> Cra.25 No.6-43 Sede principal - TEL: 2452305-2450966 Melgar Tol, E-mail: ricardomorales@yahoo.es
              </p>-->
              <hr style="height: 2px; width: 100%; background-color: black; margin-bottom: 0px; margin-top: 0px;" align="right">
              <font size=-4>
                  Impreso por PagusIE v1. Diseñado por SistematizarEF Ltda. Tel 8330505-8353786 - Cel 315-2587590 314-3945809 - Girardot - www.sistematizar.co  Fecha: {{date('Y-m-d H:i:s')}}
              </font>
          </hr>
      </div>
      @yield('footer')
  </footer>

  @yield('body')

  @yield('scripts')

</body>
</html>
