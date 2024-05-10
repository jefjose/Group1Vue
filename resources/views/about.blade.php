@extends('layouts.frontend')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    <div class="container">
        <div class="row">
        <div class="col-md-12 mt-5"></div>
            <div class="col-md-12 mx-auto text-center mt-5 pt-5 mb-5 pb-5"> <!-- Added text-center class for center alignment -->
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="img-fluid mt-3 mb-3"
                        style="width: 250px; height: 250px; margin-bottom: 10px; margin-top: 10px; display: inline-block;"> <!-- Added display: inline-block; for centering -->
                <h1 class="text-center">ABOUT US</h1>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h3 style="text-align: center;">Founded on January 4, 2021, during the pandemic, Peachy's
                            Collection began by offering a curated selection of perfumes inspired by iconic branded
                            scents. Over the past three years, Peachy's Collection has expanded its range to include
                            trendy lip tints, creamy powder matte tints, and hanging diffusers for home and car
                            fragrances. This growth has been driven by the brand's commitment to providing high-quality,
                            inclusive products that cater to a diverse customer base.</h3>
                    </div>
                    <div class="col-md-1"></div> <!-- Added for spacing -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
