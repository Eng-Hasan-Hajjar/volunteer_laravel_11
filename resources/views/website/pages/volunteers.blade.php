<!DOCTYPE html>
<html lang="ar">

@include('website.layouts.head')

<body style="direction: rtl;">

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

      <!-- Professional Search and Filter Card -->
      <div class="row mb-5 text-right" dir="rtl">
        <div class="col-12"  dir="rtl">
          <div class="card shadow-sm" dir="rtl" style="border-radius: 15px; border: none; background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);">
            <div class="card-body p-4" style="direction: rtl;">
              <form method="GET" dir="rtl"   action="{{ route('web_volunteers') }}" class="row g-3 align-items-end">
              
              <div class="col-md-2">
                  <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(90deg, #0053c0 0%, #1e90ff 100%); border: none; padding: 10px; border-radius: 5px; transition: transform 0.3s ease; text-align: center;">
                    <i class="fas fa-filter"></i> بحث
                  </button>
                </div>
              
                <div class="col-md-3">
                  <label for="search" class="form-label" style="color: #0053c0; font-weight: 600; text-align: right;">البحث باسم أو الرقم القومي:</label>
                  <div class="input-group">
                    <span class="input-group-text" style="background-color: #0053c0; color: #ffffff;"><i class="fas fa-search"></i></span>
                    <input type="text" id="search" name="search" class="form-control" placeholder="اكتب هنا..." value="{{ request('search') }}" style="border-left: none; border-radius: 0 5px 5px 0; text-align: right;">
                  </div>
                </div>
                <div class="col-md-1">
                  <label for="min_experience" class="form-label" style="color: #0053c0; font-weight: 600; text-align: right;">أدنى خبرة (أشهر):</label>
                  <input type="number" id="min_experience" name="min_experience" class="form-control" placeholder="0+" value="{{ request('min_experience') }}" min="0" style="border-radius: 5px; text-align: right;">
                </div>
                <div class="col-md-3">
                  <label for="start_date" class="form-label" style="color: #0053c0; font-weight: 600; text-align: right;">تاريخ البداية:</label>
                  <div class="input-group">
                    <span class="input-group-text" style="background-color: #0053c0; color: #ffffff;"><i class="fas fa-calendar-alt"></i></span>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') ?: date('Y-m-d') }}" style="border-left: none; border-radius: 0 5px 5px 0; text-align: right;">
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="end_date" class="form-label" style="color: #0053c0; font-weight: 600; text-align: right;">تاريخ النهاية:</label>
                  <div class="input-group">
                    <span class="input-group-text" style="background-color: #0053c0; color: #ffffff;"><i class="fas fa-calendar-alt"></i></span>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') ?: date('Y-m-d', strtotime('+1 month')) }}" style="border-left: none; border-radius: 0 5px 5px 0; text-align: right;">
                  </div>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>

    

      <div class="row">
        @foreach($volunteers as $volunteer)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="single_cause" style="background-color: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; position: relative; text-align: right;">
            <div style="overflow: hidden; height: 200px; display: flex; align-items: center; justify-content: center; background-color: #f1f1f1;">
              <img src="{{ $volunteer->image_url }}" alt="{{ $volunteer->person->name ?? 'متطوع' }} Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
            <div class="causes_content" style="padding: 20px;">
              <h4 style="color: #1e90ff; font-size: 1.5rem; margin-bottom: 15px; text-align: right;">
                {{ $volunteer->person->name ?? 'غير محدد' }} 
              </h4>
              <h4 style="color: #0053c0; font-size: 1.2rem; margin-bottom: 15px; text-align: right;">
                {{ $volunteer->person->email ?? '' }}
              </h4>
              <p style="color: #333333; text-align: right;"><strong style="color: #0053c0;">الرقم القومي: </strong> {{ $volunteer->person->national_number }}</p>
              <a href="{{ route('web_volunteers_single', $volunteer->id) }}" class="read_more" style="background-color: #0053c0; color: #ffffff; padding: 8px 20px; border-radius: 5px; text-decoration: none; display: inline-block; transition: background-color 0.3s ease; text-align: center;">عرض التفاصيل</a>
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