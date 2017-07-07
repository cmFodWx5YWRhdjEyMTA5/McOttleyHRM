
@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Discipline </a></li>
                <li class="active"> Templates </li>   
              </ul>
    

              <div class="row">
                <div class="col-md-12">
                <section class="scrollable wrapper w-f">
                    <section class="vbox">
                <form method="post" action="/save-periodic-performance-review">
                      <textarea id="report" name="report" >{!! $documents->content !!}</textarea>
                       <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                         <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </footer>
                    </form>        
                  </section>
                  </section>
                 
              
                </div>
              </div>


            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

 <script src="{{ asset('/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script>tinymce.init({ selector:'#report' ,menubar: false,
  browser_spellcheck: true,height: 700 });</script>






