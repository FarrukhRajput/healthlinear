@extends('layouts.dashboard')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>{{ __('All Symptoms') }}</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#symptomCreate">
                        Create
                    </button>
                </div>


                <div class="card-body">
                    <x-form-success :message="session('message')"/>
                    <x-form-errors :errors="$errors"/>

                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal For Creating -->
<div class="modal fade" id="symptomCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Symptom </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('symptom.store')}}" method="POST">
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

<!-- Modal For Editing -->


<div class="modal fade" id="symptomEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Symptom</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="symptomEditForm" method="POST">
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


@endsection


@section('script')

    {!! $dataTable->scripts() !!}

    <script>
        const form = $('#symptomEditForm');
        const formInputs = $('#symptomEditForm input');

        function editForm(item){

            updateUrl = "{{url('/symptom')}}"+'/'+item.id;

            form.attr('action' , updateUrl );

            formInputs.each( ( _ ,input) => {
                if(input.name == 'name'){
                    input.value = item.name;
                }
            });

            $('#symptomEdit').modal('show');
        }

    </script>
@endsection
