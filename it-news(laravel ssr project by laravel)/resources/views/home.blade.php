@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{ Str::slug("min ga lar par") }}
                    @php

                    $category = \App\Category::all();
                    $article = \App\Article::all();
                    foreach ($article as $a){
                        foreach ($category as $c){
                            if ($a->category_id == $c->id){
                                $result = $c->slug;
                            echo $result;
                            }
                        }
                    }

                    @endphp
                </div>
            </div>
        </div>
        {{ \App\Category::all()->random()->id }}
    </div>
</div>
@endsection
