# trayectorias-laborales-simulacion-client-php

Api para consulta de trayectorias Laborales (Empleos, Cedulas y Listas).

## Requisitos

PHP 7.1 ó superior

### Dependencias adicionales

- Se debe contar con las siguientes dependencias de PHP:
  - ext-curl
  - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos

```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```

- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Agregar el producto a la aplicación

Al iniciar sesión seguir los siguientes pasos:

1.  Dar clic en la sección "**Mis aplicaciones**".
2.  Seleccionar la aplicación.
3.  Ir a la pestaña de "**Editar '@tuApp**' ".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/edit_applications.jpg" width="900">
    </p>
4.  Al abrirse la ventana emergente, seleccionar el producto.
5.  Dar clic en el botón "**Guardar App**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/selected_product.jpg" width="400">
    </p>

### Paso 2. Capturar los datos de la petición

Los siguientes datos a modificar se encuentran en **_test/Api/ApiTest.php_**

Es importante contar con el setUp() que se encargará de inicializar la petición. Por tanto, se debe modificar la URL (**url_API**); el usuario (**basic_auth_username**) y contraseña (**basic_auth_password**) de autenticación de acceso básica; y la API KEY (**x_api_key**), como se muestra en el siguiente fragmento de código:

```php
public function setUp()
{
    $this->x_api_key = "your_api_key";
    $this->basic_auth_username = "your-basic-auth-username";
    $this->basic_auth_password = "your-basic-auth-password";
    $this->url_API = "the_url";

    //... code
} 
```

Para la petición se deberá modificar el siguiente fragmento de código con los datos correspondientes:

```php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/ApiTest.php
*/
public function testConsultarTrayectorias()
{
    $request = new Busqueda();
    $persona = new PersonaConsulta();
    $domicilio = new DomicilioConsulta();
    $catalogoSexoPersona = new CatalogoSexoPersona();

    $persona->setPrimerNombre("Juan");
    $persona->setApellidoPaterno("Pruebauno");
    $persona->setApellidoMaterno("Pruebauno");
    $persona->setFechaNacimiento("1966-12-07");
    $persona->setSexo($catalogoSexoPersona::M);
    
    $domicilio->setDireccion("TORNO 301 EL ROSARIO");
    $domicilio->setColonia("PEDREGAL DE SANTO DOMINGO");
    $domicilio->setCp("02100");
    
    $request->setClaveEmpresaConsulta("2007310044");
    $request->setFolioConsultaEmpleador("2620100");
    $request->setProductoRequerido(4);
    $request->setPuestoSolicitado("Vendedor");
    $request->setPersona($persona);
    $request->setDomicilio($domicilio);  

    try {
        $result = $this->apiInstance->consultarTrayectorias($this->x_api_key, $request);
        print_r($result);
        
        if($this->apiInstance->getStatusCode() == 200){
            print_r($result);
        }

        $this->assertTrue($this->apiInstance->getStatusCode() == 200);
    } catch (ApiException $e) {

        if($e->getCode() !== 204){
            echo ' code. Exception when calling ApiTest->consultarTrayectorias: ', $e->getResponseBody(), PHP_EOL;
        }
    }
    

}
```

## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
