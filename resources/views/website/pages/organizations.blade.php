<!DOCTYPE html>
<html lang="ar">

    @include('website.layouts.head')

<body>

  @include('website.layouts.header')


 
  

  
  <div class="popular_causes_area section_padding" style="background-color: #ffffff;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section_title text-center mb-55">
            <h3><span style="color: #0053c0;">المنظمات</span></h3>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($organizations as $organization)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="single_cause" style="background-color: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px;">
            <div class="causes_content text-center" style="padding: 20px;">
              <h4 style="color: #1e90ff; font-size: 1.5rem; margin-bottom: 15px;">{{ $organization->organization_name }}</h4>
              <p style="color: #333333;"><strong style="color: #0053c0;">العنوان:</strong> {{ $organization->address }}</p>
              <p style="color: #333333;"><strong style="color: #0053c0;">تاريخ الإنشاء:</strong> {{ \Carbon\Carbon::parse($organization->time_of_creation)->format('d F Y') }}</p>
              <a href="{{ route('web_organizations_single', $organization->id) }}" class="read_more" style="background-color: #0053c0; color: #ffffff; padding: 8px 20px; border-radius: 5px; text-decoration: none; display: inline-block; transition: background-color 0.3s ease;">إظهار التفاصيل</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>




  <!-- JS here -->
    


    @include('website.layouts.script')







</body>
</html>