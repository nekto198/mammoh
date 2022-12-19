@extends('index')
@section('body')

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js';

        const moreArticlesSlider = new Swiper('.more-articles__slider', {
            init: false,
            breakpoints: {
                1200: {
                    slidesPerView: 'auto',
                    loop: true,
                    loopedSlides: 3,
                    spaceBetween: 20,
                },
                1920: {
                    spaceBetween: 24,
                }
            }
        });

        if(window.innerWidth >= 1200) {
            moreArticlesSlider.init();
        }


    </script>


    <main class="main">


        <nav class="breadcrumbs">
            <div class="container breadcrumbs__container">
                <ul class="breadcrumbs__list breadcrumbs__list--clr-white" role="list">
                    <li class="breadcrumbs__item">
                        <a href="#" class="breadcrumbs__item-link">{{ trans('header.home') }}</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="/articles" class="breadcrumbs__item-link">{{ trans('header.articles') }}</a>
                    </li>
                    <li class="breadcrumbs__item">
                        {{$article->title}}
                    </li>
                </ul>
            </div>
        </nav>

        <div class="article-page-top-bg" style="background-image: url(/resources/images/article-page-top-bg.jpg);">
        </div>
        <section class="article-page">
            <div class="container article-page__container">
                <div class="article-page__top-row">
                    <a href="#" class="previous-link article-page__previous-link">
                        <svg class="previous-link__icon" width="24" height="12">
                            <use href="/resources/svgSprites/svgSprite.svg#icon-back-white"></use>
                        </svg>
                    </a>
                    <time class="article-page__datetime article-page__datetime--mobile" datetime="{{date("Y.m.d", strtotime($article->created_at))}}">{{date("Y.m.d", strtotime($article->created_at))}}</time>
                </div>
                <h1 class="section-title article-page__section-title">{{$article->title}}</h1>
                @if(!is_null($article->product))
                <a href="/catalog/{{$article->product->slug}}" class="article-page__reductor-link">{{$article->product->name}}</a>
                @endif
                <div class="article-page__bottom-row">
                    <time class="article-page__datetime article-page__datetime--tablet" datetime="{{date("Y.m.d", strtotime($article->created_at))}}">{{date("Y.m.d", strtotime($article->created_at))}}</time>
                    <ul role="list" class="article-page__tags-list">
                        @foreach($article->tags as $tag)
                            <li>">{{$tag->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="article-page__info">
                    @foreach (json_decode($article->content, true) as $content)
                        <article>
                            @if($content['title'])
                            <h2>{{$content['title']}}</h2>
                            @endif
                            {{$content['content']}}
                            @if($content['image'])
                                <picture class="article-page__info-picture">
                                    <img src="{{$content['image']}}" loading="lazy" decoding="async" alt="image" class="article-page__info-img">
                                </picture>
                            @endif
                        </article>
                    @endforeach

                </div>
            </div>
        </section>
        <section class="more-articles">
            <div class="container more-articles__container">
                <h2 class="section-title more-articles__section-title">{{ trans('common.more_articles') }}</h2>
                <div class="swiper more-articles__slider">
                    <ul class="swiper-wrapper more-articles__slider-list" role="list">
                        <li class="swiper-slide more-articles__slider-list-item">
                            <a href="#" class="more-articles__slider-link"></a>
                            <figure class="more-articles__slider-card">
                                <picture class="more-articles__slider-card-picture">
                                    <img loading="lazy" decoding="async" src="/resources/images/more-articles-img-1.png" alt="image" width="200" height="200" class="more-articles__slider-card-img">
                                </picture>
                                <figcaption class="more-articles__slider-card-figcaption">
                                    <ul role="list" class="more-articles__tags-list">
                                        <li>редукторы</li>
                                        <li>промышленность</li>
                                        <li>еще какой-то тег</li>
                                    </ul>
                                    <h3 class="more-articles__slider-card-title">Три варианта расположения валов промышленных редукторов</h3>
                                    <time class="more-articles__datetime" datetime="2022.09.08">09.08.2022</time>
                                </figcaption>
                            </figure>
                        </li>
                        <li class="swiper-slide more-articles__slider-list-item">
                            <figure class="more-articles__slider-card">
                                <picture class="more-articles__slider-card-picture">
                                    <img loading="lazy" decoding="async" src="/resources/images/more-articles-img-2.png" alt="image" width="200" height="200" class="more-articles__slider-card-img">
                                </picture>
                                <figcaption class="more-articles__slider-card-figcaption">
                                    <ul role="list" class="more-articles__tags-list">
                                        <li>редукторы</li>
                                        <li>промышленность</li>
                                        <li>еще какой-то тег</li>
                                    </ul>
                                    <h3 class="more-articles__slider-card-title">Три варианта расположения валов промышленных редукторов</h3>
                                    <time class="more-articles__datetime" datetime="2022.09.08">09.08.2022</time>
                                </figcaption>
                            </figure>
                        </li>
                        <li class="swiper-slide more-articles__slider-list-item">
                            <figure class="more-articles__slider-card">
                                <picture class="more-articles__slider-card-picture">
                                    <img loading="lazy" decoding="async" src="/resources/images/more-articles-img-3.png" alt="image" width="200" height="200" class="more-articles__slider-card-img">
                                </picture>
                                <figcaption class="more-articles__slider-card-figcaption">
                                    <ul role="list" class="more-articles__tags-list">
                                        <li>редукторы</li>
                                        <li>промышленность</li>
                                        <li>еще какой-то тег</li>
                                    </ul>
                                    <h3 class="more-articles__slider-card-title">Три варианта расположения валов промышленных редукторов</h3>
                                    <time class="more-articles__datetime" datetime="2022.09.08">09.08.2022</time>
                                </figcaption>
                            </figure>
                        </li>
                        <li class="swiper-slide more-articles__slider-list-item">
                            <figure class="more-articles__slider-card">
                                <picture class="more-articles__slider-card-picture">
                                    <img loading="lazy" decoding="async" src="/resources/images/more-articles-img-4.png" alt="image" width="200" height="200" class="more-articles__slider-card-img">
                                </picture>
                                <figcaption class="more-articles__slider-card-figcaption">
                                    <ul role="list" class="more-articles__tags-list">
                                        <li>редукторы</li>
                                        <li>промышленность</li>
                                        <li>еще какой-то тег</li>
                                    </ul>
                                    <h3 class="more-articles__slider-card-title">Три варианта расположения валов промышленных редукторов</h3>
                                    <time class="more-articles__datetime" datetime="2022.09.08">09.08.2022</time>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>
            </div>
        </section>



@endsection
