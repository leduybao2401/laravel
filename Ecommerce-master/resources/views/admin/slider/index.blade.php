@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>List Sliders
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary text-white btn-sm float-end">Add
                            Slider</a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td style="width: 15%">{{ $slider->title }}</td>
                                <td style="width: 45%">{{ $slider->description }}</td>
                                <td>
                                    <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px" alt="">
                                </td>
                                <td>{{ $slider->status == '0' ? 'Visible' : 'Hidden' }}</td>
                                <td>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}" class="btn btn-sm btn-success text-white">Edit</a>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/delete') }}" onclick="return confim('Are you sure, you want to delete this data?')" class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
