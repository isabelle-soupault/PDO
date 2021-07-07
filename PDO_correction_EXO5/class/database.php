<?php 
class SingletonPDO {
    const USER ='root';
    const PASSWORD = '';
    const DB_NAME = 'colyseum';
    private static $_instance;
    private $PDOInstance = null;


    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new SingletonPDO();
        }
        return self::$_instance;
    }

    public function prepare($sql){
        return $this->PDOInstance->prepare($sql);
    }
    
    public function execute($sql){
        return $this->PDOInstance->execute($sql);
    }

    private function __construct()
    {
        try {
            $this->PDOInstance = new PDO('mysql:host=localhost;dbname='. self::DB_NAME, self::USER, self::PASSWORD);
    
        } catch(PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }
    
}
