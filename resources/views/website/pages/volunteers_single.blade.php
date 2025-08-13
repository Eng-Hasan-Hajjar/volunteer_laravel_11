<!DOCTYPE html>
<html lang="ar">

@include('website.layouts.head')

<body>

  @include('website.layouts.header')

  <div class="section_padding" style="background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%); padding: 100px 0;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card" style="background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%); border: 1px solid #e0e0e0; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);">
            <div style="overflow: hidden; height: 300px; display: flex; align-items: center; justify-content: center; background-color: #f1f1f1;">
              <img src="{{ $volunteer->image_url }}" alt="{{ $volunteer->person->name ?? 'متطوع' }} Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
            <div class="card-header text-center" style="background: linear-gradient(90deg, #0053c0 0%, #1e90ff 100%); padding: 30px; border-bottom: 1px solid #e0e0e0;">
              <h1 style="color: #ffffff; font-size: 2.5rem; font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                {{ $volunteer->person->name ?? 'غير محدد' }}
              </h1>
            </div>
            <div class="card-body" style="padding: 40px;">
              <div class="row">
                <div class="col-md-4 text-right" style="border-right: 1px solid #e0e0e0; padding-right: 20px;">
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">البريد الإلكتروني:</strong> {{ $volunteer->person->email ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">رقم التواصل:</strong> {{ $volunteer->person->contact_number ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">الرقم القومي:</strong> {{ $volunteer->person->national_number ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">تاريخ الميلاد:</strong> {{ \Carbon\Carbon::parse($volunteer->person->birth_date)->format('d F Y') ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">المسمى الوظيفي:</strong> {{ $volunteer->person->job_title ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">الجنسية:</strong> {{ $volunteer->person->nationality ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">القسم:</strong> {{ $volunteer->person->department ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">تاريخ التعيين:</strong> {{ \Carbon\Carbon::parse($volunteer->person->hiring_date)->format('d F Y') ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">العنوان:</strong> {{ $volunteer->person->address ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">ملاحظات:</strong> {{ $volunteer->person->notes ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem;"><strong style="color: #0053c0;">نشط / غير نشط:</strong> {{ $volunteer->person->is_active ? 'نشط' : 'غير نشط' }}</p>
                </div>
                <div class="col-md-8">
                  <div class="collapsible-section mb-4 text-center">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      أوقات التفرغ <span style="color: #1e90ff;">(تفاصيل)</span>
                    </h4>
                    <p style="color: #333333; text-align: right; display: block; padding: 0 15px;" id="availability-content">
                      {{ $volunteer->person->availability_times ?? 'غير محدد' }}
                    </p>
                  </div>
                  <div class="collapsible-section mb-4 text-center">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      الدوافع للمشاركة <span style="color: #1e90ff;">(تفاصيل)</span>
                    </h4>
                    <p style="color: #333333; text-align: right; display: block; padding: 0 15px;" id="motivation-content">
                      {{ $volunteer->person->motivation ?? 'غير محدد' }}
                    </p>
                  </div>
                  <div class="collapsible-section mb-4 text-center">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      المهارات <span style="color: #1e90ff;">(عدد: {{ $volunteer->volunteerSkills->count() }})</span>
                    </h4>
                    <ul style="list-style: none; padding: 0; color: #333333; text-align: right; display: block;" id="skills-content">
                      @forelse($volunteer->volunteerSkills as $skill)
                        <li style="margin-bottom: 10px; padding: 5px 15px; background: #ffffff; border-radius: 5px;">
                          {{ $skill->skill->skill_name ?? 'غير محدد' }} 
                          <span style="color: #0053c0;">(مدة الخبرة: {{ $skill->experience_period ?? 'غير محدد' }} أشهر)</span>
                        </li>
                      @empty
                        <li style="margin-bottom: 10px;">لا توجد مهارات مسجلة</li>
                      @endforelse
                    </ul>
                  </div>
                  <div class="collapsible-section mb-4 text-center">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      الفعاليات <span style="color: #1e90ff;">(عدد: {{ $volunteer->eventVolunteers->count() }})</span>
                    </h4>
                    <ul style="list-style: none; padding: 0; color: #333333; text-align: right; display: block;" id="events-content">
                      @forelse($volunteer->eventVolunteers as $event)
                        <li style="margin-bottom: 10px; padding: 5px 15px; background: #ffffff; border-radius: 5px;">
                          {{ $event->event->event_name ?? 'غير محدد' }} 
                          <span style="color: #0053c0;">
                            (من: {{ \Carbon\Carbon::parse($event->event->start_day)->format('d F Y') }} 
                            إلى: {{ \Carbon\Carbon::parse($event->event->end_day)->format('d F Y') ?? 'غير محدد' }})
                          </span>
                        </li>
                      @empty
                        <li style="margin-bottom: 10px;">لا توجد فعاليات مسجلة</li>
                      @endforelse
                    </ul>
                  </div>
                  <div class="collapsible-section mb-4 text-center">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      المهام <span style="color: #1e90ff;">(عدد: {{ $volunteer->volunteerTasks->count() }})</span>
                    </h4>
                    <ul style="list-style: none; padding: 0; color: #333333; text-align: right; display: block;" id="tasks-content">
                      @forelse($volunteer->volunteerTasks as $task)
                        <li style="margin-bottom: 10px; padding: 5px 15px; background: #ffffff; border-radius: 5px;">
                          {{ $task->designation ?? 'غير محدد' }} 
                          <span style="color: #0053c0;">(الفعالية: {{ $task->event->event_name ?? 'غير محدد' }})</span>
                        </li>
                      @empty
                        <li style="margin-bottom: 10px;">لا توجد مهام مسجلة</li>
                      @endforelse
                    </ul>
                  </div>
                </div>
              </div>
              <a href="{{ route('web_volunteers') }}" class="read_more" style="background: linear-gradient(90deg, #0053c0 0%, #1e90ff 100%); color: #ffffff; padding: 12px 30px; border-radius: 25px; text-decoration: none; display: inline-block; transition: transform 0.3s ease, box-shadow 0.3s ease; margin-top: 30px;">
                رجوع للقائمة
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // تحسين السلوك القابل للطي مع انتقال سلس
    document.querySelectorAll('.collapsible-section h4').forEach(header => {
      header.addEventListener('click', function() {
        const content = this.nextElementSibling;
        if (content.style.display === 'block') {
          content.style.maxHeight = content.scrollHeight + 'px';
          setTimeout(() => content.style.maxHeight = '0px', 0);
        } else {
          content.style.maxHeight = content.scrollHeight + 'px';
        }
        content.style.transition = 'max-height 0.3s ease';
      });
    });
  </script>

  @include('website.layouts.script')

</body>
</html>