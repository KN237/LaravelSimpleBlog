@extends('layouts/admin')
@section('tags')
    active-menu
@endsection
@section('title')
tags
@endsection
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Ajout de tag</h2>
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
                        Tags
                    </div>
                    <div class="panel-body">
                        
                        <form class="edit_tag_form" method="POST" action="{{route('create.tag')}}">
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