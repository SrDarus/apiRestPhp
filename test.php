<?php 
	Class Test
    {
        private $Id;
        private $Nombre;
        
        public function __GET($k){
            return $this->$k;
        }
        public function __SET($k, $v){
            return $this->$k = $v; 
        }
    } 


    $objPro[] = new Test();
    $objPro[1]->__SET('id', 1);
    $objPro->__SET('id', 2);


    echo $objPro->__GET('id');
    echo $objPro[1]->__GET('id');
 ?>