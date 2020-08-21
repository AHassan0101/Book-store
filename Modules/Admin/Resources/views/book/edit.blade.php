@extends('admin::layouts.master')
@section('extra-head')
    <link rel="stylesheet" href="{{ URL::to('app-assets/css/pages/dropify/css/dropify.min.css') }}">
@stop
@section('content')
    <div class="content-body">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Books</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.books')}}">Books</a></li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('admin.books.update') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Edit Book</h4>
                                        <input type="hidden" name="id" value="{{ $book->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control" for="name">Name</label>
                                                    <input type="text" id="name" class="form-control"
                                                           value="{{ $book->name }}" placeholder="Name" name="name"
                                                           required style="text-transform: capitalize;">
                                                    @if($errors->has('name'))
                                                        <span id="name-error1"
                                                              class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control" for="category_id">Categories</label>
                                                    <div id="selectLevel2">
                                                        <select name="category_id[]" id="category_id" multiple required
                                                                class="select2 form-control" style="width: 100%">
                                                            @foreach ($categories as $category)
                                                                <option
                                                                    @foreach($book->categories as $bookCategories)
                                                                    @if($bookCategories->id == $category->id) selected
                                                                    @endif
                                                                    @endforeach
                                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->has('category_id'))
                                                        <span id="name-error1"
                                                              class="text-danger">{{ $errors->first('category_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control" for="price">Price</label>
                                                    <input type="number" min="0" id="price" class="form-control"
                                                           placeholder="Price" name="price" required
                                                           value="{{ $book->price }}">
                                                    @if($errors->has('price'))
                                                        <span id="name-error1"
                                                              class="text-danger">{{ $errors->first('price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control" for="author">Author</label>
                                                    <input type="text" id="author" class="form-control"
                                                           value="{{ $book->author }}"
                                                           placeholder="Author" name="author" required>
                                                    @if($errors->has('author'))
                                                        <span id="name-error1"
                                                              class="text-danger">{{ $errors->first('author') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="image">Base Image</label>
                                                    <input type="file" class="dropify" data-height="200"
                                                           data-default-file="{{ URL::to($book->image) }}"
                                                           name="image"/>
                                                    @if($errors->has('image'))
                                                        <span id="error"
                                                              class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="extra_images">Extra Images</label>
                                                    <input type="file" class="form-control"
                                                           name="extra_images[]" multiple/>
                                                    @if($errors->has('extra_images'))
                                                        <span id="error"
                                                              class="text-danger">{{ $errors->first('extra_images') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @foreach($book->images as $bookImage)
                                                <div class="col-md-4">
                                                    <img src="{{ URL::to($bookImage->image) }}"
                                                         style="object-fit: contain" alt="Extra Images of a book"
                                                         width="300" height="150"/>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('extra-script')
    <script src="{{ URL::to('app-assets/css/pages/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ URL::to('app-assets/css/pages/dropify/dropify.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".dropify").dropify();
        });
    </script>
@stop
