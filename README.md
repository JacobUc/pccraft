## Proyecto desarrollado en Administración de Proyectos 2

Este proyecto fue desarrollado como parte de la materia **Administración de Proyectos 2** en el semestre **Agosto - Diciembre 2024** por el siguiente equipo:


- [**Andrés Mena Salazar**](https://github.com/sajeme)
- [**Raymundo Mora Hernández**](https://github.com/Jhonix05)
- [**Esteban Pacheco Serralta**](https://github.com/Este538)
- [**Alexis Rosaldo Pacheco**](https://github.com/Aler011)
- [**Jacob Uc Cob**](https://github.com/JacobUc)


<div align="center">
  <img src="https://github.com/JacobUc/pccraft/blob/master/public/img/logo-sf.png" alt="captura" />
</div>

**Versión 1.0**

# **Introducción**

El propósito del manual es guiar a la persona que vaya a monitorear el
sistema sobre la instalación, configuración y uso de la aplicación.

El sistema PC-Craft Store es una plataforma de comercio electrónico
diseñada para la venta de componentes de computadora, además que permite
el poder personalizar una computadora propia eligiendo componentes
compatibles.

# **Requisitos del Sistema**

- Hardware: Procesador de al menos 2.0 GHz, 8 GB RAM, 20 GB de espacio
  en disco.

- Software: PHP 8.x, Laravel 10, Node.js 16+, Composer, XAMPP compatible
  con PHP 8.x.

- Acceso a Internet.

# **Instalación**

## **Requisitos previos**

- PHP instalado y configurado.

- Composer configurado en el sistema.

- Node.js y npm instalados.

- Tener instalado XAMPP

## **Pasos detallados**

Paso 1: Clonar el repositorio del proyecto

Ejecutar: git clone \< **https://github.com/JacobUc/pccraft.git**
\>

Paso 2: Instalar dependencias

Navegar a la carpeta del proyecto: **cd pccraft**

Ejecutar: **composer install**

Paso 3: Configurar el entorno

Crear el archivo con nombre **.env** duplicando (ctrl + c)
.env.example.

Configurar las credenciales de la base de datos, esto es a consideración
del administrador, el sistema en su archivo de configuración no trae
contraseña.

Paso 4: Migrar la base de datos y cargar datos iniciales

Ejecutar: **php artisan migrate \--seed**

Paso 5: Crear un enlace simbólico para almacenamiento

Ejecutar: **php artisan storage:link**

Paso 6: Instalar dependencias de frontend

Ejecutar: **npm install**

Paso 7: Levantar el servidor de desarrollo

Ejecutar: **php artisan serve**

Levantar el entorno frontend con: **npm run dev**

Paso 8: Comprobar servidores.

Verificar los enlaces del backend:

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image003.png" alt="captura" />

Verificar los enlaces del frontend:

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image005.png" alt="captura" />

# **Configuración inicial**

## **Configuración del entorno**

Antes de proceder con el uso de la aplicación, verifica que el entorno
esté correctamente configurado.

Paso 1. Configuración de base de datos en XAMPP

- Iniciar el panel de control de XAMPP.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image007.png" alt="captura" />

- Asegúrar que los servicios de Apache y MySQL estén corriendo.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image009.png" alt="captura" />

- Acceder a phpMyAdmin desde el navegador escribiendo:
  **http://localhost/phpmyadmin**.

  Paso 2. Configurar las credenciales en el archivo .env

<!-- -->

- Abre el archivo .env ubicado en la raíz del proyecto.

- Configura las credenciales de la base de datos:

  **DB_CONNECTION=mysql**  
  **DB_HOST=127.0.0.1**  
  **DB_PORT=3306**  
  **DB_DATABASE=mi_base_datos**  
  **DB_USERNAME=root**  
  **DB_PASSWORD=**

  Paso 3. Creación de usuario administrador

<!-- -->

- La instalación inicial de XAMPP incluye un usuario por defecto, pero
  puedes crear uno nuevo directamente desde SQL.

  Paso 4. Opcional: Crear un nuevo usuario administrador

- En phpMyAdmin, selecciona la base de datos usada para el proyecto.

- Haz clic en la pestaña SQL y ejecuta la siguiente consulta:

  **INSERT INTO users (name, email, password, is_admin) VALUES
  (\'Admin\', \'admin@ejemplo.com\', MD5(\'contraseña), 1);**

<!-- -->

- Esto creará un usuario administrador con:

I.  Nombre: Admin

II. Correo electrónico: admin@ejemplo.com

III. Contraseña: contraseña

- Verificar el usuario creado. Navega a la tabla users en phpMyAdmin y
  confirma que el nuevo registro aparece.

# **Uso del sistema**

## **Navegación principal**

El sistema cuenta con un diseño intuitivo que permite a los usuarios
(tanto clientes como administradores) acceder fácilmente a las funciones
principales.

### **Acceso al sistema**

1.  **Usuario Administrador**:

    a.  URL: <http://localhost:8000/admin> o desde el menú principal
        seleccionando **Panel Administrador**.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image011.png" alt="captura" />

b.  Ingresar el correo(**admin@gmail.com**) y
        contraseña(**password**) del administrador.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image013.png" alt="captura" />

2.  **Usuario General**:

    a.  URL: <http://localhost:8000>.

    b.  Desde el menú principal, selecciona **Iniciar Sesión** o
        **Registrar Cuenta** para usuarios nuevos, las opciones son
        desplegadas al pulsar el ícono de la persona.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image016.png" alt="captura" />

### **Gestión de inventario**

El módulo de inventario es exclusivo para administradores y permite
gestionar los productos disponibles en el sistema.

1.  **Acceso al módulo de inventario**:

    a.  Desde el **Panel Administrador**, selecciona **Productos** en el
        menú lateral.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image017.png" alt="captura" />

2.  **Funciones clave**:

    a.  **Agregar producto**: Haz clic en

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image018.png" alt="captura" /> , completa los campos requeridos (nombre, descripción, precio, cantidad) y guarda los cambios.

  b.  **Editar producto**: Selecciona un producto de la lista de productos y haz clic en
  
<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image020.png" alt="captura" />
  
  para actualizar información. Una vez confirmada la nueva información, pulsar
  
<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image022.png" alt="captura" />.


  c.  **Eliminar producto**: Selecciona un producto has clic en
    

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image024.png" alt="captura" />

y vete hacia abajo del
        formulario para dar clic en


<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image026.png" alt="captura" />



  d.  **Cancelar operación:** En caso de no querer hacer ningún
        cambio, se puede cancelar la función seleccionando el botón



<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image027.png" alt="captura" />




<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image029.png" alt="captura" />



### **Seguimiento de compras**

Este módulo está disponible para administradores y usuarios generales.

1.  **Acceso al historial de compras**:

    a.  **Administrador**: En el panel, selecciona **Pedidos**.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image030.png" alt="captura" />

b.  **Usuario General**: Desde el menú superior pulsa

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image032.png" alt="captura" />

, selecciona **Ver Compras**.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image033.png" alt="captura" />

2.  **Funciones disponibles**:

    a.  Visualizar el estado del pedido (Pedido, Enviado, Entregado,
        Cancelado).

<!-- -->

I.  En el caso del administrador.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image035.png" alt="captura" />

II. En el caso del cliente, pulsa el ícono de persona y selecciona

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image037.png" alt="captura" />

para irse a **Ver Compras**, en la
    parte derecha verá los estados de sus compras.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image038.png" alt="captura" />

a.  Detalles de la compra (productos, cantidad, precio).

<!-- -->

I.  En el caso del administrador.

II. En el caso del cliente, hace clic en **Ver detalles** y verá la
    información del pedido en caso de querer volver, pues pulsa

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image040.png" alt="captura" />

el botón que se encuentra al final
    para regresas a **Mis Compras**.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image043.png" alt="captura" />

a.  Para administradores: Modificar estado de un pedido desde el
        botón **Actualizar Estado**. Para ello, se selecciona **Más
        detalles** del pedido de su interés. Y en **Detalles de la
        orden** en **estado** se selecciona el estado de interés. En
        caso de que haya sido enviado, se selecciona **enviado,** en
        caso de que haya sido enviado y se haya notificado que llegó se
        coloca **entregado** y si no lo quiso el cliente pues se escoge
        **cancelado.**

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image044.png" alt="captura" />

### **Panel de soporte**

El panel de soporte permite a los usuarios enviar consultas o reportar
problemas.

1.  **Acceso**:

    a.  Disponible desde el menú superior seleccionando **Soporte**.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image045.png" alt="captura" />

2.  **Cómo enviar un reporte**:

    a.  Completa los campos requeridos: Asunto, Descripción, y adjunta
        archivos (opcional).

    b.  Haz clic en **Enviar**.

    c.  Recibirás una confirmación de que el reporte fue enviado.

### **Personalización de computadoras**

Una de las funcionalidades más destacadas del sistema es la
personalización de computadoras.

1.  **Acceso al configurador de computadoras**:

    a.  Desde el menú principal, selecciona **Configurar PC**.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image046.png" alt="captura" />

2.  **Pasos para personalizar una computadora**:

    a.  **Seleccionar componentes**: Elige cada componente en orden
        (procesador, tarjeta madre, RAM, almacenamiento, etc.).

     i.  El sistema validará la compatibilidad entre los componentes.

    b.  **Revisar configuración**: Una vez seleccionados todos los
        componentes, revisa el resumen, la lista de componentes apilados
        en la derecha.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image049.png" alt="captura" />

c.  **Finalizar compra**: Haz clic en **Añadir al carrito**

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image050.png" alt="captura" />

y luego en **Proceder al pago**

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image052.png" alt="captura" />

, se llenan los campos que se
        solicitan y se da

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image054.png" alt="captura" />

.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image056.png" alt="captura" />

3.  **Visualización del producto final**:

    a.  Una vista previa mostrará cómo lucirá la computadora
        configurada.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image058.png" alt="captura" />

4.  **Confirmación de compra**:

    a.  Recibirás un correo con los detalles de tu pedido y el número de
        seguimiento.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image061.png" alt="captura" />

### 

### **Compra productos**

Se tiene la opción tanto de comprar productos no ensamblados como
ensamblados, en este punto nos enfocamos en el proceso de la compra de
los productos sin ensamble.

1.  **Seleccionar producto**.

<!-- -->

a.  Dar clic en **Productos**. Esto dirigirá a una vista diferente a la
    de **Configurar PC.**

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image063.png" alt="captura" />

b.  Dentro se tienen listados los distintos productos para escoger. En
    el panel izquierdo se presentan unos filtros para buscar productos.
    Dentro de los filtros, en el **Ordenar por:**

<!-- -->

I.  Ordenar de menor precio a mayor.

II. Ordenar de mayor precio a menor.

III. Agregados más reciente.

IV. Agregados menos reciente.

    Con el caso de **Precio** indica el rango de precio que busca, el
    mínimo:


<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image064.png" alt="captura" />


Junto al precio máximo:


<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image065.png" alt="captura" />


<!-- -->

c.  En **Categorías** se despliega una serie de opciones en las que se
    puede escoger alguna de estas para que el buscador, pueda regresar
    los productos propios de la opción seleccionada. Por ejemplo, si se
    escoge

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image067.png" alt="captura" />

regresa solamente los procesadores.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image069.png" alt="captura" />

d. Se cuenta con otra forma de buscar productos, en la barra de
    búsqueda de arriba, se puede colocar el nombre del producto, la
    marca del producto o la categoría. En este caso, se buscó la marca
    "Intel".

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image071.png" alt="captura" />

2. **Agregar carrito.** Para escoger un producto de su interés, se
    da clic en el botón

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image073.png" alt="captura" />

que aparece justo debajo del producto
    que le interese.

3. **Pagar carrito.** Al agregar el producto al carrito, el sistema
    lo redirige a una nueva ventana, esta ventana es la del carrito,
    puede acceder de la misma forma si da clic


<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image074.png" alt="captura" />

en el menú de arriba.

<!-- -->

a.  Entre las opciones está en **Vaciar carrito**

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image076.png" alt="captura" />

para no tener ningún producto en el
    carrito.

b.  Se puede escoger

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image077.png" alt="captura" />

debajo del producto seleccionado que
    le interese quitar del carrito.

c.  Puede agregar o quitar productos del mismo tipo si así lo desea

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image078.png" alt="captura" />

donde puede llevarse dos o más
    productos, sujeto a cantidad en stock.

d.  En caso de que esté conforme con su carrito de compras, puede **Ir a
    pagar**

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image080.png" alt="captura" />

e.  Rellena los campos y le da la opción en

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image081.png" alt="captura" />

para proceder con la compra.

f.  Se confirma la compra y se procede en esperar la compra.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image083.png" alt="captura" />

### **Cerrar sesión.**

1. cerrar sesión administrador.

a.  Se selecciona en el panel izquierdo en **Configuración de cuenta**
    la opción de **Cerrar sesión**. También puede cerrar sesión en la
    parte superior derecha seleccionando

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image085.png" alt="captura" />

que le dará un botón para dar clic,
    ese botón cerrará la sesión.

2. Cerrar sesión cliente.

<!-- -->

a.  Se da clic al ícono de perfil en la parte superior de la derecha, y
    da clic en **salir.** O bien, en perfil, selecciona **Cerrar
    sesión.**

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image086.png" alt="captura" />

# **Solución de problemas comunes**

1.  Error: Dependencias no se instalan: Verificar versión de Composer y
    PHP.

    En el archivo composer.json que está en la carpeta raíz. Verifique
    que son estas versiones las que están y si no, reemplácelas:


```json
"require": {
  "php": "^8.1",
  "darryldecode/cart": "*",
  "guzzlehttp/guzzle": "^7.2",
  "jeroennoten/laravel-adminlte": "^3.13",
  "laravel/framework": "^10.0",
  "laravel/sanctum": "^3.2",
  "laravel/tinker": "^2.8",
  "stripe/stripe-php": "^16.2",
  "symfony/mailer": "^6.4"
}
```


Para guardar los cambios, manténgase en consola y ejecute este comando:
**composer update**

2.  Error al ejecutar npm run dev: Reinstalar dependencias frontend.
    Eliminar el node instalado y reinstalar una versión compatible. Para
    asegurarse que el node es compatible con el proyecto, ejecute este
    comando: **node -v**

    Problemas de conexión con la base de datos: Revisar configuración en
    .env. O asegúrate que la base de datos esté prendida.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image087.png" alt="captura" />

3.  Error: El cartController no existe: Pese a venir incluido en el
    proyecto bajado en el repositorio, lo cierto es que hay ocasiones en
    las que no se instala de forma automática y se tiene que instalar de
    forma manual. Dentro de la carpeta del proyecto **pccraft** va
    a instalar la dependencia:

    **composer require \"darryldecode/cart\"**

    En algunos casos, puede que no requiera utilizar las comillas "",
    así que las puede quitar.

4.  Error: No se encuentra la dependencia Stripe. Pasa lo mismo que con
    la librería del carrito, no siempre se incluirá, por lo tanto. Se
    debe instalar manualmente. Dentro de la carpeta del proyecto pccraft
    va a instalar la dependencia:

    **composer require "stripe/stripe-php"**

    En algunos casos, puede no necesitar las comillas, así que las puede
    quitar.

    []{#_Toc353543890 .anchor}**Contacto de soporte**

<!-- -->

1.  No puede ejecutar el comando php artisan serve.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image088.png" alt="captura" />

En ocasiones, se olvida colocar el **cd pccraft,** se agrega y
    se vuelve a ejecutar.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image089.png" alt="captura" />

2.  No se ve la pantalla.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image091.png" alt="captura" />

Es común olvidar que se tiene que
    encender el frontend, por lo tanto, simplemente se ejecuta **npm run
    dev** en un cmd.

<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image093.png" alt="captura" />



<img src="https://github.com/JacobUc/pccraft/blob/fotos/Manual%20de%20usuario.files/image095.png" alt="captura" />

