<div class="d-flex flex-column justify-content-center align-items-center mx-auto">
    <div class="d-flex justify-content-start align-items-center mb-10">
        <a href="javascript:history.back()" class="btn btn-flush">
            <i class="fa-solid fa-arrow-circle-left fs-2 me-2"></i>
            Retour
        </a>
    </div>
    @if($this->info['type'] == 'text')
        <div class="card card-flush mb-10 w-lg-550px w-sm-100 shadow-lg">
            <div class="card-header">
                <div class="d-flex align-items-center pt-9">
                    <div class="symbol symbol-50px me-5">
                        <img src="https://placehold.co/50" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <a href="" class="text-gray-800 text-hover-primary fs-4 fw-bold">Administrateur</a>
                        <div class="text-gray-500 fw-semibold d-block">Aujourd'hui</div>
                    </div>
                </div>
                <div class="card-toolbar">
                    @if($this->info['visibility'] == 'public')
                        <span class="badge badge-light-primary" data-bs-toggle="tooltip" title="Ce poste est visible par tous">Public</span>
                    @else
                        <span class="badge badge-light-warning" data-bs-toggle="tooltip" title="Ce poste est visible uniquement par vos amis et ceux qui vous suivent">Amis et followers</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <span class="fs-2 text-gray-800 fw-bold mb-2">{{ $this->info['title'] }}</span>
                <img src="{{ $this->info['couverture'] }}" alt="" class="w-100 h-auto">
                {!! $this->info['content'] !!}
                <div class="my-4 d-flex flex-column">
                    <span class="fs-5 text-muted">{{ $cercle_name }}</span>
                    <div>
                        @foreach($this->info['tags'] as $tag)
                            <span class="badge badge-light-primary">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
