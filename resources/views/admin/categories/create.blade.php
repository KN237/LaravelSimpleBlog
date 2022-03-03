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
                <h2>Ajout de Catégorie</h2>
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
                        Catégories
                    </div>
                    <div class="panel-body">
                        
                        <form class="edit_category_form" method="POST" action="{{route('create.category')}}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Nom</label>
                                <input name="nom" id="exampleEmail" type="text" class="form-control" placeholder="Nom">
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