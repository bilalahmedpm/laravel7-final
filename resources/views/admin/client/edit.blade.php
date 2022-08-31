@extends('admin.layouts.include')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Client</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('client.update',['id' => $client->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$client->name}}" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Cnic</label>
                                    <input type="text" class="form-control" name="cnic" value="{{$client->cnic}}" placeholder="Cnic" required>
                                </div>
                                <div class="form-group">
                                    <label>DOB</label>
                                    <input type="date" class="form-control" name="dob" value="{{$client->dob}}" placeholder="Date of Birth" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Old Image</label><br>
                                    <img src="{{asset($client->image)}}" alt="" width="100px" height="100px">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  class="form-control" placeholder="Description" name="description" required>{{$client->description}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
