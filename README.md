# empresa-cine-cuc

  
  A continuación se hace una descripción general de algunos aspectos del App:
 
**Notas**: Ejecutar migraciones en primer lugar 

## Lista de Controladores y sus vistas asociadas

  

AdminController

	view(admin_showtimes)

	view(admin_tickets)

	view(admin_movies)

  

HomeController

	view(login)

	view(new_user)

	view(user_panel)

  

UsuariosController

	view(home)

	view(get_ticket)

  
  
  
  
  

## Estructura de la base de la datos, 
Se utilizó PosgreSQL, el nombre de la base de datos es **Cine**, la cual fue creada en blanco.
La siguiente imagen muestra el diagrama ER de las bases de datos

![BDER](/DiagramaERBD.png)

  
  ### Migraciones
Acontinuacion e encuentran las Migraciones en su orden de ejecución y entre {} lasTablas afectadas

Usuarios {Usuarios}<br>
Peliculas {Peliculas}<br>
Lugares {lugares}<br>
Funciones {funciones}<br>
Tiquetes {Tiquetes}<br>

## Uso de imagenes

Las imágenes de los póster de las películas almacenarlas en: 

	storage/app/public/posters
	
Tamaño 400x600 px.
Se utilizó un editor SVG para crear el logo






 

