<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{

    public $current_password, $new_password, $confirm_new_password;

    protected $rules = [
        'current_password' =>[
            'required', function($attribute, $value, $fail){
                if(!Hash::check($value, User::find(auth('web')->id())->password)){
                    return $fail(__('A senha atual está incorreta'));
                }
            },
        ],
        'new_password' => 'required|min:6|max:25',
        'confirm_new_password' => 'same:new_password'
    ];

    public function updated($fields){
        $this->validateOnly($fields);  
    }

    public function updatePassword(){
        $this->validate();

        $query = User::find(auth('web')->id())->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($query) {
            $this->showEventMessage('Sua senha foi <strong>atualizada</strong> com sucesso.', 'success');
            $this->current_password = $this->new_password = $this->confirm_new_password = null;
        } else {
            $this->showEventMessage('Não foi possível atualizar sua senha.', 'error');
        }
    }

    public function showEventMessage($message, $type)
    {
        return $this->dispatchBrowserEvent('showEventMessage', [
            'message' => $message,
            'type' => $type,
        ]);
    }
    
    public function render()
    {
        return view('livewire.admin.profile.change-password');
    }
}
