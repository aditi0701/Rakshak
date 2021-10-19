@extends('layouts.app', [
    'namePage' => 'Plasma Table List',
    'class' => 'sidebar-mini',
    'activePage' => 'plasmaTable',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
  @php
    $donors = DB::table('plasma_donors')->where('confirm','=','Yes')
                                        ->where('symptoms','=','Yes')
                                        ->where('novirus','=','Yes')
                                        ->where('available','=','Yes')
                                        ->get();
    $donor = count($donors);
  @endphp
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Plasma Donors</h4>
          </div>

        
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    State
                  </th>
                  <th>
                    City
                  </th>
                  <th>
                    Contact No
                  </th>
                  <th>
                    Blood Group
                  </th>
                </thead>
                <tbody id="myTable">
                  @for($i=0; $i<$donor; $i++)
                  <tr>
                    <td>
                      {!! $donors[$i]->fname . ' ' . $donors[$i]->lname !!}
                    </td>
                    <td>
                      {!! $donors[$i]->state !!}
                    </td>
                    <td>
                      {!! $donors[$i]->city !!}
                    </td>
                    <td>
                      {!! $donors[$i]->contactno !!}
                    </td>
                    <td >
                      {!! $donors[$i]->bloodgroup !!}
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection