@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="text-center" style="font-size:24px">
                お問い合わせ
            </h1>
            <span class="text-center">
                <p>Unipediaをご利用いただきありがとうございます。</p>
                <p>お問い合わせはUnipedia公式サイト</p>
                <p>または公式SNSにて受け付けております。</p>
            </span>
            <a class="btn btn-info btn-block" href="https://peraichi.com/landing_pages/view/xewmz">
                Unipedia公式サイト
            </a>
            <div class="btn__container">
                <p>
                    <a href="https://twitter.com/takuto_murase" class="btn-f" target="_blank" style="font-size:18px">
                        <i class="fab fa-twitter"></i>
                        <span>公式Twitter</span>
                    </a>
                </p>
                <p>
                    <a href="https://www.instagram.com/kei_to1212/?hl=ja" class="btn" target="_blank" style="font-size:18px">
                        <i class="fab fa-instagram"></i>
                        <span>公式instagram</span>
                    </a>
                </p>
            </div>
            <div class="panel panel-primary" style="margin-bottom: 5%">
                <div class="panel-heading">
                    よくある質問
                </div>
                    <ul class="list-group">
                        <a class="list-group-item" data-toggle="collapse" href="#question1">
                            Unipediaの利用に料金はかかりますか？
                        </a>
                        <div class="collapse" id="question1">
                            <div class="well">
                                料金は一切、いただいておりません。安心してご利用ください。
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
            @guest
                <a class="btn btn-info btn-block" href="{{ route('login') }}">
                    ログイン画面へ
                </a>
                <a class="btn btn-info btn-block" href="{{ route('select.pref') }}" style="margin-bottom:100px">
                    新規登録はこちら
                </a>
            @endguest
        </div>
    </div>
</div>
@endsection