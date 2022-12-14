@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>


                        <div class="form-group">
                            <label for="season">season</label>
                            <select name='season' class="form-control">
                                <option value="1">SS</option>
                                <option value="2">FW</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">type（M/W/Unisex)</label>
                            <select name='type' class="form-control">
                                <option value="1">Mens</option>
                                <option value="2">Womens</option>
                                <option value="3">Unisex</option>
                             </select>
                        </div>

                        <div class="form-group">
                            <label for="category">category(outer/bottoms..)</label>
                            <select name='category' class="form-control">
                                <option value="1">Outer</option>
                                <option value="2">Bottoms</option>
                                <option value="3">Shirts</option>
                                <option value="4">Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">detail</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">register</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
