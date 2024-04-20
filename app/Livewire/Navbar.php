<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Navbar extends Component
{
    #[Title('navbar')]
    public $todo ='';
    public $todos;
public $num1;
public $num2;
public $result=0;
public $message= '';
protected $listeners  = ['rescalculate'=>'calculateres'];
public function calculateres(){
    
    $this->message ="Successfully add";
}
    public function add(){
        $this->todos[]= $this->todo ;
        $this->todo ='';
      
    }
    public function plus(){
        $this->result = $this->num1+$this->num2;
        return
      $this->message ="Successfully add";

        if ($this->num1>$this->num2) {
            $this->message = "num1 is greater than num2";
        }elseif($this->num1<$this->num2){
     $this->message="num1 is less than num2";
        }else {
            $this->message= "num1 is equal to num2";
        }
    }
   
    public function mount(){
        $this->todos = [
            'rabiulhassan',
            'sarmad',
            'haider',
            'sohail'
        ] ;
        $this->todo ='';
      

    }
    public function updated($property,$value){
        $this->$property= strtoupper($value);
       
    }
    
    public $count =0;
    public function increment($by)
    {
        $this->count=$this->count+$by;
    }
    public function decrement()
    {
        $this->count--;
    }
    
    public function render()
    {
        return view('livewire.navbar');
    }
    
}
