<div style="margin:0px 50px 0px 50px;">

    @if($portfolio)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Name</th>
                <th>filter</th>
                <th>Create date</th>

                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($portfolio as $k => $item)

                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{!! Html::link(route('portfolioEdit',['page'=>$item->id]),$item->name,['alt'=>$item->name]) !!}</td>
                    <td>{{ $item->filter }}</td>
                    <td>{{ $item->created_at }}</td>

                    <td>
                        {!! Form::open(['url'=>route('portfolioEdit',['page'=>$item->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {{ method_field('DELETE') }}
                        {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
    @endif

    {!! Html::link(route('portfolioAdd'),'New item') !!}

</div>