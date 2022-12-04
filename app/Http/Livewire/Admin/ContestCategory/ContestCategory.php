<?php

namespace App\Http\Livewire\Admin\ContestCategory;

use App\Models\ContestCategory as ModelsContestCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ContestCategory extends Component
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
        /* 'year' => "required|digits:4|integer|min:(date('Y')+1)", */
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
            $contestCategory = new ModelsContestCategory();
            $contestCategory->full_name = $this->full_name;
            $contestCategory->short_name = $this->short_name;
            $contestCategory->status = 1;
            $contestCategory->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddContestCategoryModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($contestCategory)
    {
        $this->contestCategory_id = $contestCategory['id'];
        $this->full_name = $contestCategory['full_name'];
        $this->short_name = $contestCategory['short_name'];
        $this->status = $contestCategory['status'];

        $this->dispatchBrowserEvent('showEditContestCategoryModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $contestCategory = ModelsContestCategory::find($this->contestCategory_id);
            $contestCategory->full_name = $this->full_name;
            $contestCategory->short_name = $this->short_name;
            $contestCategory->status = $this->status;
            $contestCategory->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditContestCategoryModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditContestCategoryModal');
       }
    }

    public function delete($contestCategory)
    {
        $this->contestCategory_id = $contestCategory['id'];
        $this->full_name = $contestCategory['full_name'];

        $this->dispatchBrowserEvent('showDeleteContestCategoryModal');
    }

    public function destroy()
    {
        try {
            $contestCategory = ModelsContestCategory::find($this->contestCategory_id);
            $contestCategory->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteContestCategoryModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteContestCategoryModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.contest-category.contest-category',[
            'contestCategories' => ModelsContestCategory::where($this->search_input, 'like', '%'.$this->search.'%')
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
