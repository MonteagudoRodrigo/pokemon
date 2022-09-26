create Database Pokedex;
use Pokedex;

create TABLE credenciales
(email VARCHAR(80), 
password VARCHAR(50)); 


UPDATE pokemon p
SET p.identificador=14,
p.nombre= "Algo",
p.descripcion= "algo",
p.tipo = (select id
				from tipo_pokemon
                where descripcion = "Veneno")
WHERE p.id = 2;


CREATE TABLE tipo_pokemon
(id INT PRIMARY KEY AUTO_INCREMENT,
descripcion VARCHAR (40) NOT NULL,
imagenTipo VARCHAR (40) NOT NULL);

CREATE TABLE pokemon 
(id INT PRIMARY KEY AUTO_INCREMENT,
identificador INT UNIQUE NOT NULL,
imagen VARCHAR(60) NOT NULL,
nombre VARCHAR(40) NOT NULL,
tipo INT NOT NULL,
descripcion VARCHAR(400) NOT NULL,
FOREIGN KEY (tipo) REFERENCES tipo_pokemon(id));     



-- DATOS USUARIO
INSERT INTO credenciales (email , PASSWORD) 
values("admin@mail.com" , "202cb962ac59075b964b07152d234b70");


-- INSERT TIPOS DE POKEMON
INSERT INTO tipo_pokemon (descripcion, imagenTipo)
VALUES ('Veneno', 'img/veneno.png'), ('Agua', 'img/agua.png'), ('Planta', 'img/planta.png'), ('Electrico', 'img/electrico.png');


SELECT * FROM pokemon;


-- INSERT POKEMONES DE PRUEBA
INSERT INTO POKEMON(identificador , imagen, nombre, tipo, descripcion) 
values(001 , 'img/bulbasaur.png', 'Bulbasaur', 1, 
'Bulbasaur es un Pokémon de tipo planta/veneno introducido 
en la primera generación. Es uno de los Pokémon iniciales
 que pueden elegir los entrenadores que empiezan su aventura 
 en la región Kanto, junto a Squirtle y Charmander (excepto en Pokémon Amarillo).
 Destaca por ser el primer Pokémon de la Pokédex Nacional y la en la Pokédex de Kanto.');

INSERT INTO POKEMON(identificador , imagen, nombre, tipo, descripcion) 
values(003 , 'img/yvysaur.png', 'Yvysaur', 1, 
'Ivysaur es un Pokémon de tipo planta/veneno introducido en la primera generación.
 Es la evolución de Bulbasaur, uno de los Pokémon iniciales de Kanto.');

INSERT INTO POKEMON(identificador , imagen, nombre, tipo, descripcion)
values(002 , 'img/yvysaur.png', 'charizar', 4,
       'Ivysaur es un Pokémon de tipo planta/veneno introducido en la primera generación.
        Es la evolución de Bulbasaur, uno de los Pokémon iniciales de Kanto.');


 
SELECT * FROM pokemon join tipo_pokemon on pokemon.tipo = tipo_pokemon.id WHERE nombre = 'squirtle';





