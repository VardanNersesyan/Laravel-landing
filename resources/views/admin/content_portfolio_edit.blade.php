<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('portfolioEdit',array('page'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name', 'Title:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'Enter page title']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('filter', 'Filter:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('filter', $data['filter'], ['class' => 'form-control','placeholder'=>'Enter page alias']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Old image:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/img/'.$data['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'New image:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Select image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file"]) !!}
        </div>
    </div>



    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>