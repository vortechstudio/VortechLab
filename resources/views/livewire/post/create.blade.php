<div>
    @if($type == 'text')
        <div class="card shadow-lg">
            <div class="card-header">
                <div class="card-title">Publier</div>
            </div>
            <form action="" wire:submit.prevent="create" enctype="multipart/form-data">
                <div class="card-body">
                    <span class="fw-bold">Ajouter une couverture</span>
                    <x-form.input-simple-file
                        name="couverture" />

                    <x-form.input
                        name="title"
                        label="Titre"
                        placeholder="Titre de l'article"
                        required="true"
                        maxlength="200" />


                    <div class="mb-10" wire:ignore>
                        <label for="content" class="form-label required fw-bold">Contenue</label>
                        @livewire('livewire-quill', [
                        'quillId' => 'customQuillId',
                        'data' => $content,
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
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
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
                        <div class="col-sm-12 col-lg-4">
                            <label for="cercle" class="form-label fw-bold">Sujet</label>
                            <div wire:ignore>
                                <input data-pharaonic="tagify"
                                    data-component-id="{{ $this->id() }}"
                                    wire:model="tags"
                                    data-suggest-list='@json($tagsList)'
                                    data-direct
                                    data-max="3"
                                    class="form-control"
                                    data-classname="tagify__inline__suggestions">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <label for="visibility" class="form-label fw-bold">
                                Visibilité du poste
                                <i class="fa-solid fa-circle-info fs-6 ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Qui peut voir ce poste"></i>
                            </label>
                            <div wire:ignore>
                                <select id="visibility" data-pharaonic="select2" data-component-id="{{ $this->id() }}" wire:model="visibility">
                                    <option value="public">Public</option>
                                    <option value="friends">Amis et followers</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row justify-content-around align-items-center">
                        <x-form.button
                            text-submit="Publier"
                            class-color="light-primary"
                            size="lg"
                            rounded="3" />

                        <button type="button" wire:click="previewPost" class="btn btn-lg rounded-3 btn-outline btn-outline-dark">
                            Aperçu
                        </button>

                    </div>
                </div>
            </form>
        </div>
    @endif

    @if($type == 'image')
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="card-title">Publier</div>
                </div>
                <form action="" wire:submit.prevent="create" enctype="multipart/form-data">
                    <div class="card-body">

                        <x-form.input
                            name="title"
                            label="Titre"
                            placeholder="Titre de l'article"
                            required="true"
                            maxlength="200" />


                        <div class="mb-10" wire:ignore>
                            <label for="content" class="form-label fw-bold">Description</label>
                            @livewire('livewire-quill', [
                                'quillId' => 'customQuillId',
                                'data' => $content,
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
                        </div>
                        <div class="mb-10">
                            <label for="images" class="form-label fw-bold">Télécharger l'image</label>
                            <p class="text-muted">Vous pouvez importer jusqu'à 100 images en même temps (JPG, PNG, JPEG, GIF, WebP, largeur et hauteur recommandées d'au moins 420 pixels)</p>
                            <livewire:dropzone
                                wire:model="images"
                                :rules="['image','mimes:png,jpeg,jpg,gif,webp','max:4096']"
                                :multiple="true" />
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
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
                            <div class="col-sm-12 col-lg-4">
                                <label for="cercle" class="form-label fw-bold">Sujet</label>
                                <div wire:ignore>
                                    <input data-pharaonic="tagify"
                                           data-component-id="{{ $this->id() }}"
                                           wire:model="tags"
                                           data-suggest-list='@json($tagsList)'
                                           data-direct
                                           data-max="3"
                                           class="form-control"
                                           data-classname="tagify__inline__suggestions">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <label for="visibility" class="form-label fw-bold">
                                    Visibilité du poste
                                    <i class="fa-solid fa-circle-info fs-6 ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Qui peut voir ce poste"></i>
                                </label>
                                <div wire:ignore>
                                    <select id="visibility" data-pharaonic="select2" data-component-id="{{ $this->id() }}" wire:model="visibility">
                                        <option value="public">Public</option>
                                        <option value="friends">Amis et followers</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row justify-content-around align-items-center">
                            <x-form.button
                                text-submit="Publier"
                                class-color="light-primary"
                                size="lg"
                                rounded="3" />

                            <button type="button" wire:click="previewPost" class="btn btn-lg rounded-3 btn-outline btn-outline-dark">
                                Aperçu
                            </button>

                        </div>
                    </div>
                </form>
            </div>
    @endif

    @if($type == 'video')
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="card-title">Publier une vidéo</div>
                </div>
                <form action="" wire:submit.prevent="create" enctype="multipart/form-data">
                    <div class="card-body">
                        <x-form.input
                            name="video_link"
                            label="Lien de la vidéo"
                            placeholder="Lien de la vidéo"
                            required="true"
                            hint="Saisissez le lien de la vidéo que vous voulez publier (Uniquement Youtube)" />

                        <div id="video_preview" class="mb-10"></div>

                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
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
                            <div class="col-sm-12 col-lg-4">
                                <label for="cercle" class="form-label fw-bold">Sujet</label>
                                <div wire:ignore>
                                    <input data-pharaonic="tagify"
                                           data-component-id="{{ $this->id() }}"
                                           wire:model="tags"
                                           data-suggest-list='@json($tagsList)'
                                           data-direct
                                           data-max="3"
                                           class="form-control"
                                           data-classname="tagify__inline__suggestions">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <label for="visibility" class="form-label fw-bold">
                                    Visibilité du poste
                                    <i class="fa-solid fa-circle-info fs-6 ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Qui peut voir ce poste"></i>
                                </label>
                                <div wire:ignore>
                                    <select id="visibility" data-pharaonic="select2" data-component-id="{{ $this->id() }}" wire:model="visibility">
                                        <option value="public">Public</option>
                                        <option value="friends">Amis et followers</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row justify-content-around align-items-center">
                            <x-form.button
                                id="submitVideoForm"
                                text-submit="Publier"
                                class-color="light-primary"
                                size="lg"
                                rounded="3" />

                        </div>
                    </div>
                </form>
            </div>
    @endif
</div>


