<!doctype html>
<html class="no-js" lang="ar" dir="rtl">

@include('website.layouts.head')

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    @include('website.layouts.header')
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center">
            <video class="video-bg" autoplay loop muted playsinline>
                <source src="{{asset('website/img/video.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="text-overlay">
                <div class="slider_text active">
                    <span class="text-white">انضم إلينا</span>
                    <h3 class="text-white">دعم التعليم للجميع</h3>
                    <p class="text-white">التعليم هو مفتاح المستقبل، ساهم في بناء غد أفضل للأطفال</p>
                    <a href="Join.html" class="boxed-btn3">اكتشف كيف</a>
                </div>
                <div class="slider_text">
                    <span class="text-white">ابدأ الآن</span>
                    <h3 class="text-white">ساعد الأطفال عندما يحتاجون</h3>
                    <p class="text-white">مع الكثير للاستهلاك وقلة الوقت، من الضروري ابتكار أفكار عنوان ذات صلة</p>
                    <a href="About.html" class="boxed-btn3">تعرف على المزيد</a>
                </div>
                <div class="slider_text">
                    <span class="text-white">تبرع اليوم</span>
                    <h3 class="text-white">غيّر حياة طفل</h3>
                    <p class="text-white">تبرعك يمكن أن يوفر الطعام والمأوى لمن هم في أمس الحاجة</p>
                    <a href="Donate.html" class="boxed-btn3">تبرع الآن</a>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- upcoming_events_area_start -->
    <div class="upcoming_events_area section_padding" style="background: linear-gradient(135deg, #4b85dc 0%, #ffffff 90%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span style="color: #1e90ff; text-transform: uppercase; letter-spacing: 2px;">الفعاليات القادمة</span></h3>
                        <p style="color: #666; font-size: 1.1rem;">اكتشف الفرص القادمة للمساهمة في مجتمعك</p>
                    </div>
                </div>
            </div>
            <div class="row text-right">
                @forelse ($events as $event)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="event-card position-relative overflow-hidden rounded-lg shadow-sm" style="background: #ffffff; transition: all 0.3s ease;">
                            @if ($event->main_image)
                                <img src="{{ asset($event->main_image) }}" alt="{{ $event->event_name }}" class="w-100 h-200px object-fit-cover">
                            @else
                                <div class="placeholder-image" style="height: 200px; background: #e9ecef; display: flex; align-items: center; justify-content: center; color: #adb5bd;">
                                    <i class="fas fa-calendar-alt fa-3x"></i>
                                </div>
                            @endif
                            <div class="p-4">
                                <h4 class="text-primary font-weight-bold mb-3" style="font-size: 1.5rem; color: #1e90ff;">{{ $event->event_name }}</h4>
                                <p class="text-muted mb-3"><strong style="color: #0053c0;">التاريخ:</strong> {{ \Carbon\Carbon::parse($event->start_day)->format('d F Y') }} - {{ \Carbon\Carbon::parse($event->end_day)->format('d F Y') }}</p>
                                <a href="{{ route('web_events_single', $event->id) }}" class="btn btn-primary btn-sm d-inline-block text-white" style="background: linear-gradient(90deg, #1e90ff, #0053c0); border: none; padding: 10px 20px; border-radius: 25px; transition: all 0.3s ease;">
                                    عرض التفاصيل <i class="fas fa-arrow-left ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">لا توجد فعاليات قادمة حالياً.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
 


    <!-- our_volunteers_area_start -->
    <div class="our_volunteers_area section_padding" style="background: linear-gradient(135deg, #ffffff 0%, #f5f7fa 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span style="color: #28a745; text-transform: uppercase; letter-spacing: 2px;">متطوعونا</span></h3>
                        <p style="color: #666; font-size: 1.1rem;">تعرف على أبطال المجتمع الذين يصنعون التغيير</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($volunteers as $volunteer)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="volunteer-card position-relative rounded-lg shadow-sm overflow-hidden" style="background: #ffffff; transition: all 0.3s ease; border: 1px solid #e9ecef;">
                            <div class="volunteer-image" style="height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f1f1f1;">
                                <img src="{{ $volunteer->person->image_url ?? asset('website/img/volenteer/placeholder.png') }}" alt="{{ $volunteer->person->name ?? 'متطوع' }} Image" class="img-fluid" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                            </div>
                            <div class="p-4 text-right">
                                <h4 class="text-success font-weight-bold mb-2" style="font-size: 1.5rem; color: #28a745;">{{ $volunteer->person->name ?? 'غير محدد' }}</h4>
                                <p class="text-muted mb-2"><strong style="color: #218838;">البريد الإلكتروني:</strong> {{ $volunteer->person->email ?? 'غير محدد' }}</p>
                                <p class="text-muted mb-3"><strong style="color: #218838;">الرقم القومي:</strong> {{ $volunteer->person->national_number }}</p>
                                <a href="{{ route('web_volunteers_single', $volunteer->id) }}" class="btn btn-success btn-sm text-white" style="background: linear-gradient(90deg, #28a745, #218838); border: none; padding: 10px 20px; border-radius: 25px; transition: all 0.3s ease;">
                                    عرض التفاصيل <i class="fas fa-arrow-left ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">لا يوجد متطوعون حالياً.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- our_volunteers_area_end -->

   <!-- our_organizations_area_start -->
    <div class="our_organizations_area section_padding" style="background: linear-gradient(135deg, #546c8f 0%, #ffffff 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span style="color: #dc3545; text-transform: uppercase; letter-spacing: 2px;">منظماتنا</span></h3>
                        <p style="color: #666; font-size: 1.1rem;">شركاءنا في بناء مجتمع أقوى وأفضل</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($organizations as $organization)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="organization-card position-relative rounded-lg shadow-sm overflow-hidden" style="background: #ffffff; transition: all 0.3s ease; border: 1px solid #e9ecef;">
                            <div class="p-4 text-right">
                                <h4 class="text-danger font-weight-bold mb-3" style="font-size: 1.5rem; color: #dc3545;">{{ $organization->organization_name }}</h4>
                                <p class="text-muted mb-2"><strong style="color: #c82333;">العنوان:</strong> {{ $organization->address }}</p>
                                <p class="text-muted mb-3"><strong style="color: #c82333;">تاريخ الإنشاء:</strong> {{ \Carbon\Carbon::parse($organization->time_of_creation)->format('d F Y') }}</p>
                                <a href="{{ route('organizations.show', $organization->id) }}" class="btn btn-danger btn-sm text-white" style="background: linear-gradient(90deg, #dc3545, #c82333); border: none; padding: 10px 20px; border-radius: 25px; transition: all 0.3s ease;">
                                    عرض التفاصيل <i class="fas fa-arrow-left ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">لا توجد منظمات حالياً.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- our_organizations_area_end -->
    <!-- footer_start -->
    @include('website.layouts.footer')
    <!-- footer_end -->
    <!-- JS here -->
    @include('website.layouts.script')
</body>
</html>