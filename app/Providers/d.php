<?php 
class A{
	public function move(){
		echo 'a';
	}
}
class B extends A {
	public function move(){
		echo 'b';
	}
}
$abc = new B;
$abc->move();
?>