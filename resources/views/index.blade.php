<x-head title="Home" />
<x-nav active="home" />

    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('products.store') }}">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header d-flex justify-content-between">
                                <h3>List Product</h3>
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown link
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Brand</a></li>
                                            <li><a class="dropdown-item" href="#">Categories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->kode }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                                        class="btn btn-secondary btn-sm">edit</a>
                                                    <a href="#" class="btn btn-sm btn-danger"
                                                        onclick="event.preventDefault();
                                                    if (confirm('Do you want to remove this?')) {document.getElementById('delete-row-{{ $product->id }}').submit();}">
                                                        delete
                                                    </a>
                                                    <form id="delete-row-{{ $product->id }}"
                                                        action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                                        method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    No record found!
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="{{ route('products.create') }}">New Product</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<x-foot/>
