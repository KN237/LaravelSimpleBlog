@extends('layouts/admin')
@section('articles')
    active-menu
@endsection
@section('title')
articles
@endsection
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Modification d'article</h2>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-block mt-1">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $error }}</strong>
                </div>
                @endforeach
            @endif
            
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Articles
                    </div>
                    <div class="panel-body">
                        
                        <form class="edit_article_form" method="POST" action="{{route('edit.post',$post->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Titre</label>
                                <input name="titre" id="exampleEmail" type="text" class="form-control" value="{{$post->titre}}">
                            </div>
        
                            <div class="position-relative form-group">
                                    
                                <label for="exampleEmail2" class="">Catégorie</label>
                                
                                <select name="categorie" id="exampleEmail2" type="text" class="form-control">
                                   
                                    @foreach ($categories as $c)

                                    @if($c->id==$post->category->id)

                                    <option value="{{$c->id}}" selected>{{$c->nom}}</option>
                                    
                                    @else

                                    <option value="{{$c->id}}">{{$c->nom}}</option>

                                    @endif

                                    @endforeach
                                   
        
                                </select>
        
        
                            </div>

                            <div class="position-relative form-group">
                                    
                                <label for="exampleEmail2" class="">Tags</label>
                                
                                <select name="tags[]" id="exampleEmail2" type="text" class="form-control" multiple>
                                   
                                    @foreach ($tags as $c)

                                    @if($posttags->count()>0)

                                    <option value="{{$c->id}}"  @if(in_array($c->id,$posttag)) selected @endif>{{$c->nom}}</option>
                                    

                                    @else

                                    <option value="{{$c->id}}">{{$c->nom}}</option>

                                    @endif

                                    @endforeach
                                   
        
                                </select>
        
        
                            </div>
        
                            <div class="position-relative form-group">
                                <label for="exampleText" class="">Contenu</label>
                                <textarea name="contenu" id="exampleText" class="form-control">
                                    {!!$post->contenu!!}
                                    </textarea>
                            </div>

                               <center> <img src="/storage/articles/{{$post->banniere}}" alt="test" style="width: 100px;height:100px;"> </center>
                            
                            <div class="position-relative form-group">
                                <label for="exampleFile" class="">Banniere</label>
                                <input name="banniere" id="exampleFile" type="file"  class="form-control-file">
                            </div>
                            <button class="mt-1 btn btn-block btn-danger">Modifier</button>
                        </form>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

    </div>

</div>
<!-- /. PAGE INNER  -->

@endsection()