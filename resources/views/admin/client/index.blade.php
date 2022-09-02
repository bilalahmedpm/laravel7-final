@extends('admin.layouts.include')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

{{--
@if(session()->has('message'))
<div class="alert alert-success">
 {{ session()->get('message') }}
 </div
 @endif--}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Clients</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>DOB</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->cnic}}</td>
                                        <td>{{$client->dob}}</td>
                                        <td><img src="{{asset($client->image)}}" width="50px" height="50px"></td>
                                        <td>{{$client->description}}</td>
                                        <td>
                                            <a href="{{route('client.edit',['id'=>$client->id])}}" class="btn btn-primary"><i  class="fa fa-pen"></i></a>
                                            <a href="{{route('client.delete',['id'=>$client->id])}}" class="btn btn-danger"><i class="fa fa-trash"> </i></a>
                                            <a href="#" class="btn btn-success"><i class="fa fa-eye"> </i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

