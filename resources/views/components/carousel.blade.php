<style>
    #carouselExampleIndicators {
        width: 100%;
        position: relative;
        top: -24px;
        height: 400px; 
    }
    #carouselExampleIndicators .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide carousel-fade my-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="height: 100%;"> 
        <div class="carousel-item active" data-bs-interval="1500">
            <img src="{{url('assest/carousel_1.jpg')}}" class="d-block w-100" alt="First img">
        </div>
        <div class="carousel-item" data-bs-interval="1500">
            <img src="{{url('assest/carousel_2.jpg')}}" class="d-block w-100" alt="Second img">
        </div>
        <div class="carousel-item" data-bs-interval="1500">
            <img src="{{url('assest/carousel_3.jpg')}}" class="d-block w-100" alt="Third img">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
