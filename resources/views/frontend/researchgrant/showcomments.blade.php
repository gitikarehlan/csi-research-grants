@extends('frontend.master')
@section('title', 'comments')
@section('section-after-mainMenu')
@endsection

@section('main')

<section id="main">
           <div class="container">
         <div class="row">
         <div class="col-md-12">
         <div>
         <h1 class="section-header-style">View Proposal and Comments</h1>      
        </div>
          @if ( $errors->any() )
              
              <ul class="list-unstyle">
              <li>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
                     </li>
              </ul>
          @endif
                        <div class="col-md-8">
                              <h1 id="stepText"> <small id="stepSubText"></small></h1>
                            </div>
      {!! Form::open([ 'route'=>['user_comments',$a->proposal_id,$a->version_number],'files' => true]) !!}
      <div class="steps">
                  <div class="form-group" id="prop">
            
            <div class="col-md-12">
              <a href="{{action('ResearchGrantController@viewfile',[$a->version_path])}}" role="button" class="btn btn-success btn-md" data-toggle="tooltip" title="Proposal File">
  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View File
</a>
</div>
          
              </div>
         <br/><br/><br/> 
            <p><b>COMMENTS:</b</p>

                @forelse($a->versionComments as $c)

                 <div class="form-group">
                    <div class="panel-group" id="p1">
                      <div class="panel panel-default">
                        <div class="panel-heading" id="pcolor">
                  
                                            <div class="listing-items">
                                                  <div class="row">
                                                       <div class="col-md-12">
                                                          @if($c->type==1)
                                                          <p style="color:DarkGray;"><span class="glyphicon glyphicon-user"></span><b>ADMIN</b></p>
                                                          @else
                                                          <p style="color:DarkGray;"><span class="glyphicon glyphicon-user"></span><b>AUTHOR: {{$a->id}}</b></p>
                                                          @endif
                                                      </div>  
                                                   </div>
                                          </div>
                
                                </div>
                                    <div class="panel-body">{{$c->comments}}
                                    </div>
                      </div>
                </div>
            </div>
          @empty
             <div class="form-group">
                      <div class="panel-group">
                       <div class="panel panel-info">
                         <div class="panel-heading" id="pcolor">
                    
                                              <div class="listing-items">
                                                    <div class="row">
                                                         <div class="col-md-12">
                                                          <p><span class="glyphicon glyphicon-user"></span><b> NO COMMENTS FOR THIS VERSION </b></p>
                                                          </div>
                                                    </div>
                                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforelse

     {!! Form::Close() !!}
     
  </div>
  </section>
@endsection
