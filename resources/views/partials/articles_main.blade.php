@forelse($articles as $article)
<li class="articles-page__list-item">
    <figure class="articles-page__list-item-card">
        <a href="/articles/{{$article->slug}}" class="articles-page__list-item-link"></a>
        <picture class="articles-page__list-item-picture">
            <img src="{{$article->image}}" loading="lazy" decoding="async" alt="image" x-bind:src="item.imgSrc" width="212" height="118" class="articles-page__list-item-img">
        </picture>
        <figcaption>
            <ul role="list" class="articles-page__list-item-tags">
                @foreach($article->tags as $tag)
                <li>{{$tag->name}}</li>
                @endforeach
            </ul>
            <h3>{{$article->title}}</h3>
            <time datetime="{{date("Y.m.d", strtotime($article->created_at))}}">{{date("Y.m.d", strtotime($article->created_at))}}</time>
        </figcaption>
    </figure>
</li>
@empty
<li>ПУСТО</li>
@endforelse
