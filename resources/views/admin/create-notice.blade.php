<x-app-layout>
    <style>
        #pakati {
            margin-left: 25%;
            margin-right: 25%;
        }
    </style>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-md-6" id="pakati">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Notice</h4>

                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form method="POST" action="{{route('admin-add-notice')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea rows="4" name="content" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                                        Save Notice
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
