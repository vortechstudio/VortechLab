<div class="card shadow-lg">
    <div class="card-header">
        <div class="card-title">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#">Texte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#">Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#">Vidéo</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="texte" role="tabpanel">
                @foreach($texte as $text)
                    <a wire:click="editing({{ $text->id }})" wire:navigate class="card shadow-lg mb-5">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $text->img_file }}" alt="" class="img-fluid rounded-start"/>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <span class="fs-4 fw-bold mb-2">{{ $text->title }}</span>
                                        <span class="mb-5 text-muted">{{ Str::limit($text->content, 250) }}</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <div>
                                            @if(\Carbon\Carbon::createFromTimestamp(strtotime($text->updated_at))->startOfDay() >= now()->startOfDay())
                                                <span class="text-gray-400">{{ \Carbon\Carbon::createFromTimestamp(strtotime($text->updated_at))->longAbsoluteDiffForHumans() }}</span>
                                            @else
                                                <span class="text-gray-400">{{ \Carbon\Carbon::createFromTimestamp(strtotime($text->updated_at))->isoFormat('LL') }}</span>
                                            @endif
                                        </div>
                                        <button class="btn btn-link btn-icon" wire:click="deleting({{ $text->id }})" wire:target="deleting({{ $text->id }})" data-bs-toggle="tooltip" title="Supprimer">
                                            <i class="fa-solid fa-trash fs-3  text-danger" wire:loading.remove wire:target="deleting({{ $text->id }})"></i>
                                            <div class="spinner-grow text-danger d-none" role="status" wire:loading.class.remove="d-none" wire:target="deleting({{ $text->id }})">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
