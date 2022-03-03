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
                <h2>Articles</h2>
                <h5>Ajouter un nouvel article <a href="{{route('show_create.post')}}" class="btn-danger square-btn-adjust ml-2" style="padding: 10px;"><i class="fa fa-plus"></i></a> </h5>
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
                        Articles
                        
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Banniere</th>
                                        <th>Contenu</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $p)

                                    <tr class="odd gradeX">
                                        <td class="center">{{$p->id}}</td>
                                        <td class="center">{{ \Illuminate\Support\Str::limit($p->titre, 10, $end='...') }}</td>
                                        <td class="center">{{ \Illuminate\Support\Str::limit($p->banniere, 10, $end='...') }}</td>
                                        <td class="center">{{ \Illuminate\Support\Str::limit($p->contenu, 50, $end='...') }}</td>
                                        <td class="center">{{$p->created_at}}</td>
                                        <td class="center">
                                            <a href="{{route('show_delete.post',$p->id)}}" class="btn-danger square-btn-adjust ml-2" style="padding: 10px;"><i class="fa fa-times"></i></a>
                                            <a href="{{route('show_edit.post',$p->id)}}" class="btn-info square-btn-adjust ml-2" style="padding: 10px;"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('post',$p->id)}}" target="blank" class="btn-primary square-btn-adjust ml-2" style="padding: 10px;"><i class="fa fa-eye"></i></a>
                                        
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