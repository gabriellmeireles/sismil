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
        </div>
    </div>

</div>
