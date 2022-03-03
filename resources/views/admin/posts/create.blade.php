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
                <h2>Ajout d'article</h2>
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
                        
                        <form class="edit_article_form" method="POST" action="{{route('create.post')}}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Titre</label>
                                <input name="titre" id="exampleEmail" type="text" class="form-control" placeholder="">
                            </div>
        
                            <div class="position-relative form-group">
                                    
                                <label for="exampleEmail2" class="">Catégorie</label>
                                
                                <select name="categorie" id="exampleEmail2" type="text" class="form-control">
                                   
                                    @foreach ($categories as $c)

                                    <option value="{{$c->id}}" selected>{{$c->nom}}</option>
                                    
                                    @endforeach
                                   
        
                                </select>
        
        
                            </div>

                            <div class="position-relative form-group">
                                    
                                <label for="exampleEmail2" class="">Tags</label>
                                
                                <select name="tags[]" id="exampleEmail2" type="text" class="form-control" multiple>
                                   
                                    @foreach ($tags as $c)

                                    <option value="{{$c->id}}" >{{$c->nom}}</option>
                                    
                                    @endforeach
                                   
        
                                </select>
        
        
                            </div>
        
                            <div class="position-relative form-group">
                                <label for="exampleText" class="">Contenu</label>
                                <textarea name="contenu" id="exampleText" class="form-control">
                                    </textarea>
                            </div>
                            <div class="position-relative form-group" title="Image de d'au-moins 520x425">
                                <label for="exampleFile" class="">Banniere</label>
                                <input name="banniere" id="exampleFile" type="file" class="form-control-file">
                            </div>
                            <button class="mt-1 btn btn-block btn-danger">Ajouter</button>
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