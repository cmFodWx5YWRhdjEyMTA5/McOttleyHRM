@extends('layouts.default')
@section('content')

        <section id="content">
          <section class="hbox stretch">
           
            <aside>
              <section class="vbox">
                        <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                     
                      <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-upload"></i> Upload</a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-file"></i> File</a>
                      <a href="/new-document"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"><i class="fa fa-folder-o"></i> Create New Document</a>
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                  
                    </div>
                  </div>
                </header>
                <section class="scrollable wrapper w-f">
                  
                   <!-- .accordion -->
                  <div class="panel-group m-b" id="accordion2">
                  @foreach($documents as $document)
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#{{ $document->id }}">
                         {{ $document->file_name }} 
                        </a>
                        <span class="badge bg-info text-muted m-l-sm pull-right">{{  $document->created_on }}</span>
                      </div>
                      <div id="{{ $document->id }}" class="panel-collapse in">
                        <div class="panel-body text-sm">
                         {!! $document->content !!}
                        </div>
                      </div>
                    </div>
                    @endforeach
                    
                  </div>
                  <!-- / .accordion -->
                
                </section>

                <footer class="footer bg-white b-t">
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t">
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                    
                        
                    </div>
                  </div>
                </footer>
              </section>

            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

 