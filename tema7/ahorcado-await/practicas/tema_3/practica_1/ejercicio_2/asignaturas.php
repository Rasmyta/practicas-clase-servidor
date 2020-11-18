<?php
if (!isset($_SESSION['asignaturas'])) {
  $_SESSION['asignaturas']['DWS'] = 0;
  $_SESSION['asignaturas']['DWC'] = 0;
  $_SESSION['asignaturas']['LC'] = 0;
  $_SESSION['asignaturas']['EIE'] = 0;
  $_SESSION['asignaturas']['DAW'] = 0;
  $_SESSION['asignaturas']['DI'] = 0;
}