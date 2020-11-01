<div class="container">
    @if (!empty($list))
        <div class="row">
            @foreach ($list as $el)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-,o;;;;;">   
                            <h1>
                                <a href="/deliberations/{{ $el->id }}">{{ $el->libelle_annee }}</a>
                            </h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>