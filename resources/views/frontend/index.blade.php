@extends('layouts.app')
@section('title', 'Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
        @foreach($sliders as $key=>$sliderItem)
            <div class="carousel-item {{$key==0 ? 'active': ''}}">
                @if($sliderItem->image)
                    <img src="{{asset("$sliderItem->image")}}" class="d-block w-100" alt="...">
                @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                               {!!$sliderItem->title!!}
                            </h1>
                            <p>
                               {!!  $sliderItem->description!!}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                <h4>Welcome To Ecommerce</h4>
                    <div class="underline"></div>
                    <p>Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit.
                        Aperiam dolores expedita illum non perspiciatis placeat quae repudiandae rerum sunt.
                        Ab adipisci aliquam aliquid architecto autem culpa deleniti dicta dolores earum eius eligendi eos est illum,
                        inventore minima molestiae molestias neque nobis officiis optio perspiciatis possimus temporibus,
                        totam voluptas voluptates. A adipisci at atque blanditiis eius enim et ex excepturi expedita facere id illum incidunt,
                        inventore itaque iusto laudantium maxime natus necessitatibus nemo optio pariatur placeat quasi quia quibusdam sunt temporibus tenetur velit.
                        Animi dignissimos iure possimus! Ad adipisci amet architecto, cum cupiditate delectus,
                        iste maiores necessitatibus numquam odio sint tempora temporibus ut voluptate voluptates.</p>
                </div>
            </div>
        </div>
    </div>


<div class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline"></div>
            </div>
            @if($trendingProducts)
            <div class="col-md-12">
                @foreach($trendingProducts as $productItem)
                    <div class="item">
                    <div class="owl-carousel owl-theme four-carousel">
                        <div class="product-card">
                            <div class="product-card-img">
                                    <label class="stock bg-danger">NEW</label>
                                @if($productItem->productImages->count() > 0)
                                    <a href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">${{ $productItem->selling_price }}</span>
                                    <span class="original-price">${{ $productItem->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>NO Products Available  </h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>



<div class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>New Arrivals
                    <a href="{{url('new-arrivals')}}" class="btn btn-warning float-end">View More</a>
                </h4>
                <div class="underline"></div>
            </div>
            @if($newArrivalIsProducts)
                <div class="col-md-12">
                    @foreach($newArrivalIsProducts as $productItem)
                        <div class="item">
                            <div class="owl-carousel owl-theme four-carousel">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">NEW</label>
                                        @if($productItem->productImages->count() > 0)
                                            <a href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $productItem->selling_price }}</span>
                                            <span class="original-price">${{ $productItem->original_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>NO New Arrivals Available  </h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>




<div class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4> Featured Products
                <a href="{{url('featured-products')}}" class="btn btn-warning float-end">View More</a>
                </h4>

                <div class="underline mb-4"></div>
            </div>
            @if($featuredProducts)
                <div class="col-md-12">
                    @foreach($featuredProducts as $productItem)
                        <div class="item">
                            <div class="owl-carousel owl-theme four-carousel">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">NEW</label>
                                        @if($productItem->productImages->count() > 0)
                                            <a href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $productItem->selling_price }}</span>
                                            <span class="original-price">${{ $productItem->original_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>NO  Featured Products Available  </h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('.four-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endsection
