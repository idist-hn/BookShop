@extends('master')
@section('content')

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pull-right">
                        <a href="{{ route("admin.setting.add") }}" type="button" class="btn btn-outline-primary"><i class="fa fa-star"></i>Tạo mới</a>
                        <a href="{{ route("admin.setting.lock") }}" type="button" class="btn btn-outline-secondary"><i class="fa fa-lock"></i> Tạm
                            khóa
                        </a>
                        <a href="{{ route("admin.setting.edit",['id'=> 0]) }}" type="button" class="btn btn-outline-success"><i class="fa fa-pencil-square-o"></i> Cập nhật
                        </a>
                        <a href="{{ route("admin.setting.delete") }}" type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o"></i> Xóa
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Combined All Table
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-lg">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($settings as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>{{ $item->value }}</td>
                                            <td>{{ $item->action }}</td>
                                        </tr>

                                        @endforeach
                                </tbody>
                            </table>
                            <nav>
                                {{ $settings->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->

        </div>
    </div>
@endsection
<!-- /.conainer-fluid -->

@section('myscript')
    <script src="{{ asset('js/views/main.js') }}"></script>
@endsection