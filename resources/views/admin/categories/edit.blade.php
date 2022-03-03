@extends('layouts/admin')
@section('categories')
    active-menu
@endsection
@section('title')
categories
@endsection
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Modification de categorie</h2>
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
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categories
                    </div>
                    <div class="panel-body">
                        
                        <form class="edit_tag_form" method="POST" action="{{route('edit.category',$category->id)}}">
                            @method('PUT')
                            @csrf
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Nom</label>
                                <input name="nom" id="exampleEmail" type="text" class="form-control" value="{{$category->nom}}">
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