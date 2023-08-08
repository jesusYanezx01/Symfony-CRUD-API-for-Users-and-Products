
GOPENUX - API REST

El link del API es http://localhost/gopenuxApiRestful/public/index.php


EndPoinst que implemente

/usuario/verUsuarios - Metodo GET

    No requiere ningun parametro y su respuesta es una lista de los usuarios registrados


/usuario/crearusuario - Metodo POST

    Recibe un json con el siguiente formato: 
        {
            "nombreUsuario": "",
            "nombre": "",
            "email": "",
            "contraseña": "",
            "direccion": "",
            "telefono": "",
            "autorizacion": false //Tipo booleano para el check de autorizacion
        }
    
    El metodo debe retornar 204 si se crea correctamente


/producto/verProductos - Metodo GET

    No requiere ningun parametro y su respuesta es una lista de los productos registrados


/producto/buscar - Metodo GET

    Recibe un json con el siguiente formato: 
        {
            "nombre": ""
        }

        Su respuesta será la lista de todos los productos cuyo nombre contenga ese valor


/compra/registro - Metodo POST

Recibe un json con el siguiente formato:
        {
            "usuarioId": ,
            "direccionEnvio": "",
            "totalPedido": "", 
            "producto": 
        }

        Su respuesta sera factura creada y el numero de id


Realice las respectivas migraciones de la base de datos y solo por cualquier novedad 
anexe el .sql de la base con la que trabaje


    

