@extends('aiapait_layouts.master')

@section('title', 'AIPTFORUM | Home')

@section('content')

<section class="page-title bg-1">
			<div class="container">
				<div class="row">
				<div class="col-md-12">
					<div class="block text-center"><br>
						<br>
						<br>
						<br>
					</div>
				</div>
				</div>
			</div>
</section>
		
@endsection


@section('custom_js')

<script>

	$(document).on("click", '.send-message-btn', (e) => {
		e.preventDefault();
		let $this = e.target;
		
		let csrf_token = $($this).parents("form").find("input[name='_token']").val()
		let first_name = $($this).parents("form").find("input[name='first_name']").val()
		let last_name = $($this).parents("form").find("input[name='last_name']").val()
		let email = $($this).parents("form").find("input[name='email']").val()
		let subject = $($this).parents("form").find("input[name='subject']").val()
		let message = $($this).parents("form").find("textarea[name='message']").val()

		let formData = new FormData();
		formData.append('_token', csrf_token);
		formData.append('first_name', first_name);
		formData.append('last_name', last_name);
		formData.append('email', email);
		formData.append('subject', subject);
		formData.append('message', message);

		$.ajax({
			url: "{{ route('contact.store') }}",
			data: formData,
			type: 'POST',
			dataType: 'JSON',
			processData:false,
			contentType: false,
			success: function(data){
				
				if(data.success)
				{
					$(".global-message").addClass('alert , alert-info')
					$(".global-message").fadeIn()
					$(".global-message").text(data.message)

					clearData($($this).parents("form"), ['first_name', 'last_name', 'email', 'subject', 'message']);

					setTimeout(() => {
						$(".global-message").fadeOut()
					}, 5000);
				}
				else 
				{
					for (const error in data.errors)
					{
						$("small."+error).text(data.errors[error]);
					}
				}
			}
		})

	})

</script>

@endsection