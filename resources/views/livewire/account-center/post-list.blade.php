<div>
    <div class="w-100 bgi-no-repeat bgi-size-cover bgi-position-center h-250px m-0 rounded-3 position-relative" style="background: url('{{ $user->info->social->header_img_link }}')">
        <div class="position-absolute top-100 start-50 translate-middle bg-opacity-75 bg-light w-100">
            <div class="d-flex flex-row justify-content-between align-items-center m-5">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-100px symbol-circle me-5">
                        <img alt="Logo" src="{{ $user->info->social->profil_img_link }}" />
                    </div>
                    <div class="d-flex flex-column">
                        <div class="d-flex fs-2 text-inverse-light fw-semibold align-items-center">
                            <span class="me-2">{{ $user->info->name }}</span>
                            <span class="badge badge-light-success">Niveau 1</span>
                        </div>
                        <div class="d-flex align-items-center fs-5 text-muted">
                            <i class="fa-solid fa-comment fs-5 me-3"></i>
                            <span>
                            @if($user->info->social->signature != null)
                                    {{ $user->info->social->signature }}
                                @else
                                    Ceci est une signature par défaut.
                                @endif
                        </span>
                        </div>
                        <div class="d-flex flex-wrap align-items-center my-3">
                            <a href="#" class="btn btn-flush text-hover-primary fs-3">
                                <span class="fw-bold text-inverse-light">{{ count($user->posts) }}</span>
                                <span class="text-muted fs-4">Posts</span>
                            </a>
                            <div class="text-gray-600 mx-5 fs-3">/</div>
                            <a href="#" class="btn btn-flush text-hover-primary fs-3">
                                <span class="fw-bold text-inverse-light">{{ count($user->info->following) }}</span>
                                <span class="text-muted fs-4">Abonnements</span>
                            </a>
                            <div class="text-gray-600 mx-5 fs-3">/</div>
                            <a href="#" class="btn btn-flush text-black text-hover-primary fs-3">
                                <span class="fw-bold text-inverse-light">{{ count($user->info->followers) }}</span>
                                <span class="text-muted fs-4">Abonnés</span>
                            </a>
                            <div class="text-gray-600 mx-5 fs-3">/</div>
                            <a href="#" class="btn btn-flush text-black text-hover-primary fs-3">
                                <span class="fw-bold text-inverse-light">{{ $user->info->social->nb_likes }}</span>
                                <span class="text-muted fs-4">J'aime</span>
                            </a>
                        </div>
                    </div>
                </div>
                @if($user->info->uuid == Session::get('user_uuid')[0])
                    <div class="d-flex flex-row gap-5">
                        <!--<a href="" class="btn btn-sm btn-circle btn-icon btn-outline btn-outline-dark">
                            <i class="fa-solid fa-cog"></i>
                        </a>-->
                        <a href="{{ route('accountCenter.edit') }}" wire:navigate class="btn btn-sm rounded-full btn-light-info">
                            <span class="fs-3"><i class="fa-solid fa-user-edit fs-4 me-2"></i> Modifier</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="separator my-20"></div>
    <div class="row">
        <div class="col-sm-12 col-lg-9">
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="card-title">
                        <ul class="nav nav-tabs d-flex flex-wrap align-items-center p-5 gap-5">
                            <li class="nav-item">
                                <a href="#"  data-bs-toggle="tab" class="nav-link active">
                                    <span class="fw-bolder text-inverse-light fs-2 pb-5">Posts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"  data-bs-toggle="tab" class="nav-link">
                                    <span class="fw-bolder text-inverse-light fs-2 pb-5">Commentaires</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"  data-bs-toggle="tab" class="nav-link">
                                    <span class="fw-bolder text-inverse-light fs-2 pb-5">Favoris</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"  data-bs-toggle="tab" class="nav-link">
                                    <span class="fw-bolder text-inverse-light fs-2 pb-5">Sujets</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="contentTab">
                        <div class="tab-pane fade show active" wire:poll.5s id="posts" role="tabpanel">
                            @if(count($user->posts) > 0)
                                @foreach($user->posts as $post)
                                    @livewire('post.post-card', ['post' => $post, "user" => $user], key($post->id))
                                @endforeach
                            @else
                                <x-base.is-null text="Vous n'avez poster aucun poste actuellement"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
