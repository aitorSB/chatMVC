*******************
    chat.html
*******************

Funciones: 

-------------------------
registradorMensajes()
-------------------------
    Recoge los datos del formulario del chat
    y los envía al servidor php para registrar los datos enviados, usuario,
    mensaje, hora.

-------------------------
cargadorMensajes()
-------------------------
    Recoge los datos de la base de datos del chat 
    muestra el usuario, el mensaje y la hora de envío.

-------------------------
$.ajaxSetup({"cache": false});
-------------------------
    Solicita a las páginas a no ser cacheadas por el navegador

-------------------------
setInterval("cargadorMensajes()", 250);
-------------------------
    Llama a @cargadorMensajes cada 250 milisegundos
