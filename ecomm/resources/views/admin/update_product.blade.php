<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <base href="/public">

    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 50px;
        }

        .font_size {
            font-size: 30px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')


        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session()->get('message') }}
                    </div>
                @endif


                <div class="div_center">
                    <h1 class="font_size">Update Product</h1>

                    <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_design">
                            <label>Product Title:</label>
                            <input type="text" name="title" class="text_color" placeholder="Write a title"
                                value="{{ $product->title }}" required>
                        </div>

                        <div class="div_design">
                            <label>Product Description:</label>
                            <input type="text" name="description" class="text_color"
                                placeholder="Write a description" value="{{ $product->description }}" required>
                        </div>

                        <div class="div_design">
                            <label>Product Quantity:</label>
                            <input type="number" name="quantity" class="text_color" min="0"
                                placeholder="Write a quantity" value="{{ $product->quantity }}" required>
                        </div>

                        <div class="div_design">
                            <label>Product Price:</label>
                            <input type="number" name="price" class="text_color" placeholder="Write a price"
                                value="{{ $product->price }}" required>
                        </div>

                        <div class="div_design">
                            <label>Discount_Price:</label>
                            <input type="number" name="dis_price" class="text_color"
                                placeholder="Write a discounted-price" value="{{ $product->dis_price }}">
                        </div>

                        <div class="div_design">
                            <label>Product Category:</label>
                            <select name="category" class="text_color" required>
                                <option value="{{ $product->category }}" selected>{{ $product->category }}</option>

                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach


                            </select>
                        </div>

                        <div class="div_design">
                            <label>Current Product Image:</label>
                            <img style="margin:auto;" height="100" width="100"
                                src="/product/{{ $product->image }}" alt="">
                        </div>

                        <div class="div_design">
                            <label>Change Product Image:</label>
                            <input type="file" name="image">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Update product" class="btn btn-primary">
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
