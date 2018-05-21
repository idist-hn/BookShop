<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @php $list_category = \App\Category::all(); @endphp
    @foreach($list_category as $category)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a  href="{{ route("front.category.get",['id'=>$category->id]) }}">
                    {{ $category->name }}
                </a>
            </h4>
        </div>
    </div>
    @endforeach

</div><!--/category-products-->

{{--<div class="brands_products"><!--brands_products-->--}}
    {{--<h2>Brands</h2>--}}
    {{--<div class="brands-name">--}}
        {{--<ul class="nav nav-pills nav-stacked">--}}
            {{--<li><a href="{{url('products/brands/acne')}}"> <span class="pull-right">(50)</span>Acne</a></li>--}}
            {{--<li><a href="{{url('products/brands/grune-erde')}}"> <span class="pull-right">(56)</span>Grüne Erde</a></li>--}}
            {{--<li><a href="{{url('products/brands/albiro')}}"> <span class="pull-right">(27)</span>Albiro</a></li>--}}
            {{--<li><a href="{{url('products/brands/ronhill')}}"> <span class="pull-right">(32)</span>Ronhill</a></li>--}}
            {{--<li><a href="{{url('products/brands/oddmolly')}}"> <span class="pull-right">(5)</span>Oddmolly</a></li>--}}
            {{--<li><a href="{{url('products/brands/boudestijn')}}"> <span class="pull-right">(9)</span>Boudestijn</a></li>--}}
            {{--<li><a href="{{url('products/brands/rosch-creative-culture')}}"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</div><!--/brands_products-->--}}

<div class="shipping text-center"><!--shipping-->
    <img src="{{asset('images/home/shipping.jpg')}}" alt="" />
</div><!--/shipping-->