@extends('layouts.master')
@section('page_title', 'Student Payments')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-cash2 mr-2"></i> Student Payments</h5>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('payments.select_class') }}">
                @csrf
              <div class="row">
                  <div class="col-md-6 offset-md-3">
                      <div class="row">
                          <!-- <div class="col-md-12"> -->
                              <div class="form-group col-md-12">
                                  <label for="my_class_id" class="col-form-label font-weight-bold">Class:</label>
                                  <select required id="my_class_id" name="my_class_id" class="form-control select">
                                      <option value="">Select Class</option>
                                      @foreach($my_classes as $c)
                                      <option {{ ($selected && $my_class_id == $c->id) ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="duration" class="col-form-label font-weight-bold">Duration:</label>
                                     <select required id="duration" name="duration" class="form-control select">
                                           <option class="duration" value="monthly">Monthly</option>
                                           <option class="duration" value="yearly">Yearly</option>
                                     </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="months" class="col-form-label font-weight-bold">Select Month:</label>
                                    <select required id="months" name="months" class="form-control select monthss">
                                       @foreach($months as $m)
                                            <option value="{{ $loop->index }}">{{ $m }}</option>
                                        @endforeach
                                     </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="year" class="col-form-label font-weight-bold">Select Year:</label>
                                    <select required id="year" name="year" class="form-control select monthss">
                                       @foreach($years as $y)
                                            <option value="{{ $y }}">{{ $y }}</option>
                                        @endforeach
                                     </select>
                                </div>

                                <!-- </div> -->
                                <!-- <div class="col-md-2 mt-4">
                                    <div class="text-right mt-1">
                                        </div> -->
                                        <!-- </div> -->
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                  </div>
              </div>

            </form>
        </div>
    </div>

    <script type='text/javascript'>

        
        $('#duration').on('change', ()=>{
            $duration = document.querySelector('#duration').value;
            console.log($duration)
        })

        $('#my_class_id').on('change', (event) => {
            $.ajax({
                headers: {
                    'Content-Type':'application/json'
                },
                url: "http://127.0.0.1:8000/api/payments/getStudentByClass/" + event.target.value,
                type: "GET",
                success: function (result) {
                    console.log(result);
                },
            });
        })
        
    </script>
    @if($selected)
        <div class="card">
            <div class="card-body">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>ADM_No</th>
                        <th>Payments</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="photo"></td>
                            <td>{{ $s->user->name }}</td>
                            <td>{{ $s->adm_no }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class=" btn btn-danger" data-toggle="dropdown"> Manage Payments <i class="icon-arrow-down5"></i>
                                    </a>
                            <div class="dropdown-menu dropdown-menu-left">
                                <a href="{{ route('payments.invoice', [Qs::hash($s->user_id)]) }}" class="dropdown-item">All Payments</a>
                                @foreach(Pay::getYears($s->user_id) as $py)
                                @if($py)
                                    <a href="{{ route('payments.invoice', [Qs::hash($s->user_id), $py]) }}" class="dropdown-item">{{ $py }}</a>
                                @endif
                                @endforeach
                            </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
