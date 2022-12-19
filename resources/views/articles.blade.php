@extends('index')
@section('body')


    <nav class="breadcrumbs">
        <div class="container breadcrumbs__container">
            <ul class="breadcrumbs__list" role="list">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__item-link">{{ trans('header.home') }}</a>
                </li>
                <li class="breadcrumbs__item">
                    {{ trans('header.articles') }}
                </li>
            </ul>
        </div>
    </nav>

    <section class="articles-page" x-data="{toggleTagsList: false}">
        <div class="container articles-page__container">
            <div class="articles-page__title-row">
                <a href="#" class="previous-link articles-page__previous-link">
                    <svg class="previous-link__icon" width="24" height="12">
                        <use href="/resources/svgSprites/svgSprite.svg#icon-back"></use>
                    </svg>
                </a>
                <h1 class="section-title articles-page__section-title">{{ trans('header.articles') }}</h1>
                <!-- <form class="articles-page__search" action="#">
                    <button type="submit" aria-label="button" class="articles-page__search-btn">
                        <svg class="articles-page__search-btn-icon" width="18" height="18">
                            <use href="../resources/svgSprites/svgSprite.svg#icon-search"></use>
                        </svg>
                    </button>
                    <input type="search" placeholder="Поиск" class="articles-page__search-input">
                </form> -->
            </div>
        </div>
        <form action="#" class="articles-page__tags">
            <fieldset>
                <ul role="list" class="articles-page__tags-list">
                    @php($chosen = is_null(request('tag'))? [] :explode(',',request('tag')) )
                    @foreach($tags as $tag)
                        <li class="articles-page__tags-list-item">
                            <input type="checkbox" name="tagsList" value="{{$tag->slug}}" class="articles-page__tags-radio" @if(in_array($tag->slug,$chosen)) checked @endif>
                            <button type="button" aria-label="button" class="articles-page__tags-btn"><span x-text="title">{{$tag->name}}</span>
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="articles-page__tags-btn-icon">
                                    <path d="M10.714 6.04608H1.28595M6 1.33203V10.7601" stroke="#001A20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </li>
                    @endforeach
                </ul>
               {{-- <ul role="list" class="articles-page__tags-list" x-data="{titles: ['редукторы', 'еще какой-то тег']}" x-show="toggleTagsList === true" x-collapse.duration.800ms>
                    <template x-for="title in titles">
                        <li class="articles-page__tags-list-item">
                            <input type="checkbox" name="tagsList" id="редукторы" class="articles-page__tags-radio">
                            <button type="button" aria-label="button" class="articles-page__tags-btn"><span x-text="title">редукторы</span>
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="articles-page__tags-btn-icon">
                                    <path d="M10.714 6.04608H1.28595M6 1.33203V10.7601" stroke="#001A20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </li>
                    </template>
                </ul>--}}
            </fieldset>
        </form>
        {{--<button type="button" aria-label="button" class="articles-page__expand-tags-list-btn" x-on:click="toggleTagsList = !toggleTagsList"><span x-text="toggleTagsList === false ? 'Ещё категории' : 'Скрыть'">Ещё категории</span>
            <svg class="articles-page__expand-tags-list-btn-icon" width="12" height="10" x-bind:class="{ 'active': toggleTagsList === true }">
                <use href="../resources/svgSprites/svgSprite.svg#icon-expand-blue"></use>
            </svg>
        </button>--}}
        <div class="container articles-page__container articles-page__list-container">
            <ul class="articles-page__list">

                    @include('partials.articles_main',$articles)


            </ul>
            <div class="articles-page__controls-group">
                <div class="articles-page__display-articles-count">
                    <p>Отображать на странице:</p>
                    <div class="articles-page__display-articles-count-select">
                        <select name="displayArticlesCount" id="displayArticlesCount">
                            <option value="10" selected>10</option>
                            <option value="10">20</option>
                            <option value="10">30</option>
                        </select>
                    </div>
                </div>
                <ul class="pagination" role="list">
                    <li class="pagination__start-link">
                        <svg class="pagination__next-page-icon" width="10" height="12">
                            <use href="../resources/svgSprites/svgSprite.svg#pagination-next-icon"></use>
                        </svg>
                    </li>
                    <li class="pagination__prev-page-link">
                        <svg class="pagination__end-icon" width="12" height="12">
                            <use href="../resources/svgSprites/svgSprite.svg#pagination-end-icon"></use>
                        </svg>
                    </li>
                    <li class="pagination__item active"><p>1</p></li>
                    <li class="pagination__item"><p>2</p></li>
                    <li class="pagination__item"><p>3</p></li>
                    <li class="pagination__next-page-link">
                        <svg class="pagination__next-page-icon" width="10" height="12">
                            <use href="../resources/svgSprites/svgSprite.svg#pagination-next-icon"></use>
                        </svg>
                    </li>
                    <li class="pagination__end-link">
                        <svg class="pagination__end-icon" width="12" height="12">
                            <use href="../resources/svgSprites/svgSprite.svg#pagination-end-icon"></use>
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
    </section>



@endsection
