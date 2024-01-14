<div class="position-relative d-flex align-items-center w-lg-400px" x-data="{appear_results: false}">
    <form  data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
        <input type="hidden"/>
        <i class="fa-solid fa-search position-absolute top-50 translate-middle-y ms-6"></i>
        <input
            type="text"
            class="form-control form-control-solid-bg bg-gray-300 border-2  rounded-4 border-hover border-hover-primary ps-14"
            placeholder="Rechercher..."
            wire:model.live.debounce.500ms="query"
            x-on:focusin="appear_results = ! appear_results"
            x-on:focusout="appear_results = false"
            wire:keydown.escape="resetField"
            wire:keydown.tab="resetField" />

        <span wire:loading.class.remove="d-none" class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-6" data-kt-search-element="spinner">
            <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
        </span>
    </form>
    <div x-show="appear_results" class="w-100 z-index-3" style="position: absolute; inset: 100% 0% auto auto;">
        <div class="bg-white rounded-3 shadow-lg p-5 h-350px scroll scroll-y">
            @if(!empty($query))
                @if(!empty($results[0]->blogs->data))
                    <span class="fs-3 fw-bold">Articles</span>
                    @foreach($results[0]->blogs->data as $blog)
                       <div class="d-flex flex-stack py-4">
                           <a href="{{ $blog->url_to_blog_article }}" class="d-flex align-items-center">
                               <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->title }}</span>
                           </a>
                       </div>
                    @endforeach
                @endif
                @if(!empty($results[1]->posts->data))
                    <span class="fs-3 fw-bold">Publications</span>
                    @foreach($results[1]->posts->data as $blog)
                        <div class="d-flex flex-stack py-4">
                            <a href="#" class="d-flex align-items-center">
                                <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->title }}</span>
                            </a>
                        </div>
                    @endforeach
                @endif
                @if(!empty($results[2]->events->data))
                    <span class="fs-3 fw-bold">Evènements</span>
                    @foreach($results[2]->events->data as $blog)
                        <div class="d-flex flex-stack py-4">
                            <a href="#" class="d-flex align-items-center">
                                <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->title }}</span>
                            </a>
                        </div>
                    @endforeach
                @endif
                @if(!empty($results[3]->users->data))
                    <span class="fs-3 fw-bold">Membres</span>
                    @foreach($results[3]->users->data as $blog)
                        <div class="d-flex flex-stack py-4">
                            <a href="#" class="d-flex align-items-center">
                                <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->name }}</span>
                            </a>
                        </div>
                    @endforeach
                @endif
            @else
                <div class="mb-5">
                    <span class="fs-3 fw-bold">Articles</span>
                    @foreach($results[0]->blogs->data as $blog)
                        <div class="d-flex flex-stack py-4">
                            <a href="{{ $blog->url_to_blog_article }}" class="d-flex align-items-center">
                                <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->title }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <span class="fs-3 fw-bold">Publications</span>
                    @foreach($results[1]->posts->data as $blog)
                        <div class="d-flex flex-stack py-4">
                            <a href="#" class="d-flex align-items-center">
                                <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->title }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <span class="fs-3 fw-bold">Evènements</span>
                    @foreach($results[2]->events->data as $blog)
                        <div class="d-flex flex-stack py-4">
                            <a href="#" class="d-flex align-items-center">
                                <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->title }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <span class="fs-3 fw-bold">Membres</span>
                    @foreach($results[3]->users->data as $blog)
                        <div class="d-flex flex-stack py-4">
                            <a href="#" class="d-flex align-items-center">
                                <span class="text-dark ms-2 fw-bold text-hover-primary fw-semibold fs-4">{{ $blog->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
