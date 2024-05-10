@extends('layouts.frontend')
@section('css')
@endsection
@section('scripts')
@endsection
@section('content')
    <div class="section-overlapping">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto px-0">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5">
        <div class="container">
            <div class="row"></div>
        </div>
    </div>
    <div class="pt-0 pb-0 mb-5 mt-5">
    </div>
    <div class="py-5 text-center" style="">
        <div class="container">

            <div class="bg-white row mb-5 pb-5 shadow w-100 mx-auto" style=" box-shadow: 0px 0px 4px  black;">
                <div class="col-md-12">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-5">
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="col-md-12">
                        <div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <h2>Edit Product</h2>
                                    <form class="text-left" action="{{ route('product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Confirm changes?')">
                                        @csrf
                                        @method('put')


                                        <div class="row mb-3">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Product') }}</label>

                                            <div class="col-md-6">
                                                <input type ="text" class="form-control" id="name" name="name"
                                                    value="{{ $product->name }}" maxlength="200" required>


                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="description"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                            <div class="col-md-6">
                                                <textarea rows="4" type ="text" class="form-control" id="description" name="description" maxlength="200" required>{{ $product->description }}</textarea>

                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="image_name"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <input type="file" id="image_name" name="image_name" accept="image/*">
                                                @error('image_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @if ($product->image_name)
                                            <div class="row mb-3">
                                                <label class="col-md-4 col-form-label text-md-end">{{ __('Current Image') }}</label>
                                                <div class="col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('storage/images/' . $product->image_name) }}"
                                                        alt="image not found" style="min-width: 150px; max-width: 250px;">
                                                </div>
                                            </div>
                                        @endif


                                        <div class="row mb-3">
                                            <label for="price"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                                            <div class="col-md-6">
                                                <input rows="4" type ="number" class="form-control" id="price"
                                                    name="price" step="0.01" value="{{ $product->price }}" required>

                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        
                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary"><b>
                                                        {{ __('Apply') }}
                                                    </b></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
