@if(auth()->user()->seniority == 'manger')
@include('homepages.manger')
@elseif(auth()->user()->seniority == 'senior')
@include('homepages.employee')
@else
@include('homepages.owner')
@endif