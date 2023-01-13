<?php

namespace App\Http\Livewire\User\User;

use App\Models\Candidate;
use App\Models\CandidateAddress;
use App\Models\CandidatePhone;
use App\Models\CandidateType;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $user_id, $candidate_id, $candidate_type_id = 2;
    public $name, $birth_date, $gender, $marital_status, $dependent_number;
    public $cpf, $identity, $issuing_agency;
    public $mother_name, $father_name;
    public $naturalness, $nationality;
    public $zip_code, $address, $district, $city, $state;
    public $email;
    public $ddd, $number;

    protected $rules = [
        'candidate_type_id' => 'required',
        'name' => 'required|string',
        'birth_date' => 'required',
        'gender' => 'required',
        'marital_status' => 'required',
        'dependent_number' => 'required|min:0',
        'cpf' => 'required|size:11',
        'identity' => 'required',
        'issuing_agency' => 'required',
        'mother_name' => 'required|string',
        'father_name' => 'required|string',
        'naturalness' => 'required',
        'nationality' => 'required',
        'zip_code' => 'required',
        'address' => 'required',
        'district' => 'required',
        'city' => 'required',
        'state' => 'required|size:2',
        'email' => 'required|email',
        'ddd' => 'required|integer',
        'number' => 'required|integer',

    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function mount(){
        $this->user_id = auth()->user()->id;
        $this->name = auth()->user()->name;
        $this->cpf = auth()->user()->cpf;
        $this->email = auth()->user()->email;
        $candidate = User::find($this->user_id)->candidate()->with('candidatePhone')->with('candidateAddress')->first();
        //dd($candidate);
        if ($candidate) {
            $this->candidate_type_id = $candidate->candidate_type_id;
            $this->candidate_id = $candidate->id;
            $this->birth_date = $candidate->birth_date;
            $this->gender = $candidate->gender;
            $this->marital_status = $candidate->marital_status;
            $this->dependent_number = $candidate->dependent_number;
            $this->identity = $candidate->identity;
            $this->issuing_agency = $candidate->issuing_agency;
            $this->mother_name = $candidate->mother_name;
            $this->father_name = $candidate->father_name;
            $this->naturalness = $candidate->naturalness;
            $this->nationality = $candidate->nationality;
            $this->zip_code = $candidate->candidateAddress->zip_code;
            $this->address = $candidate->candidateAddress->address;
            $this->district = $candidate->candidateAddress->district;
            $this->city = $candidate->candidateAddress->city;
            $this->state = $candidate->candidateAddress->state;
            $this->ddd = $candidate->candidatePhone->ddd;
            $this->number = $candidate->candidatePhone->number;
        }

    }

    public function updateProfile(){
        $this->validate();
        $this->validate([
            'email' => ["unique:users,email,$this->user_id"],
            'cpf' => ["unique:users,cpf,$this->user_id"],
        ]);
        User::where('id', $this->user_id)->update([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'complete_registration' => 1,
        ]);

        $candidate = Candidate::updateOrCreate(
            ['user_id' => $this->user_id],
            [
                'candidate_type_id' => $this->candidate_type_id,
                'birth_date' => $this->birth_date,
                'gender' => $this->gender,
                'marital_status' => $this->marital_status,
                'dependent_number' => $this->dependent_number,
                'identity' => $this->identity,
                'issuing_agency' => $this->issuing_agency,
                'mother_name' => $this->mother_name,
                'father_name' => $this->father_name,
                'naturalness' => $this->naturalness,
                'nationality' => $this->nationality,
                'user_id' => $this->user_id
            ]
        );

        CandidateAddress::updateOrCreate(
            ['candidate_id' => $candidate->id ],
            [
                'zip_code' => $this->zip_code,
                'address' => $this->address,
                'district' => $this->district,
                'city' => $this->city,
                'state' => $this->state
            ]
        );

        CandidatePhone::updateOrCreate(
            ['candidate_id' => $candidate->id],
            [
                'ddd' => $this->ddd,
                'number' => $this->number,
            ]
        );

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
        return view('livewire.user.user.profile',[
            'candidateTypes' => CandidateType::where('status', 1)->get(),
        ]);
    }
}
