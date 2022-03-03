@extends('layouts/admin')

@section('dashboard')
    active-menu
@endsection

@section('title')
dashboard
@endsection

@section('content')
   
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Dashboard</h2>   
            </div>
        </div>              
         <!-- /. ROW  -->
          <hr />
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-red set-icon">
            <i class="fa fa-pencil"></i>
        </span>
        <div class="text-box" > 
            <p class="main-text">{{$posts->count()}}</p>
            <p class="text-muted">Articles</p>
        </div>
     </div>
     </div>
            <div class="col-md-3 col-sm-6 col-xs-6">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-green set-icon">
            <i class="fa fa-clipboard"></i>
        </span>
        <div class="text-box" >
            <p class="main-text">{{$categories->count()}}</p>
            <p class="text-muted">Catégories</p>
        </div>
     </div>
     </div>
            <div class="col-md-3 col-sm-6 col-xs-6">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-blue set-icon">
            <i class="fa fa-clipboard"></i>
        </span>
        <div class="text-box" >
            <p class="main-text">{{$tags->count()}}</p>
            <p class="text-muted">Tags</p>
        </div>
     </div>
     </div>
            <div class="col-md-3 col-sm-6 col-xs-6">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-brown set-icon">
            <i class="fa fa-user"></i>
        </span>
        <div class="text-box" >
            <p class="main-text">{{$users->count()}}</p>
            <p class="text-muted">Utilisateurs</p>
        </div>
     </div>
     </div>
    </div>
         <!-- /. ROW  -->
        <hr />                
        
        <div class="row"> 
            
              
                       <div class="col-md-12 col-sm-12 col-xs-12">                     
            <div class="panel panel-default">
                <div class="panel-heading">
                    Evolution
                </div>
                <div class="panel-body">
                    <div id="morris-bar-chart"></div>
                </div>
            </div>            
        </div>
        
   </div>
         <!-- /. ROW  -->
      
      
 <!-- /. PAGE WRAPPER  -->

@endsection