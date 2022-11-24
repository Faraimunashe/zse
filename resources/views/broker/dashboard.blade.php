<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Invester Details</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                        @php
                            //$count = 0;
                        @endphp
                        @foreach ($investments as $item)
                        <li class="media">
                            @php
                                $status = share_status($item->status);
                                $invester = get_invester($item->user_id);
                            @endphp
                            <img alt="image" class="mr-3 rounded-circle" src="{{asset('assets/img/profile.png')}}" width="50">
                            <div class="media-body">
                                <div class="media-title">{{$invester->name}}</div>
                                <div class="text-job text-muted">invester</div>
                            </div>
                            <div class="media-items">
                                <div class="media-item">
                                <div class="media-value">${{$item->buying}}</div>
                                <div class="media-label">Share</div>
                                </div>
                                <div class="media-item">
                                <div class="media-value">${{$item->dividend}}</div>
                                <div class="media-label">Dividend</div>
                                </div>
                                <div class="media-item">
                                <div class="media-value">{{$item->created_at}}</div>
                                <div class="media-label">Date</div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
