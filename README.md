# simplestate

Consiste en realizar una aplicación con el framework Laravel integrando el API de MercadoLibre.
La aplicación debe permitir loguear un usuario de MercadoLibre, con usuario y contraseña.
También debe mostrar una lista con los 10 artículos más caros de la categoría "Aires Acondicionados" (Categoría MLA1644) indicando en cada artículo la cantidad vendida de cada uno. En esta vista también es requerido mostrar debajo de la lista, la suma de los precios de los 10 artículos y la cantidad total vendida entre los 10 artículos de la lista.

La lista de artículos debe tener las siguientes columnas:
Id
Titulo
Precio
Cantidad vendida

Se debe tener en cuenta:
- No se requiere guardar los datos en una base de datos.
- La aplicación debe ser lo más sencilla posible (no agregar dependencias innecesarias)
- La aplicación debe estar funcional, debemos poder levantarla y navegarla.

Bonus points:
- levantar la app con docker
- unit testing


Te será de gran ayuda:
- Primeros pasos con el API de ML. Creación de la aplicación, autenticación, etc: https://developers.mercadolibre.com.ar/es_ar/primeros-pasos
- Guia API de articulos (items): https://developers.mercadolibre.com.ar/es_ar/items-y-busquedas
- ML tiene un sdk para PHP que podes usar si preferís: https://developers.mercadolibre.com.ar/es_ar/herramientas


# Installation
php artisan key:generate
