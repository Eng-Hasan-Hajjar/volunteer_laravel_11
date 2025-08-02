<!DOCTYPE html>
<html lang="en">

    @include('website.layouts.head')

<body>

  @include('website.layouts.header')






  <div class="slider_area" style="height: 80vh; position: relative; overflow: hidden;">
  <div class="single_slider d-flex align-items-center justify-content-center">
    <div class="text-overlay" style="background: #ffffff;">
      <div class="slider_text active" style="background: linear-gradient(135deg, #0053c0 0%, #1e90ff 100%); padding: 50px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); max-width: 800px; width: 90%;">
        <h2 class="text-white font-weight-bold mb-4" style="font-size: 2.5rem; text-transform: uppercase; letter-spacing: 2px;">{{ $organization->organization_name }}</h2>
        <div class="row">
          <div class="col-md-6">
            <p class="text-white mb-3" style="font-size: 1.1rem;"><strong>العنوان:</strong> {{ $organization->address }}</p>
          </div>
          <div class="col-md-6">
            <p class="text-white mb-3" style="font-size: 1.1rem;"><strong>تاريخ الإنشاء:</strong> {{ \Carbon\Carbon::parse($organization->time_of_creation)->format('d F Y') }}</p>
          </div>
        </div>
        <a href="{{ route('web_organizations') }}" class="boxed-btn3" style="background: #fff; color: #0053c0; padding: 12px 30px; border-radius: 25px; transition: all 0.3s ease;">
          رجوع للقائمة
        </a>
      </div>
    </div>
  </div>
</div>





  <!-- JS here -->
    


    @include('website.layouts.script')







</body>
</html>