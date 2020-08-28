<?php

namespace tl\simulacion\mx\Client;

use \tl\simulacion\mx\Client\Configuration;
use \tl\simulacion\mx\Client\ApiException;
use \tl\simulacion\mx\Client\ObjectSerializer;

use \tl\simulacion\mx\Client\Model\Busqueda;
use \tl\simulacion\mx\Client\Model\PersonaConsulta;
use \tl\simulacion\mx\Client\Model\DomicilioConsulta;
use \tl\simulacion\mx\Client\Model\CatalogoSexoPersona;

class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->x_api_key = "your_api_key";
        $this->basic_auth_username = "your-basic-auth-username";
        $this->basic_auth_password = "your-basic-auth-password";
        $this->url_API = "the_url";

        $handler = \GuzzleHttp\HandlerStack::create();
        $config = new Configuration();
        $config->setHost($this->url_API);
        $config->setUsername($this->basic_auth_username);
        $config->setPassword($this->basic_auth_password );

        $client = new \GuzzleHttp\Client(['handler' => $handler]);
        $this->apiInstance = new \tl\simulacion\mx\Client\Api\ConsultaApi($client, $config);
    } 
    
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
}
