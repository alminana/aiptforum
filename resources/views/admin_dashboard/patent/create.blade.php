
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
                <div class="breadcrumb-title pe-3">Posts</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Patent</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
          
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Add Patent</h5>
                    <hr/>

          
                    <form action="{{ route('admin.patents.store') }}" method='post'>
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <!-- aiptref -->
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">AIPTREF:</label>
                                            <input type="text" value='{{ old("aiptref") }}' placeholder="Please Input AIPT Reference" name='aiptref' required class="form-control" id="inputProductTitle">                                        
                                            
                                            @error('aiptref')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Client Refference-->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Client Reference</label>
                                            <input type="text" value='{{ old("clientref") }}'placeholder="Please Input n/a if theres is no Client References no." name='clientref' required  class="form-control" id="inputProductclientref">

                                            @error('clientref')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- title -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Title</label>
                                            <input type="text" value='{{ old("title") }}' name='title' required class="form-control" id="inputProductTitle">

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
                                                                <option value="{{ $client->name }}">{{ $client->name }}</option>
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

                                        {{-- selection for patent filing --}}
                                        {{-- <div class="wrapper">
                                        <div class="mb-3">
                                                <div class="card">
                                                    <div class="menu">
                                                        <select id="name"class="single-select">
                                                            <option value="">Select type of Filing</option>
                                                            <option value="pct">PCT</option>
                                                            <option value="regular">Regular</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="content">
                                        
                                                <div class="pct data">
                                                    <label for="inputProductTitle" class="form-label"> If there is no date. Please Input 0001-01-01</label>
                                                    <input type="date" value='{{ old("pctdate") }}' name="pctdate" class="form-control"/>
                                                    @error('pctdate')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="regular data">
                                                    <label for="inputProductTitle"  class="form-label">If there is no date. Please Input 0001-01-01</label>
                                                    <input type="date" value='{{ old("regulardate") }}'  name="regulardate"  class="form-control"/>
                                                    @error('regulardate')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div> 
                                        </div>  --}}
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">PCT Date:</label>
                                            <div class="row">
                                                <div class="col-6">
                                                   <label for="inputProductTitle" class="form-label">If there is no date. Please Input 0001-01-01</label>
                                                    <input type="date" value='{{ old("pct_date") }}' class="form-control" required  name='pct_date' id="inputProductTitle">
                                                    @error('pct_date')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror  
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputProductTitle" class="form-label">Priority no.</label>
                                                    <input type="text" value='{{ old("pct_no") }}' class="form-control" required  name='pct_no' id="inputProductTitle">
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
                                                    <input type="date" value='{{ old("regular_date") }}' class="form-control" required  name='regular_date' id="inputProductTitle">
                                                    @error('regular_date')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                             </div>
                                             <div class="col-6">
                                                <label for="inputProductTitle" class="form-label">Priority no.</label>
                                                <input type="text" value='{{ old("regular_no") }}' class="form-control" required  name='regular_no' id="inputProductTitle">
                                                @error('regular_no')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror 
                                             </div>
                                        </div>
                                        <br>
                                        <!-- filing -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Filing no.</label>
                                            <input type="text" value='{{ old("filingno") }}'  required  placeholder="Please Input n/a if theres is no Client References no." name='filingno'  class="form-control" id="inputProductclientref">

                                            @error('filingno')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- date of filing --}}
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Procedure</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required class="form-control" name='procedure' class="single-select">
                                                                @foreach($method as $key => $method)
                                                                <option value="{{ $method->method }}">{{ $method->method }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('procedure')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductTitle" class="form-label">Requested Date:</label>
                                                            <label for="inputProductTitle" class="form-label">If there is no date. Please Input 0001-01-01</label>
                                                            <input type="date" value='{{ old("requesteddate") }}' class="form-control" required  name='requesteddate' id="inputProductTitle">
                                                            @error('requesteddate')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductTitle" class="form-label">Actual Date:</label>
                                                            <label for="inputProductTitle" class="form-label">If there is no date. Please Input 0001-01-01</label>
                                                            <input type="date" value='{{ old("proceduredate") }}' placeholder='' required  class="form-control"  name='proceduredate' id="inputProductTitle">
                                                            @error('proceduredate')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror
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
                                                            <select required name='country' value='{{ old("country") }}' class="single-select">                                                            
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Åland Islands">Åland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russian Federation">Russian Federation</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="GCC">GCC</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Sudan">South Sudan</option>
                                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Timor-leste">Timor-leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Viet Nam">Viet Nam</option>
                                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                            <option value="Aripo">Aripo</option>
                                                            <option value="OAPI">OAPI</option>
                                                            </select>

                                                            @error('country')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <hr>
                                        {{-- annual --}}
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Please fill up if they have a Annual Fee</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row">
                                                          <div class="col-sm">
                                                            <select  name='annuity' value='{{ old("annuity") }}'   class="single-select">
                                                                <option value="N/A">Select Annuity</option>
                                                                <option value="1st Annuity">1st Annuity</option>
                                                                <option value="Regular">2nd Annuity</option>
                                                                <option value="Regular">3rd Annuity</option>
                                                                <option value="Regular">4th Annuity</option>
                                                                <option value="Regular">5th Annuity</option>
                                                                <option value="Regular">6th Annuity</option>
                                                                <option value="Regular">7th Annuity</option>
                                                                <option value="Regular">8th Annuity</option>
                                                                <option value="Regular">9th Annuity</option>
                                                                <option value="Regular">10th Annuity</option>
                                                                <option value="Regular">11th Annuity</option>
                                                                <option value="Regular">12th Annuity</option>
                                                                <option value="Regular">13th Annuity</option>
                                                                <option value="Regular">14th Annuity</option>
                                                                <option value="Regular">15th Annuity</option>
                                                                <option value="Regular">16th Annuity</option>
                                                             
                                                                <option value="Regular">17th Annuity</option>
                                                                <option value="Regular">18th Annuity</option>
                                                                <option value="Regular">19th Annuity</option>
                                                                <option value="Regular">20th Annuity</option>
                                                                <option value="Regular">21th Annuity</option>
                                                                <option value="Regular">22th Annuity</option>
                                                                <option value="Regular">23th Annuity</option>
                                                                <option value="Regular">24th Annuity</option>
                                                                <option value="Regular">25th Annuity</option>
                                                                <option value="Regular">26th Annuity</option>
                                                                <option value="Regular">27th Annuity</option>
                                                                <option value="Regular">28th Annuity</option>
                                                                <option value="Regular">29th Annuity</option>
                                                                <option value="Regular">30th Annuity</option>
                                                              
                                                                <option value="Regular">31th Annuity</option>
                                                                <option value="Regular">32th Annuity</option>
                                                                <option value="Regular">33th Annuity</option>
                                                                <option value="Regular">34th Annuity</option>
                                                                <option value="Regular">35th Annuity</option>
                                                                <option value="Regular">36th Annuity</option>
                                                                <option value="Regular">37th Annuity</option>
                                                                <option value="Regular">38th Annuity</option>
                                                                <option value="Regular">39th Annuity</option>
                                                                <option value="Regular">40th Annuity</option>
                                                                <option value="Regular">41th Annuity</option>
                                                                <option value="Regular">42th Annuity</option>
                                                                <option value="Regular">43th Annuity</option>
                                                                <option value="Regular">44th Annuity</option>
                                                                <option value="Regular">45th Annuity</option>
                                                                <option value="Regular">46th Annuity</option>
                                                                
                                                                <option value="Regular">47th Annuity</option>
                                                                <option value="Regular">48th Annuity</option>
                                                                <option value="Regular">49th Annuity</option>
                                                                <option value="Regular">50th Annuity</option>
                                                                <option value="Regular">1st & 2nd Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd,4th Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd,4th,5th Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd,4th,5th,6th Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd,4th,5th,6th,7th Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd,4th,5th,6th,7th,,8th Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd,4th,5th,6th,7th,,8th,9th Annuities</option>
                                                                <option value="Regular">1st,2nd,3rd,4th,5th,6th,7th,,8th,9th,10th Annuities</option>
                                                           
                                                                @error('annuity')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                                 @enderror

                                                            </select>
                                                          </div>
                                                          <div class="col-sm">
                                                        
                                                            <input type="text"   value='{{ old("annual_office_fee") }}' name='annual_office_fee' required class="form-control" id="inputProductTitle">
                
                                                            @error('annual_office_fee')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror
                                                          </div>
                                                          <div class="col-sm">
                                                            <input type="date"   value='{{ old("annual_deadline") }}' name='annual_deadline' required class="form-control" id="inputProductTitle">
                
                                                            @error('annual_deadline')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror
                                                          </div>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <hr>
                                        {{-- Deadline Status --}}
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Deadline Status</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">

                                                            <select required name='deadline_Status'  class="single-select">
                                                                <option value="Updated">Updated</option>
                                                                <option value="Lapsed">Lapsed</option>
                                                                <option value="Rejected">Rejected</option>
                                                            </select>

                                                            @error('deadline_Status')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class='btn btn-primary' type='submit'>Add Post</button>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
    @endsection

@section("script")

<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>


<script>


    $(document).ready(function() {
        $('#date-time').datetimepicker({
      defaultDate: '0000-00-00 00:00:00',
      dateFormat:'yy-mm-dd',
      todayHighlight: 0,
      showSecond: true,
      timeFormat: 'hh:mm:ss',
      stepHour: 1,
      stepMinute: 10,
      stepSecond: 10,
      forceParse: 0
    }).on('dp.change',function(e){
        if($('#dateid').val() === '0000-00-00 00:00:00'){ // id for your input
        $('#dateid').val('0000-00-00 00:00:00');// id for your input
        }
    })
    });

    //selection
    $(document).ready(function(){
		$("#name").on('change', function(){
			$(".data").hide();
			$("." + $(this).val()).fadeIn(700);
		}).change();
	});


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
            selector: '#post_content',
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
                xhr.open('post', "{{ route('admin.upload_tinymce_image') }}");
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
                // formData.append('file', blobinfo.blob(), blobinfo.filename());
                xhr.send( formData );
            }

        });

        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);

    });

</script>
@endsection
