<?php

namespace App\Http\Livewire\Admin\City;

use App\Models\City as ModelsCity;
use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;

class City extends Component
{
    public $full_name, $status, $state;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'cities.full_name';

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
        'state' => 'required'
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
        $this->full_name = $this->status = null;
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        try {
            $city = new ModelsCity();
            $city->full_name = $this->full_name;
            $city->status = 1;
            $city->state_id = $this->state;
            $city->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddCityModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($city)
    {
        $this->city_id = $city['id'];
        $this->full_name = $city['full_name'];
        $this->status = $city['status'];
        $this->state = $city['state_id'];

        $this->dispatchBrowserEvent('showEditCityModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $city = ModelsCity::find($this->city_id);
            $city->full_name = $this->full_name;
            $city->status = $this->status;
            $city->state_id = $this->state;
            $city->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditCityModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditCityModal');
       }
    }

    public function delete($city)
    {
        $this->city_id = $city['id'];
        $this->full_name = $city['full_name'];

        $this->dispatchBrowserEvent('showDeleteCityModal');
    }

    public function destroy()
    {
        try {
            $city = ModelsCity::find($this->city_id);
            $city->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteCityModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteCityModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.city.city',[
            'cities' => ModelsCity::select('cities.id','cities.full_name','cities.status','cities.created_at','cities.updated_at','cities.state_id','states.short_name')
                                    ->where($this->search_input, 'like', '%'.$this->search.'%')
                                    ->join('states','states.id', 'cities.state_id')
                                    ->orderBy('cities.id')
                                    ->paginate($this->per_page),
            'states' => State::where('status', 1)->get(),    
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
