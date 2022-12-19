@extends('index')
@section('body')
<nav class="breadcrumbs">
    <div class="container breadcrumbs__container">
        <ul class="breadcrumbs__list" role="list">
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__item-link">Крошка</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__item-link">Крошка</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__item-link">Крошка</a>
            </li>
            <li class="breadcrumbs__item">
                Крошка
            </li>
        </ul>
    </div>
</nav>

<section class="catalog-page">
    <div class="container catalog-page__container">
        <div class="catalog-page__title-row">
            <a href="#" class="previous-link catalog-page__previous-link">
                <svg class="previous-link__icon" width="24" height="12">
                    <use href="../resources/svgSprites/svgSprite.svg#icon-back"></use>
                </svg>
            </a>
            <h1 class="section-title catalog-page__section-title">ZDY-серия</h1>
        </div>
        <h2 class="catalog-page__subtitle">редукторы цилиндрические одноступенчатые</h2>
        <div class="filter-dropdown" x-data="{toggleDropdown: false}">
            <div class="filter-dropdown__top" x-on:click="toggleDropdown = !toggleDropdown">
                <svg class="filter-dropdown__icon" width="24" height="24">
                    <use href="../resources/svgSprites/svgSprite.svg#icon-filter"></use>
                </svg>
                <p class="filter-dropdown__top-text">Фильтры</p>
                <svg class="filter-dropdown__arrow" width="13" height="10" x-bind:class="{ 'active': toggleDropdown === true }">
                    <use href="../resources/svgSprites/svgSprite.svg#arrow-icon"></use>
                </svg>
            </div>
            <div class="filter-dropdown__body" x-show="toggleDropdown === true" x-collapse.duration.800ms>
                <div class="filter-range-sliders-wrapper">
                    <div class="filter-range-slider__wrapper">
                        <h3 class="filter-range-slider__title">Передаточное число, U</h3>
                        <div class="filter-range-slider filter-range-slider--1"></div>
                        <div class="filter-range-slider__input-values">
                            <div class="filter-range-slider__input-values-wrapper"><input type="number" name="inputValueMin1" id="inputValueMin1" class="filter-range-slider__input filter-range-slider__input-min filter-range-slider__input-min--rangeSlider-1"></div>
                            <div class="filter-range-slider__input-values-wrapper">
                                <input type="number" name="inputValueMax1" id="inputValueMax1" class="filter-range-slider__input filter-range-slider__input-max filter-range-slider__input-max--rangeSlider-1">
                            </div>
                        </div>
                    </div>
                    <div class="filter-range-slider__wrapper">
                        <h3 class="filter-range-slider__title">Крутящий момент</h3>
                        <div class="filter-range-slider filter-range-slider--2"></div>
                        <div class="filter-range-slider__input-values">
                            <div class="filter-range-slider__input-values-wrapper">
                                <input type="number" name="inputValueMin2" id="inputValueMin2" class="filter-range-slider__input filter-range-slider__input-min filter-range-slider__input-min--rangeSlider-2">
                            </div>
                            <div class="filter-range-slider__input-values-wrapper">
                                <input type="number" name="inputValueMax2" id="inputValueMax2" class="filter-range-slider__input filter-range-slider__input-max filter-range-slider__input-max--rangeSlider-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="catalog-page__list" role="list">
            <template x-for="i in 6">
                <li class="catalog-page__list-item">
                    <h2 class="catalog-page__list-title">ZDY-80</h2>
                    <ul class="catalog-page__chars-list">
                        <li class="catalog-page__chars-list-item">
                            <p>Ном. крутящий момент на вых. валу, Н*м</p>
                            <p>470</p>
                        </li>
                        <li class="catalog-page__chars-list-item">
                            <p>Передаточное отношение</p>
                            <p>1.25; 1.4; 1.6; 1.8; 2; 2.24; 2.5; 2.8; 3.15; 3.55; 4; 4.5; 5; 5.6;</p>
                        </li>
                        <li class="catalog-page__chars-list-item">
                            <p>Суммарное межосевое расстояние, мм</p>
                            <p>80</p>
                        </li>
                        <li class="catalog-page__chars-list-item">
                            <p>Масса, кг</p>
                            <p>14</p>
                        </li>
                    </ul>
                    <div class="catalog-page__list-btn-group">
                        <a href="#" class="btn btn--flat catalog-page__details-link">Подробнее</a>
                        <a href="#" class="btn btn--outline catalog-page__configurator-link">Конфигуратор</a>
                    </div>
                </li>
            </template>
        </ul>
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
</section>

@endsection
