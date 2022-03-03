@extends('layouts/main')

@section('meta')

<meta property="og:title" content="{{ $post->titre }}"/>
<meta property="og:type" content="article" />
<meta property="og:description" content="{{ \Illuminate\Support\Str::limit($post->contenu, 200, $end = '...') }}"">
<meta property="og:image" content="{{route('home')."/storage/articles/".$post->banniere}}"/>
<meta name="twitter:card" content="summary_large_image">

@endsection

@section('title')
{{ $post->titre }}
@endsection

@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content text-center">
                            <h2>{{ $post->titre }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->


    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="/storage/articles/{{ $post->banniere }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>{{ $post->category->nom }}</span>
                                        <a href="post-details.html">
                                            <h4>{{ $post->titre }}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#">{{$post->user->username}}</a></li>
                                            <li><a href="#">{{ $post->created_at }}</a></li>
                                            <li><a href="#">X Commentaires</a></li>
                                        </ul>
                                        {!! $post->contenu !!}
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        @forelse($post->tags as $tag)
                                                            <li><a>{{ $tag->nom }}</a></li>
                                                        @empty
                                                            <li><a>Pas de tag</a></li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="{{$temp['facebook']}}" target="_blank" >Facebook</a>,</li>
                                                        <li><a href="{{$temp['twitter']}}" target="_blank" > Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form id="search_form" name="key" method="Post" action="{{route('bySearch')}}">
                                        @csrf
                                      <input type="text" name="key" class="searchText" placeholder="Rechercher..." autocomplete="on" onkeypress="getElementById('search_form').sumbit();">
                                    </form>
                                  </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Articles récents</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @forelse($recentposts as $p)
                                                <li><a href="{{route('post',$p->id)}}">
                                                        <h5>{{ $p->titre }}</h5>
                                                        <span>{{ $p->created_at }}</span>
                                                    </a></li>
                                            @empty
                                                <li>Aucun résultat</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Catégories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @forelse($categories as $c)
                                                <li><a href="{{route('byCategory',$c->nom)}}"> {{ $c->nom }} </a></li>
                                            @empty
                                                <li>Aucun résultat</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tags</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @forelse($tags as $t)
                                                <li><a href="{{route('byTag',$t->nom)}}"> {{ $t->nom }} </a></li>
                                            @empty
                                                <li>Aucun résultat</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
