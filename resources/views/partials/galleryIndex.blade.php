<div class="container">
    <div class="subPages home-gallery justify-content-center">
        <h5 class="font-weight-bold justify-content-center">Gallery</h5>
        <a href="gallery/images/{{ $gallery->id }}">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($gallery->images as $image)
                    <div class="text-center carousel-item @if($loop->first) active @endif">
                        <img class="d-block mx-auto img-fluid" src="{{ asset('/'. $image->thumbnail) }}" alt="{{ $image->thumbnail }}">
                        <div class="carousel-caption d-none d-lg-block" style="margin-top: 90%;">
                            <h6>{{ ucfirst($gallery->name) }}</h6>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </a>
    </div>
</div>