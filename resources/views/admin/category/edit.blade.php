@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="row">
       <div class="col-md-12">

            <div class='card  mt-4'>

                <div class ="card-header">
                    <h4>Edit Category
                       <a href="{{url('categories')}}" class="btn btn-warning float-end"> Back </a>
                    </h4>
                </div>

                <div class ="card-body">

                    <form action = "{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text"  value="{{ $category->name}}" class="form-control" name="name" id="name">

                                @if ($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" value="{{ $category->slug}}"  class="form-control" name="slug" id="slug">
                                @if ($errors->has('slug'))
                                  <span class="text-danger">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Description</label>
                                <input type="text" value="{{ $category->description}}" class="form-control" name="description" id="description">

                                @if ($errors->has('description'))
                                 <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif

                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-check-label" for="status">
                                  Status
                                </label>
                                <input class="form-check-input" type="checkbox"{{ $category->status == 1 ?  'checked':''}}  name="status" value="1" id="status">

                                @if ($errors->has('status'))
                                  <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif

                            </div>


                            <div class="col-md-6 mb-3">
                                <div class="col-md-12 mb-3">
                                    <input type="file" name="image" class="form-control">
                                </div>

                                @if ($errors->has('image'))
                                  <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif

                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary"> Submit </button>
                            </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection


