@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Profile")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
            enctype="multipart/form-data">
            @if($errors->any())
            @include('alerts.errors',['Errors occoured'])
            @endif

              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Name")}}</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', auth()->user()->email) }}">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>

          <div class="card-header">
            <h5 class="title">{{__("Password")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
              @csrf
              @method('put')
              @include('alerts.success', ['key' => 'password_status'])
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" Current Password")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Current Password') }}" type="password"  required>
                    @include('alerts.feedback', ['field' => 'old_password'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__(" New password")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" type="password" name="password" required>
                    @include('alerts.feedback', ['field' => 'password'])
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-7 pr-1">
                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                  <label>{{__(" Confirm New Password")}}</label>
                  <input class="form-control" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation" required>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <button type="submit" class="btn btn-primary btn-round ">{{__('Change Password')}}</button>
            </div>
          </form>
        </div>

      <!-- ///////////////////////////////////////////////// adding of the two forms//////////// -->
        <hr class="half-rule"/>
        <div class="row ml-auto mr-auto">
          <div class="col-lg-8 ">
            <div class="row">
              <div class="col-md-6">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#plasmaDonor"><i class="float-left now-ui-icons ui-2_favourite-28"></i>Plasma Donors</button>
              </div>
              
              <div class="col-md-6">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#oxygenDonor"><i class="float-left now-ui-icons health_ambulance"></i>Oxygen Donors</button>
              </div>
            </div>
          </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////// -->
        
        <!-- Modal for the plasma donors -->
        @php
          $user_details = DB::table('plasma_donors')->where('userid','=',auth()->id())->first();
        @endphp
        <div class="modal fade" id="plasmaDonor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Plasma Donor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form method="post" action="{{ route('plasma') }}" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                </div>
                  <div class="row">
                      <div class="col-md-7 pr-1">
                          <div class="form-group">
                              <label>{{__(" First Name")}}</label>
                                  <input type="text" name="fname" class="form-control" value="{{$user_details != null ? $user_details->fname : '' }}">
                                  @include('alerts.feedback', ['field' => 'fname'])
                          </div>
                      </div>
                      <div class="col-md-7 pr-1">
                          <div class="form-group">
                              <label>{{__("Last Name")}}</label>
                                  <input type="text" name="lname" class="form-control" value="{{$user_details != null ? $user_details->lname : '' }}">
                                  @include('alerts.feedback', ['field' => 'lname'])
                          </div>
                      </div>
                  </div>


                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Contact Number")}}</label>
                          <input type="text" name="contactno" class="form-control" value="{{$user_details != null ? $user_details->contactno : '' }}">
                          @include('alerts.feedback', ['field' => 'contactNumber'])
                      </div>
                    </div>
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__("Gender")}}</label>
                          <input type="text" name="gender" class="form-control" value="{{$user_details != null ? $user_details->gender : '' }}">
                          @include('alerts.feedback', ['field' => 'gender'])
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__("Address")}}</label>
                          <input type="text" name="address" class="form-control" value="{{$user_details != null ? $user_details->address : '' }}">
                          @include('alerts.feedback', ['field' => 'address'])
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__("City")}}</label>
                          <input type="text" name="city" class="form-control" value="{{$user_details != null ? $user_details->city : '' }}">
                          @include('alerts.feedback', ['field' => 'city'])
                      </div>
                    </div>
                   </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">State</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref" name="state">
                          
                          <option selected value="{{$user_details != null ? $user_details->state : '' }}">{{$user_details != null ? $user_details->state : '' }}</option>
                          
                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                          <option value="Assam">Assam</option>
                          <option value="Bihar">	Bihar</option>
                          <option value="Chhattisgarh">Chhattisgarh</option>
                          <option value="Goa">Goa</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerala">Kerala</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Odisha">Odisha</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Rajasthan">Rajasthan</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Telangana">Telangana</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="Uttarakhand">Uttarakhand</option>
                          <option value="West Bengal">West Bengal</option>
                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                          <option value="Chandigarh">Chandigarh</option>
                          <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                          <option value="Daman and Diu">Daman and Diu</option>
                          <option value="Delhi">Delhi</option>
                          <option value="Lakshadweep">Lakshadweep</option>
                          <option value="Pondicherry">Pondicherry</option>
                        </select>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Blood Group</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref" name="bloodgroup">
                        
                          <option selected value="{{$user_details != null ? $user_details->bloodgroup : '' }}">{{$user_details != null ? $user_details->bloodgroup : '' }}</option>
                          <option >Choose...</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                        </select>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Was your COVID-19 diagnosis confirmed by a lab test, such as a nasal or oral swab?</label>
                        <select name="confirm" class="custom-select mr-sm-2" id="inlineFormCustomSelectPref">
                          <option selected value="{{$user_details != null ? $user_details->confirm : '' }}">{{$user_details != null ? $user_details->confirm : '' }}</option>
                          <option >Choose...</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          <option value="Don't Know">Don't Know</option>
                        </select>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref"> Has it been at least 14 days since the last time you had symptoms from COVID-19?</label>
                        <select name="symptoms" class="custom-select mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected value="{{$user_details != null ? $user_details->symptoms : '' }}">{{$user_details != null ? $user_details->symptoms : '' }}</option>
                          <option>Choose...</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Have you been tested for COVID-19 after your recovery to document that you no longer have the virus?</label>
                        <select name="novirus" class="custom-select mr-sm-2" id="inlineFormCustomSelectPref">
                          <option selected value="{{$user_details != null ? $user_details->novirus : '' }}">{{$user_details != null ? $user_details->novirus : '' }}</option>             
                          <option>Choose...</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref"> If you have been tested for COVID-19 at any point during your illness, do you consent that we contact your test center(s) on your behalf to obtain a record of this test(s)?</label>
                        <select name="consent" class="custom-select mr-sm-2" id="inlineFormCustomSelectPref">
                          <option selected value="{{$user_details != null ? $user_details->consent : '' }}">{{$user_details != null ? $user_details->consent : '' }}</option>
                          <option>Choose...</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Currently Available</label>
                        <select name="available" class="custom-select mr-sm-2" id="inlineFormCustomSelectPref">
                          <option selected value="{{$user_details != null ? $user_details->available : '' }}">{{$user_details != null ? $user_details->available : '' }}</option>
                          <option>Choose...</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div> 
                  </div>

              <!-- </form> -->


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal -->
        @php
          $org_details = DB::table('oxygen_donors')->where('userid','=',auth()->id())->first();
        @endphp

        <div class="modal fade" id="oxygenDonor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Oxygen Cylinder Donors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  
                  <form method="post" action="{{ route('oxygen') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    </div>
                      <div class="row">
                          <div class="col-md-7 pr-1">
                              <div class="form-group">
                                  <label>{{__(" First Name")}}</label>
                                      <input type="text" name="fname" class="form-control" value="{{$org_details != null ? $org_details->fname : '' }}">
                                      @include('alerts.feedback', ['field' => 'fname'])
                              </div>
                          </div>
                          <div class="col-md-7 pr-1">
                              <div class="form-group">
                                  <label>{{__("Last Name")}}</label>
                                      <input type="text" name="lname" class="form-control" value="{{$org_details != null ? $org_details->lname : '' }}">
                                      @include('alerts.feedback', ['field' => 'lname'])
                              </div>
                          </div>
                      </div>


                      <div class="row">
                        <div class="col-md-7 pr-1">
                          <div class="form-group">
                            <label>{{__(" Organization Number")}}</label>
                              <input type="text" name="orgname" class="form-control" value="{{$org_details != null ? $org_details->orgname : '' }}">
                              @include('alerts.feedback', ['field' => 'orgname'])
                          </div>
                        </div>
                        <div class="col-md-7 pr-1">
                          <div class="form-group">
                            <label>{{__("Quantity")}}</label>
                              <input type="number" name="quantity" class="form-control" value="{{ $org_details != null ? $org_details->quantity : ''  }}">
                              @include('alerts.feedback', ['field' => 'quantity'])
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7 pr-1">
                          <div class="form-group">
                            <label>{{__("Address")}}</label>
                              <input type="text" name="address" class="form-control" value="{{ $org_details != null ? $org_details->address : ''  }}">
                              @include('alerts.feedback', ['field' => 'address'])
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-7 pr-1">
                          <div class="form-group">
                            <label>{{__(" Contact Number")}}</label>
                              <input type="text" name="contactno" class="form-control" value="{{ $org_details != null ? $org_details->contactno : ''  }}">
                              @include('alerts.feedback', ['field' => 'contactno'])
                          </div>
                        </div>
                      </div>  
                      
                      <div class="row">
                        <div class="col-md-7 pr-1">
                          <div class="form-group">
                            <label>{{__("City")}}</label>
                              <input type="text" name="city" class="form-control" value="{{$org_details != null ? $org_details->city : ''   }}">
                              @include('alerts.feedback', ['field' => 'city'])
                          </div>
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-md-7 pr-1">
                            <div class="form-group">
                              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">State</label>
                              <select name="state" class="custom-select mr-sm-2" id="inlineFormCustomSelectPref">
                                <option selected value="{{$org_details != null ? $org_details->state : ''   }}">{{$org_details != null ? $org_details->state : ''   }}</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">	Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Pondicherry">Pondicherry</option>
                              </select>
                            </div>
                          </div> 
                        </div>
                  <!-- </form> -->


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
          

      </div>
    </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                <h5 class="title">{{ auth()->user()->name }}</h5>
              </a>
              <p class="description">
                  {{ auth()->user()->email }}
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection