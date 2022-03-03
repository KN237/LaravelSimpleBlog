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
                <h2>Categories</h2>
                <h5>Ajouter une nouvelle categorie <a href="{{route('show_create.category')}}" class="btn-danger square-btn-adjust ml-2" style="padding: 10px;"><i class="fa fa-plus"></i></a> </h5>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block mt-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block mt-3">
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
                        Categorie
                        
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $p)

                                    <tr class="odd gradeX">
                                        <td class="center">{{$p->id}}</td>
                                        <td class="center">{{$p->nom}}</td>
                                         <td class="center">{{$p->created_at}}</td>
                                        <td class="center">
                                            <a href="{{route('show_delete.category',$p->id)}}" class="btn-danger square-btn-adjust ml-2" style="padding: 10px;"><i class="fa fa-times"></i></a>
                                            <a href="{{route('show_edit.category',$p->id)}}" class="btn-info square-btn-adjust ml-2" style="padding: 10px;"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>

                                    @empty

                                    <tr><td rowspan="7" colspan="7" > <center>Aucun contenu n'a été trouvé</center></td></tr>

                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

    </div>

</div>
<!-- /. PAGE INNER  -->

@endsection()