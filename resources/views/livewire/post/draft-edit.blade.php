<form action="" wire:submit.prevent="save" enctype="multipart/form-data">
    <div class="card shadow-lg">
        <div class="card-header" data-kt-sticky="true" data-kt-sticky-name="form-edit-post-header"
            data-kt-sticky-offset="{default: false, xl: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '350px'}"
             data-kt-sticky-top="230px"
             data-kt-sticky-animation="false"
             data-kt-sticky-zindex="95">
            <div class="card-title">Publier</div>
            <div class="card-toolbar gap-5">
                <x-form.button />
                <a href="{{ route('posts.drafts') }}" class="btn btn-outline btn-outline-dark rounded-full">
                    <i class="fa-solid fa-arrow-circle-left fs-3 me-2"></i> Retour
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($post->type == 'text')
                <x-form.input-simple-file
                    name="couverture"
                    default-img="true"
                    :img-file="$couverture" />
            @endif
            @if($post->type == 'image')
                <div class="mb-10">
                    <label for="images" class="form-label fw-bold">Télécharger l'image</label>
                    <p class="text-muted">Vous pouvez importer jusqu'à 100 images en même temps (JPG, PNG, JPEG, GIF, WebP, largeur et hauteur recommandées d'au moins 420 pixels)</p>
                    <livewire:dropzone
                        wire:model="images"
                        :rules="['image','mimes:png,jpeg,jpg,gif,webp','max:4096']"
                        :multiple="true" />
                </div>
            @endif
            @if($post->type == 'video')
                    <x-form.input
                        name="video_link"
                        label="Lien de la vidéo"
                        is-model="true"
                        model="post"
                        placeholder="Lien de la vidéo"
                        required="true"
                        hint="Saisissez le lien de la vidéo que vous voulez publier (Uniquement Youtube)" />
            @endif
            @if($post->type != 'video')
                <x-form.input
                    name="title"
                    label="Titre"
                    placeholder="Titre de l'article"
                    required="true"
                    is-model="true"
                    model="post"
                    maxlength="200" />

                @livewire('livewire-quill', [
                    'quillId' => 'customQuillId',
                    'data' => $post->content,
                    'classes' => 'bg-white mb-10',
                    'toolbar' => [
                        [
                            [
                                'header' => [1, 2, 3, 4, 5, 6, false],
                            ],
                        ],
                        ['bold', 'italic', 'underline'],
                        [
                            [
                                'list' => 'ordered',
                            ],
                            [
                                'list' => 'bullet',
                            ],
                        ],
                        ['link'],
                        ['image'],
                        ['video'],
                    ],
                ])
            @endif


                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <div class="mb-10">
                            <label for="cercle" class="form-label fw-bold required">
                                Choississez un cercle
                                <i class="fa-solid fa-circle-info fs-6 ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Choississez une cercle ou doit apparaitre votre poste"></i>
                            </label>
                            <div wire:ignore>
                                <select id="cercle" data-pharaonic="select2" data-component-id="{{ $this->id() }}" wire:model="cercle" data-placeholder="Selectionner un cercle">
                                    <option value=""></option>
                                    @foreach($cercles as $cercle)
                                        <option value="{{ $cercle->id }}">{{ $cercle->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <label for="cercle" class="form-label fw-bold">Sujet</label>
                        <div wire:ignore>
                            <input data-pharaonic="tagify"
                                   data-component-id="{{ $this->id() }}"
                                   wire:model.defer="tags"
                                   data-suggest-list='@json($tagsList)'

                                   data-max="3"
                                   class="form-control"
                                   data-classname="tagify__inline__suggestions">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <label for="visibility" class="form-label fw-bold">
                            Visibilité du poste
                            <i class="fa-solid fa-circle-info fs-6 ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Qui peut voir ce poste"></i>
                        </label>
                        <div wire:ignore>
                            <select id="visibility" data-pharaonic="select2" data-component-id="{{ $this->id() }}" wire:model="post.visibility">
                                <option value="public">Public</option>
                                <option value="friends">Amis et followers</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <label for="publish" class="form-label fw-bold">
                            Publication
                            <i class="fa-solid fa-circle-info fs-6 ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Définir si le poste doit être publier ou rester en brouillon"></i>
                        </label>
                        <div wire:ignore>
                            <select id="publish" data-pharaonic="select2" data-component-id="{{ $this->id() }}" wire:model="post.status">
                                <option value="true">Publier</option>
                                <option value="false">Brouillon</option>
                            </select>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
