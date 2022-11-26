<?php

namespace App\Http\Livewire\Admin\Admin;

use App\Models\CombatArm;
use App\Models\Admin;
use App\Models\RankDegree;
use App\Models\Section;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;
use Nette\Utils\Random;

class AdminUser extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'users.name';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $name, $cpf, $email, $war_name, $rank_degree, $combat_arm, $section, $user_type, $password, $repeat_password, $admin_id, $user_id, $status = 1;

    protected $listeners = [
        'resetForm'
    ];

    public function resetForm()
    {
        $this->name = $this->email = $this->war_name = $this->cpf = $this->rank_degree = $this->combat_arm = $this->section = $this->user_type = $this->password = $this->repeat_password = null;
        $this->resetErrorBag();
    }

    protected $rules = [
        'name' => 'required|string',
        'cpf' => 'required|string|min:11|max:11|unique:users,cpf',
        'email' => 'required|email|unique:users,email',
        'war_name' => 'required|string',
        'rank_degree' => 'required',
        'combat_arm' => 'required',
        'section' => 'required',
        'user_type' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function create()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $this->name;
            $user->cpf = $this->cpf;
            $user->email = $this->email;
            $user->password = Hash::make(Random::generate(6));
            $user->user_type_id = $this->user_type;
            $user->save();
            
            $userId = User::firstWhere('cpf', $this->cpf);

            $admin = new Admin();
            $admin->war_name = $this->war_name;
            $admin->rank_degree_id = $this->rank_degree;
            $admin->combat_arm_id = $this->combat_arm;
            $admin->section_id = $this->section;
            $admin->user_id = $userId->id;
            $admin->save();

            DB::commit();
                $this->showEventMessage('Cadastrado com sucesso. Os dados de acesso foram enviados por email!', 'success');
                $this->dispatchBrowserEvent('hideAddAdminModal');           
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível cadastrar o Usuário. <br><strong>Exceção no Banco de Dados</strong>!', 'error');
        }
        if (empty($eQuery)) {
            try {
                $emailData = array(
                    'name' => $this->name,
                    'cpf' => $this->cpf,
                    'war_name' => $this->war_name,
                    'rank_degree' => $this->rank_degree,
                    'password' => $user->password,
                    'user_type' => $this->user_type,
                    'url' => route('admin.profile')
                    );
                    $admin_email = $this->email;
                    $admin_name = $this->name;
    
                    Mail::send('layouts.emails.new-admin-email-template', $emailData, function($message) use ($admin_email, $admin_name){
                        $message->from('no-reply@11rm.eb.mil.br','SISMIL');
                        $message->to($admin_email, $admin_name)->subject('Criação de Conta');
                    });
            } catch (\Exception $eMail) {
                $this->showEventMessage('Problema ao enviar os dados de acesso para o email do Usuário. <br><strong>Exceção: Servidor de Email!<strong>', 'error');
                $this->dispatchBrowserEvent('hideAddAdminModal');
            }
        }
        
    }

    public function edit($admin)
    {  /* PREENCHE OS DADOS NO FORMULÁRIO */
        $this->admin_id = $admin['id'];
        $this->war_name = $admin['war_name'];
        $this->rank_degree = $admin['rank_degree_id'];
        $this->combat_arm = $admin['combat_arm_id'];
        $this->section = $admin['section_id'];
        $this->user_id = $admin['user_id'];
        $this->name = $admin['user']['name'];
        $this->cpf = $admin['user']['cpf'];
        $this->email = $admin['user']['email'];
        $this->status = $admin['user']['status'];
        $this->user_type = $admin['user']['user_type_id'];
        
        
        $this->dispatchBrowserEvent('showEditAdminModal');
    }

    public function update()
    {
        $this->validate([
            'cpf' => 'required|string|min:11|max:11|unique:users,cpf,'.$this->user_id,
            'email' => 'required|email|unique:users,email,'.$this->user_id,
        ]);

        DB::beginTransaction();
        try {
            $user = User::find($this->user_id);
            $user->name = $this->name;
            $user->cpf = $this->cpf;
            $user->email = $this->email;
            $user->status = $this->status;
            $user->user_type_id = $this->user_type;
            $user->save();
            
            $admin = Admin::find($this->admin_id);
            $admin->war_name = $this->war_name;
            $admin->rank_degree_id = $this->rank_degree;
            $admin->combat_arm_id = $this->combat_arm;
            $admin->section_id = $this->section;
            $admin->save();

            DB::commit();
                $this->showEventMessage('Cadastrado alterado com sucesso!', 'success');
                $this->dispatchBrowserEvent('hideEditAdminModal');           
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção no Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditAdminModal');
        }
    }

    public function delete($admin)
    {
        $this->user_id = $admin['user']['id'];
        $this->admin_id = $admin['id'];
        $this->rank_degree = $admin['rank_degree']['short_name'];
        $this->war_name = $admin['war_name'];
        $this->dispatchBrowserEvent('showDeleteAdminModal');
    }


    public function destroy()
    {
        try {
            $user = User::find($this->user_id);
            $user->update([
                'status' => 0,
            ]);
           

        $this->showEventMessage('O usuário foi desativado com sucesso!' ,'success');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
        }
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
        $userTypes = UserType::select('id', 'name')->get();
       
        return view('livewire.admin.admin.admin-user', [
            'admins' => Admin::select('admins.id', 
                                            'admins.war_name',
                                            'admins.rank_degree_id',
                                            'admins.combat_arm_id',
                                            'admins.section_id',
                                            'admins.user_id',
                                            'users.name',
                                            'users.cpf',
                                            'users.email',
                                            'users.status', 
                                            'users.user_type_id', 
                                            'user_types.name as user_type_name',
                                            )
                                    ->join('users', 'users.id', '=', 'admins.user_id')
                                    ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
                                    /* ->join('sections', 'sections.id', '=', 'admins.section_id')
                                    ->join('combat_arms', 'combat_arms.id', '=', 'admins.combat_arm_id')
                                    ->join('rank_degrees', 'rank_degrees.id', '=', 'admins.rank_degree_id') */
                                    ->where($this->search_input, 'like', '%'.$this->search.'%')
                                    ->orderBy('admins.id')
                                    ->paginate($this->per_page),
            'userTypes' => $userTypes,
            'rankDegrees' => RankDegree::select('id', 'short_name')->get(),
            'combatArms' => CombatArm::select('id', 'short_name')->get(),
            'allSections' => Section::select('id', 'short_name')->get(),
        ]);
    }
}
