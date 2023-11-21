# Plugin Word Randomizer

---

## Descripción

El plugin Word Randomizer es un simple plugin de WordPress creado por Rubén Núñez. Reemplaza algunas palabras en tu contenido con otras palabras aleatorias para agregar variedad y diversión.

## Características

- Reemplaza nombres de lugares específicos con nombres de autos geniales.
- Agrega un toque de aleatoriedad a tu contenido.

## Instalación

1. Descarga el archivo ZIP del plugin desde [WordPress Plugin Repository](http://wordpress.org/plugins/words/).
2. Sube el archivo ZIP a tu sitio de WordPress y activa el plugin.

## Uso

El plugin funciona reemplazando nombres de lugares predefinidos con nombres de autos en tu contenido. Así es como funciona:

1. El plugin define dos matrices: una con nombres geniales de lugares y otra con nombres de autos geniales.
2. El orden de los nombres de lugares se aleatoriza utilizando la función `shuffle()`.
3. La función `renym_wordpress_typo_fix` utiliza `str_replace` para reemplazar nombres de lugares con nombres de autos en el contenido.
4. La función `add_filter` conecta esta función de reemplazo al filtro `the_content`, asegurando que se ejecute al mostrar el contenido.

¡Siéntete libre de personalizar las matrices con tus propias palabras para crear una experiencia única de aleatorización de palabras!

## Detalles del Plugin

- **Nombre del Plugin:** Word Randomizer
- **URI del Plugin:** [http://wordpress.org/plugins/words/](http://wordpress.org/plugins/words/)
- **Autor:** Rubén Núñez
- **URI del Autor:** [https://ma.tt/](https://ma.tt/)
- **Versión:** 3.3

