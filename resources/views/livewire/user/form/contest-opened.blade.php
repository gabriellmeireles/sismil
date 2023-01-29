<div>
    <div class="row">
        @forelse ( $contests as $contest )
        <div class="col-md-3 col-lg-">
            <div class="card">
                <div class="ribbon bg-red">{{ date("d/m/y", strtotime($contest->contestSetting->initial_inscription)) }} a {{ date("d/m/y", strtotime($contest->contestSetting->final_inscription)) }}</div>
            <div class="card-header">
                <h3 class="card-title strong">{{ $contest->contestCategory->short_name }}</h3>
            </div>
            <div class="card-body">
                <div class="mt-2"><strong><i>Áreas Abertas:</i></strong></div>
                @foreach ($contest->contestAreas as $contestArea)
                    <div><i>{{"-"}} {{$contestArea->name}}</i></div>
                @endforeach
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <a href="{{ "inscricao/{$contest->id}" }}" class="btn btn-success ms-auto">
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
        @empty
            Não há editais cadastrados.
        @endforelse

    </div>
</div>
