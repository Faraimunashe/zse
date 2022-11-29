<x-app-layout>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Recent Notices</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <div class="input-group-btn">
                                <a href="{{route('admin-notice')}}" class="btn btn-primary">
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
                            <th>Title</th>
                            <th>Content</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($notices as $item)
                            <tr>
                                <td>
                                    @php
                                        $count++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->content}}</td>
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
