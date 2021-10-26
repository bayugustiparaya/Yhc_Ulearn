@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('instructor.course.list') }}">Courses</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
  <h1 class="page-title">Add Quiz</h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">

    
    @include('instructor/course/tabs')
    

    <form method="POST" action="{{ route('instructor.course.info.save') }}" id="courseForm">
      {{ csrf_field() }}
      <input type="hidden" name="course_id" value="{{ $course->id }}">
      <div class="row">
      
        <div class="form-group col-md-4">
            <label class="form-control-label">Course Title <span class="required">*</span></label>
            <input type="text" class="form-control" name="course_title" 
                placeholder="Course Title" disabled value="{{ $course->course_title }}" />
                @if ($errors->has('course_title'))
                    <label class="error" for="course_title">{{ $errors->first('course_title') }}</label>
                @endif
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Untuk Materi Keberapa? <span class="required">*</span></label>
            <select class="form-control" name="section">
                <option value="" hidden>Select</option>
                @foreach($section as $sc)
                    <option value="{{ $sc->section_id }}">
                        {{ $sc->title }}
                    </option>
                @endforeach
            </select>
            
            @if ($errors->has('category_id'))
                <label class="error" for="category_id">{{ $errors->first('category_id') }}</label>
            @endif
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Total Soal <span class="required">*</span></label>
            <input type="text" class="form-control" name="total_soal" 
                placeholder="Total Soal" value="" />
                @if ($errors->has('course_title'))
                    <label class="error" for="course_title">{{ $errors->first('course_title') }}</label>
                @endif
        </div>
        <div class="form-group col-md-4">
            <label class="form-control-label">Quiz Duration <span class="required">*</span></label>
            <input type="text" class="form-control" name="durasi" 
                placeholder="Total Soal" value="" />
                @if ($errors->has('course_title'))
                    <label class="error" for="course_title">{{ $errors->first('course_title') }}</label>
                @endif
        </div>
      </div>
      <hr>
      <div class="form-group row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-default btn-outline">Reset</button>
        </div>
      </div>
      
    </form>
  </div>
</div>

       
      <!-- End Panel Basic -->
</div>

@endsection

@section('javascript')
<script type="text/javascript">

    $(document).ready(function()
    { 
        tinymce.init({ 
            selector:'textarea',
            menubar:false,
            statusbar: false,
            content_style: "#tinymce p{color:#76838f;}"
        });

        $(".tagsinput").tagsinput();

        $("#courseForm").validate({
            rules: {
                course_title: {
                    required: true
                },
                category_id: {
                    required: true
                },
                kelas: {
                    required: true
                }
            },
            messages: {
                course_title: {
                    required: 'The course title field is required.'
                },
                category_id: {
                    required: 'The category field is required.'
                },
                kelas: {
                    required: 'The kelas field is required.'
                }
            }
        });

        $('.course-id-empty').click(function()
        {
            toastr.error("Fill course info to proceed");
        });
    });
</script>
@endsection