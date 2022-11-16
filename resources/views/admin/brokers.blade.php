<x-app-layout>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Brokers List</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <div class="input-group-btn">
                        <a href="{{route('admin-broker-add')}}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($brokers as $item)
                            <tr>
                                <td>
                                    @php
                                        $count++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    {{$item->address}}
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
