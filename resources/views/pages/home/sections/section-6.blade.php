<style>
    .bg-page6 {
        background-image: url('{{ asset('images/Transfer/bgtranfer.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 70vh;
    }

    .img-car{
        width: 100%;
        height: 50vh;
        image-size: cover;
    }
</style>

<!-- Content Section -->
<main class="bg-page6 d-flex py-5">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                <div class="text-uppercase fs-1 lh-1 mb-3">
                    thailand <br>
                    <span class="text-decoration-underline">tra</span><span>nsfer</span>
                </div>
                <div class="text-muted">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus velit veritatis culpa ducimus quod asperiores accusamus neque quae, consequatur voluptatum?
                </div>
                <div class="btn-view-all my-3 shadow-lg">
                    BOOK NOW
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{asset('images/car/car3.png')}}" alt="car" class="img-car">
            </div>
        </div>
    </div>
</main>
