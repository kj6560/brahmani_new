@extends('layouts.site')
@section('content')
@php
$page_data = $settings['page_data'] ?? null;
$banner = !empty($page_data->page_banner) 
    ? asset("storage/".$page_data->page_banner) 
    : asset("brahmani_frontend_assets/images/bg/titlebar-img.jpg");
@endphp

<style>
    .pbmit-title-bar-wrapper {
        background-image: url('{{ $banner }}');
    }
</style>
<!-- Title Bar -->
<div class="pbmit-title-bar-wrapper">
			<div class="container">
				<div class="pbmit-title-bar-content">
					<div class="pbmit-title-bar-content-inner">
						<div class="pbmit-tbar">
							<div class="pbmit-tbar-inner container">
								<h1 class="pbmit-tbar-title"> FAQ</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="/" class="home"><span>Home</span></a>
								</span>
								<span class="sep">
									<i class="pbmit-base-icon-angle-right"></i>
								</span>
								<span><span class="post-root post post-post current-item"> FAQ</span></span>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div>
        <!-- Title Bar End-->
         <!-- Faq Start -->
         <section class="section-xl">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style2">
						<h4 class="pbmit-subtitle">About</h4>
						<h2 class="pbmit-title">General Questions</h2>
						<div class="pbmit-heading-desc">
							You will find answers to frequently asked questions about our PVC panels. Please feel free to contact us if you don't find the answer to your question below.
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-xl-6">
							<div class="pe-xl-3">
								<div class="accordion" id="accordionExample">
									<div class="accordion-item active">
										<h2 class="accordion-header" id="headingOne">
											<button class="accordion-button" type="button" data-bs-toggle="collapse" 
											data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													1.What types of PVC panels do you offer?
												</span>
											</button>
										</h2>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												We offer a wide range of PVC panels, including wall panels, ceiling panels, and flooring panels, in various designs, colors, and finishes.
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingTwo">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													2. What are the benefits of using PVC panels?
												</span>
											</button>
										</h2>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" 
										data-bs-parent="#accordionExample">
											<div class="accordion-body">
												PVC panels are durable, water-resistant, easy to clean, and require minimal maintenance. They are also resistant to pests, mold, and mildew.
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingThree">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
											data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													3. Can I customize the PVC panels to fit my specific needs?
												</span>
											</button>
										</h2> 
										<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" 
										data-bs-parent="#accordionExample">
											<div class="accordion-body">
												Yes, we offer customization options for our PVC panels, including custom sizes, colors, and designs. Please contact us to discuss your specific requirements.
											</div>
										</div>                         
									</div> 
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingFour">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
											data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													4. Are PVC panels eco-friendly?
												</span>
											</button>
										</h2> 
										<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" 
										data-bs-parent="#accordionExample">
											<div class="accordion-body">
												Our PVC panels are made from high-quality, eco-friendly materials that are recyclable and reusable.
											</div>
										</div>                         
									</div>                     
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="ps-xl-3">
								<div class="accordion" id="accordionExample1">
									<div class="accordion-item active">
										<h2 class="accordion-header" id="heading1">
											<button class="accordion-button" type="button" data-bs-toggle="collapse" 
											data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													5. Can I use PVC panels in outdoor applications?
												</span>
											</button>
										</h2>
										<div id="collapse1" class="accordion-collapse collapse show" 
										aria-labelledby="heading1" data-bs-parent="#accordionExample1">
											<div class="accordion-body">
												Yes, our PVC panels are suitable for outdoor use and can withstand various weather conditions.
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="heading2">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
											data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													6. How do I clean and maintain PVC panels?
												</span>
											</button>
										</h2> 
										<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" 
										data-bs-parent="#accordionExample1">
											<div class="accordion-body">
												PVC panels are easy to clean and maintain. Simply wipe them down with a damp cloth and mild soap solution.
											</div>
										</div>                         
									</div> 
									<div class="accordion-item">
										<h2 class="accordion-header" id="heading3">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
											data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													7. Are PVC panels resistant to pests and rodents?
												</span>
											</button>
										</h2> 
										<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" 
										data-bs-parent="#accordionExample1">
											<div class="accordion-body">Yes, our PVC panels are resistant to pests, rodents, and other animals
											</div>
										</div>                         
									</div>  
									<div class="accordion-item">
										<h2 class="accordion-header" id="heading4">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
											data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													8. Can I use PVC panels in areas with high humidity?
												</span>
											</button>
										</h2> 
										<div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" 
										data-bs-parent="#accordionExample1">
											<div class="accordion-body">Yes, our PVC panels are designed to withstand high humidity and are ideal for use in bathrooms, kitchens, and other areas prone to moisture.
											</div>
										</div>                         
									</div>            
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
            <!-- Faq End -->

@endsection