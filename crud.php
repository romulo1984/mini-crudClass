<?php
    class crud{
        private $dsn = "mysql:host=localhost;dbname=testes";
        private $user = "root";
        private $senha = "";
        private $pdo;
        
        function __construct() {
        }
        
        private function conectar(){
            $this->pdo = new PDO($this->dsn, $this->user, $this->senha);
            return $this->pdo;
        }
    
        public function inserir(array $campos, $tabela){
            $coluna = implode(", ",  array_keys($campos));
            $valor = "'".implode("', '", array_values($campos))."'";
            
            $query = "INSERT INTO {$tabela} ({$coluna}) VALUES ({$valor})";
            
            $this->conectar()->exec($query);
        }
        
        public function consultar(array $select, $tabela, $where = null, $order = null, $limit = null){
            $where = ($where == null) ? null : "WHERE {$where}";
            if($select != "*"){
                $select = implode(", ", $select);
            } else {
                $select = "*";
            };
            
            $order = ($order == null) ? null : "ORDER BY {$order}";
            $limit = ($limit == null) ? null : "LIMIT {$limit}";
            
            $query = "SELECT {$select} FROM {$tabela} {$where} {$order} {$limit}";
            $result = $this->conectar()->query($query);
            //echo "<strong>Query do método consulta():</strong><br /> <code style='color:green'>".$query."</code><br /><br />";
            return $result;
        }
        
        public function deletar($tabela, $where){
            $query = "DELETE FROM {$tabela} WHERE {$where}";
            
            $this->conectar()->exec($query);
            //echo "<strong>Query do método deletar():</strong><br /> <code style='color:green'>".$query."</code><br /><br />";
        }
        
        public function atualizar($tabela, array $set, $where){
            foreach($set as $chave => $valor){
                $campos[] = "{$chave}='{$valor}'";
            };
            $campos = implode(", ", $campos);
            $query = "UPDATE {$tabela} SET {$campos} WHERE {$where}";
            
            $result = $this->conectar()->exec($query);
            
            //if($result == 1){
            //    echo "Registro Atualizado com êxito";
            //};
            
            //echo "<strong>Query do método atualizar():</strong><br /> <code style='color:green'>".$query."</code><br /><br />";
        }
}