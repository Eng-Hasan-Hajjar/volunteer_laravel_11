<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">إحصائيات الموارد</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="{{ route('volunteers.index') }}" class="dropdown-item">عرض المتطوعين</a>
                            <a href="{{ route('event-volunteers.index') }}" class="dropdown-item">عرض مشاركات المتطوعين</a>
                            <a href="{{ route('volunteer-tasks.index') }}" class="dropdown-item">عرض مهام المتطوعين</a>
                            <a href="{{ route('financial-supports.index') }}" class="dropdown-item">عرض الدعم المالي</a>
                            <a href="{{ route('funding-organizations.index') }}" class="dropdown-item">عرض تمويل المنظمات</a>
                            <a href="{{ route('employed-available-resources.index') }}" class="dropdown-item">عرض الموارد المتاحة</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <!-- Resources Statistics Chart -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="resourcesChart" style="height: 250px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Latest Volunteers -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">آخر المتطوعين</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($latestVolunteers as $volunteer)
                                        <li class="list-group-item">
                                            <a href="{{ route('volunteers.edit', $volunteer->id) }}">{{ $volunteer->person->name ?? 'غير متوفر' }}</a>
                                            <span class="badge bg-primary float-end">{{ $volunteer->created_at->diffForHumans() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Latest Event Volunteers -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">آخر مشاركات المتطوعين</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($latestEventVolunteers as $eventVolunteer)
                                        <li class="list-group-item">
                                            <strong>{{ $eventVolunteer->volunteer->person->name ?? 'غير متوفر' }}</strong> في
                                            <a href="{{ route('event-volunteers.edit', $eventVolunteer->id) }}">{{ $eventVolunteer->event->name ?? 'فعالية غير معروفة' }}</a>
                                            <span class="text-muted">{{ $eventVolunteer->created_at->diffForHumans() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('resourcesChart').getContext('2d');
    const resourcesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['المتطوعون', 'مشاركات المتطوعين', 'مهام المتطوعين', 'الدعم المالي', 'تمويل المنظمات', 'الموارد المتاحة'],
            datasets: [{
                data: [
                    {{ $totalVolunteers }},
                    {{ $totalEventVolunteers }},
                    {{ $totalVolunteerTasks }},
                    {{ $totalFinancialSupports }},
                    {{ $totalFundingOrganizations }},
                    {{ $totalEmployedAvailableResources }}
                ],
                backgroundColor: ['#28a745', '#dc3545', '#ffc107', '#17a2b8', '#6c757d', '#007bff'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>