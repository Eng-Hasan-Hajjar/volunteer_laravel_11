@extends('admin.layouts.app')

@section('content')
<style>
    .content-wrapper { background-color: #f4f6f9; }
    .card { border-radius: 10px; }
    .card-header { background-color: #ffffff; border-bottom: 1px solid #e3e6f0; }
    .table th, .table td { vertical-align: middle; text-align: right; }
    .btn-primary { background-color: #4e73df; border-color: #4e73df; }
    .btn-primary:hover { background-color: #2e59d9; border-color: #2e59d9; }
    .filter-form .form-control { border-radius: 0.35rem; }
    .filter-form select, .filter-form input { margin-bottom: 10px; }
</style>

<div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">مهارات المتطوعين</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-left">
                        <a href="{{ route('volunteer-skills.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> إضافة مهارة متطوع جديدة
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline w-100">
                        <div class="card-header" dir="rtl" style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="card-title">قائمة مهارات المتطوعين</h3>
                            <div class="card-tools">
                                <form action="{{ route('volunteer-skills.index') }}" method="GET" class="filter-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="search" class="form-control" placeholder="بحث باسم المتطوع أو المهارة..." value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="id_volunteer" class="form-control">
                                                <option value="">-- المتطوع --</option>
                                                @foreach(\App\Models\Volunteer::with('person')->get() as $volunteer)
                                                    <option value="{{ $volunteer->id }}" {{ request('id_volunteer') == $volunteer->id ? 'selected' : '' }}>{{ $volunteer->person->name ?? 'غير متوفر' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="id_skills" class="form-control">
                                                <option value="">-- المهارة --</option>
                                                @foreach(\App\Models\Skill::all() as $skill)
                                                    <option value="{{ $skill->id }}" {{ request('id_skills') == $skill->id ? 'selected' : '' }}>{{ $skill->skill_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="experience_period" class="form-control" placeholder="مدة الخبرة (أشهر)..." value="{{ request('experience_period') }}" min="0">
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i class="fas fa-filter"></i> فلترة
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show text-right" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show text-right" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped text-right m-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th style="width: 25%">المتطوع</th>
                                            <th style="width: 25%">المهارة</th>
                                            <th style="width: 25%">مدة الخبرة (بالأشهر)</th>
                                            <th style="width: 25%">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($volunteerSkills as $volunteerSkill)
                                            <tr>
                                                <td>{{ $volunteerSkill->volunteer->id_person ? $volunteerSkill->volunteer->person->name : 'غير متوفر' }}</td>
                                                <td>{{ $volunteerSkill->skill->skill_name }}</td>
                                                <td>{{ $volunteerSkill->experience_period }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('volunteer-skills.edit', $volunteerSkill) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i> تعديل
                                                        </a>
                                                        <form action="{{ route('volunteer-skills.destroy', $volunteerSkill) }}" method="POST" style="display:inline;" class="ml-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                                                <i class="fas fa-trash"></i> حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted p-4">
                                                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                                                    لا توجد مهارات متطوعين مسجلة
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-light clearfix w-100">
                            <small class="text-muted">آخر تحديث: {{ now()->format('Y-m-d H:i') }}</small>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection