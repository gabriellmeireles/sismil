<div>
    <div>
        @forelse ( $contests as $contest )
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="ribbon bg-red">{{ date("d/m/y", strtotime($contest->contestSetting->initial_inscription)) }} a {{ date("d/m/y", strtotime($contest->contestSetting->final_inscription)) }}</div>
            <div class="card-header">
                <h3 class="card-title strong">{{ $contest->contestCategory->short_name }}</h3>
            </div>
            <div class="card-body">
                <div><h3>{{ $contest->contestCategory->full_name }}</h3></div>
                <div class="mt-2"><strong><i>Áreas Abertas:</i></strong></div>
                @foreach ($contest->contestAreas as $contestArea)
                    <div><i>{{"-"}} {{$contestArea->name}}</i></div>
                @endforeach
                Teste form por contest_notice {{$contest->contestNoticeForms}}
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <a wire:click.prevent='visualize({{ $contest->id }})' class="btn btn-success">Visualizar</a>
                    <a wire:click.prevent="register({{ $contest->id }})" class="btn btn-success ms-auto">Inscreva-se</a>
                </div>
              </div>
            </div>
        </div>
        @empty
            Não há editais cadastrados.
        @endforelse

    </div>
</div>
