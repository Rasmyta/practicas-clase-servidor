<!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Indicencias</title>

    <!-- FONTS and ICONS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
    rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/sleek-dashboard/dist/assets/css/sleek.min.css" rel="stylesheet"/>

    <!-- SLEEK STYLE FILE -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.min.css" />

  </head>

  <body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
  <div class="wrapper">
    <!-- left-sidebar -->
     <aside class="left-sidebar bg-sidebar">
       <div id="sidebar" class="sidebar sidebar-with-footer">
         <!-- Logo -->
         <div class="app-brand">
           <a href="javascript:void(0)" title="Sleek Dashboard">
             <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33"><g fill="none" fill-rule="evenodd"><path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z"/><path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z"/></g></svg>
             <span class="brand-name text-truncate">Incidencias</span>
           </a>
         </div>
         
         <!-- begin sidebar scrollbar -->
         <div class="sidebar-scrollbar">
           <!-- sidebar menu -->
           <ul class="nav sidebar-inner" id="sidebar-menu">
             
              <li class="has-sub">
                 <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app1" aria-expanded="false" aria-controls="app">
                   <i class="mdi mdi-pencil-box-multiple"></i>
                   <span class="nav-text">CLIENTES</span> <b class="caret"></b>
                 </a>

                 <ul class="collapse" id="app1" data-parent="#sidebar-menu">
                   <div class="sub-menu">
                     <li>
                       <a class="sidenav-item-link" href="javascript:void(0)"><span class="nav-text">Nuevo</span></a>
                     </li>
                   </div>
                 </ul>
               </li>
             
               <li class="has-sub">
                 <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app2" aria-expanded="false" aria-controls="app">
                   <i class="mdi mdi-pencil-box-multiple"></i>
                   <span class="nav-text">INCIDENCIAS</span> <b class="caret"></b>
                 </a>

                 <ul class="collapse" id="app2 " data-parent="#sidebar-menu">
                   <div class="sub-menu">
                     <li>
                       <a class="sidenav-item-link" href="javascript:void(0)"><span class="nav-text">Nueva</span></a>
                     </li>
                   </div>
                 </ul>
               </li>

              
                </ul>
              </div>
            </div>
          </aside>

          <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
              <nav class="navbar navbar-static-top navbar-expand-lg pr-0">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">
                <div class="input-group">
                  <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                  </button>
                  
                  <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc." autofocus autocomplete="off"/>
                 </div>
                </div>

                
              </nav>
            </header>


      <div class="content-wrapper">
        <div class="content">

					
                    
        </div>
      </div>
    </div>
  </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/simplebar.min.js"></script>
    <script src="../assets/js/sleek.bundle.js"></script>

  </body>
</html>