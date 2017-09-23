<div style="margin:0px 50px 0px 50px;">

    @if($services)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Name</th>
                <th>icon</th>
                <th>Text</th>
                <th>Create date</th>

                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($services as $k => $item)

                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{!! Html::link(route('servicesEdit',['page'=>$item->id]),$item->name,['alt'=>$item->name]) !!}</td>
                    <td>{{ $item->icon }}</td>
                    <td>{{ strip_tags($item->text) }}</td>
                    <td>{{ $item->created_at }}</td>

                    <td>
                        {!! Form::open(['url'=>route('servicesEdit',['page'=>$item->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {{ method_field('DELETE') }}
                        {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
    @endif

    {!! Html::link(route('servicesAdd'),'New service item') !!}

</div>