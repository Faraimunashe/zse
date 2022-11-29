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
                    @if (is_null($invester))
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Personal Details</h4>
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
                                <form method="POST" action="{{route('user-add-detail')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="sex" class="form-control" required>
                                            <option selected disabled>Selected Disabled</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>National ID</label>
                                        <input type="text" name="natid" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-icon icon-left btn-primary">
                                            <i class="fas fa-plus"></i>
                                            Save Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Personal Details</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" value="{{$invester->name}}" readonly class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input type="text" value="{{$invester->sex}}" readonly class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>National ID</label>
                                        <input type="text" value="{{$invester->natid}}" readonly class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" value="{{$invester->phone}}" readonly class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" value="{{$invester->address}}" class="form-control" readonly required>
                                    </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
