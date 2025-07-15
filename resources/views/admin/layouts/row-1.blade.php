<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- Total Users -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">إجمالي المستخدمين</span>
                        <span class="info-box-number">{{ $totalUsers }}</span>
                    </div>
                </div>
            </div>

            <!-- Total Volunteers -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-plus"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">إجمالي المتطوعين</span>
                        <span class="info-box-number">{{ $totalVolunteers }}</span>
                    </div>
                </div>
            </div>

            <!-- Total Volunteer Tasks -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tasks"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">مهام المتطوعين</span>
                        <span class="info-box-number">{{ $totalVolunteerTasks }}</span>
                    </div>
                </div>
            </div>

            <!-- Total Financial Supports -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-donate"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">الدعم المالي</span>
                        <span class="info-box-number">{{ $totalFinancialSupports }}</span>
                    </div>
                </div>
            </div>

            <!-- Total Funding Organizations -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">تمويل المنظمات</span>
                        <span class="info-box-number">{{ $totalFundingOrganizations }}</span>
                    </div>
                </div>
            </div>

            <!-- Total Employed Available Resources -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-boxes"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">الموارد المتاحة</span>
                        <span class="info-box-number">{{ $totalEmployedAvailableResources }}</span>
                    </div>
                </div>
            </div>

            <!-- Active Events -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-calendar-check"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">الفعاليات النشطة</span>
                        <span class="info-box-number">{{ $activeEvents }}</span>
                    </div>
                </div>
            </div>

            <!-- Total Volunteer Hours
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-clock"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">ساعات العمل المتطوعة</span>
                        <span class="info-box-number"> $totalVolunteerHours }}</span>
                    </div>
                </div>
            </div>
 -->
            <!-- Participation Rate -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-olive elevation-1"><i class="fas fa-chart-pie"></i></span>
                    <div class="info-box-content text-right">
                        <span class="info-box-text">معدل المشاركة</span>
                        <span class="info-box-number">{{ number_format($participationRate, 2) }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>