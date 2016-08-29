@extends('layouts.layout')
@section('content')
    <div class="container-gv">
        <div class="content-gv">
            <div class="row">
                <div class="large-5 large-centered column title-gv color-blue-gv">
                    <h1>CREATE A CATEGORY</h1>
                </div>
            </div>
            <div class="row">
                <div class="large-12">
                    {{ Form::open(array('url' => 'categories')) }}
                        {{ Form::label('category_title', 'Title')}}
                        {{ Form::text('category_title') }}
                        {{ Form::label('category_description', 'Description')}}
                        {{ Form::text('category_description') }}
                        {{ Form::label('category_created', 'Created')}}
                        {{ Form::datetime('category_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
                        
                        {{ Form::label('Type') }}
                        {{ Form::select('type_id', 
                            (['0' => 'Select a Type'] + $types), 
                                null, 
                                ['class' => '']) }}


                        {{ Form::submit('Create a Category!', array('class' => 'button expanded')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection