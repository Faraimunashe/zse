<x-app-layout>
    <div class="col-12 col-sm-12">
        <div class="card gradient-bottom">
          <div class="card-header">
            <h4>Buy Share Charts</h4>
            <div class="card-header-action dropdown">
              <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
            </div>
          </div>
          <div class="card-body" id="top-5-scroll" style="height: 315px; overflow: hidden; outline: none;" tabindex="2">
            <ul class="list-unstyled list-unstyled-border">
                @foreach ($portifolios as $item)
                    @php
                        $broker = \App\Models\Broker::where('user_id',$item->user_id)->first();
                        //dd($item);
                    @endphp
                    <li class="media">
                        <img class="mr-3 rounded" src="{{asset('assets/img/products/product-3.png')}}" alt="product" width="55">
                        <div class="media-body">
                            <div class="float-right">
                                <div class="font-weight-600 text-muted text-small">{{\App\Models\Share::where('broker_id', $item->broker_id)->count()}} Sold</div>
                            </div>
                            <div class="media-title">
                                <a href="{{route('user-confirm-buying', $item)}}">
                                    {{$broker->name}}
                                </a>
                            </div>
                            <div class="mt-1">
                                <div class="budget-price">
                                    <div class="budget-price-square bg-primary" data-width="61%" style="width: 61%;"></div>
                                    <div class="budget-price-label">${{$item->selling}}</div>
                                </div>
                                <div class="budget-price">
                                    <div class="budget-price-square bg-danger" data-width="38%" style="width: 38%;"></div>
                                    <div class="budget-price-label">${{$item->dividend}}</div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
          </div>
          <div class="card-footer pt-3 d-flex justify-content-center">
            <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-primary" data-width="20" style="width: 20px;"></div>
              <div class="budget-price-label">Selling Price</div>
            </div>
            <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-danger" data-width="20" style="width: 20px;"></div>
              <div class="budget-price-label">Expected Dividends</div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
