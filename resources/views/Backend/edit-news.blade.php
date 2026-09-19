@extends('Backend.dashboard')
@section('title')
Edit News
@endsection
@section('content')
<!--=====================================
=    Start Session & Errors Display     =
======================================-->
<!-- Session Alert Start -->
@if(Session::has('success'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if(Session::has('danger'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
<!-- Session Alert End -->
<!-- Dislay Errors Start -->
@if(count($errors) > 0)
<div class="row">
    <div class="col-10 offset-1">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
<!-- Dislay Errors End -->
<!--====  End of Section Sessions & Errors Display  ====-->
<!--=====================================
=            Start Annual Report Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This News : {{ $news->name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('newspage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To News List
                </a>
                <form action="{{ route('update.news',['id'=>$news->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="home-page-label">News Date</label>
                            <input type="date" name="news_date" value="{{ $news->news_date }}" class="form-control">
                        </div>
                    <div class="form-group">
                        <label class="home-page-label">News Title</label>
                        <input type="text" name="name" value="{{ $news->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">News Title (EN)</label>
                        <input type="text" name="name_en" value="{{ $news->name_en }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Short Description</label>
                        
                        <textarea rows="5" name="short_description"  class="form-control">{{ $news->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Short Description (EN)</label>
                        
                        <textarea rows="5" name="short_description_en"  class="form-control">{{ $news->short_description_en }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Body</label>
                        <textarea rows="5" name="body" id="addpage" class="form-control">{{ $news->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Body (EN)</label>
                        <textarea rows="5" name="body_en" id="addpage_en" class="form-control">{{ $news->body_en }}</textarea>
                    </div>
                  
                    <div class="form-group">
                        <label class="home-page-label">Upload Images</label>
                        
                        <input type="file" class="form-control" name="images[]" placeholder="image" multiple>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Upload Images (EN)</label>
                        
                        <input type="file" class="form-control" name="images_en[]" placeholder="image" multiple>
                    </div>
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Position</label>
                            <div class="input-group"><select name="position" class="form-control news-lookup" id="edit-news-position">
                                <option value="">Select Position</option>
                                @foreach($position as $cat)
                                
                                <option @if($cat->id == $news->position) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select><div class="input-group-append"><button type="button" class="btn btn-outline-primary add-lookup" data-type="position" data-target="#edit-news-position">+</button></div></div>
                        </div>
                   
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Township</label>
                            <div class="input-group"><select name="township" class="form-control news-lookup" id="edit-news-township">
                                <option value="">Select Township</option>
                                @foreach($township as $tsp)
                                <option @if($tsp->id == $news->tsp) selected @endif value="{{ $tsp->id }}">{{ $tsp->name }}</option>
                                @endforeach
                            </select><div class="input-group-append"><button type="button" class="btn btn-outline-primary add-lookup" data-type="township" data-target="#edit-news-township">+</button></div></div>
                        </div>
                         <div class="form-group">
                            <label class="home-page-label">Covid</label>
                             
                             <?php 
                        $checked = $news->covid == 1 ? 'checked' : '';
                        ?>
                      
                       <input <?php echo $checked; ?> type="checkbox" id="covid" name="covid" value="1">
                        </div>
                        <div class="form-group">
                        <label class="home-page-label">Covid Cover Image</label>
                        <input name="cover" type="file" class="form-control">
                    </div>
                        
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Informations</button>
                </form>
                <div class="mb-3">
                        
                        <table>
                            
                        <?php 
                        $results = DB::select('select * from news_images where news_id = :id', ['id' => $news->id]);
                        
        foreach ($results as $user) {
            $image = $user->name;
    ?>                  
                        <tr>
                        <td><img src="{{ asset('uploads/news/' . $image) }}" height="100px"></td>
                        <td><a class="btn btn-danger btn-sm" href="{{ route('deletenewsimage', ['id'=>$user->id]) }}" >Delete</a></td>
                        </tr>
                       <?php
        }
                        ?>
                       </table> 
                    </div>
                
               
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="lookupModal" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="lookupModalTitle">Add</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><input type="text" id="lookupName" class="form-control mb-2" placeholder="Enter name"><input type="text" id="lookupNameEn" class="form-control mb-2" placeholder="English name"><div class="input-group mb-2" id="districtPicker"><select id="lookupDistrict" class="form-control"><option value="">Select District</option>@foreach($districts as $district)<option value="{{ $district->id }}">{{ $district->name }}</option>@endforeach</select><div class="input-group-append"><button type="button" class="btn btn-outline-primary" id="addDistrict">+</button></div></div><small class="text-danger" id="lookupError"></small></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" id="saveLookup">Save</button></div></div></div></div>
<!--====  End of Announcement Section  ====-->
@endsection
@section('ckeditor')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
 <script>
CKEDITOR.replace( 'addpage', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace( 'addpage_en', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
$('.news-lookup').select2({ width: '100%' });
var lookupType, lookupTarget;
$('.add-lookup').on('click', function(){ lookupType=$(this).data('type'); lookupTarget=$(this).data('target'); $('#lookupModalTitle').text('Add New '+(lookupType==='position'?'Position':'Township')); $('#lookupName').val(''); $('#lookupNameEn').val(''); $('#lookupDistrict').val(''); $('#lookupNameEn').show(); $('#districtPicker').toggle(lookupType==='township'); $('#lookupError').text(''); $('#lookupModal').modal('show'); });
$('#addDistrict').on('click', function(){ lookupType='district'; lookupTarget='#lookupDistrict'; $('#lookupModalTitle').text('Add New District'); $('#lookupName').val(''); $('#lookupNameEn').val(''); $('#lookupNameEn').show(); $('#districtPicker').hide(); $('#lookupError').text(''); });
$('#saveLookup').on('click', function(){ var name=$('#lookupName').val().trim(), districtId=$('#lookupDistrict').val(); if(!name){$('#lookupError').text('Name is required.');return;} if(lookupType==='township'&&!districtId){$('#lookupError').text('Please select a district.');return;} $.post('{{ route('news.lookup.store', ['type'=>'__type__']) }}'.replace('__type__',lookupType),{_token:'{{ csrf_token() }}',name:name,name_en:$('#lookupNameEn').val(),district_id:districtId}).done(function(item){$(lookupTarget).append(new Option(item.text,item.id,true,true)).trigger('change');$('#lookupModal').modal('hide');}).fail(function(xhr){$('#lookupError').text(xhr.responseJSON&&xhr.responseJSON.message?xhr.responseJSON.message:'Unable to save.');}); });
</script>
@endsection
