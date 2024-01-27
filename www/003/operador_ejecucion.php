<?php
$listado_archivos = `ls -al`; // Listado de todos los archivos del directorio actual

echo "<pre>$listado_archivos</pre>"; // Se imprime en pantalla
