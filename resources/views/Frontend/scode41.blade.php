@extends('Frontend.Template.layout')
@section('title')
Contact us
@endsection
@section('content')
<!--Contact Start-->
<div class="contact-area">
    <div class="container">
        <!-- Session Alert Start -->
        @if(Session::has('success'))
        <br>
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
            <div class="col-12 pt_40">
                <div class="headline">
                    <h4>ဘိုးဘွားထောက်ပံ့ကြေး လျှောက်ထားခြင်း</h4>
                    <hr class="line">
                </div>
            </div>
       
  
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form action="{{ route('send.scode41') }}" method="post">
                    @csrf
                    <div class="form-row row">
                        <div class="form-group col-md-12">
                            <label>ဘိုးဘွားအမည်</label>
                            <input type="text" class="form-control"  name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>မွေးသက္ကရာဇ်</label>
                            <input type="text" class="form-control"  name="dob" required>
                        </div>
                        <div class="form-group col-6">
                            <label>နိုင်ငံသားစိစစ်ရေးအမှတ်</label>
                            <input type="text" class="form-control"  name="nrc" required>
                        </div>
                        <div class="form-group col-6">
                            <label>လူမျိုး</label>
                            <input type="text" class="form-control"  name="nationality" required>
                        </div>
                        <div class="form-group col-6">
                            <label>ကိုးကွယ်သည့်ဘာသာ</label>
                            <input type="text" class="form-control"  name="regilion" required>
                        </div>
                        <div class="form-group col-6">
                            <label>အဘအမည်</label>
                            <input type="text" class="form-control"  name="father" required>
                        </div>
                        <div class="form-group col-6">
                            <label>အမိအမည်</label>
                            <input type="text" class="form-control"  name="mother" required>
                        </div>
                        <div class="form-group col-6">
                            <label>ဇနီး/ခင်ပွန်းအမည်</label>
                            <input type="text" class="form-control"  name="spouse_name" required>
                        </div>
                        <div class="form-group col-6">
                            <label>မွေးရာဇာတိ</label>
                            <input type="text" class="form-control"  name="dop" required>
                        </div>
                        <div class="form-group col-6">
                            <label>လက်ရှိဝင်ငွေ</label>
                            <input type="text" class="form-control"  name="income" required>
                        </div>
                        
                        <div class="form-group col-6">
                            <label>ပင်စင်စား</label>
                            <input type="checkbox" class="form-control"  name="pensioner" required>
                        </div>
                        
                        <div class="form-group col-12">
                            <label>လိပ်စာ</label>
                            <textarea class="form-control" rows="8" name="address" required></textarea>
                        </div>
                       
                        <div class="form-group col-6">
                            <label>လျှောက်ပေးသူ၏ အမည်</label>
                            <input type="text" class="form-control"  name="assistant_name" required>
                        </div>
                        <div class="form-group col-6">
                            <label> တော်စပ်ပုံ</label>
                            <input type="text" class="form-control"  name="relationship" required>
                        </div>
                        <div class="form-group col-6">
                            <label> ဆက်သွယ်ရန်ဖုန်း</label>
                            <input type="text" class="form-control"  name="contact" required>
                        </div>
                        <div class="form-group col-6">
                            <label>  ရပ်/ကျေးအုပ်ချုပ်ရေးမှူး၏ ဆက်သွယ်ရန်ဖုန်း</label>
                            <input type="text" class="form-control"  name="yayaka" required>
                        </div>
                        <div class="form-group col-6">
                            <label>ဓာတ်ပုံ</label>
                            <input type="file" class="form-control"  name="photo" required>
                        </div>
                       
                        <div class="form-group col-6">
                            <label> အကိုးအကားနှင့် ထောက်ခံချက်များ </label>
                            <input type="file" class="form-control"  name="attached" required>
                        </div>
                        

                        

                        <div class="form-group col-6">
                            <button type="submit" class="btn-block btn-lg btn btn-contact btn-common" name="form_contact">ပေးပို့ရန်နှိပ်ပါ</button>
                        </div>
                    </div>
                </form>
            </div>
          

    </div>
</div>
<!--Contact End-->
@endsection
