@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                

                    <div class="mt-4">
                        <form action="{{ route('search')}}" method="GET">
                            <div class="container">
                                <div class="row">

                                    <div class="col-6">
                                        <input type="text" name="name" value="@if(isset($keyword_name)) {{$keyword_name}}@endif" class="form-control" placeholder="商品名で検索">
                                    </div>

                                    <div class="col-6">
                                        <input type="submit" value="検索" class="btn btn-default">
                                    </div>

                                </div>
                         </div>
                         <div class="container">
                             <div class="row mt-3">
                                     <div class="col-6">
                                         <select name="type" class="form-control">
                                         <option value=""
                                         @if(!isset($keyword_type)) selected @endif>type(未選択）</option>
                                         <option value="1"
                                         @if($keyword_type == 1) selected @endif>
                                         Mens </option>
                                         <option value="2"
                                         @if($keyword_type == 2) selected @endif>
                                         Womens</option>
                                         <option value="3"
                                         @if($keyword_type == 3) selected @endif>
                                         Unisex</option>
                                        
                                         </select>
                                     </div>
                            
                                     <div class="col-6">
                                         <select name="season" class="form-control">
                                         <option value=""
                                         @if(empty($keyword_season)) selected @endif
                                         >season(未選択）</option>
                                         <option value="1"
                                         @if($keyword_season == 1) selected @endif >
                                         SS</option>
                                         <option value="2"
                                         @if($keyword_season == 2) selected @endif>
                                         FW</option>
                                        
                                         </select>
                                 </div>
                             </div>

                         </div>
                         <div class="container">

                             <div class="row mt-3">
                                     <div class="col-6">
                                         <select name="category" class="form-control">
                                            <option value=""
                                            @if(empty($keyword_category)) selected @endif
                                            >category(未選択）</option>
                                            <option value="1"
                                            @if($keyword_category == 1) selected @endif>
                                            Outer</option>
                                            <option value="2"
                                            @if($keyword_category == 2) selected @endif>
                                            bottoms</option>
                                            <option value="3"
                                            @if($keyword_category == 3) selected @endif
                                            >Shirts</option>
                                            <option value="4"
                                            @if($keyword_category == 4) selected @endif
                                            >Others</option>
                                         </select>
                                 </div>
                             </div>

                         </div>


                        </form>
                    </div>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>@sortablelink('id', 'ID')</th>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('type', 'type')</th>
                                <th>@sortablelink('category', 'category')</th>
                                <th>@sortablelink('season', 'season')</th>
                                <!-- <th>detail</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $type[$item->type] }}</td>
                                    <!-- <td>{{ $category[$item->category] }}</td> -->
                                    <td>{{$item->category}}{{ $category[$item->category] }}</td>
                                    <td>{{$season[$item->season]}}</td>
                                    <!-- <td>{{ $item->detail }}</td> -->
                                    <td>
                                            <form action="{{ route('delete', ['item_id' => $item->id])}}" method="POST">
                                                @csrf 
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-primary" >t</button></form>
                                    </td>

                                    <td>
                                        <a href="{{ route('get_edit', ['item_id' => $item->id])}}"><button class="btn btn-primary">e</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
