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
                            <h4>Buying Shares from {{$broker->name}}</h4>
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
                            <form method="POST" action="{{route('user-buy-share')}}">
                                @csrf
                                <div class="form-group">
                                    {{-- <label>Broker</label> --}}
                                    <input type="hidden" name="broker_id" class="form-control"  value="{{$broker->id}}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Dividend</label>
                                    <input type="text" name="dividend" class="form-control" value="{{$portifolio->dividend}}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Buy At</label>
                                    <input type="text" name="selling" class="form-control" value="{{$portifolio->selling}}" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Continue
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
