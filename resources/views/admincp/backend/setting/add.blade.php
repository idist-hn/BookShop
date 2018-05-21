<?php
/**
 * Created by PhpStorm.
 * User: idist
 * Date: 20/05/2018
 * Time: 12:29
 */
?>

@extends('master')
@section('content')

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route("admin.setting.add.post") }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Setting</strong>
                                <small>Form</small>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="company">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your setting name">
                                </div>

                                <div class="form-group">
                                    <label for="vat">Slug</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Enter your slug">
                                </div>

                                <div class="form-group">
                                    <label for="street">Value</label>
                                    <input type="text" class="form-control" id="street" placeholder="Enter value">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-primary" value="Thêm">
                                    <a href="{{ route("admin.setting.get") }}" class="btn btn-outline-danger">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </form>


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