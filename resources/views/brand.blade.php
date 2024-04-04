<x-head title="Brand" />
<x-nav active="brand" />
<div class="container">
    <h1>Hello, Brand</h1>
    <div class="d-flex flex-wrap justify-content-around">
        @for ($i = 0; $i < 8; $i++)
            <div class="card m-3" style="width: 18rem;">
                <img src="brand.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
            </div>
        @endfor
    </div>
</div>
<x-foot />
