
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
          
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Add Application</h5>
                    <hr/>

                    <form action="{{ route('admin.posts.store') }}" method='post' enctype='multipart/form-data'>
                        @csrf
    
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <!-- aiptref -->
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">AIPTREF:</label>
                                            <input type="text" value='{{ old("aiptref") }}' name='aiptref' required class="form-control" id="inputProductTitle">                                        
                                            
                                            @error('aiptref')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Client Refference-->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Client Reference</label>
                                            <input type="text" value='{{ old("clientref") }}' name='clientref' required class="form-control" id="inputProductclientref">

                                            @error('clientref')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Application name -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Application</label>
                                            <input type="text" value='{{ old("title") }}' name='title' required class="form-control" id="inputProductTitle">

                                            @error('title')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Filing no. -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Filing no.</label>
                                            <input type="text" value='{{ old("slug") }}' class="form-control" required name='slug' id="inputProductTitle">

                                            @error('slug')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Filing date. -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Filing Date.</label>
                                            <input type="date" value='{{ old("filingdate") }}' class="form-control" required name='filingdate' id="inputProductTitle">

                                            @error('filingdate')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Registration no -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Registration no.</label>
                                            <input type="text" value='{{ old("registrationno") }}' class="form-control" required name='registrationno' id="inputProductTitle">

                                            @error('registrationno')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Registration date. -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Rgistration Date.</label>
                                            <input type="date" value='{{ old("registrationdate") }}' class="form-control" required name='registrationdate' id="inputProductTitle">

                                            @error('registrationdate')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Renewal -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Renewal</label>
                                            <input type="date" value='{{ old("renewal") }}' class="form-control" required name='renewal' id="inputProductTitle">

                                            @error('renewal')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- Client -->
                                        <!-- <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Client</label>
                                            <textarea required class="form-control" name='excerpt' id="inputProductDescription" rows="3">{{ old("excerpt") }}</textarea>
                                        
                                            @error('excerpt')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div> -->
                                        <!-- status -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Client</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='excerpt' class="single-select">
                                                                @foreach($clients as $key => $client)
                                                                <option value="{{ $client->name }}">{{ $client->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('name')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Status</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required class="form-control" name='status' class="single-select">
                                                                @foreach($method as $key => $method)
                                                                <option value="{{ $method->method }}">{{ $method->method }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('method')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Status</label>
                                            <textarea required class="form-control" name='status' id="inputProductDescription" rows="3">{{ old("excerpt") }}</textarea>
                                        
                                            @error('status')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div> -->
                                        <!-- <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Status</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <input required name='status' value='{{ old("status") }}' class="single-select">
                                                                <option value="Filing">Filing</option>
                                                                <option value="Publication">Publication</option>
                                                                <option value="Recording of Assignment">Recording of Assignment</option>
                                                                <option value="Execution of the Decision in the IP Authority">Execution of the Decision in the IP Authority</option>
                                                                <option value="Legalization of POA up to Yemeni consulate in Saudi Arabia">Legalization of POA up to Yemeni consulate in Saudi Arabia</option>
                                                                <option value="Response to Examiner">Response to Examiner</option>
                                                                <option value="Late Filing of Documents">Late Filing of Documents</option>
                                                                <option value="search">search</option>
                                                                <option value="Under remittance">Under remittance</option>
                                                                <option value="Certified Arabic Translation">Certified Arabic Translation</option>
                                                                <option value="copyright">copyright</option>
                                                                <option value="Filing time extension">Filing time extension</option>
                                                                <option value="EP Validation">EP Validation</option>
                                                                <option value="2 months extension petition to  Reply to formal Examination">2 months extension petition to  Reply to formal Examination</option>
                                                                <option value="Late Submission">Late Submission</option>
                                                                <option value="12th year annuity">12th year annuity</option>
                                                                <option value="Petition to Restore with SAIP">Petition to Restore with SAIP</option>
                                                                <option value="2 months extension petition to  Reply the 1st Substantive Examination"></option>
                                                                <option value="PPH Submission">PPH Submission</option>
                                                                <option value="Voluntary Cancellation">Voluntary Cancellation</option>
                                                                <option value="Filing Appeal before the Appellate Court">Filing Appeal before the Appellate Court</option>
                                                                <option value="Revoking of POA">Revoking of POA</option>
                                                                <option value="Pre-Examination">Pre-Examination</option>
                                                                <option value="Reply to appeal to Commercial Court">Reply to appeal to Commercial Court</option>
                                                                <option value="Renewal with Obtaining copy of CR">Renewal with Obtaining copy of CR</option>
                                                                <option value="Appeal to Commercial Court">Appeal to Commercial Court</option>
                                                                <option value="Filing Appeal for Reconsideration">Filing Appeal for Reconsideration</option>
                                                                <option value="Late Filing of Deed of Assignment">Late Filing of Deed of Assignment</option>
                                                                <option value="Filing with 1st, 2nd, & 3rd year annuity">Filing with 1st, 2nd, & 3rd year annuity</option>
                                                                <option value="Filing with 1st and 2nd year annuity">Filing with 1st and 2nd year annuity</option>
                                                                <option value="Reply to 3rd substantive examination">Reply to 3rd substantive examination</option>
                                                                <option value="Training workshop in Sudan">Training workshop in Sudan</option>
                                                                <option value="Obtaining Substitute Grant Certificate (Arabic)">Obtaining Substitute Grant Certificate (Arabic)</option>
                                                                <option value="Filing Customs Surveillance of the trademark application">Filing Customs Surveillance of the trademark application</option>
                                                                <option value="Legalization of POA up to Bahraini Consulate in Saudi Arabia">Legalization of POA up to Bahraini Consulate in Saudi Arabia</option>
                                                                <option value="Legalization of POA up to Saudi MOFA">Legalization of POA up to Saudi MOFA</option>
                                                                <option value="Request for Extension on filing appeal">Request for Extension on filing appeal</option>
                                                                <option value="Filing an Appeal">Filing an Appeal</option>
                                                                <option value="Courier">Courier</option>
                                                                <option value="Submission of Priority Documents">Submission of Priority Documents</option>
                                                                <option value="additional">additional</option>
                                                                <option value="11th year annuity">11th year annuity</option>
                                                                <option value="14 year annuity">14 year annuity</option>
                                                                <option value="Correct Arabic Translation of the Specification of specification, abstract,claims and drawings">Correct Arabic Translation of the Specification of specification, abstract,claims and drawings</option>
                                                                <option value="Sworn translation">Sworn translation</option>
                                                                <option value="15th year annuity">15th year annuity</option>
                                                                <option value="Certified Stamp of Arabic Specification">Certified Stamp of Arabic Specification</option>
                                                                <option value="6th year Annuity">6th year Annuity</option>
                                                                <option value="7th and 8th year annuity">7th and 8th year annuity</option>
                                                                <option value="Amendment of a Registered TM">Amendment of a Registered TM</option>
                                                                <option value="Filing an opposition before the Administrative Court against the registration ">Filing an opposition before the Administrative Court against the registration </option>
                                                                <option value="Review of the Confidentiality Agreement">Review of the Confidentiality Agreement</option>
                                                                <option value="10th year Annuity">10th year Annuity</option>
                                                                <option value="9th year Annuity">9th year Annuity</option>
                                                                <option value="4th,5th,6th,Late Penalty fees for annual fee and Restoration Fees">4th,5th,6th,Late Penalty fees for annual fee and Restoration Fees</option>
                                                                <option value="Recordal of License">Recordal of License</option>
                                                                <option value="orrect Arabic Translation of the Specification of specification, abstract,claims and drawings">orrect Arabic Translation of the Specification of specification, abstract,claims and drawings</option>
                                                                <option value="3rd and 4th  year annuity">3rd and 4th  year annuity</option>
                                                                <option value="Legalization of DOA up to Saudi MOFA">Legalization of DOA up to Saudi MOFA</option>
                                                                <option value="Legalization of DOA up to Jordanian Consulate ">Legalization of DOA up to Jordanian Consulate </option>
                                                                <option value="Legalization of Documents">Legalization of Documents</option>
                                                                <option value="10 year annuity">10 year annuity</option>
                                                                <option value="Local legalization of POA">Local legalization of POA</option>
                                                                <option value="Filing an opposition before the SAIP’s Grievance committee against the Rejection report of a Patent Application">Filing an opposition before the SAIP’s Grievance committee against the Rejection report of a Patent Application</option>
                                                                <option value="Preparing and filing the list of goods ">Preparing and filing the list of goods </option>
                                                                <option value="Amendment of patent grant">Amendment of patent grant</option>
                                                                <option value="Certification of Assignment Document">Certification of Assignment Document</option>
                                                                <option value="Appeal to the Administrative Court">Appeal to the Administrative Court</option>
                                                                <option value="Recordal of Merger and Change of Name">Recordal of Merger and Change of Name</option>
                                                                <option value="Claims exceeding Ten  claims ">Claims exceeding Ten  claims </option>
                                                                <option value=Legalization of the POA up to Lebanese Consulate "">Legalization of the POA up to Lebanese Consulate </option>
                                                                <option value="Legalization of the POA to the Chinese Commercial Center in UAE">Legalization of the POA to the Chinese Commercial Center in UAE</option>
                                                                <option value="Legalization of the POA to the Foreign Affairs in UAE">Legalization of the POA to the Foreign Affairs in UAE</option>
                                                                <option value="3rd year annuity and substantive examination ">3rd year annuity and substantive examination </option>
                                                                <option value="Amendment of  specification  ">Amendment of  specification  </option>
                                                                <option value="Trademark Renewal and Change of Address">Trademark Renewal and Change of Address</option>
                                                                <option value="Discount">Discount</option>
                                                                <option value="2nd, 3rd & 4th annuity">2nd, 3rd & 4th annuity</option>
                                                                <option value="Filing a second party plaintiff appeal">Filing a second party plaintiff appeal</option>
                                                                <option value="filed a complaints before Ministry of Supply and Internal Trade in Egypt regarding the infringing ">filed a complaints before Ministry of Supply and Internal Trade in Egypt regarding the infringing </option>
                                                                <option value="filed a complaints before Ministry of Supply and Internal Trade in Egypt regarding the infringing ">filed a complaints before Ministry of Supply and Internal Trade in Egypt regarding the infringing </option>
                                                                <option value="Legal Opinion">Legal Opinion</option>
                                                                <option value="Filing a complaint">Filing a complaint</option>
                                                                <option value="publication">publication</option>
                                                                <option value="Examination of application">Examination of application</option>
                                                                <option value="Legalization of document in Baghdad">Legalization of document in Baghdad</option>
                                                                <option value="Cancellation of License">Cancellation of License</option>
                                                                <option value="Prosecution Fees">Prosecution Fees</option>
                                                                <option value="Preparing and filing an Appeal against the Registrar’s decision ">Preparing and filing an Appeal against the Registrar’s decision </option>
                                                                <option value="Change of Agent & Taking Over Representation">Change of Agent & Taking Over Representation</option>
                                                                <option value="POA legalization from Taiwan embassy in Bahrain">POA legalization from Taiwan embassy in Bahrain</option>
                                                                <option value="POA legalization from Bahrain Ministry of Foreign Affairs in Bahrain">POA legalization from Bahrain Ministry of Foreign Affairs in Bahrain</option>
                                                                <option value="7th year annuity with 3 months penalty">7th year annuity with 3 months penalty</option>
                                                                <option value="Restoration Fees">Restoration Fees</option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>

                                                            />

                                                            @error('status')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
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
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
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
                                                                
                                                            </select>

                                                            @error('country')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- class -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Class</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='class' value='{{ old("class") }}' class="single-select">
                                                                <option value="not included">Not Included</option>    
                                                                <option value="Class 1">Class 1</option>
                                                                <option value="Class 2">Class 2</option>
                                                                <option value="Class 3">Class 3</option>
                                                                <option value="Class 4">Class 4</option>
                                                                <option value="Class 5">Class 5</option>
                                                                <option value="Class 6">Class 6</option>
                                                                <option value="Class 7">Class 7</option>
                                                                <option value="Class 8">Class 8</option>
                                                                <option value="Class 9">Class 9</option>
                                                                <option value="Class 10">Class 10</option>
                                                                <option value="Class 11">Class 11</option>
                                                                <option value="Class 12">Class 12</option>
                                                                <option value="Class 13">Class 13</option>
                                                                <option value="Class 14">Class 14</option>
                                                                <option value="Class 15">Class 15</option>
                                                                <option value="Class 16">Class 16</option>
                                                                <option value="Class 17">Class 17</option>
                                                                <option value="Class 18">Class 18</option>
                                                                <option value="Class 19">Class 19</option>
                                                                <option value="Class 20">Class 20</option>
                                                                <option value="Class 21">Class 21</option>
                                                                <option value="Class 21">Class 22</option>
                                                                <option value="Class 23">Class 23</option>
                                                                <option value="Class 24">Class 24</option>
                                                                <option value="Class 25">Class 25</option>
                                                                <option value="Class 26">Class 26</option>
                                                                <option value="Class 27">Class 27</option>
                                                                <option value="Class 28">Class 28</option>
                                                                <option value="Class 29">Class 29</option>
                                                                <option value="Class 30">Class 30</option>
                                                                <option value="Class 31">Class 31</option>
                                                                <option value="Class 32">Class 32</option>
                                                                <option value="Class 33">Class 33</option>
                                                                <option value="Class 34">Class 34</option>
                                                                <option value="Class 35">Class 35</option>
                                                                <option value="Class 36">Class 36</option>
                                                                <option value="Class 37">Class 37</option>
                                                                <option value="Class 38">Class 38</option>
                                                                <option value="Class 39">Class 39</option>
                                                                <option value="Class 40">Class 40</option>
                                                                <option value="Class 41">Class 41</option>
                                                                <option value="Class 42">Class 42</option>
                                                                <option value="Class 43">Class 43</option>
                                                                <option value="Class 44">Class 44</option>
                                                                <option value="Class ">Class 45</option>
                                                            </select>

                                                            @error('category_id')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Post Category</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='category_id' class="single-select">
                                                                @foreach($categories as $key => $category)
                                                                <option value="{{ $key }}">{{ $category }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('category_id')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="inputProductDescription" class="form-label">Post Thumbnail</label>
                                                    <input id='thumbnail' required name='thumbnail' id="file" type="file">

                                                    @error('thumbnail')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Content</label>
                                            <textarea name='body'  id='post_content' class="form-control" id="inputProductDescription" rows="12">{{ old("body") }}
                                           
                                            </textarea>
                                        
                                            @error('body')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
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