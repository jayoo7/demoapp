@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2>UPDATE PRODUCT</h2>
            </center>

            <form action="{{ url('/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH" />
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label>Name</label>
                            <input type="text" class="form-control" name="description" value="@if(old('description')) {{ old('description') }} @else {{ $product->description }} @endif">
                           
                            @if($errors->has('description'))
                                <span class="help-block">
                                    {!!$errors->first('description')!!}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('gender')) has-error @endif">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option @if(old('gender') == "Men's") selected @elseif($product->gender == "Men's") selected @endif value="Men's">Male</option>
                                <option @if(old('gender') == "Women's") selected @elseif($product->gender == "Women's") selected @endif value="Women's">Female</option>
                            </select>
                            @if($errors->has('gender'))
                                <span class="help-block">
                                    {!!$errors->first('gender')!!}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('price')) has-error @endif">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="@if(old('price')) {{ old('price') }} @else {{ $product->price }} @endif">
                           
                            @if($errors->has('price'))
                                <span class="help-block">
                                    {!!$errors->first('price')!!}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('description2')) has-error @endif">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description2" value="@if(old('description2')) {{ old('description2') }} @else {{ $product->description2 }} @endif">
                           
                            @if($errors->has('description2'))
                                <span class="help-block">
                                    {!!$errors->first('description2')!!}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('color')) has-error @endif">
                            <label>Color</label>
                            <input type="text" class="form-control" name="color" value="@if(old('color')) {{ old('color') }} @else {{ $product->color }} @endif">
                           
                            @if($errors->has('color'))
                                <span class="help-block">
                                    {!!$errors->first('color')!!}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('product_image')) has-error @endif">
                            <label>Image</label>
                            <input type="file" class="form-control" name="product_image">
                           
                            @if($errors->has('product_image'))
                                <span class="help-block">
                                    {!!$errors->first('product_image')!!}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('color')) has-error @endif">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection