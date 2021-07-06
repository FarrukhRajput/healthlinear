@extends('layouts.dashboard')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>{{ __('All Salts') }}</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saltCreate">
                        Create
                    </button>
                </div>


                <div class="card-body">
                    <x-form-success :message="session('message')"/>
                    <x-form-errors :errors="$errors"/>

                    {!! $dataTable->table() !!}

                    {{-- <div class="table-responsive">
                        <table class="table table-hover" id="users-table">
                            <thead>
                              <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                    {{-- @foreach ($salts as $salt)
                                        <tr>
                                            <td class="text-center">{{$salt->id}}</td>
                                            <td class="text-center">{{$salt->name}}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-secondary btn-sm mr-2 d-inline-block" onclick="editForm({{$salts}} , {{$salt->id}})">Edit</button>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal For Creating -->
<div class="modal fade" id="saltCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Salt </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('salt.store')}}" method="POST">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="d-block">Salt Name</label>
                            <input name="name" type="text" class="form-control" required >
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" >Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal For Editing -->

{{-- @if (count($salts) > 0) --}}
<div class="modal fade" id="saltEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Symptom</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="saltEditForm"  method="POST">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="d-block">Symptom Name</label>
                            <input name="name" type="text" class="form-control" required >
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" >Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
</div>
{{-- @endif --}}


@endsection


@section('script')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>

    {!! $dataTable->scripts() !!}



    <script>
        const form = $('#saltEditForm');
        const formInputs = $('#saltEditForm input');

        function editForm(salt){

            updateUrl = "{{url('/salt')}}"+'/'+salt.id;

            form.attr('action' , updateUrl );

            formInputs.each( ( _ ,input) => {
                if(input.name == 'name'){
                    input.value = salt.name;
                }
            });

            $('#saltEdit').modal('show');

        }

    </script>
@endsection
