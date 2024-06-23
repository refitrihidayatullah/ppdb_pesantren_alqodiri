@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-name">Upload<span class="text-danger"></span>
                    </label>
                    <div class="col-lg-6">
                        <input type="file" class="form-control" name="file" placeholder="Masukkan No Induk Santri..">
                    </div>
                </div>
                <div class="btn btn-primary m-auto">Upload</div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection