@extends('layouts.main')

@section('title', 'Skills')

@section('content')
<!-- Skills -->
<section id="skills" class="bg-dark">
  <div class="container text-light pt-4">
    <div class="row text-center mt-3 mb-5">
      <div class="col">
        <h2>Skills and Tools</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/html.svg') }}" alt="" width="85">
            <h5 class="mt-3">HTML 5</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/css.svg') }}" alt="" width="85">
            <h5 class="mt-3">CSS 3</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/javascript.svg') }}" alt="" width="85">
            <h5 class="mt-3">ES 6</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/java.svg') }}" alt="" width="85">
            <h5 class="mt-3">Java</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/c.svg') }}" alt="" width="85">
            <h5 class="mt-3">C Lang</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/python.svg') }}" alt="" width="85">
            <h5 class="mt-3">Python</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4 align-items-center">
            <img src="{{ asset('images/node-js.svg') }}" alt="" width="85">
            <h5 class="mt-3">Node JS</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/mysql.svg') }}" alt="" width="85">
            <h5 class="mt-3">MySQL</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/jquery.svg') }}" alt="" width="85">
            <h5 class="mt-3">JQuery</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/bootstrap.svg') }}" alt="" width="85">
            <h5 class="mt-3">Bootstrap 5</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/figma.svg') }}" alt="" width="85">
            <h5 class="mt-3">Figma</h5>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-skill text-center mb-4">
          <div class="card-body pt-4">
            <img src="{{ asset('images/postman.svg') }}" alt="" width="85">
            <h5 class="mt-3">Postman</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#e2edff" fill-opacity="1" d="M0,256L6.2,234.7C12.3,213,25,171,37,160C49.2,149,62,171,74,181.3C86.2,192,98,192,111,192C123.1,192,135,192,148,160C160,128,172,64,185,37.3C196.9,11,209,21,222,58.7C233.8,96,246,160,258,181.3C270.8,203,283,181,295,160C307.7,139,320,117,332,112C344.6,107,357,117,369,112C381.5,107,394,85,406,117.3C418.5,149,431,235,443,266.7C455.4,299,468,277,480,256C492.3,235,505,213,517,181.3C529.2,149,542,107,554,74.7C566.2,43,578,21,591,42.7C603.1,64,615,128,628,176C640,224,652,256,665,250.7C676.9,245,689,203,702,165.3C713.8,128,726,96,738,74.7C750.8,53,763,43,775,74.7C787.7,107,800,181,812,213.3C824.6,245,837,235,849,208C861.5,181,874,139,886,144C898.5,149,911,203,923,218.7C935.4,235,948,213,960,176C972.3,139,985,85,997,90.7C1009.2,96,1022,160,1034,176C1046.2,192,1058,160,1071,154.7C1083.1,149,1095,171,1108,165.3C1120,160,1132,128,1145,117.3C1156.9,107,1169,117,1182,112C1193.8,107,1206,85,1218,101.3C1230.8,117,1243,171,1255,176C1267.7,181,1280,139,1292,117.3C1304.6,96,1317,96,1329,96C1341.5,96,1354,96,1366,101.3C1378.5,107,1391,117,1403,112C1415.4,107,1428,85,1434,74.7L1440,64L1440,320L1433.8,320C1427.7,320,1415,320,1403,320C1390.8,320,1378,320,1366,320C1353.8,320,1342,320,1329,320C1316.9,320,1305,320,1292,320C1280,320,1268,320,1255,320C1243.1,320,1231,320,1218,320C1206.2,320,1194,320,1182,320C1169.2,320,1157,320,1145,320C1132.3,320,1120,320,1108,320C1095.4,320,1083,320,1071,320C1058.5,320,1046,320,1034,320C1021.5,320,1009,320,997,320C984.6,320,972,320,960,320C947.7,320,935,320,923,320C910.8,320,898,320,886,320C873.8,320,862,320,849,320C836.9,320,825,320,812,320C800,320,788,320,775,320C763.1,320,751,320,738,320C726.2,320,714,320,702,320C689.2,320,677,320,665,320C652.3,320,640,320,628,320C615.4,320,603,320,591,320C578.5,320,566,320,554,320C541.5,320,529,320,517,320C504.6,320,492,320,480,320C467.7,320,455,320,443,320C430.8,320,418,320,406,320C393.8,320,382,320,369,320C356.9,320,345,320,332,320C320,320,308,320,295,320C283.1,320,271,320,258,320C246.2,320,234,320,222,320C209.2,320,197,320,185,320C172.3,320,160,320,148,320C135.4,320,123,320,111,320C98.5,320,86,320,74,320C61.5,320,49,320,37,320C24.6,320,12,320,6,320L0,320Z"></path>
  </svg>
</section>
<!-- Akhir dari skills -->
@endsection
