<?php 

class Database {
    // tulis data dari database kita menggunakan private
    private $host =  DB_HOST;
    private $user =  DB_USER;
    private $pass =  DB_PASS;
    private $db_name =  DB_NAME;

    // variable untuk connectioinnya
    private $dbh;
    private $stmt;

    // membuat constructornya yang berisi connection ke database
    public function __construct()
    {
    
            // data source name
            $dsn = "mysql:host={$this->host}; dbname={$this->db_name}"; 
    
            // parameter yang berisi dari databasenya
            $option = [
                // ATTR untuk membuat conection databsenya terjaga terus
                PDO::ATTR_PERSISTENT =>true,
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
            ];
            //di cek menggunakan blok try cacth
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
                // lalu di tangkai epsepseionnya
            } catch(PDOException $e) {
                die($e->getMessage());
            }
    }

    // sebuah method untuk mengquery generate untuk apapun baik itu select insert dll
    public function query($query)
    {   
        // diisi handler preapre lalu query
        $this->stmt = $this->dbh->prepare($query);
    }

    // setelah itu buat binding datantya siapa tau di querynyaada wherenya typenya default null untuk yang menentukan aplikasinya
    public function bind($param, $value, $type = null )
    {
        // melakukan pengecekan
        if(is_null($type)){
            switch(true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                    case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                // selain dari itu
                default :
                // kita asumsikan valuenya adalah string
                $type = PDO::PARAM_STR;
            }
        }
        // kita ban valuenya kita bind int maka menggunakan integer dst
        $this->stmt->bindValue($param, $value, $type);
    }


    // tinggal eksekusi
    public function execute()
    {
        $this->stmt->execute();
    }

    // pilih akan banyak datanya atau hanya satu saja
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // ketika pilihan cuman satu
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    // untuk menghitung beraapa baris di dalam inputan data insert
    public function rowCount()
    {
        // row cont yang ini punya kita yang di atas punya pdo
        return $this->stmt->rowCount();
    }
}

?>