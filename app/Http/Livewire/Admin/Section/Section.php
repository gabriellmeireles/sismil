<?php

namespace App\Http\Livewire\Admin\Section;

use App\Models\Section as ModelsSection;
use Livewire\Component;
use Livewire\WithPagination;

class Section extends Component
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
            $section = new ModelsSection();
            $section->full_name = $this->full_name;
            $section->short_name = $this->short_name;
            $section->status = 1;
            $section->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddSectionModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($section)
    {
        $this->section_id = $section['id'];
        $this->full_name = $section['full_name'];
        $this->short_name = $section['short_name'];
        $this->status = $section['status'];

        $this->dispatchBrowserEvent('showEditSectionModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $section = ModelsSection::find($this->section_id);
            $section->full_name = $this->full_name;
            $section->short_name = $this->short_name;
            $section->status = $this->status;
            $section->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditSectionModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditSectionModal');
       }
    }

    public function delete($section)
    {
        $this->section_id = $section['id'];
        $this->full_name = $section['full_name'];

        $this->dispatchBrowserEvent('showDeleteSectionModal');
    }

    public function destroy()
    {
        try {
            $section = ModelsSection::find($this->section_id);
            $section->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteSectionModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteSectionModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.section.section',[
            'sections' => ModelsSection::where($this->search_input, 'like', '%'.$this->search.'%')
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
