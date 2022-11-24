<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Shares</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>Broker</th>
                                    <th>Bought At</th>
                                    <th>Dividend</th>
                                    <th>Action</th>
                                </tr>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($shares as $item)
                                    <tr>
                                        <td class="p-0 text-center">
                                            @php
                                                $status = share_status($item->status);
                                                $count++;
                                                echo $count;
                                            @endphp
                                        </td>
                                        <td>{{get_broker($item->broker_id)->name}}</td>
                                        <td>{{$item->buying}}</td>
                                        <td>{{$item->dividend}}</td>
                                        <td>
                                            <a href="{{route('user-share-certificate', $item->id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Share Certificate">
                                                <i class="fas fa-print"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
