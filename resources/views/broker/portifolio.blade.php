<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Old Indices</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>Selling</th>
                                    <th>Dividend</th>
                                    <th>Created At</th>
                                </tr>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($portifolios as $item)
                                    @if ($count == 0)
                                        <tr>
                                            <td class="p-0 text-center">
                                                @php
                                                    $count++;
                                                    echo $count;
                                                @endphp
                                            </td>
                                            <td>{{$item->selling}}</td>
                                            <td>{{$item->dividend}}</td>
                                            <td>
                                                <span class="badge badge-success">{{$item->created_at}}</span>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="p-0 text-center">
                                                @php
                                                    $count++;
                                                    echo $count;
                                                @endphp
                                            </td>
                                            <td>{{$item->selling}}</td>
                                            <td>{{$item->dividend}}</td>
                                            <td>
                                                <span class="badge badge-dark">{{$item->created_at}}</span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
