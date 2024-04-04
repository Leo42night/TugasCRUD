<x-head title="Create Product" />

    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('products.store') }}">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>New Product</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <div class="alert-title">
                                            <h4>Whoops!</h4>
                                        </div>
                                        There are some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <div class="mb-3">
                                    <label class="form-label">Kode</label>
                                    <input type="text" class="form-control" name="kode"
                                        value="{{ old('kode') }}" laceholder="#KODE">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price"
                                        value="{{ old('price') }}" placeholder="Price">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="text" class="form-control" name="stock"
                                        value="{{ old('stock') }}" placeholder="Stock">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Create</button>
                                <a class="btn btn-warning" href="{{ route('index') }}">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
