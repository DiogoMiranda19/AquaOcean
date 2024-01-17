<?php
class Conexao {
    public $conexao;
 
    function __construct() {
        if (!isset($this->conexao)) {
            try {
                    $this->conexao = new PDO('mysql:host=sql303.infinityfree.com;dbname=if0_35423996_db_aquaocean', 'if0_35423996', '6Xxi9qa9ZkUE');
                    
                
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
 
    function fecharConexao(){
        if (isset($this->conexao)) {
            $this->conexao = null;
        }
    }
}
?>