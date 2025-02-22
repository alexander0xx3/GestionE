<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>@yield('titulo')</title>
 <!-- Bootstrap 5 CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
 {{-- {{ asset('css/app.css') }} --}}
<link href= {{ asset('css/style.css') }} rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="content">
    <div id="header">
      <div id="logo" style="width: 133px;">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/estudia.png') }}" alt="Logo" style=" vertical-align: middle;">
        </a>
      </div>
      <div id="links">
        <ul>
          <li><a href="{{ route('panel.index', 'Estudiantes') }}">Estudiantes</a></li>
          <li><a href="{{ route('panel.index', 'Profesores') }}">Profesores</a></li>          
          <li><a href="{{ route('panel.index', 'Materias') }}">Materias</a></li>
          <li><a href="{{ route('panel.index', 'Cursos') }}">Cursos</a></li>
          <li><a href="{{ route('panel.index', 'Comisiones') }}">Comisiones</a></li>
        </ul>
      </div>
    </div>
    <div id="mainimg">
      <h3>Sistema de Gestión Escolar en Laravel</h3>
      <h4>S</h4>
    </div>
    <div id="contentarea">
      <div id="leftbar">
        @yield('contenido')
      </div>
      <div id="rightbar">
        
        <h2>Últimas noticias</h2>
        <p>
          <a href="javascript:history.back()"> Volver </a> <br>
          <a href="{{ url()->previous() }}">Regresar</a>
         </p>
        <p><span class="orangetext">29/11/2024</span><br />
          Los estudiantes de Laboratorio de Computación 4 (2024) de la UTN FRRe desarrollaron una novedosa calculadora.
          <a href="{{ action([App\Http\Controllers\CalculationController::class, 'showForm']) }}">Click aquí</a>
          <br />
          <br />
          <span class="orangetext">10/08/2006</span><br />
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Utid anisl nec leo congue fringilla. <br />
          <br />
          <span class="orangetext">28/07/2006</span><br />
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Utid anisl nec leo congue fringilla. </p>
      </div>
    </div>
    <div id="bottom">
      <div id="email"><a href="mailto:info@yourcompany.com">info@yourcompany.com</a></div>
      <div id="validtext">
        <p><a href="{{ url('/blog') }}">Blog</a> | <a href="{{ url('/contacto') }}">Contacto</a></p>
      </div>
    </div>
  </div>
</div>
 <!-- Bootstrap 5 JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
