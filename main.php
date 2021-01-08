<?php
// PHP 8.0 or later

class SingleByte implements StringOperator {
    private function __construct() {}
    
    // staticが先に来なければならない
    static private $_instance = new SingleByte();
    
    static public function instance() {
        return $_instance;
    }
    
    // corresponds builtin `strpos`
    public function index_of(string $haystack, string $needle, int $offset = 0): int|false {
        return strpos($haystack, $needle, $offset);
    }
    
    public function contains(string $haystack, string $needle): bool {
        return $this->index_of($haystack, $needle) !== false;
    }
    
    public function index(string $string, int $i): string {
        return $string[$i];
    }
    
    public function to_array(string $string): array {
        return str_split($string);
    }
    
    public function split(string $string, string $delimitor, int $limit = PHP_INT_MAX): array {
        return explode($delimitor, $string, $limit);
    }
    
    public function substr(string $string, int $begin = 0, int $length): string {
        return substr($string, $begin, $length);
    }
    
    public function to_iterable(string $string): Iterable {
        return to_array($string);
    }
}

class MultiByte implements StringOperator {
    private function __construct() {}
    
    static private $_instance = new MultiByte();
    
    static public function instance() {
        return $_instance;
    }
}

interface StringOperator {
    public function index_of(string $haystack, string $needle, int $offset = 0): int|false;
    
    public function contains(string $haystack, string $needle): bool;
    
    public function index(string $string, int $i): string;
    
    public function to_array(string $string): array;
    
    public function split(string $string, string $delimitor, int $limit = PHP_INT_MAX): array;
    
    public function substr(string $string, int $begin, int $length): string;
    
    public function to_iterable(string $string): Iterable;
}
