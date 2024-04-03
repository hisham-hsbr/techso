<!--  SECTION BANNER -->

@if ($default_front_end_blood_bank_layout->data['banner_section'] == 1)
    @include('front_end.blood_bank.layouts.section.banner')
@endif


<!--  SECTION DONATION PROCESS -->
@if ($default_front_end_blood_bank_layout->data['donation_process_section'] == 1)
    @include('front_end.blood_bank.layouts.section.donation_process')
@endif

<!--  SECTION CAMPAIGNS   -->

@if ($default_front_end_blood_bank_layout->data['campaigns_section'] == 1)
    @include('front_end.blood_bank.layouts.section.campaigns')
@endif


<!--  SECTION APPOINTMENT -->

@if ($default_front_end_blood_bank_layout->data['appointment_section'] == 1)
    @include('front_end.blood_bank.layouts.section.appointment')
@endif


<!-- SECTION CTA  -->

@if ($default_front_end_blood_bank_layout->data['cta_section'] == 1)
    @include('front_end.blood_bank.layouts.section.cta')
@endif



<!--  GALLERY CONTENT  -->

@if ($default_front_end_blood_bank_layout->data['gallery_section'] == 1)
    @include('front_end.blood_bank.layouts.section.gallery')
@endif



<!-- BLOG SECTION  -->

@if ($default_front_end_blood_bank_layout->data['blog_section'] == 1)
    @include('front_end.blood_bank.layouts.section.blog')
@endif
