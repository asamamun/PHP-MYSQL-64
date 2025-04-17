<h1>if a class is final then it cannot be inherited</h1>
<?php
final class A{
    public function __construct(){
        echo "this is a final class";
    }
}
/* class B extends A{
    public function __construct(){
        echo "this is a final class";
    }
} */
// $bb = new B();

class BABA{
    final public function PUTROBODHU(){
        echo "amar bondhur meye hobe putrobodhu";
    }
}
class Chele extends BABA{
/*     public function PUTROBODHU(){
        echo "OPU PUTROBODHU";  ;
    } */
}
$dd = new Chele();
$dd->PUTROBODHU();