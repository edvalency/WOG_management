@extends('layouts.main')
@section('gen')
    active
@endsection
@section('memlist')
    active
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
     <!-- single mmeber details -->
      <!-- <div class="col-6 col-xs-6 container" > -->
        <div class="card card-primary container col-xs-6" id='onemem'>
          <div class="d-flex mt-2">
            <a class="btn col-2 btn-outline-primary mt-2" id='back' href='{{ route('members.show') }}'>Return</a>
            <a class="btn col-2 btn-outline-warning mt-2 ml-4" id='update'>Update</a>
          </div>
            
              <p class='font-30 align-self-center font-weight-bold mt-5' id='memberName'></p>
              <div class="card-body d-grid justify-items-center align-items-center">
                <div class="d-flex justify-content-center">
                  <img src="/profileImg/{{ $data->profileImg }}" alt="user image" style="width:200px;height:200px;border-radius:100px;">
                </div>
                <p class='d-flex font-30 justify-content-center font-weight-bold mt-5' id='memberName'>{{ $data->fullname }}</p>
                <div class="col-xs-6 mgl justify-content-center align-items-center">
                  {{-- <p id="text">{{ $fullname }}</p> --}}
                  <table class="table col-xs-6 col-sm-12"  >
                    <tbody id="memtable">
                      {{-- @foreach ($data) --}}
                      <tr>
                        <td class="fnt">Date of Birth</td>
                        <td class="fnt">{{ $data->dob }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Contact</td>
                        <td class="fnt">{{ $data->contact }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Gender</td>
                        <td class="fnt">{{ $data->gender }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Hometown</td>
                        <td class="fnt">{{ $data->hometown }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Marital Status</td>
                        <td class="fnt">{{ $data->marital }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Region</td>
                        <td class="fnt">{{ $data->region }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Residence</td>
                        <td class="fnt">{{ $data->residence }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Email</td>
                        <td class="fnt">{{ $data->email }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Father's Name</td>
                        <td class="fnt">{{ $data->fathersname }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Father's Status</td>
                        <td class="fnt">{{ $data->fatherstat }}</td>
                      </tr><tr>
                        <td class="fnt">Mother's Name</td>
                        <td class="fnt">{{ $data->mothersname }}</td>
                      </tr><tr>
                        <td class="fnt">Mother's Status</td>
                        <td class="fnt">{{ $data->motherstat }}</td>
                      </tr><tr>
                        <td class="fnt">Next of Kin</td>
                        <td class="fnt">{{ $data->next_of_kin }}</td>
                      </tr><tr>
                        <td class="fnt">Next of Kin Contact</td>
                        <td class="fnt">{{ $data->next_of_kin_contact }}</td>
                      </tr><tr>
                        <td class="fnt">Relation to next of kin</td>
                        <td class="fnt">{{ $data->relation_to_nok }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Email of next of kin</td>
                        <td class="fnt">{{ $data->email_of_nok }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Department</td>
                        <td class="fnt">{{ $data->dept }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Baptism Status</td>
                        <td class="fnt">{{ $data->baptism_stat }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Date of Baptism</td>
                        <td class="fnt">{{ $data->date_baptised }}</td>
                      </tr><tr>
                        <td class="fnt">Year of membership</td>
                        <td class="fnt">{{ $data->yom }}</td>
                      </tr><tr>
                        <td class="fnt">Profession</td>
                        <td class="fnt">{{ $data->profession }}</td>
                      </tr><tr>
                        <td class="fnt">Present Occupation</td>
                        <td class="fnt">{{ $data->present_occupation }}</td>
                      </tr><tr>
                        <td class="fnt">Name of Company</td>
                        <td class="fnt">{{ $data->name_of_company }}</td>
                      </tr><tr>
                        <td class="fnt">Employment Status</td>
                        <td class="fnt">{{ $data->employment_stat}}</td>
                      </tr>
                          
                      {{-- @endforeach --}}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    </div>
    <form class="" method="POST" action="{{ route('member.update') }}" enctype="multipart/form-data" id="changes">
      @csrf
      <div class="col-6 container col-md-6 col-lg-6">
          @include('includes.alerts')
            <div class="card">
                <div class="card-header">
                    <h4>Update Membership form </h4>
                </div>
                <div class="card-body">
                  <input type="text" name="id" value="{{$data->id}}" id="" hidden>
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" class="form-control" value="{{ $data->fullname }}" name="fullname">
                    </div>
                    <div class="row">
                        <div class="form-group col-3 mr-4">
                            <label for="dob" class="d-block">Date of birth</label>
                            <input id="dob" type="date" class="form-control" data-indicator="pwindicator"
                                name="dob" value="{{ $data->dob }}">
                        </div>
                        <div class="form-group ">
                            <label>Phone Number (GH Format)</label>
                            <div class=" ">
                                <input type="tel" name="phone" id="phone" class="form-control" value="{{ $data->contact }}">
                            </div>
                        </div>
                        <div class="form-group col-3 mt-4 mr-2 row ml-3">
                          @if ($data->gender == "Male")
                               <div class="pretty p-default p-round ml-2 mt-2">
                                <input type="radio" name="gender" id="male" value="Male" checked>
                                <label>Male</label>
                            </div>
                            <div class="pretty p-default p-round ml-4 mt-2">
                                <input type="radio" name="gender" id="female" value="Female">
                                <label>Female</label>
                            </div>
                          @else
                          <div class="pretty p-default p-round ml-2 mt-2">
                            <input type="radio" name="gender" id="male" value="Male">
                            <label>Male</label>
                        </div>
                        <div class="pretty p-default p-round ml-4 mt-2">
                            <input type="radio" name="gender" id="female" value="Female" checked>
                            <label>Female</label>
                        </div> 
                          @endif
                           
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-4 mt-2">
                            <label for="hometown">Hometown</label>
                            <input type="text" name="hometown" id="" class="form-control" value="{{ $data->hometown }}">
                        </div>
                        <div class="form-group col-4 mt-2">
                            <label for="region" class="d-block">Region</label>
                            <select name="region" id="" class="form-control">
                                <option value="">Select your region</option>
                                <option value="Oti">Oti</option>
                                <option value="Bono East">Bono East</option>
                                <option value="Ahafo">Ahafo</option>
                                <option value="Bono">Bono</option>
                                <option value="North East">North East</option>
                                <option value="Savannah">Savannah</option>
                                <option value="Western">Western </option>
                                <option value="Western North">Western North</option>
                                <option value="Volta">Volta</option>
                                <option value="Eastern">Eastern</option>
                                <option value="Ashanti">Ashanti</option>
                                <option value="Central">Central</option>
                                <option value="Northern">Northern</option>
                                <option value="Upper East">Upper East</option>
                                <option value="Upper West">Upper West</option>
                            </select>
                        </div>
                        <div class="form-group col-4 mt-2">
                          <label for="">Marital Status</label>
                          <select name="marital" class="form-control" id="">
                              <option value="">Select</option>
                              <option value="Married">Married</option>
                              <option value="Single">Single</option>
                              <option value="Divorced">Divorced</option>
                              <option value="Widowed">Widowed</option>
                          </select>
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="residence"> Place of Residence (Digital Address)</label>
                            <input type="text" name="residence" id="" value="{{ $data->residence }}" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label for="phone">Email</label>
                            <input type="text" name="email" value="{{ $data->email }}" id="" class="form-control">
                        </div>
                    </div>
                    <h5 class="font-18 ">Family Profile</h5>
                    <div class="form-group row mt-4 mb-0">
                        <div class="form-group col-8">
                            <label for="">Father's Name</label>
                            <input type="text" name="fathers_name" value="{{ $data->fathersname }}" id="" class="form-control">
                        </div>
                        <div class="form-group col-3 row ml-3 mt-4">
                            <div class="pretty p-default p-round ml-2 mt-2">
                                <input type="radio" name="dad_stat" value="alive">
                                <label>Alive</label>
                            </div>
                            <div class="pretty p-default p-round ml-5 mt-2">
                                <input type="radio" name="dad_stat" value="dead">
                                <label>Dead</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-8">
                            <label for="">Mother's Name</label>
                            <input type="text" name="mothers_name" id="" value="{{ $data->mothersname }}" class="form-control">
                        </div>
                        <div class="form-group col-3 row ml-3 mt-4">
                            <div class="pretty p-default p-round ml-2 mt-2">
                                <input type="radio" name="mom_stat" value="alive">
                                <label>Alive</label>
                            </div>
                            <div class="pretty p-default p-round ml-5 mt-2">
                                <input type="radio" name="mom_stat" value="dead">
                                <label>Dead</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-7">
                            <label for="">Name of Next of Kin</label>
                            <input type="text" name="nok" id="" value="{{ $data->next_of_kin }}" class="form-control">
                        </div>
                        <div class="form-group col-5">
                            <label for="">Next of Kin Contact</label>
                            <input type="tel" name="nok_phone" id="" value="{{ $data->next_of_kin_contact }}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-7">
                            <label for="">Relationship to Next of Kin</label>
                            <input type="text" name="r_nok" id="" value="{{ $data->relation_to_nok }}" class="form-control">
                        </div>
                        <div class="form-group col-5">
                            <label for="">Email of Kin Contact</label>
                            <input type="tel" name="nok_email" value="{{ $data->email_of_nok }}" id="" class="form-control">
                        </div>
                    </div>
                    <h5 class="font-18 ">Church Profile</h5>
                    <div class="row mt-3">
                        <div class="col-3 mr-3">
                            <label for="" class="font-13" style="font-weight: bold;">Department</label>
                            <select name="department" id="" class='form-control col-12 p-1 mr-0'>
                                <option value="">select</option>
                                <option value="Men of valour">Men of valour</option>
                                <option value="Women of honour">Women of honour</option>
                                <option value="Game Changers Generation">Game Changers Generation</option>
                                <option value="Tachmonites">Tachmonites</option>
                            </select>
                        </div>
                        <div class="ml-2 mr-4 ">
                            <label for="" class="font-13" style="font-weight: bold;">Are you
                                baptised?</label>
                            <div class='row mt-1 ml-2'>
                                <div class="pretty p-default p-round mt-2">
                                    <input type="radio" name="baptism" value="Yes">
                                    <label>Yes</label>
                                </div>
                                <div class="pretty p-default p-round ml-2 mt-2">
                                    <input type="radio" name="baptism" value="No">
                                    <label>No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Date of Baptism</label>
                            <input type="date" name="baptism_date" id="" value="{{ $data->date_baptised }}" class="form-control">
                        </div>

                        <div class="form-group col-3 ml-2">
                            <label for="">Year of Membership</label>
                            <input type="number" min="1900" max="2099" step="1" name="yom" value="{{ $data->yom }}"
                                class="form-control col-8">
                        </div>
                    </div>
                    <h5 class="font-18 ">Academic/Job Profile</h5>
                    <div class="row mt-4">
                        <div class="form-group col-4">
                            <label for="">Profession</label>
                            <input type="text" name="profession" id="" value="{{ $data->profession }}" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Present Occupation</label>
                            <input type="text" name="occupation" id="" value="{{ $data->present_occupation }}" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Name of Company/Workplace</label>
                            <input type="text" name="company_name" value="{{ $data->name_of_company }}" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="col-2 font-15 mr-2">Employment Status</h3>
                        <div class="form-group row ">
                            <div class="pretty p-default p-round mt-2 mr-3">
                                <input type="radio" name="em_stat" value="Self Employed">
                                <label>Self Employed</label>
                            </div>
                            <div class="pretty p-default p-round mt-2 mr-3">
                                <input type="radio" name="em_stat" value="Employee">
                                <label>Employee</label>
                            </div>
                            <div class="pretty p-default p-round mt-2 mr-3">
                                <input type="radio" name="em_stat" value="Unemployed">
                                <label>Unemployed</label>
                            </div>
                            <div class="pretty p-default p-round mt-2 mr-3">
                                <input type="radio" name="em_stat" value="Apprentice">
                                <label>Apprentice</label>
                            </div>
                            <div class="pretty p-default p-round mt-2 mr-3">
                                <input type="radio" name="em_stat" value="Pensioneer">
                                <label>Pensioneer</label>
                            </div>
                            <div class="pretty p-default p-round mt-2">
                                <input type="radio" name="em_stat" value="Student">
                                <label>Student</label>
                            </div>

                        </div>
                    </div>
                   
                </div>
                <button type="submit" name="submit" class="btn btn-lg btn-primary">Update</button>
            </div>

        </div>

    </form>
  </div>
</div>

    
          <!-- </div> -->
          <!-- single member details end -->
@endsection