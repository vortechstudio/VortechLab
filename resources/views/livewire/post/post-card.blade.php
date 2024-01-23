<div class="p-5">
    <div class="d-flex flex-row justify-content-between align-items-center mb-10">
        <div class="d-flex flex-row align-items-center">
            <div class="symbol symbol-50px symbol-circle me-3">
                <img alt="Logo" src="{{ $user->info->social->profil_img_link }}" />
            </div>
            <div class="d-flex flex-column">
                <span class="text-inverse-light fw-bold fs-4">{{ $user->info->name }}</span>
                <div class="d-flex flex-row align-items-center fs-6 text-gray-600">
                    @if(\Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->startOfDay() >= now()->startOfDay())
                        {{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->shortAbsoluteDiffForHumans() }}
                    @else
                        {{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->isoFormat('LL') }}
                    @endif
                    @if($post->cercles)
                        <span class="bullet bullet-dot mx-2"></span>
                        {{ $post->cercles[0]->name }}
                    @endif
                </div>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-flush dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis-h fs-2"></i>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-header">
                    <span class="fw-bold text-inverse-light fs-4">Plus</span>
                </li>
                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-edit me-2"></i> Modifier le post</a></li>
                <li><a class="dropdown-item" wire:click="deletePost({{ $post->id }})" @delete="$refresh" wire:confirm="Etes-vous sur de vouloir supprimer ce post ?"><i class="fa-solid fa-trash me-2"></i> Supprimer le post</a></li>
            </ul>
        </div>
    </div>
    @if($post->type == 'text')
        <span class="fs-2 text-gray-800 fw-bold mb-2">{{ $post->title }}</span>
        <a href="/storage/posts/text/{{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->year }}/{{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->month }}/{{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->day }}/{{ $post->id }}.png" class="d-block overlay" data-fslightbox="lightbox-classic">
            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                 style="background-image:url('/storage/posts/text/{{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->year }}/{{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->month }}/{{ \Carbon\Carbon::createFromTimestamp(strtotime($post->updated_at))->day }}/{{ $post->id }}.png')">
            </div>
            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                <i class="bi bi-eye-fill text-white fs-3x"></i>
            </div>
        </a>
        <img src="" alt="" class="w-100 h-auto">
        {!! $post->content !!}
        <div class="my-4 d-flex flex-column">
            <div>
                @foreach($post->tags as $tag)
                    <span class="badge badge-light-primary">{{ $tag->tag }}</span>
                @endforeach
            </div>
        </div>
    @endif
    @if($post->type == 'image')
        <span class="fs-2 text-gray-800 fw-bold mb-2">{{ $post->title }}</span>
        <div class="row">
            @foreach($this->info['images'] as $image)
                <div class="col-sm-12 col-lg-4">
                    <img src="{{ $image->temporaryUrl() }}" alt="no" class="w-100 h-auto" />
                </div>
            @endforeach
        </div>
        {!! $this->info['content'] !!}
        <div class="my-4 d-flex flex-column">
            <div>
                @foreach($this->info['tags'] as $tag)
                    <span class="badge badge-light-primary">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
    @endif
    <div class="d-flex flex-row justify-content-between align-items-center my-3">
        <div class="text-gray-600 align-items-center">
            <i class="fa-solid fa-eye fs-3"></i>
            <span>{{ $post->views }}</span>
        </div>
        <div class="d-flex text-gray-600 align-items-center">
            @if(!$isLiked)
                <a wire:click="like" wire:target="like" href="" class="text-gray-600 me-2">
                    <i class="fa-solid fa-heart fs-3 text-gray-600" wire:loading.class="d-none" wire:target="like"></i>
                    <div class="spinner-grow d-none" role="status" wire:loading.class.remove="d-none" wire:target="like">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span wire:ignore.self>{{ number_format($countLikes) }}</span>
                </a>
            @else
                <a wire:click="like" href="" wire:target="like" class="text-info me-2">
                    <i class="fa-solid fa-heart fs-3 text-danger" wire:target="like" wire:loading.class="d-none"></i>
                    <div class="spinner-grow d-none" role="status" wire:target="like" wire:loading.class.remove="d-none">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span wire:ignore.self>{{ number_format($countLikes) }}</span>
                </a>
            @endif
            <a href="" class="me-2">
                <i class="fa-solid fa-comment fs-3"></i>
                <span>{{ number_format(count($post->comments)) }}</span>
            </a>
        </div>
    </div>
    <div class="separator border border-gray-300 my-5 shadow-lg"></div>
</div>
