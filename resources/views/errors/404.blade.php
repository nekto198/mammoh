@extends('index')

@section('body')
    <canvas id="particles-animation-bg">Your browser does not support the Canvas element.</canvas>
    <section class="errors-page">
        <div class="container errors-page__container">
            <h1>404</h1>
            <p>Эта страница не найдена</p>
            <a href="/" type="button" aria-label="button" class="btn btn--primary errors-page__link-btn">На главную</a>
        </div>
    </section>
@endsection
