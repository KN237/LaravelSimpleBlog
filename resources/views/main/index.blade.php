@extends('layouts/main')

@section('acceuil')
    active
@endsection

@section('title')
Acceuil
@endsection

@section('content')

<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">

@forelse ($recentposts as $p)


      <div class="item">
        <img src="/storage/articles/{{$p->banniere}}" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>{{$p->category->nom}}</span>
            </div>
            <a href="{{route('post',$p->id)}}"><h4>{{$p->titre}}</h4></a>
            <ul class="post-info">
              <li><a >{{$p->user->username}}</a></li>
              <li><a >{{$p->created_at}}</a></li>
              <li><a >X Commentaires</a></li>
            </ul>
          </div>
        </div>
      </div>
    
@empty

        <div class="item">
          <img src="/hold.svg" alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>xxxx</span>
              </div>
              <a href="post-details.html"><h4>xxxxx xxxx xxxx xxx</h4></a>
              <ul class="post-info">
                <li><a >xxxx</a></li>
                <li><a >xx xx, xxxx</a></li>
                <li><a >x Commentaires</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="item">
          <img src="/hold.svg" alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>xxxx</span>
              </div>
              <a href="post-details.html"><h4>xxxxx xxxx xxxx xxx</h4></a>
              <ul class="post-info">
                <li><a >xxxx</a></li>
                <li><a >xx xx, xxxx</a></li>
                <li><a >x Commentaires</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="item">
          <img src="/hold.svg" alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>xxxx</span>
              </div>
              <a href="post-details.html"><h4>xxxxx xxxx xxxx xxx</h4></a>
              <ul class="post-info">
                <li><a >xxxx</a></li>
                <li><a >xx xx, xxxx</a></li>
                <li><a >x Commentaires</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="item">
          <img src="/hold.svg" alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>xxxx</span>
              </div>
              <a href="post-details.html"><h4>xxxxx xxxx xxxx xxx</h4></a>
              <ul class="post-info">
                <li><a >xxxx</a></li>
                <li><a >xx xx, xxxx</a></li>
                <li><a >x Commentaires</a></li>
              </ul>
            </div>
          </div>
        </div>
  @endforelse

</div>
</div>
</div>


  <!-- Banner Ends Here -->

  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
@forelse($oldposts as $o)
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="/storage/articles/{{$o->banniere}}" alt="bannière">
                  </div>
                  <div class="down-content">
                    <span>{{$o->category->nom}}</span>
                    <a href="{{route('post',$o->id)}}"><h4>{{$o->titre}}</h4></a>
                    <ul class="post-info">
                      <li><a >{{$o->user->username}}</a></li>
                      <li><a >{{$o->created_at}}</a></li>
                      <li><a >X Comments</a></li>
                    </ul>
                    <p>{!! \Illuminate\Support\Str::limit($o->contenu, 200, $end='...') !!}</p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            @forelse($o->tags as $tag)
                            <li><a href="{{route('byTag',$tag->nom)}}">{{$tag->nom}}</a></li>
                            @empty
                            <li><a>Pas de tag</a></li>
                            @endforelse
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @empty

              <div class="col-12 text-center">
                <p>Aucun élément trouvé</p>
              </div>
              
              @endforelse

@if(!$oldposts->isEmpty())
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="{{route('posts')}}">Voir tout</a>
                </div>
              </div>
 @endif             
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
                        <h5>{{$p->titre}}</h5>
                        <span>{{$p->created_at}}</span>
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
                      <li><a href="{{route('byCategory',$c->nom)}}"> {{$c->nom}} </a></li>
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
                      <li><a href="{{route('byTag',$t->nom)}}"> {{$t->nom}} </a></li>
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