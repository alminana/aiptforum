
@extends("admin_dashboard.layouts.app")

    
@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Associates</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.associates.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Associates</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
      
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Update Associates</h5>
                <hr/>

                <form action="{{route('admin.associates.update', $associate)}}" method='post'>
                  @csrf
                    @method('PATCH')

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">AssignedID</label>
                                        <input type="text" value='{{ old("assignedID",$associate->assignedID) }}' name='assignedID' class="form-control" id="inputProductTitle">
                                        
                                        @error('assignedID')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">associatess  Name</label>
                                        <input type="text" value='{{ old("name", $associate->name) }}' name='name' class="form-control" id="inputProductTitle">

                                        @error('name')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                     <!-- Country -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" value='{{ old("country", $associate->country) }}'class="form-label">Country</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='country' class="form-control" value='{{ old("country") }}' class="single-select">                                                            
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
                                                            <option value="Zanzibar">Zanzibar</option>
                                                            <option value="Aripo">ARIPO</option>
                                                            <option value="EU">Europian Union</option>
                                                            </select>

                                                            @error('country')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Abbrivations -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">ABBR</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='abbr' value='{{ old("abbr", $associate->abbr) }}' class="single-select">                                                            
                                                            <option value="AF">AF</option>
                                                            <option value="AL">AL</option>
                                                            <option value="DZ">DZ</option>
                                                            <option value="AD">AD</option>
                                                            <option value="AO">AO</option>
                                                            <option value="AG">AG</option>
                                                            <option value="AR">AR</option>
                                                            <option value="AM">AM</option>
                                                            <option value="AU">AU</option>
                                                            <option value="AT">AT</option>
                                                            <option value="AZ">AZ</option>
                                                            <option value="BS">BS</option>
                                                            <option value="BH">BH</option>
                                                            <option value="BD">BD</option>
                                                            <option value="BB">BB</option>
                                                            <option value="BY">BY</option>
                                                            <option value="BE">BE</option>
                                                            <option value="BZ">BZ</option>
                                                            <option value="BJ">BJ</option>
                                                            <option value="BT">BT</option>
                                                            <option value="BO">BO</option>
                                                            <option value="BA">BA</option>
                                                            <option value="BW">BW</option>
                                                            <option value="BR">BR</option>
                                                            <option value="BN">BN</option>
                                                            <option value="BG">BG</option>
                                                            <option value="BF">BF</option>
                                                            <option value="BI">BI</option>
                                                            <option value="KH">KH</option>
                                                            <option value="CM">CM</option>
                                                            <option value="CA">CA</option>
                                                            <option value="CV">CV</option>
                                                            <option value="CF">CF</option>
                                                            <option value="TD">TD</option>
                                                            <option value="CL">CL</option>
                                                            <option value="CN">CN</option>
                                                            <option value="CO">CO</option>
                                                            <option value="KM">KM</option>
                                                            <option value="CD">CD</option>
                                                            <option value="CG">CG</option>
                                                            <option value="CR">CR</option>
                                                            <option value="AF"></option>
                                                            <option value="AF">AF</option>
                                                            <option value="AF">AF</option>
                                                            <option value="CI">CI</option>
                                                            <option value="HR">HR</option>
                                                            <option value="CU">CU</option>
                                                            <option value="CY">CY</option>
                                                            <option value="CZ">CZ</option>
                                                            <option value="DK">DK</option>
                                                            <option value="DJ">DJ</option>
                                                            <option value="DM">DM</option>
                                                            <option value="DO">DO</option>
                                                            <option value="TL">TL</option>
                                                            <option value="EC">EC</option>
                                                            <option value="SV">SV</option>
                                                            <option value="GQ">GQ</option>
                                                            <option value="ER">ER</option>
                                                            <option value="EE">EE</option>
                                                            <option value="ET">ET</option>
                                                            <option value="FJ">FJ</option>
                                                            <option value="FI">FI</option>
                                                            <option value="FR">FR</option>
                                                            <option value="GA">GA</option>
                                                            <option value="GM">GM</option>
                                                            <option value="GE">GE</option>
                                                            <option value="DE">DE</option>
                                                            <option value="GH">GH</option>
                                                            <option value="GR">GR</option>
                                                            <option value="GD">GD</option>
                                                            <option value="GL">GL</option>
                                                            <option value="GT">GT</option>
                                                            <option value="GN">GN</option>
                                                            <option value="GW">GW</option>
                                                            <option value="HT">HT</option>
                                                            <option value="HN">HN</option>
                                                            <option value="HK">HK</option>
                                                            <option value="HU">HU</option>
                                                            <option value="IS">IS</option>
                                                            <option value="IN">IN</option>
                                                            <option value="ID">ID</option>
                                                            <option value="IR">IR</option>
                                                            <option value="IQ">IQ</option>
                                                            <option value="IE">IE</option>
                                                            <option value="IL">IL</option>
                                                            <option value="IT">IT</option>
                                                            <option value="JM">JM</option>
                                                            <option value="JP">JP</option>
                                                            <option value="JO">JO</option>
                                                            <option value="KZ">KZ</option>
                                                            <option value="KE">KE</option>
                                                            <option value="KI">KI</option>
                                                            <option value="KP">KP</option>
                                                            <option value="KR">KR</option>
                                                            <option value="KW">KW</option>
                                                            <option value="KG">KG</option>
                                                            <option value="LA">LA</option>
                                                            <option value="LV">LV</option>
                                                            <option value="LB">LB</option>
                                                            <option value="LS">LS</option>
                                                            <option value="LR">LR</option>
                                                            <option value="LY">LY</option>
                                                            <option value="LI">LI</option>
                                                            <option value="LT">LT</option>
                                                            <option value="LU">LU</option>
                                                            <option value="MK">MK</option>
                                                            <option value="MG">MG</option>
                                                            <option value="MW">MW</option>
                                                            <option value="MY">MY</option>
                                                            <option value="MV">MV</option>
                                                            <option value="ML">ML</option>
                                                            <option value="MT">MT</option>
                                                            <option value="MH">MH</option>
                                                            <option value="MR">MR</option>
                                                            <option value="MU">MU</option>
                                                            <option value="MX">MX</option>
                                                            <option value="FM">FM</option>
                                                            <option value="MD">MD</option>
                                                            <option value="MC">MC</option>
                                                            <option value="MN">MN</option>
                                                            <option value="MA">MA</option>
                                                            <option value="MZ">MZ</option>
                                                            <option value="MM">MM</option>
                                                            <option value="NA">NA</option>
                                                            <option value="NR">NR</option>
                                                            <option value="NP">NP</option>
                                                            <option value="NL">NL</option>
                                                            <option value="NZ">NZ</option>
                                                            <option value="NI">NI</option>
                                                            <option value="NE">NE</option>
                                                            <option value="NG">NG</option>
                                                            <option value="NO">NO</option>
                                                            <option value="OM">OM</option>
                                                            <option value="PK">PK</option>
                                                            <option value="PW">PW</option>
                                                            <option value="PA">PA</option>
                                                            <option value="PG">PG</option>
                                                            <option value="PY">PY</option>
                                                            <option value="PE">PE</option>
                                                            <option value="PH">PH</option>
                                                            <option value="PL">PL</option>
                                                            <option value="PT">PT</option>
                                                            <option value="QA">QA</option>
                                                            <option value="RO">RO</option>
                                                            <option value="RU">RU</option>
                                                            <option value="RW">RW</option>
                                                            <option value="KN">KN</option>
                                                            <option value="LC">LC</option>
                                                            <option value="VC">VC</option>
                                                            <option value="WS">WS</option>
                                                            <option value="SM">SM</option>
                                                            <option value="ST">ST</option>
                                                            <option value="SA">SA</option>
                                                            <option value="SN">SN</option>
                                                            <option value="CS">CS</option>
                                                            <option value="SC">SC</option>
                                                            <option value="SL">SL</option>
                                                            <option value="SG">SG</option>
                                                            <option value="SK">SK</option>
                                                            <option value="SI">SI</option>
                                                            <option value="SB">SB</option>
                                                            <option value="SO">SO</option>
                                                            <option value="ZA">ZA</option>
                                                            <option value="ES">ES</option>
                                                            <option value="LK">LK</option>
                                                            <option value="SD">SD</option>
                                                            <option value="SR">SR</option>
                                                            <option value="SZ">SZ</option>
                                                            <option value="SE">SE</option>
                                                            <option value="CH">CH</option>
                                                            <option value="SY">SY</option>
                                                            <option value="TJ">TJ</option>
                                                            <option value="TZ">TZ</option>
                                                            <option value="TW">TW</option>
                                                            <option value="TZ">TZ</option>
                                                            <option value="TH">TH</option>
                                                            <option value="TG">TG</option>
                                                            <option value="TO">TO</option>
                                                            <option value="TT">TT</option>
                                                            <option value="TN">TN</option>
                                                            <option value="TR">TR</option>
                                                            <option value="TM">TM</option>
                                                            <option value="TV">TV</option>
                                                            <option value="UG">UG</option>
                                                            <option value="UA">UA</option>
                                                            <option value="AE">AE</option>
                                                            <option value="GB">GB</option>
                                                            <option value="US">US</option>
                                                            <option value="UY">UY</option>
                                                            <option value="ZAN">ZAN</option>
                                                             <option value="ZM">ZM</option>
                                                             <option value="Aripo">ARIPO</option>
                                                             <option value="Oapi">OAPI</option>
                                                             <option value="EU">Europian Union</option>
                                                            </select>

                                                            @error('abbr')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!-- type -->
                                     <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Type</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='type' class="form-control" value='{{ old("type", $associate->type) }}' class="single-select">                                                            
                                                            <option value="Direct">Associates</option>
                                                         
                                                            </select>

                                                            @error('type')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <button class='btn btn-primary' type='submit'>Update Associates</button>
                                    
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
                                <h5 class="modal-title" id="staticBackdropLabel">Delete : {{ old("name", $associate->name) }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <h4>Are you sure you want to delete this Associates</h4>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form method='post' action="{{ route('admin.associates.destroy', $associate->id ) }}" id='delete_form_{{ $associate->id }}'>
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
<script>
$(document).ready(function () {
    
    setTimeout(() => {
        $(".general-message").fadeOut();
    }, 5000);

});

</script>
@endsection
