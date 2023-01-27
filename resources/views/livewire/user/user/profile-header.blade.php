<div>

    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $user->name }} </h2>
                <div class="page-subtitle">
                    <div class="row">
                        <div class="col-auto">
                            <span
                                class="text-reset">{{ isset($user->candidate->candidateType->name) ? $user->candidate->candidateType->name : ' ' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <a href="{{ route('user.contest') }}" class="btn btn-green">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Fazer Inscrição
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
