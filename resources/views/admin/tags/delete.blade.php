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
                <h2>Suppression</h2>
               
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
                        
<center>Voulez-vous vraiment supprimer ce tag ?</center><br>
<center style="display: flex; justify-content:center;">

    <form action="{{route('delete.tag',$tag->id)}}" method="POST">
        @csrf
        @method('delete')
    <button type="submit" class="btn-success square-btn-adjust" style="padding: 10px;"><i class="fa fa-check"></i></button>

    </form>

  
    <a href="{{route('admin.tags')}}" class="btn-danger square-btn-adjust" style="padding: 10px;margin-left:10px"><i class="fa fa-times"></i></a>
</center>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

    </div>

</div>
<!-- /. PAGE INNER  -->

@endsection()