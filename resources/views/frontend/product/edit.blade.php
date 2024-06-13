@extends('frontend.layouts.app')
@section('content')
<div class="col">
    <div class="blog-post-area">
        <h2 class="title text-center">New Product</h2>
        <div class="signup-form"><!--sign up form-->
            <h2>Product ID: {{ $product -> id}} </h2>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="{{ $product -> name}}" name="name" value="{{ $product -> name}}"/>
                <input type="number" placeholder="{{ $product -> price}}" name="price" value="{{ $product -> price}}"/>



                <select name="id_category" placeholder="Please choose category">
                    <option value="{{ $product -> id_category}}" disabled selected hidden>Your Category: {{ $product -> id_category}}</option>
                    <option value="T-Shirt">T-Shirt</option>
                    <option value="short">Short</option>
                    <option value="jean">Jeans</option>

                </select>

                <select name="id_brand"  placeholder="Please choose brand">
                    <option value="{{ $product -> id_brand}}" disabled selected hidden>Your brand: {{ $product -> id_brand}}</option>
                    <option value="Nike">Nike</option>
                    <option value="Adidas">Adidas</option>
                </select>


                <select name="sale" id="sale">
                    <option value="{{ $product -> sale}}" disabled selected hidden>Your Sale: {{ $product -> sale}}%</option>

                    <option value="1">Fix sale price</option>
                </select>
                <div id="salePriceField" style="display: none;">
                    <div class="input-group">
                        <input type="number" name="sale" id="sales" min="0" step="any" value="{{ $product -> sale}}"> 
                        <p>%</p>
                    </div>
                </div>

                <input type="text" placeholder="{{ $product -> company}}" name="company" value="{{ $product -> company}}" />


                <input type="file" name="image[]" multiple>
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif

                @php
                $images = json_decode($product->image);
                @endphp
                <table>
                    <thead>
                        <tr class="cart_menu">
                            @foreach ($images as $key => $image)
                            <td>
                                <img src="{{ asset('upload/product/'. $image) }}" alt="Product Image" style="height: 95px; width: 70px;">
                            </td>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($images as $key => $image)
                            <td>
                                <input type="checkbox" name="selected_images[]" value="{{ $image }}">
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>


                <textarea placeholder="Detail" name="detail" >{{ $product -> detail}}</textarea>
                

                <button type="submit" name="Update" class="btn btn-default">Update</button>
            </form> <br>
        </div>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sale').change(function() {
            if ($(this).val() === '1') {
                $('#salePriceField').show();
            } else {
                $('#salePriceField').hide();
                
            }
        });
    });
</script>
@endsection




