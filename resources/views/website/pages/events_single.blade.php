<!DOCTYPE html>
<html lang="ar">

@include('website.layouts.head')

<body>

  @include('website.layouts.header')

  <div class="section_padding" style="background-color: #ffffff; padding: 100px 0;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card text-center" style="background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%); border: 1px solid #e0e0e0; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);">
            <div class="card-header text-center" style="background: linear-gradient(90deg, #0053c0 0%, #1e90ff 100%); padding: 30px; border-bottom: 1px solid #e0e0e0;">
              <h1 style="color: #ffffff; font-size: 2.5rem; font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                {{ $event->event_name }}
              </h1>
            </div>
            <div class="card-body" style="padding: 40px;">
              <div class="row">
                <div class="col-md-12 mb-4">
                  @if ($event->main_image)
                    <img src="{{ asset($event->main_image) }}" alt="{{ $event->event_name }}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px;">
                  @endif
                </div>
                <div class="col-md-4 text-right" style="border-right: 1px solid #e0e0e0; padding-right: 20px;">
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">المنسق:</strong> {{ $event->coordinator->name ?? 'غير محدد' }}</p>
                  <p style="color: #333333; font-size: 1.1rem; margin-bottom: 15px;"><strong style="color: #0053c0;">التاريخ:</strong> {{ \Carbon\Carbon::parse($event->start_day)->format('d F Y') }} - {{ \Carbon\Carbon::parse($event->end_day)->format('d F Y') }}</p>
                </div>
                <div class="col-md-8">
                  <div class="collapsible-section mb-4">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      المتطوعون <span style="color: #1e90ff;">(عدد: {{ $event->eventVolunteers->count() }})</span>
                    </h4>
                    <ul style="list-style: none; padding: 0; color: #333333; text-align: right; display: block;" id="volunteers-content">
                      @forelse($event->eventVolunteers as $volunteer)
                        <li style="margin-bottom: 10px; padding: 5px 15px; background: #ffffff; border-radius: 5px;">
                          {{ $volunteer->volunteer->person->name ?? 'غير محدد' }}
                        </li>
                      @empty
                        <li style="margin-bottom: 10px;">لا يوجد متطوعون مسجلون</li>
                      @endforelse
                    </ul>
                  </div>
                  <div class="collapsible-section mb-4">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      المهام <span style="color: #1e90ff;">(عدد: {{ $event->volunteerTasks->count() }})</span>
                    </h4>
                    <ul style="list-style: none; padding: 0; color: #333333; text-align: right; display: block;" id="tasks-content">
                      @forelse($event->volunteerTasks as $task)
                        <li style="margin-bottom: 10px; padding: 5px 15px; background: #ffffff; border-radius: 5px;">
                          {{ $task->designation ?? 'غير محدد' }} 
                          <span style="color: #0053c0;">(المتطوع: {{ $task->volunteer->person->name ?? 'غير محدد' }})</span>
                        </li>
                      @empty
                        <li style="margin-bottom: 10px;">لا توجد مهام مسجلة</li>
                      @endforelse
                    </ul>
                  </div>
                  <div class="collapsible-section mb-4">
                    <h4 style="color: #0053c0; margin-bottom: 10px; cursor: pointer;" onclick="this.classList.toggle('active'); var content = this.nextElementSibling; content.style.display = content.style.display === 'block' ? 'none' : 'block';">
                      معرض الصور <span style="color: #1e90ff;">(عدد: {{ $event->galleryImages->count() }})</span>
                    </h4>
                    <div style="list-style: none; padding: 0; color: #333333; text-align: right; display: block;" id="gallery-content">
                      @forelse($event->galleryImages as $image)
                        <img src="{{ asset($image->image_path) }}" alt="Gallery Image" style="max-width: 200px; margin: 10px; border-radius: 5px;">
                      @empty
                        <p style="margin-bottom: 10px;">لا توجد صور في المعرض</p>
                      @endforelse
                    </div>
                  </div>
                </div>
              </div>
              <a href="{{ route('web_events') }}" class="read_more" style="background: linear-gradient(90deg, #0053c0 0%, #1e90ff 100%); color: #ffffff; padding: 12px 30px; border-radius: 25px; text-decoration: none; display: inline-block; transition: transform 0.3s ease, box-shadow 0.3s ease; margin-top: 30px;">
                رجوع للقائمة
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.querySelectorAll('.collapsible-section h4').forEach(header => {
      header.addEventListener('click', function() {
        const content = this.nextElementSibling;
        if (content.style.display === 'block') {
          content.style.maxHeight = content.scrollHeight + 'px';
          setTimeout(() => content.style.maxHeight = '0px', 0);
        } else {
          content.style.maxHeight = content.scrollHeight + 'px';
        }
      });
    });
  </script>

  @include('website.layouts.script')

</body>
</html>