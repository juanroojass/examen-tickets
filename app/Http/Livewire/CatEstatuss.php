<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CatEstatus;

class CatEstatuss extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $estatus;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cat-estatuss.view', [
            'catEstatuses' => CatEstatus::latest()
						->orWhere('estatus', 'LIKE', $keyWord)
                        ->orWhere('id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->estatus = null;
    }

    public function store()
    {
        $this->validate([
		'estatus' => 'required',
        ]);

        CatEstatus::create([ 
			'estatus' => $this-> estatus
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'CatEstatus Successfully created.');
    }

    public function edit($id)
    {
        $record = CatEstatus::findOrFail($id);

        $this->selected_id = $id; 
		$this->estatus = $record-> estatus;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'estatus' => 'required',
        ]);

        if ($this->selected_id) {
			$record = CatEstatus::find($this->selected_id);
            $record->update([ 
			'estatus' => $this-> estatus
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'CatEstatus Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = CatEstatus::where('id', $id);
            $record->delete();
        }
    }

    public function otrafuncion(){
        return session()->flash('message', 'respuesta de solicitud.');
    }
}
