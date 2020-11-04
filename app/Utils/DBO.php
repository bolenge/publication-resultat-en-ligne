<?php
    namespace App\Utils;

    trait DBO {

        protected $db;

        public function __construct()
        {
            try {
                $this->db = new \PDO('mysql:host='.\env('DB_HOST', 'localhost').';dbname='.env('DB_DATABASE',
                'jonathan'), \env('DB_USERNAME', 'root'), \env('DB_PASSWORD', ''));
            } catch (\PDOExcpetion $th) {
                // throw $th;
                echo "Erreur de la connexion à la base de données";
                die();
            }
        }

    }