<div class="container">
    @if (!empty($list))
        <div class="row">
            @foreach ($list as $el)
                <div class="col-lg-1">
                    <div class="card">
                        <div class="card-body">   
                            <h1>
                                <a href="/admin/deliberations/annee-accademique/{{ $idAnnee }}/promotions/{{ $el->id }}">{{ $el->intitule }}</a>
                            </h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>