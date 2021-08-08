<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DecisionMaker extends Component
{
    public $options = [""];
    public $chosen = "";
    
    public function removeInput($key) {
        unset($this->options[$key]);
        $this->options = array_values($this->options);

        if(empty($this->options)) {
            $this->addInput();
        }
    }
    
    public function addInput() {
        array_push($this->options, "");
    }

    public function submit() {
        $this->options = array_filter($this->options, 'strlen');
        if(!empty($this->options)) {
            $this->chosen = $this->options[array_rand($this->options, 1)];
        }
    }

    public function resetOptions() {
        $this->options = [""];
        $this->chosen = "";
    }

    public function render()
    {
        return view('livewire.decision-maker');
    }
}
