
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

                    <form action="{{ route('admin.posts.update', $post) }}" method='post' enctype='multipart/form-data'>
                        @csrf
                        @method('PATCH')

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row">
                                            <div class="col">
                                                <!-- aiptref -->
                                                <div class="mb-3">
                                                    <label for="inputProductDescription" class="form-label">AIPTREF:</label>
                                                    <input type="text" value='{{ old("aiptref",$post->aiptref) }}' name='aiptref' required class="form-control" id="inputProductTitle">                                        
                                                    
                                                    @error('aiptref')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                              <!-- Client Refference-->
                                              <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Client Reference</label>
                                                <input type="text" value='{{ old("clientref",$post->clientref) }}' name='clientref'  class="form-control" id="inputProductclientref">
    
                                                @error('clientref')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col">
                                               <!-- Application name -->
                                               <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Application</label>
                                                <input type="text" value='{{ old("title",$post->title) }}' name='title' required class="form-control" id="inputProductTitle">
    
                                                @error('title')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                              </div>
                                          </div>
                                      
                                      <hr>
                                      <div class="row">
                                        <div class="col">
                                             <!-- client -->
                                             <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Client Name</label>
                                                <select required name='excerpt' class="single-select">
                                                    @foreach($clients as $key => $client)
                                                    <option {{ $post->excerpt === $client->name ? 'selected' : '' }} value="{{ $client->name }}">{{  $client->name,$post->name  }}</option>
                                                    @endforeach
                                                </select>

                                                @error('name')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                  <!-- Unique Id -->
                                                  <label for="inputProductTitle" class="form-label">Unique ID</label>
                                                <select required name='assignedID' class="single-select">
                                                    @foreach($clients as $key => $client)
                                                    <option value="{{ $client->assignedID }}">Unique Id :{{ $client->assignedID }} - {{ $client->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('assignedID')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                      </div>
                                     
                                      <hr/>


                                        <div class="row">
                                            <div class="col">
                                                <!-- Application name -->
                                         <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Applicant</label>
                                            <input type="text" value='{{ old("applicant",$post->applicant) }}' name='applicant' required class="form-control" id="inputProductTitle">

                                            @error('applicant')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                            </div>
                                            <div class="col">
                                               <!-- Agent -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Associate</label>
                                            <div class="mb-3">
                                                <select required name='agent' class="single-select">
                                                    @foreach($clients as $key => $client)
                                                    <option {{ $post->agent === $client->name ? 'selected' : '' }} value="{{ $client->name }}">{{  $client->name,$post->name  }}</option>

                                                    {{-- <option value="{{ $client->name }}">{{ $client->name,$post->name }}</option>  --}}
                                                    @endforeach
                                                </select>

                                                @error('agent')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col">
                                           
                                                <!-- Filing no. -->
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">Filing no.</label>
                                                    <input type="text" value='{{ old("slug",$post->slug) }}' class="form-control"  name='slug' id="inputProductTitle">
        
                                                    @error('slug')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                              <!-- Filing date. -->
                                              <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Filing Date.</label>
                                                <input type="date" value='{{old("filingdate",$post->filingdate)}}' class="form-control"  name='filingdate' id="inputProductTitle">
    
                                                @error('filingdate')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col">
                                                <!-- Registration. -->
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">Registration no.</label>
                                                    <input type="text" value='{{ old("registrationno",$post->registrationno) }}' class="form-control" name='registrationno' id="inputProductTitle">
        
                                                    @error('registrationno')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                          </div>

                                     
                                      
                                        <!-- Registration date. -->
                                        {{-- <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Registration Date.</label>
                                            <input type="date" value='00-00-0000' class="form-control" name='registrationdate' id="inputProductTitle">

                                            @error('registrationdate')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div> --}}
                                        <!-- Renewal -->
                                        {{-- <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Renewal</label>
                                            <input type="text" value='n/a' placeholder="Please Input n/a if there is no renewal no. yet" class="form-control"  name='renewal' id="inputProductTitle">

                                            @error('renewal')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div> --}}
                                        

                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="inputProductTitle" class="form-label">Procedure</label>
                                                        <select required class="form-control" name='status' class="single-select">
                                                            @foreach($method as  $m)
                                                            <option {{ $post->status === $m->method ? 'selected' : '' }} value="{{ $m->method }}">{{ $m->method }}</option>
                                                            @endforeach
                                                        </select>

                                                        @error('method')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="inputProductTitle" class="form-label">Requested Date</label>
                                                        <input type="date" value="{{ old('requesteddate',$post->requesteddate) }}" class="form-control"  name='requesteddate' id="inputProductTitle">
                                                        @error('requesteddate')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        {{-- @if (old('proceduredate'))
                                                        <input type="date" class="form-control"  name='proceduredate' id="inputProductTitle" value="{{ old('proceduredate') }}">
                                                        @endif
                                                        @error('proceduredate')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror --}}
                                                    
                                                        <label for="inputProductTitle" class="form-label">Actual Date</label>
                                                        <input type="date" value="{{ old('proceduredate',$post->proceduredate) }}" class="form-control"  name='proceduredate' id="inputProductTitle">
                                                        @error('proceduredate')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                     <!-- Country -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Country</label>
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
                                                    "European Union",
                                                    "Palestine(Gaza)",
                                                    "Palestine(west bank)",
                                                    "Tanzania (zanzibar)",
                                                    "Tanzania (Tanganyika)",
                                                    ];
                                                @endphp
                                             
                                                <select required name='country' value="" class="single-select">                              
                                                @foreach($country_arr as $c)                              
                                                    <option value="{{$c}}" {{ old("country",$post->country) == $c  ? 'selected' : '' }}>{{$c}}</option>
                                                @endforeach

                                                </select>

                                                @error('country')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                                </div>
                                                <div class="col">
                                                    <!-- class -->
                                                    <div class="mb-3">
                                                        <label for="inputProductDescription" class="form-label">Class</label>
                                                        <input type="text" value='{{ old("class",$post->class) }}' name='class' required class="form-control" id="inputclass">                                        
                                                        
                                                        @error('class')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                    </div>  
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="inputProductDescription" class="form-label">Category</label><br>
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

                                          
                                     
                                     

                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="inputProductDescription" class="form-label">Post Thumbnail</label><br>
                                                    <label for="inputProductTitle" class="form-label">Check the image before you save it to Avoid corrupted</label>
                                                    <input id='thumbnail'  name='thumbnail' id="file" type="file">

                                                    @error('thumbnail')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                            
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Status</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">

                                                            <select required name='body'  class="single-select">
                                                                <option value="New">New Application</option>
                                                                <option value="Process">On Process</option>
                                                                <option value="Done">Done</option>
                                                                <option value="Rejected">Rejected</option>
                                                            </select>

                                                            @error('body')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Folder Link</label>
                                            <input type="text" value='{{ old("inputPfolderlink") }}'placeholder="Please Input the folder link from qnap storage" name='inputPfolderlink'  class="form-control" id="inputPfolderlink">

                                         
                                           
                                            </textarea>
                                        
                                            @error('inputPfolderlink')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div> 

                                        <button class='btn btn-primary' type='submit'>Add Post</button>
                                        
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
            <h5 class="modal-title" id="staticBackdropLabel">Delete : {{ old("aiptref",$post->aiptref) }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h4>Are you sure you want to delete this application</h4>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form method='post' action="{{ route('admin.posts.destroy', $post->id ) }}" id='delete_form_{{ $post->id }}'>
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