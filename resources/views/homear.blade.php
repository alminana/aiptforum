@extends('aiapaitar_layouts.master')

@section('title', 'aiapait | Home')

@section('content')
<section class="banner d-flex align-items-center">
	<div class="banner-img-part"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-12 col-xl-8">
				<div class="block">
					<h1 class="mb-3 mt-3" style="color:#fff;font-size:100px;">همية العلامة التجارية</h1>
					<p class="mb-5"style="color:#070707;font-size:35px;" >
						من المهم تسجيل علامتك التجارية في كل دولة تعمل فيها شركتك أو من المحتمل أن تتوسع فيها لتجنب فقدان ملكية علامتك التجارية إذا تم تسجيلها من قبل شخص آخر قبلك. جميع دول مجلس التعاون الخليجي بما في ذلك المملكة العربية السعودية ومعظم دول العالم هي الأولى في نظام الملفات مما يعني أن ملكية العلامة التجارية تُمنح للفرد الذي سجل العلامة التجارية أولاً وليس لمن يستخدم العلامة التجارية أولاً. الحصول على شهادة تسجيل العلامة التجارية في بلد معين يعني أنك الشخص الوحيد الذي يمكنه استخدام هذه العلامة التجارية لتحديد وتمييز سلعك أو خدماتك ويمنحك أيضًا الحق في منع الآخرين من استخدام علامات تجارية متطابقة أو مشابهة في بلد التسجيل. تقدم أيه أي بي آند تي خدمات المشورة بشأن اختيار العلامات التجارية وتسجيل العلامات التجارية وانتهاك العلامات التجارية وإنفاذها					
					</p>

					<a href="about.html" target="_blank" class="btn btn-main">get started<i class="fa fa-angle-right ml-2"></i></a>
					<a href="about.html" target="_blank" class="btn btn-main">explore more<i class="fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 ">
					<div class="about-item mb-5 mb-lg-5">
						<div class="icon">
							<img src="{{asset('aiapait/images\about/consultency.png')}}"/>
						</div>

						<div class="content">
							<h4 class="mt-3 mb-3">نصيحة مهنية بشأن اختيار العلامات التجارية</h4>
							<p class="mb-4">عادة ما تكون الشركات على استعداد لاختيار العلامات التجارية التي تعكس طبيعة سلعها أو خدماتها. على الرغم من أن هذا هدف صالح ، إلا أن الوصف المباشر للمنتجات أو الخدمات يقلل من قوة العلامة التجارية وحصريتها أو قد يؤدي إلى أن تكون العلامة وصفية أو عامة وغير مقبولة للتسجيل. ستمكّنك نصيحتنا بشأن اختيار العلامة التجارية من اختيار علامة تجارية قوية وحصرية تقوم في نفس الوقت بالتعريف المطلوب لسلعك وخدماتك. نقوم بفحص صلاحية العلامة التجارية وفقًا للغة الرسمية للبلد المعني.</p>

							<a href="#">اقرأ أكثر</a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="about-item mb-5 mb-lg-5">
						<div class="icon">
							<img src="{{asset('aiapait/images\about/support-logo.png')}}"/>
						</div>
						<div class="content">
							<h4 class="mt-3 mb-3">تسجيل العالمات التجارية:</h4>
							<p class="mb-4"> <img src="{{asset('aiapait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> تقدم خدمات شاملة لتسجيل العالمات التجارية وعلى مستوى العالم بأسعار منافسة.
								<img src="{{asset('aiapait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> تقدم خدمات شاملة لتسجيل العالمات التجارية في الشرق األوسط واإلتحاد األوروبي
								والواليات المتحدة األمريكية ودول آسيا وجميع الدول حول العالم.
								باإلضافة إلى عملية تسجيل العالمات التجارية؛ <img src="{{asset('aiapait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> تقدم جميع اإلجراءات األخرى
								المتطلبة لتملك العالمات التجارية مثل التجديد، الترخيص، نقل الملكية، تعديل اسم وعنوان
								مالك العالمة.
								</p>
							<a href="#"> اقرأ أكثر </a>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6">
					<div class="about-item">
						<div class="icon">
							<img src="{{asset('aiapait/images\about/consultency.png')}}"/>
						</div>
						<div class="content">
							<h4 class="mt-3 mb-3">منع االعتداء على العالمات التجارية:</h4>
							<p class="mb-4"> يتحقق اإلعتداء على العالمة التجارية عندما يقوم أي شخص باستخدام عالمة مطابقة أو
								مشابهه لعالمة مسجلة في بلد التسجيل دون إذن مالكها ويعتبر اإلعتداء على العالمة بهذه
								الصورة مضر جدا بمالك العالمة ألن مجموعة من عمالئه قد يتحولون إلى التعامل مع المعتدي
								بس الذي يحصل لديهم بسبب التشابه بين العالمتين
								على العالمة نتيجة لل . ً
								<img src="{{asset('aiapait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> تقدم خدمات حماية العالمات التجارية لعمالئها ضد اإلعتداء على عالماتهم التجارية
								من قبل الغير وذلك باتخاذ الكثير من اإلجراءات ا لقانونية، ومنها رفع دعوى قضائية لدى
								المحكمة المختصة لمنع عملية التعدي وآثارها .
								إن إجراءات منع التعدي القانونية تُمكن عمالئنا من منع استمرار التعدي على عالماتهم
								التجارية، والحصول على تعويض مناسب من المتعدي، والتخلص من المنتجات المخالفة
								أوالمقلدة.
								</p>
							<a href="#">اقرأ أكثر </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section process">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="process-block pl-4">
						<span class="text-uppercase text-sm letter-spacing">Why choose us</span>
						<h2 class="mb-4 mt-3">We help you to secure your Trademarks</h2>
						<!-- <p class="mb-4">We understand what your business means to you,your requirements considering trends.Smet nemo excepturi voluptas eligendi .</p> -->
					</div>
				</div>

				<div class="col-lg-7 col-xs-12 col-md-12">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="icon-block text-center mb-4 mb-lg-0">
								<img src="{{asset('aiapait/images\service/service1.png')}}"/>
								<h5>نظرة عامة على العلامة التجارية</h5>
								<a  href="service.html">اقرأ أكثر </a>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="icon-block text-center mt-4 mb-4 mb-lg-0">
								<img src="{{asset('aiapait/images\service/service2.png')}}"/>
								<h5>صورة عن الخدمة</h5>
								<a href="service.html">اقرأ أكثر</a>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="icon-block text-center">
								<img src="{{asset('aiapait/images\service/service3.png')}}"/>
								<h5>صورة عن الخدمة</h5>
								<a href="service.html">اقرأ أكثر</a>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="icon-block text-center mt-4 mb-4 mb-lg-0">
								<img src="{{asset('aiapait/images\service/service4.png')}}"/>
								<h5>مراقبة العلامة التجارية</h5>
								<a href="service.html">اقرأ أكثر</a>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="icon-block text-center mt-4">
								<img src="{{asset('aiapait/images\service/service5.png')}}"/>
								<h5>-إختيار العلامة التجارية</h5>
								<a href="service.html">اقرأ أكثر</a>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</section>
@endsection