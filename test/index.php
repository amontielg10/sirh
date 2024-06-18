
<?php

 /**
 * ##### CONEXION ENTRE UNA APLICACION PHP Y UN SERVIDOR ALFRESCO
 *        @Fecha: 15 Octubre 2009
 *        @Autor: Javier Garcia Marques
 *              @Email: javier.garcia.ext@sadiel.es
 *        @Version: 1.0
 *
 * DESCRIPCION
 * ================================================================================================================
 *      Clase para conectar una aplicacion PHP con un servidor ALFRESCO
 *
 * REQUISITOS
 * ================================================================================================================
 *      Libreria PHP-API para Alfresco (Logger, Service, WebService)
 *      PHP 5.0
 *      Apache server
 *      MySQL 5.1.37
 *      Alfresco Enterprise 3.0
 *              Include path -> include_path= ".C:\php\PEAR;C:\Alfresco" 
 *
 * PATRONES
 * ================================================================================================================
 *      Uso del patron de diseño Singleton para garantizar la correcta y unica instanciacion de la clase
 *
 * PROPIEDADES DE CLASE
 * ================================================================================================================
 *      $istancia         privada y estatica              Guarda la istancia de la clase
 *      $repositoryUrl        publica               URL para conectar con Alfresco
 *      $userName            publica               Nombre de usuario
 *      $password         publica               Contraseña de usuario
 *      $ticket         publica               Ticket ID de conexion
 *      $session         publica               ID de inicio de sesion Alfresco
 *      $repository      publica               Referencia al repositorio de Alfresco
 *      $spacesStore      publica               Referencia al Space store de Alfresco
 *
 * METODOS
 * ================================================================================================================
 *      getIstance()                        Metodo para obtener la instancia de la clase 
 *                                    para evitar la duplicacion de objetos (Singleton)
 *                                       
 *      __construct()                        Constructor. La unica manera de instanciar es con getIstance()
 *
 *      __clone()                           Metodo para evitar que se puedan clonar istancias.
 *
 *      connectRepository($url, $user, $pass)                      Metodo para conectar, autentificar y referenciar una sesion 
 *                                       alfresco y el space store
 *                                        Parametros:
 *                                           $url  -> Direccion URL donde tengo alojado Alfresco
 *                                           $user -> Nombre de usuario de inicio de sesion
 *                                           $pass -> Contraseña de usuario de inicio de sesion      
 *      Getters:
 *         getRepositoryUrl()      getPassword()               getSession()           getSpacesStore()
 *         getUserName()         getTicket()         getRepository()           *getInstace()*
 *
 * ================================================================================================================
 * #### USO
 * ================================================================================================================
 *      require_once "Alfresco/Service/Conexion.php";
 *      $conexion = Conexion::getIstance();
 *      $conexion->connectRepository("http://localhost:8080/alfresco/api", "admin", "admin");
 **/

// Alfresco PHP - API
require_once "Alfresco/Service/Repository.php";
require_once "Alfresco/Service/Session.php";
require_once "Alfresco/Service/SpacesStore.php";

Class Conexion {

   private static $instancia;
   public $repositoryUrl;
   public $userName;
   public $password;
   public $ticket;
   public $session;
   public $repository;
   public $spacesStore;
   
   // Singleton
   public static function getIstance() {
      if (!isset(self::$instancia)) {
         $obj = __CLASS__;
         self::$instancia = new $obj;
      }
      return self::$instancia;
   }
   
   private function __construct() {}
   
   private function __clone() {
      throw new Exception ("Este objeto no se puede clonar");
   }
   
   // Conexion, autenticacion e inicio de sesion
   public function connectRepository($url, $user, $pass) {
      $this->repositoryUrl = $url;
      $this->userName = $user;
      $this->password = $pass;
      $this->repository = new Repository($this->repositoryUrl);
      $this->ticket = $this->repository->authenticate($this->userName, $this->password);
      $this->session = $this->repository->createSession($this->ticket);   
      $this->spacesStore = new SpacesStore($this->session);      
   }
   
   // GETTERS
   public function getRepositoryUrl() {
      return $this->repositoryUrl;
   }
   
   public function getUserName() {
      return $this->userName;
   }
   
   public function getPassword() {
      return $this->password;
   }
   
   public function getTicket() {
      return $this->ticket;
   }
   
   public function getSession() {
      return $this->session;
   }
   
   public function getRepository() {
      return $this->repository;
   }
   
   public function getSpacesStore() {
      return $this->spacesStore;
   }
}
?>
‍