<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\CombatArm;
use App\Models\Admin;
use App\Models\RankDegree;
use App\Models\Section;
use App\Models\User;
use App\Models\userType;
use Livewire\Component;

class Profile extends Component
{

    public $admins, $rankDegrees, $combatArms, $sections, $userTypes;
    public $name, $email, $cpf, $status, $user_type, $war_name, $rank_degree, $combat_arm, $section;

    protected $rules = [
        'name' => 'required|string',
        'war_name' => 'required|string',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);  
    }

    public function mount()
    {
        
        $this->rankDegrees = RankDegree::get();
        $this->combatArms = CombatArm::get();
        $this->sections = Section::get();
        $this->userTypes = userType::get();
        $this->admins = Admin::find(auth('web')->id());

        $this->name = $this->admins->user->name;
        $this->email = $this->admins->user->email;
        $this->cpf = $this->admins->user->cpf;
        $this->status = $this->admins->user->status;
        $this->user_type = $this->admins->user->user_type_id;
        $this->war_name = $this->admins->war_name;
        $this->rank_degree = $this->admins->rank_degree_id;
        $this->combat_arm = $this->admins->combat_arm_id;
        $this->section = $this->admins->section_id;

    }

    public function updateProfile(){
        User::where('id', auth('web')->id())->update([
            'name' => $this->name,
            'status' => $this->status,
            'user_type_id' => $this->user_type,
        ]);
        Admin::where('user_id', auth('web')->id())->update([
            'war_name' =>$this->war_name,
            'rank_degree_id' =>$this->rank_degree,
            'combat_arm_id' =>$this->combat_arm,
            'section_id' =>$this->section,
        ]);

        $this->emit('updateProfileHeader');
        $this->emit('updateNavbar');

        $this->showEventMessage('Os dados foram atualizado com sucesso.','success');
    }

    public function showEventMessage($message, $type)
    {
        return $this->dispatchBrowserEvent('showEventMessage',[
            'message' => $message,
            'type' => $type,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.profile.profile');
    }
}
