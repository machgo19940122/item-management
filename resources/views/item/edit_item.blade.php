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
                <form method="POST" action="{{ route('edit_item', $item->id) }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{$item->name}}">
                        </div>


                        <div class="form-group">
                            <label for="season">season</label>
                            <select name='season' class="form-control">
                                <option value="1"  
                                <?php if($item->season == "1"):?>selected<?php endif ?>>
                                  SS</option>
                                <option value="2"  
                                <?php if($item->season == "2"): ?>selected<?php endif ?>>
                                  FW</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">type（M/W/Unisex)</label>
                            <select name='type' class="form-control">
                                <option value="1"
                                <?php if($item->type == "1"):?>selected<?php endif ?>
                                >Mens</option>
                                <option value="2"
                                <?php if($item->type == "2"):?>selected<?php endif ?>
                                >Womens</option>
                                <option value="3"
                                <?php if($item->type == "3"):?>selected<?php endif ?>
                                >Unisex</option>
                             </select>
                        </div>

                        <div class="form-group">
                            <label for="category">category(outer/bottoms..)</label>
                            <select name='category' class="form-control">
                                <option value="1"
                                <?php if($item->category == "1"):?>selected<?php endif ?>
                                >Outer</option>
                                <option value="2"
                                <?php if($item->category == "2"):?>selected<?php endif ?>
                                >Bottoms</option>
                                <option value="3"
                                <?php if($item->category == "3"):?>selected<?php endif ?>
                                >Shirts</option>
                                <option value="4"
                                <?php if($item->category == "4"):?>selected<?php endif ?>
                                >Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">detail</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">edit</button>
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