<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DecisionMakerSavedLists;

class DecisionMaker extends Component
{
    public $options = [""];
    public $chosen = "";
    public $lists = [];
    public $list = "";
    public $listName = "";
    public $listUser = "";

    protected $queryString = ['list' => ['except' => '']];

    public function mount() {
        $this->getLists();
        if ($this->list) {
            $list = DecisionMakerSavedLists::where(['id' => $this->list])->first();
            if ($list) {
                $this->options = unserialize($list->list);
                $this->listName = $list->name;
                $this->listUser = $list->user_id;
            }
        }
    }

    public function getLists() {
        if(auth()->user()) {
            $this->lists = DecisionMakerSavedLists::where('user_id', auth()->user()->id)->get();
        }
    }

    public function saveList() {
        $this->options = array_filter($this->options, 'strlen');
        if (!empty($this->options)) {
            if($this->list) {
                $savedList = DecisionMakerSavedLists::where(['id' => $this->list])->first();
                if ($savedList) {
                    $savedList->name = $this->listName;
                    $savedList->list = serialize($this->options);
                    $savedList->save();
                }
            } else {
                $savedList = DecisionMakerSavedLists::create(['user_id' => auth()->user()->id, 'name' => $this->listName, 'list' => serialize($this->options)]);
            }
            $this->list = $savedList->id;
            $this->listName = $savedList->name;
            $this->listUser = $savedList->user_id;
        }
        $this->getLists();
    }

    public function deleteList($id) {
        $list = DecisionMakerSavedLists::where('id', $id)->first();
        if($list) {
            if ($this->list == $list->id) {
                $this->newList();
            }
            $list->delete();
        }
        $this->getLists();
    }

    public function newList() {
        $this->list = "";
        $this->options = [""];
        $this->listName = "";
        $this->listUser = "";
        $this->chosen = "";
    }
    
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

    public function render()
    {
        return view('livewire.decision-maker');
    }
}
