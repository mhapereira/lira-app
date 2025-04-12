@extends('layout.app')

@section('title', 'Transparência')

@section('content')
<div class="container mt-5 pt-5">
    {!! $instituto->sobre !!}
</div>

<div class="container mb-5 pb-5">
    <div class="row">
        <div class="accordion" id="accordionExample">
            
            <!-- Atas -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <strong>Atas</strong>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach($instituto->ata as $ata)
                            <a href="{{ asset('storage/' . $ata['arquivo']) }}" target="_blank">
                                {{ $ata['name'] }}
                            </a><br>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Estatuto -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <strong>Estatuto</strong>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach($instituto->instituto as $documento)
                            <a href="{{ asset('storage/' . $documento['arquivo']) }}" target="_blank">
                                {{ $documento['name'] }}
                            </a><br>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Documentos institucionais -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <strong>Documentos institucionais</strong>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach($instituto->docs as $doc)
                            <a href="{{ asset('storage/' . $doc['arquivo']) }}" target="_blank">
                                {{ $doc['name'] }}
                            </a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
