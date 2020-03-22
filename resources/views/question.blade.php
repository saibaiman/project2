@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1 style="text-align: center">
                お問い合わせ
            </h1>
            <font size="2">
                <p>Unipediaをご利用いただきありがとうございます。</p>
                <p>お問い合わせはUnipedia公式SNSにて受け付けております。</p>
                <p>お手数ですが以下の公式アカウント宛にDMをお願いいたします。</p>
            </font>
            <p style="text-align: center">
                < Unipedia公式SNS >
            </p>


<!-- Button Instagram -->
<div class="btn__container">
    <a href="https://www.instagram.com/kei_to1212/?hl=ja" class="btn" target="_blank">
        <i class="fab fa-instagram"></i>
        <span>instagram</span>
    </a>
    <a href="https://twitter.com/takuto_murase" class="btn-f" target="_blank">
        <i class="fab fa-twitter"></i>
        <span>twitter</span>
    </a>
</div>




            <div class="panel panel-primary">
                <div class="panel-heading">
                    よくある質問
            	</div>
                    <ul class="list-group">
                            <a class="list-group-item" data-toggle="collapse" href="#question1">
                                質問A
                            </a>
                            <div class="collapse" id="question1">
                                <div class="well">
                                    返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A返答A
                                </div>
                            </div>
                            <a class="list-group-item" data-toggle="collapse" href="#question2">
                                質問B
                            </a>
                            <div class="collapse" id="question2">
                                <div class="well">
                                    質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B質問B
                                </div>
                            </div>
                            <a class="list-group-item" data-toggle="collapse" href="#question3">
                                質問C
                            </a>
                            <div class="collapse" id="question3">
                                <div class="well">
                                    質問C質問C質問C質問C質問C質問C質問C質問C質問C質問C質問C質問C質問C質問C質問C
                                </div>
                            </div>
                    </ul>
            </div>
        </div>
    </div>
</div>
@endsection