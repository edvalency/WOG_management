@extends('layouts.main')
@section('gcdown')
    active
@endsection
@section('gcmembers')
    active
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
     <!-- single mmeber details -->
      <!-- <div class="col-6 col-xs-6 container" > -->
        <div class="card card-primary container col-xs-6" id='onemem'>
            <a class="btn col-2 btn-success mt-2" id='back' href='{{ route('gcmembers.show') }}'>Return</a>
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
                        <td class="fnt">{{ $data->father_name }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Father's Status</td>
                        <td class="fnt">{{ $data->father_stat }}</td>
                      </tr><tr>
                        <td class="fnt">Mother's Name</td>
                        <td class="fnt">{{ $data->mother_name }}</td>
                      </tr><tr>
                        <td class="fnt">Mother's Status</td>
                        <td class="fnt">{{ $data->mother_stat }}</td>
                      </tr><tr>
                        <td class="fnt">Next of Kin</td>
                        <td class="fnt">{{ $data->next_of_kin }}</td>
                      </tr><tr>
                        <td class="fnt">Next of Kin Contact</td>
                        <td class="fnt">{{ $data->nok_contact }}</td>
                      </tr><tr>
                        <td class="fnt">Relation to next of kin</td>
                        <td class="fnt">{{ $data->relation_to_nok }}</td>
                      </tr>
                      <tr>
                        <td class="fnt">Email of next of kin</td>
                        <td class="fnt">{{ $data->email_of_nok }}</td>
                      </tr><tr>
                        <td class="fnt">Department</td>
                        <td class="fnt">{{ $data->dept }}</td>
                      </tr><tr>
                        <td class="fnt">Baptism Status</td>
                        <td class="fnt">{{ $data->baptism_stat }}</td>
                      </tr><tr>
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
  </div>
</div>

    
          <!-- </div> -->
          <!-- single member details end -->
@endsection