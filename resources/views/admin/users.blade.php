<x-app-layout>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Users List</h4>
              <div class="card-header-form">
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($users as $item)
                            <tr>
                                <td>
                                    @php
                                        $count++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    {{$item->display_name}}
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
