<?php
    $a = 2; echo "a = 2 : $a\n";

    // $b = $a; echo "b = a : $b\n";    //variable assigned
    $b = &$a; echo "b = &a : $b\n";     //variable referenced
    
    $a += 1; echo "a += 1 : $a\n"; echo "b = b : $b\n";

    echo "\nargc:\n";
    print_r($argc); 
    
    echo "\n\nargv:\n"; 
    print_r($argv);


    function global_fn1 () {
        global $a, $b; 
        echo "\n\nglobal_fn1: ".($a+$b)."\n";       
    }

    global_fn1();

    function global_fn2 () {
        echo "\n\nglobal_fn2: ".($GLOBALS['a'] + $GLOBALS['b'])."\n";       
    }

    global_fn2();

    echo "Static Variable:\n";
    function static_var(){
        static $aa = 0; echo "$aa\n\n"; $aa++;        
    }

    foreach([1,2,3] as $i){
        static_var();
    }

    
    class example{
        // public $a = 'unchanged';
        public static $a = 'unchanged';
        public function change_a(){
            // $this->a = 'changed';
            // $this::$a = 'changed';
            // When referring static veriable, inside class. It's better to use `self` instead `$this`.
            self::$a = 'changed';
            // by using `self` you just eleminate double use of ($) sign :)
        }        
    }
    
    $b = new example;
    $c = new example;

    $b->change_a();
    
    // print "b static: {$b->a}\n";
    // print "c static: {$c->a}\n";
    print "c static: {$c::$a}\n";
    print "b static: {$b::$a}\n\n";


    $string1 = 'a';
    $string2 = 'b';
    $ab = "abc";
    var_dump(${$string1.$string2});
    echo "\n";

    //Variables variable 
    $var1 = 'val_1';
    $var2 = 'val_2';

    foreach(['var1','var2'] as $var){
        echo $$var . "\n";
    }



?>
