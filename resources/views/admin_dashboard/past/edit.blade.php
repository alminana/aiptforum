
@extends("admin_dashboard.layouts.app")

@section("style")

<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

<link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Patent</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Patents</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
          
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Post: {{ $past->title }}</h5>
                    <hr/>
                    <form action="{{ route('past.update', $past) }}" method='post'>
                        @csrf
                        @method('PATCH')

                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <!-- aiptref -->
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">AIPTREF:</label>
                                            <input type="text" value='{{ old("aiptref",$past->aiptref) }}' name='aiptref' required class="form-control" id="inputProductTitle">                                        
                                            
                                            @error('aiptref')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Client Refference-->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Client Reference</label>
                                            <input type="text" value='{{ old("clientref",$past->clientref) }}' name='clientref'  class="form-control" id="inputProductclientref">

                                            @error('clientref')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Application name -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Title</label>
                                            <input type="text" value='{{ old("title",$past->title) }}' name='title' required class="form-control" id="inputProductTitle">

                                            @error('title')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                         
                                          <!-- client -->
                                          <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Client</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='client' class="single-select">
                                                                @foreach($clients as $key => $client)
                                                                <option {{ $past->client === $client->name ? 'selected' : '' }} value="{{ $client->name }}">{{  $client->name,$past->name  }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('client')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <!-- Filing no. -->
                                       <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">PCT Date:</label>
                                        <div class="row">
                                            <div class="col-6">
                                               <label for="inputProductTitle" class="form-label">If there is no date. Please Input 0001-01-01</label>
                                               <input type="date" value='{{ old("pct_date",$past->pct_date) }}' class="form-control" required  name='pct_date' id="inputProductTitle">
                                               @error('pct_date')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror  
                                            </div>
                                            <div class="col-6">
                                                <label for="inputProductTitle" class="form-label">Priority no.</label>
                                                <input type="text" value='{{ old("pct_no",$past->pct_no) }}' class="form-control" required  name='pct_no' id="inputProductTitle">
                                                @error('pct_no')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror 
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                        <div class="col-6">
                                            <label for="inputProductTitle" class="form-label">Priority Date:</label>
                                                <label for="inputProductTitle" class="form-label">If there is no date. Please Input 0001-01-01</label>
                                                <input type="date" value='{{ old("regular_date",$past->regular_date) }}' class="form-control" required  name='regular_date' id="inputProductTitle">
                                                @error('regular_date')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                         </div>
                                         <div class="col-6">
                                            <label for="inputProductTitle" class="form-label">Priority no.</label>
                                            <input type="text" value='{{ old("regular_no",$past->regular_no) }}' class="form-control" required  name='regular_no' id="inputProductTitle">
                                            @error('regular_no')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror 
                                         </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Filing no.</label>
                                        <input type="text" value='{{ old("filingno",$past->filingno) }}'  required  placeholder="Please Input n/a if theres is no Client References no." name='filingno'  class="form-control" id="inputProductclientref">

                                        @error('filingno')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                        <div class="container">
                                            <div class="row">
                                              <div class="col">
                                                <label for="inputProductTitle" class="form-label">Procedure</label>
                                                <div class="mb-3">
                                                    <select required class="form-control" name='procedure' class="single-select">
                                                        @foreach($method as  $m)
                                                        <option {{ $past->procedure === $m->method ? 'selected' : '' }} value="{{ $m->method }}">{{ $m->method }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('procedure')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">Requested Date:</label>
                                                    <label for="inputProductTitle" class="form-label"></label>
                                                    <input type="date" value='{{ old("requesteddate",$past->requesteddate) }}' class="form-control" required  name='requesteddate' id="inputProductTitle">
                                                    @error('requesteddate')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">Actual Date:</label>
                                                    <input type="date" value='{{ old("proceduredate",$past->proceduredate) }}' placeholder='' required  class="form-control"  name='proceduredate' id="inputProductTitle">
                                                    @error('proceduredate')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Please fill up if they have a Annual Fee</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row">
                                                        
                                                          <div class="col-sm">
                                                            <label for="inputProductTitle" class="form-label">Annualy</label>
                                                            <select  name='annuity' value='{{ old("annuity",$past->annuity) }}' class="single-select">
                                                                <option value='{{ old("annuity",$past->annuity) }}'>{{ old("annuity",$past->annuity) }}</option>
                                                                <option value="Regular">Regular</option>
                                                                <option value="1st Annuity">1st Annuity</option>
                                                                <option value="2nd Annuity">2nd Annuity</option>
                                                                <option value="3rd Annuity">3rd Annuity</option>
                                                                <option value="4th Annuity">4th Annuity</option>
                                                                <option value="5th Annuity">5th Annuity</option>
                                                                <option value="6th Annuity">6th Annuity</option>
                                                                <option value="7th Annuity">7th Annuity</option>
                                                                <option value="8th Annuity">8th Annuity</option>
                                                                <option value="9th Annuity">9th Annuity</option>
                                                                <option value="10th Annuity">10th Annuity</option>
                                                                <option value="11th Annuity">11th Annuity</option>
                                                                <option value="12th Annuity">12th Annuity</option>
                                                                <option value="13th Annuity">13th Annuity</option>
                                                                <option value="14th Annuity">14th Annuity</option>
                                                                <option value="15th Annuity">15th Annuity</option>
                                                                <option value="16th Annuity">16th Annuity</option>
                                                             
                                                                <option value="17th Annuity">17th Annuity</option>
                                                                <option value="18th Annuity">18th Annuity</option>
                                                                <option value="9th Annuity">19th Annuity</option>
                                                                <option value="20th Annuity">20th Annuity</option>
                                                                <option value="21th Annuity">21th Annuity</option>
                                                                <option value="2th Annuity">22th Annuity</option>
                                                                <option value="23th Annuity">23th Annuity</option>
                                                                <option value="24th Annuity">24th Annuity</option>
                                                                <option value="25th Annuity">25th Annuity</option>
                                                                <option value="26th Annuity">26th Annuity</option>
                                                                <option value="27th Annuity">27th Annuity</option>
                                                                <option value="28th Annuity">28th Annuity</option>
                                                                <option value="29th Annuity">29th Annuity</option>
                                                                <option value="30th Annuity">30th Annuity</option>
                                                              
                                                                <option value="31th Annuity">31th Annuity</option>
                                                                <option value="32th Annuity">32th Annuity</option>
                                                                <option value="33th Annuity">33th Annuity</option>
                                                                <option value="34th Annuity">34th Annuity</option>
                                                                <option value="35th Annuity">35th Annuity</option>
                                                                <option value="36th Annuity">36th Annuity</option>
                                                                <option value="37th Annuity">37th Annuity</option>
                                                                <option value="38th Annuity">38th Annuity</option>
                                                                <option value="39th Annuity">39th Annuity</option>
                                                                <option value="40th Annuity">40th Annuity</option>
                                                                <option value="41th Annuity">41th Annuity</option>
                                                                <option value="42th Annuity">42th Annuity</option>
                                                                <option value="43th Annuity">43th Annuity</option>
                                                                <option value="44th Annuity">44th Annuity</option>
                                                                <option value="45th Annuity">45th Annuity</option>
                                                                <option value="46th Annuity">46th Annuity</option>
                                                                
                                                                <option value="47th Annuity">47th Annuity</option>
                                                                <option value="48th Annuity">48th Annuity</option>
                                                                <option value="49th Annuity">49th Annuity</option>
                                                                <option value="50th Annuity">50th Annuity</option>
                                                                <option value="1st & 2nd Annuities">1st & 2nd Annuities</option>
                                                                <option value="1st,2nd,3rd Annuities">1st,2nd,3rd Annuities</option>
                                                                <option value="1st,2nd,3rd,4th Annuities">1st,2nd,3rd,4th Annuities</option>
                                                                <option value="1st,2nd,3rd,4th,5th Annuities">1st,2nd,3rd,4th,5th Annuities</option>
                                                                <option value="1st,2nd,3rd,4th,5th,6th Annuities">1st,2nd,3rd,4th,5th,6th Annuities</option>
                                                                <option value="1st,2nd,3rd,4th,5th,6th,7th Annuities">1st,2nd,3rd,4th,5th,6th,7th Annuities</option>
                                                                <option value="1st,2nd,3rd,4th,5th,6th,7th,,8th Annuities">1st,2nd,3rd,4th,5th,6th,7th,,8th Annuities</option>
                                                                <option value="1st,2nd,3rd,4th,5th,6th,7th,,8th,9th Annuities">1st,2nd,3rd,4th,5th,6th,7th,,8th,9th Annuities</option>
                                                                <option value="1st,2nd,3rd,4th,5th,6th,7th,,8th,9th,10th Annuities">1st,2nd,3rd,4th,5th,6th,7th,,8th,9th,10th Annuities</option>
                                                           
                                                                @error('annuity')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                                 @enderror

                                                            </select>
                                                          </div>
                                                          <div class="col-sm">
                                                            <label for="inputProductTitle" class="form-label">Office Fee</label>
                                                            <input type="text" value='{{ old("annual_office_fee",$past->annual_office_fee) }}' class="form-control" required  name='annual_office_fee' id="inputProductTitle">
                
                                                            @error('annual_office_fee')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror
                                                          </div>
                                                          <div class="col-sm">
                                                            <label for="inputProductTitle" class="form-label">Annualy date</label>
                                                            <input type="date"  value='{{ old("annual_deadline",$past->annual_deadline) }}' name='annual_deadline' required class="form-control" id="inputProductTitle">
                
                                                            @error('annual_deadline')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror
                                                          </div>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                          </div>  

                                     
                                     
                                            <!-- Country -->
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Country</label>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="rounded">
                                                            <div class="mb-3">
    
                                                                @php
                                                                    $country_arr = [
                                                                        "Afghanistan",
                                                                        "Albania",
                                                                        "American Samoa",
                                                                        "Andorra",
                                                                        "Angola",
                                                                        "Anguilla",
                                                                        "Antarctica",
                                                                        "Antigua and Barbuda",
                                                                        "Argentina",
                                                                        "Armenia",
                                                                        "Aruba",
                                                                        "Australia",
                                                                        "Austria",
                                                                        "Azerbaijan",
                                                                        "Bahamas",
                                                                        "Bahrain",
                                                                        "Bangladesh",
                                                                        "Barbados",
                                                                        "Belarus",
                                                                        "Belgium",
                                                                        "Belize",
                                                                        "Benin",                                                                    
                                                                        "Bermuda",
                                                                        "Bhutan",
                                                                        "Bolivia",
                                                                        "Bosnia and Herzegovina",
                                                                        "Botswana",
                                                                        "Bouvet Island",
                                                                        "Brazil",
                                                                        "British Indian Ocean Territory",
                                                                        "Brunei Darussalam",
                                                                        "Bulgaria",
                                                                        "Burkina Faso",
                                                                        "Burundi",
                                                                        "Cambodia",
                                                                        "Cameroon",
                                                                        "Canada",
                                                                        "Cape Verde",
                                                                        "Cayman Islands",
                                                                        "Central African Republic",
                                                                        "Chad",
                                                                        "Chile",
                                                                        "China",
                                                                        "Christmas Island",
                                                                        "Cocos (Keeling) Islands",
                                                                        "Colombia",
                                                                        "Comoros",
                                                                        "Congo",
                                                                        "Congo, The Democratic Republic of The",
                                                                        "Cook Islands",
                                                                        "Costa Rica",
                                                                        "Cote D'ivoire",
                                                                        "Croatia",
                                                                        "Cuba",
                                                                        "Cyprus",
                                                                        "Czech Republic",
                                                                        "Denmark",
                                                                        "Djibouti",
                                                                        "Dominica",
                                                                        "Dominican Republic",
                                                                        "Ecuador",
                                                                        "Egypt",
                                                                        "El Salvador",
                                                                        "Equatorial Guinea",
                                                                        "Eritrea",
                                                                        "Estonia",
                                                                        "Ethiopia",
                                                                        "Falkland Islands (Malvinas)",
                                                                        "Faroe Islands",
                                                                        "Fiji",
                                                                        "Finland",
                                                                        "France",
                                                                        "French Guiana",
                                                                    "French Polynesia",
                                                                    "French Southern Territories",
                                                                    "Gabon",
                                                                    "Gambia",
                                                                    "Georgia",
                                                                    "Germany",
                                                                    "Ghana",
                                                                    "Gibraltar",
                                                                    "Greece",
                                                                    "Greenland",
                                                                    "Grenada",                                                                
                                                                    "Guadeloupe",
                                                                    "Guam",
                                                                    "Guatemala",
                                                                    "Guernsey",
                                                                    "Guinea",
                                                                    "Guinea-bissau",
                                                                    "Guyana",                                                                
                                                                    "Haiti",
                                                                    "Heard Island and Mcdonald Islands",
                                                                    "Holy See (Vatican City State)",
                                                                    "Honduras",
                                                                    "Hong Kong",
                                                                    "Hungary",
                                                                    "Iceland",
                                                                    "India",
                                                                    "Indonesia",
                                                                    "Iran, Islamic Republic of",
                                                                    "Iraq",
                                                                    "Ireland",
                                                                    "Isle of Man",
                                                                    "Israel",
                                                                    "Italy",
                                                                    "Jamaica",
                                                                    "Japan",
                                                                    "Jersey",
                                                                    "Jordan",
                                                                    "Kazakhstan",
                                                                    "Kenya",
                                                                    "Kiribati",
                                                                    "Korea, Democratic People's Republic of",
                                                                    "Korea, Republic of",
                                                                    "Kuwait",
                                                                    "Kyrgyzstan",
                                                                    "Lao People's Democratic Republic",
                                                                    "Latvia",
                                                                    "Lebanon",
                                                                    "Lesotho",
                                                                    "Liberia",
                                                                    "Libyan Arab Jamahiriya",
                                                                    "Liechtenstein",
                                                                    "Lithuania",
                                                                    "Luxembourg",
                                                                    "Macao",
                                                                    "Macedonia, The Former Yugoslav Republic of",
                                                                    "Madagascar",
                                                                    "Malawi",
                                                                    "Malaysia",
                                                                    "Maldives",
                                                                    "Mali",
                                                                    "Malta",
                                                                    "Marshall Islands",
                                                                    "Martinique",
                                                                    "Mauritania",
                                                                    "Mauritius",
                                                                    "Mayotte",
                                                                    "Mexico",
                                                                    "Micronesia, Federated States of",
                                                                    "Moldova, Republic of",
                                                                    "Monaco",
                                                                    "Mongolia",
                                                                    "Montenegro",
                                                                    "Montserrat",
                                                                    "Morocco",
                                                                    "Mozambique",
                                                                    "Myanmar",
                                                                    "Namibia",
                                                                    "Nauru",
                                                                    "Nepal",
                                                                    "Netherlands",
                                                                    "Netherlands Antilles",
                                                                    "New Caledonia",
                                                                    "New Zealand",
                                                                    "Nicaragua",
                                                                    "Niger",
                                                                    "Nigeria",
                                                                    "Niue",
                                                                    "Norfolk Island",
                                                                    "Northern Mariana Islands",
                                                                    "Norway",
                                                                    "Oman",
                                                                    "Pakistan",
                                                                    "Palau",
                                                                    "Palestinian Territory, Occupied",
                                                                    "Panama",
                                                                    "Papua New Guinea",
                                                                    "Paraguay",
                                                                    "Peru",
                                                                    "Philippines",
                                                                    "Pitcairn",
                                                                    "Poland",
                                                                    "Portugal",
                                                                    "Puerto Rico",
                                                                    "Qatar",
                                                                    "Reunion",
                                                                    "Romania",
                                                                    "Russian Federation",
                                                                    "Rwanda",
                                                                    "Saint Helena",
                                                                    "Saint Kitts and Nevis",
                                                                    "Saint Lucia",
                                                                    "Saint Pierre and Miquelon",
                                                                    "Saint Vincent and The Grenadines",
                                                                    "Samoa",
                                                                    "San Marino",
                                                                    "Sao Tome and Principe",
                                                                    "Saudi Arabia",
                                                                    "Senegal",
                                                                    "Serbia",
                                                                    "Seychelles",
                                                                    "Sierra Leone",
                                                                    "Singapore",
                                                                    "Slovakia",
                                                                    "Slovenia",
                                                                    "Solomon Islands",
                                                                    "Somalia",
                                                                    "South Africa",
                                                                    "South Georgia and The South Sandwich Islands",
                                                                    "Spain",
                                                                    "Sri Lanka",
                                                                    "Sudan",
                                                                    "Suriname",
                                                                    "Svalbard and Jan Mayen",
                                                                    "Swaziland",
                                                                    "Sweden",
                                                                    "Switzerland",
                                                                    "Syrian Arab Republic",
                                                                    "Taiwan",
                                                                    "Tajikistan",
                                                                    "Tanzania, United Republic of",
                                                                    "Thailand",
                                                                    "Timor-leste",
                                                                    "Togo",
                                                                    "Tokelau",
                                                                    "Tonga",
                                                                    "Trinidad and Tobago",
                                                                    "Tunisia",
                                                                    "Turkey",
                                                                    "Turkmenistan",
                                                                    "Turks and Caicos Islands",
                                                                    "Tuvalu",
                                                                    "Uganda",
                                                                    "Ukraine",
                                                                    "United Arab Emirates",
                                                                    "United Kingdom",
                                                                    "United States",
                                                                    "United States Minor Outlying Islands",
                                                                    "Uruguay",
                                                                    "Uzbekistan",
                                                                    "Vanuatu",
                                                                    "Venezuela",
                                                                    "Viet Nam",
                                                                    "Virgin Islands, British",
                                                                    "Virgin Islands, U.S.",
                                                                    "Wallis and Futuna",
                                                                    "Western Sahara",
                                                                    "Yemen",
                                                                    "Zambia",
                                                                    "Zimbabwe",
                                                                    "GCC",
                                                                    "ARIPO",
                                                                    "OAPI",
                                                                    ];
                                                                @endphp
                                                             
                                                                <select required name='country' value="" class="single-select">                              
                                                                @foreach($country_arr as $c)                              
                                                                    <option value="{{$c}}" {{ old("country",$past->country) == $c  ? 'selected' : '' }}>{{$c}}</option>
                                                                @endforeach
    
                                                                </select>
    
                                                                @error('country')
                                                                    <p class='text-danger'>{{ $message }}</p>
                                                                @enderror
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            
                                         {{-- Deadline Status --}}
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Deadline Status</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">

                                                            @php
                                                            $deadline_Status = [
                                                                "Updated",
                                                                "Lapsed",
                                                                "Rejected",
                                                            ];

                                                            @endphp
                                                         
                                                            <select required name='deadline_Status' class="single-select">                              
                                                                @foreach($deadline_Status as $d)                              
                                                                    <option value="{{$d}}" {{ old("deadline_Status",$past->deadline_Status) == $d  ? 'selected' : '' }}>{{$d}}</option>
                                                                @endforeach

                                                            </select>

                                                            @error('deadline_Status')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <button class='btn btn-primary' type='submit'>Update</button>        
                                                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>

                       <!-- Button trigger modal -->
                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Delete
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete : {{ old("aiptref",$past->aiptref) }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <h4>Are you sure you want to delete this application</h4>
                           
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form method='post' action="{{ route('admin.past.destroy', $past->id ) }}" id='delete_form_{{ $past->id }}'>
                                @csrf 
                                @method('DELETE')
                                <button class='btn btn-danger' type='submit'>Delete</button>   
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @endsection

@section("script")
<script src="{{ asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script>
    $(document).ready(function () {
        
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        tinymce.init({
            selector: '#past_content',
            plugins: 'table advlist autolink lists link image media charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: '700',

            toolbar: '|insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr|tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
            toolbar_mode: 'floating',

            image_title: true,
            automatic_uploads: true,
            
            images_upload_handler: function(blobinfo, success, failure)
            {
                let formData = new FormData();
                let _token = $("input[name='_token']").val();

                let xhr = new XMLHttpRequest();
                xhr.open('past', "{{ route('admin.upload_tinymce_image') }}");
                xhr.onload = () => {
                    if( xhr.status !== 200 )
                    {
                        failure("Http Error: " + xhr.status);
                        return
                    }
                    let json = JSON.parse(xhr.responseText)
                    if(! json || typeof json.location != 'string')
                    {
                        failure("Invalid Json: " + xhr.responseText);
                        return
                    }
                    success( json.location )
                }
                formData.append('_token', _token);
                formData.append('file', blobinfo.blob(), blobinfo.filename());
                xhr.send( formData );
            }

        });

        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);

    });

</script>
@endsection
