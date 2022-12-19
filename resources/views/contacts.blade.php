@extends('index')
@section('body')
    <nav class="breadcrumbs">
        <div class="container breadcrumbs__container">
            <ul class="breadcrumbs__list" role="list">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__item-link">{{ trans('header.home') }}</a>
                </li>
                <li class="breadcrumbs__item">
                    {{ trans('header.contacts') }}
                </li>
            </ul>
        </div>
    </nav>
    <section class="contacts-page">
        <div class="container contacts-page__container">
            <h1 class="section-title contacts-page__section-title">{{ trans('header.contacts') }}</h1>
            <div class="contacts-page__grid">
                <div class="contacts-page__grid-left">
                    <ul class="contacts-page__list" role="list">
                        <li><a href="tel:+7 (343) 385-29-05" class="contacts-page__phone">+7 (343) 385-29-05</a></li>
                        <li><a href="tel:+7 922 181-23-82" class="contacts-page__mob-phone">+7 922 181-23-82</a></li>
                        <li><a href="mailto:ru@mammoh.com" class="contacts-page__mail">ru@mammoh.com</a></li>
                    </ul>
                    <ul class="contacts-page__media-list" role="list">
                        <li>
                            <a href="#">
                                <svg width="57" height="56" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="28.5" cy="28" r="24.5" stroke="#0299D6" stroke-width="2"/>
                                    <path d="M40.168 16.332L12.168 27.9987L22.4838 29.5543M40.168 16.332L36.4838 39.6654L22.4838 29.5543M40.168 16.332L22.4838 29.5543L40.168 16.332ZM22.4838 29.5543V38.1098L27.2718 33.0123" fill="#0299D6"/>
                                    <path d="M40.168 16.332L12.168 27.9987L22.4838 29.5543M40.168 16.332L36.4838 39.6654L22.4838 29.5543M40.168 16.332L22.4838 29.5543M22.4838 29.5543V38.1098L27.2718 33.0123" stroke="#0299D6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="57" height="56" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="28.5" cy="28" r="24.5" stroke="#0299D6" stroke-width="2"/>
                                    <path d="M31.4748 39.5248V33.3779C35.2105 34.0074 36.3916 37.2568 38.7704 39.5248H44.8346C43.3185 35.7838 41.0563 32.4703 38.2175 29.8323C40.3953 26.5182 42.7071 23.3985 43.8379 18.668H38.3264C36.1654 22.2876 35.0263 26.5275 31.4748 29.3232V18.668H23.4757L25.3854 21.2785V30.5822C22.2863 30.1841 20.1922 23.9169 17.9223 18.668H12.168C14.262 25.7591 18.6678 41.3207 31.4748 39.5248Z" fill="#0299D6"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <address class="contacts-page__address contacts-page__address--desktop">
                        620012 Россия г.Екатеринбург, ул.Машиностроителей, 19
                    </address>
                </div>
                <div class="contacts-page__grid-right">
                    <address class="contacts-page__address contacts-page__address--mobile">
                        620012 Россия г.Екатеринбург, ул.Машиностроителей, 19
                    </address>
                    <div class="contacts-page__map">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A5fcb734296503b59931d234a7cc6d83abfe323650314022679706ce1f87000b7&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
