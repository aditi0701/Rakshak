@extends('layouts.app', [
    'namePage' => 'Oxygen Table List',
    'class' => 'sidebar-mini',
    'activePage' => 'oxygenTable',
  ])

  
@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  @php
    $donors = DB::table('oxygen_donors')->where('quantity','>',1)
                                        ->get();
    $donor = count($donors);
  @endphp
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Oxygen Cylinder Donors</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Organization
                  </th>
                  <th>
                    State
                  </th>
                  <th>
                    City
                  </th>
                  <th>
                    Address
                  </th>
                  <th>
                    Contact No
                  </th>
                  <th>
                    Quantity
                  </th>
                </thead>
                <tbody id="myTable">
                  @for($i=0; $i<$donor; $i++)
                  <tr>
                    <td>
                      {!! $donors[$i]->fname . ' ' . $donors[$i]->lname !!}
                    </td>
                    <td>
                      {!! $donors[$i]->orgname !!}
                    </td>
                    <td>
                      {!! $donors[$i]->state !!}
                    </td>
                    <td>
                      {!! $donors[$i]->city !!}
                    </td>
                    <td>
                      {!! $donors[$i]->address !!}
                    </td>
                    <td>
                      {!! $donors[$i]->contactno !!}
                    </td>
                    <td >
                      {!! $donors[$i]->quantity !!}
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