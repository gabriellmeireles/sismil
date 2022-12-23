<?php

namespace App\Http\Livewire\Admin\CandidateType;

use App\Models\CandidateType as ModelsCandidateType;
use Livewire\Component;
use Livewire\WithPagination;
use Psy\Readline\Hoa\EventListener;

class CandidateType extends Component
{
    public $candidate_type_id, $name, $status;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'name';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'name' => 'required|string',
        'status' => 'required',
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
        $this->name = $this->status = null;
        $this->resetErrorBag();
    }

    public function create(){
        $this->validate();
        try {
            $candidateType = new ModelsCandidateType();
            $candidateType->name = $this->name;
            $candidateType->status = $this->status;
            $candidateType->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddCandidateTypeModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($candidateType){
       $this->candidate_type_id = $candidateType['id'];
       $this->name = $candidateType['name'];
       $this->status = $candidateType['status'];

       $this->dispatchBrowserEvent('showEditCandidateTypeModal');
    }

    public function update(){
        $this->validate();
        try {
            $candidateType = ModelsCandidateType::find($this->candidate_type_id);
            $candidateType->name = $this->name;
            $candidateType->status = $this->status;
            $candidateType->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditCandidateTypeModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditCandidateTypeModal');
        }
    }

    public function deactivate($candidateType){
        $this->candidate_type_id = $candidateType['id'];
        $this->name = $candidateType['name'];

        $this->dispatchBrowserEvent('showDeactivateCandidateTypeModal');
    }

    public function inactivate(){
        try {
            $candidateType = ModelsCandidateType::find($this->candidate_type_id);
            $candidateType->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeactivateCandidateTypeModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeactivateCandidateTypeModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.candidate-type.candidate-type',[
            'candidateTypes' => ModelsCandidateType::where($this->search_input, 'like', '%'.$this->search.'%')
                                                ->orderBy('id')
                                                ->paginate($this->per_page)
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
