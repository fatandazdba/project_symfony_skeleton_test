# Requerimientos
Se deben crear 2 servicios utilizando Symfony 4:

uno que permita buscar en base una cadena de búsqueda. El campo para filtrar será food y los datos a mostrar devolver serían: id, nombre y descripción. uno que retorne los datos necesarios para pintar una vista de detalle que indique los anteriores, pero además incluya: imagen, slogan (tagline) y cuando fue fabricada (first_brewed). Para obtener los datos de las recetas se utilizará la API de PunkApi.

Los servicios creados deben ser RESTful y tener como formato de salida JSON. Elige los nombres para los endpoints, propiedades, etc que te parezcan más adecuados y fáciles de tratar para las aplicaciones.

La solución del ejercicio debe ser enviada en un repositorio de GitHub, GitLab o Bitbucket con el historial completo de git.

## Respuesta del servicio by id
![themes-architecture-diagram](https://raw.githubusercontent.com/fatandazdba/project_symfony_skeleton_test/b56f869a3ac5473a4aad182d4f2b35405a3fd312/web/detailByFoodAndId.PNG)

## Respuesta del servicio by food
![themes-architecture-diagram](https://raw.githubusercontent.com/fatandazdba/project_symfony_skeleton_test/b56f869a3ac5473a4aad182d4f2b35405a3fd312/web/food_carne.PNG)
