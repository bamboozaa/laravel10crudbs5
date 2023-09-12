@extends('products.layout')

@section('content')
    <div class="row">
        <div class="d-flex my-3">
            <div class="me-auto">
                <h2>Laravel 10 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="ms-auto">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tbody>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td class="text-nowrap">{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td class="text-nowrap">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>

    {!! $products->links() !!}
@endsection
