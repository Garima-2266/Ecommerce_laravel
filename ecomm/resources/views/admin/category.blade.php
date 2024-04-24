<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_fontsize {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_txtcolor {
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session()->get('message') }}
                    </div>
                @endif


                <div class="div_center">
                    <h2 class="h2_fontsize">Add Category</h2>
                    <form action="{{ url('/add_category') }}" method="POST">

                        @csrf
                        <input type="text" class="input_txtcolor" name="category" placeholder="Write Category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                </div>
                <table class="center">
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>


                    @foreach ($data as $category)

                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="#" class="btn btn-danger" onclick="deleteCategory({{ $category->id }})">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>
<script>
    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            fetch('{{ url("delete_category") }}/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                if (response.ok) {
                    return new Promise(resolve => setTimeout(resolve, 600));
                } else {
                    console.error('Error deleting category');
                }
            }).then(() => {
                // Reload the page after a short delay
                window.location.reload();
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    }
</script>
</html>

