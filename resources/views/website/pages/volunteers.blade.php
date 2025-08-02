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
            <h3><span style="color: #0053c0;">متطوعونا</span></h3>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($volunteers as $volunteer)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="single_cause" style="background-color: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; overflow: hidden;">
            <div class="causes_content text-center" style="padding: 20px;">
              <h4 style="color: #1e90ff; font-size: 1.5rem; margin-bottom: 15px;">
                {{ $volunteer->person->name ?? 'غير محدد' }} 
              </h4>
              <h4 style="color: #0053c0; font-size: 1.5rem; margin-bottom: 15px;">
               {{ $volunteer->person->email ?? '' }}
              </h4>
              
              <p style="color: #333333;"><strong style="color: #0053c0;"> الرقم القومي: </strong> {{ $volunteer->person->national_number }}</p>
              <a href="{{ route('web_volunteers_single', $volunteer->id) }}" class="read_more" style="background-color: #0053c0; color: #ffffff; padding: 8px 20px; border-radius: 5px; text-decoration: none; display: inline-block; transition: background-color 0.3s ease;">عرض التفاصيل</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  @include('website.layouts.script')

</body>
</html>