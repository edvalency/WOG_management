@extends('layouts.main')
@section('gen')
    active
@endsection
@section('addmem')
    active
@endsection
@section('content')

                <!-- add content here -->
                <!-- Form start -->
                <form class="" method="POST" action="{{ route('members.save') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="col-8 container col-md-6 col-lg-8">
                      @include('includes.alerts')
                        <div class="card">
                            <div class="card-header">
                                <h4>Membership form </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Members Image</label>
                                    <input type="file" name="img" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" name="fullname">
                                </div>
                                <div class="row">
                                    <div class="form-group col-3 mr-4">
                                        <label for="dob" class="d-block">Date of birth</label>
                                        <input id="dob" type="date" class="form-control" data-indicator="pwindicator"
                                            name="dob">
                                    </div>
                                    <div class="form-group ">
                                        <label>Phone Number (GH Format)</label>
                                        <div class=" ">
                                            <input type="tel" name="phone" id="phone" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group col-3 mt-4 mr-2 row ml-3">
                                        <div class="pretty p-default p-round ml-2 mt-2">
                                            <input type="radio" name="gender" value="Male">
                                            <label>Male</label>
                                        </div>
                                        <div class="pretty p-default p-round ml-4 mt-2">
                                            <input type="radio" name="gender" value="Female">
                                            <label>Female</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-4 mt-2">
                                        <label for="hometown">Hometown</label>
                                        <input type="text" name="hometown" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-4 mt-2">
                                        <label for="region" class="d-block">Region</label>
                                        <select name="region" class="form-control" id="">
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
                                        <input type="text" name="residence" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone">Email</label>
                                        <input type="text" name="email" id="" class="form-control">
                                    </div>
                                </div>
                                <h5 class="font-18 ">Family Profile</h5>
                                <div class="form-group row mt-4 mb-0">
                                    <div class="form-group col-8">
                                        <label for="">Father's Name</label>
                                        <input type="text" name="fathersname" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-3 row ml-3 mt-4">
                                        <div class="pretty p-default p-round ml-2 mt-2">
                                            <input type="radio" name="fatherstat" value="alive">
                                            <label>Alive</label>
                                        </div>
                                        <div class="pretty p-default p-round ml-5 mt-2">
                                            <input type="radio" name="fatherstat" value="dead">
                                            <label>Dead</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="form-group col-8">
                                        <label for="">Mother's Name</label>
                                        <input type="text" name="mothersname" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-3 row ml-3 mt-4">
                                        <div class="pretty p-default p-round ml-2 mt-2">
                                            <input type="radio" name="motherstat" value="alive">
                                            <label>Alive</label>
                                        </div>
                                        <div class="pretty p-default p-round ml-5 mt-2">
                                            <input type="radio" name="motherstat" value="dead">
                                            <label>Dead</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-7">
                                        <label for="">Name of Next of Kin</label>
                                        <input type="text" name="nok" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-5">
                                        <label for="">Next of Kin Contact</label>
                                        <input type="tel" name="nok_phone" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-7">
                                        <label for="">Relationship to Next of Kin</label>
                                        <input type="text" name="r_nok" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-5">
                                        <label for="">Email of Kin Contact</label>
                                        <input type="tel" name="nok_email" id="" class="form-control">
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
                                    <div class="ml-2 mr-3">
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
                                        <input type="date" name="baptism_date" id="" class="form-control">
                                    </div>

                                    <div class="form-group col-3 ml-2">
                                        <label for="">Year of Membership</label>
                                        <input type="number" min="1900" max="2099" step="1" name="yom" value="2021"
                                            class="form-control col-8">
                                    </div>



                                    <!-- <div class="form-group">
                      <label for="">Department</label>
                      <select name="program" id="">
                        <option value="">Select your region</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Procurement">Procurement</option>
                      </select>
                    </div> -->
                                </div>
                                <h5 class="font-18 ">Academic/Job Profile</h5>
                                <div class="row mt-4">
                                    <div class="form-group col-4">
                                        <label for="">Profession</label>
                                        <input type="text" name="profession" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Present Occupation</label>
                                        <input type="text" name="occupation" id="" class="form-control">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Name of Company/Workplace</label>
                                        <input type="text" name="company_name" id="" class="form-control">
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
                                <!-- <h5 class="font-18 ">Social Profile</h5>
                  <div class="row">
                    <div class="form-group">

                    </div>
                  </div> -->
                            </div>
                            <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>

                    </div>

                </form>
                <!-- Form End -->

@endsection
