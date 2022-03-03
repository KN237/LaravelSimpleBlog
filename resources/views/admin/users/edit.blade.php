@extends('layouts/admin')
@section('users')
    active-menu
@endsection
@section('title')
utilisateurs
@endsection
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Modification d'utilisateur</h2>
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
                       Utilisateurs
                    </div>
                    <div class="panel-body">
                        
                        <form class="edit_user_form" method="POST" action="{{route('edit.user',$user->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Nom</label>
                                <input name="name" id="exampleEmail" type="text" class="form-control" value="{{$user->username}}" >
                            </div>

                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="email" id="exampleEmail" type="email" class="form-control" value="{{$user->email}}">
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