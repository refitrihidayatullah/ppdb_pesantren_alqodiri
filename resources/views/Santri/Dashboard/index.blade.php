@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')
<div class="row">

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img alt="" class="rounded-circle mt-4" src="images/users/5.jpg">
                        <h4 class="card-widget__title text-dark mt-3">Deangelo Sena</h4>
                        <p class="text-muted">Senior Manager</p>
                        <a class="btn gradient-4 btn-lg border-0 btn-rounded px-5" href="javascript:void()">Folllow</a>
                    </div>
                </div>
                <div class="card-footer border-0 bg-transparent">
                    <div class="row">
                        <div class="col-4 border-right-1 pt-3">
                            <a class="text-center d-block text-muted" href="javascript:void()">
                                <i class="fa fa-star gradient-1-text" aria-hidden="true"></i>
                                <p class="">Star</p>
                            </a>
                        </div>
                        <div class="col-4 border-right-1 pt-3"><a class="text-center d-block text-muted" href="javascript:void()">
                            <i class="fa fa-heart gradient-3-text"></i>
                                <p class="">Like</p>
                            </a>
                        </div>
                        <div class="col-4 pt-3"><a class="text-center d-block text-muted" href="javascript:void()">
                            <i class="fa fa-envelope gradient-4-text"></i>
                                <p class="">Email</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Petunjuk Pengisian Formulir</h4>
                    <h5>1.Silahkan klik menu Formulir</h5>
                </div>
            </div>
        </div>
</div>
@endsection