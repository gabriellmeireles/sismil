<?php

namespace App\Http\Livewire\Admin\State;

use App\Models\State as ModelsState;
use Livewire\Component;
use Livewire\WithPagination;

class State extends Component
{
    public $full_name, $short_name, $status;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'short_name';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'full_name' => 'required|string',
        'short_name' => 'required|string',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    protected $listeners = [
        'resetForm'
    ];

    public function resetForm()
    {
        $this->full_name = $this->short_name = $this->status = null;
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        try {
            $state = new ModelsState();
            $state->full_name = $this->full_name;
            $state->short_name = $this->short_name;
            $state->status = 1;
            $state->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddStateModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($state)
    {
        $this->state_id = $state['id'];
        $this->full_name = $state['full_name'];
        $this->short_name = $state['short_name'];
        $this->status = $state['status'];

        $this->dispatchBrowserEvent('showEditStateModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $state = ModelsState::find($this->state_id);
            $state->full_name = $this->full_name;
            $state->short_name = $this->short_name;
            $state->status = $this->status;
            $state->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditStateModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditStateModal');
       }
    }

    public function delete($state)
    {
        $this->state_id = $state['id'];
        $this->full_name = $state['full_name'];

        $this->dispatchBrowserEvent('showDeleteStateModal');
    }

    public function destroy()
    {
        try {
            $state = ModelsState::find($this->state_id);
            $state->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteStateModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteStateModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.state.state',[
            'states' => ModelsState::where($this->search_input, 'like', '%'.$this->search.'%')
            ->orderBy('id')
            ->paginate($this->per_page),
        ]);
    }

    public function showEventMessage($message, $type)
    {
        return $this->dispatchBrowserEvent('showEventMessage',[
            'message' => $message,
            'type' => $type,
        ]);
    }
}
