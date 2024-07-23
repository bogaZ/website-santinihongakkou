<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tinymceEditor extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $value = "";
    public $name = "";
    public function __construct($id, $name, $value = null)
    {
        $this->id = $id;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.tinymce-editor', ['id' => $this->id, 'value' => $this->value, 'name' => $this->name]);
    }
}