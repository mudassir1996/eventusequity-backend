@extends('layouts.app')
@section('content')
@include('layouts.partials.header')
@include('layouts.partials.sidebar')

<div class="page_title">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="page_title-content">
                    <p class="mb-0">
                        <a href="{{route('clients.index')}}">Clients </a>
                        <span>/</span>
                        <span>Add New Client</span>
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Client</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('clients.store')}}" name="myform" class="personal_validate" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-xl-6">
                                    <label class="mr-sm-2">First Name</label>
                                    <input type="text" class="form-control" required placeholder="John" value="{{old('first_name')}}" name="first_name">
                                    @error('first_name')
                                    <label id="first_name-error" class="error" for="first_name">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-6">
                                    <label class="mr-sm-2">Last Name</label>
                                    <input type="text" class="form-control" required placeholder="Doe" value="{{old('last_name')}}" name="last_name">
                                    @error('last_name')
                                    <label id="last_name-error" class="error" for="last_name">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-6">
                                    <label class="mr-sm-2">Email</label>
                                    <input type="email" class="form-control" required placeholder="hello@example.com" value="{{old('email')}}" name="email">
                                    @error('email')
                                        <label id="email-error" class="error" for="email">{{ $message }}</label>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-xl-6">
                                    <label class="mr-sm-2">Password</label>
                                    <div class="input-group mb-3">
                                       
                                        <input type="text" class="form-control gen-password" required placeholder="********" value="{{old('password')}}" name="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="generate">Generate</span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <label id="password-error" class="error" for="password">{{ $message }}</label>
                                    @enderror
                                    
                                </div>

                                <div class="form-group col-xl-12 mt-3">
                                    <div class="media align-items-center mb-3">
                                        <img class="mr-3 rounded-circle mr-0 mr-sm-3"
                                            src="{{asset('images/placeholder.jpg')}}" id="uploaded" width="55" height="55" alt="">
                                        <div class="media-body">
                                            {{-- <h4 class="mb-0"></h4> --}}
                                            <p class="mb-0">
                                                Supported files: jpg, png, svg
                                                <br>
                                                Max file size is 20mb
                                            </p>
                                        </div>
                                    </div>
                                    <div class="file-upload-wrapper" data-text="Change Photo">
                                        <input name="profile_img" type="file"
                                            class="file-upload-field" value="">
                                    </div>
                                </div>
                                <div class="form-group text-right col-12">
                                    <button class="btn btn-primary pl-5 pr-5">Save Client</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('vendor/validator/jquery.validate.js')}}"></script>
<script src="{{asset('vendor/validator/validator-init.js')}}"></script>
@endsection

